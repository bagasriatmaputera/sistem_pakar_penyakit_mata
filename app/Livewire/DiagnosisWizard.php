<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Gejala;
use App\Services\MethodService;

class DiagnosisWizard extends Component
{
    public $currentStep = 1;
    public $search = '';
    public $form = [
        'gejala_terpilih' => [],
        'nama_pasien' => '',
        'usia' => '',
        'jenis_kelamin' => '',
        'setuju_disclaimer' => false
    ]; 
    public $hasilRiwayat = null;
    public $apakahMelebihiBatas = false;

    public function toggleSymptom($symptomId)
    {
        if (in_array($symptomId, $this->form['gejala_terpilih'])) {
            $this->form['gejala_terpilih'] = array_diff($this->form['gejala_terpilih'], [$symptomId]);
        } else {
            $this->form['gejala_terpilih'][] = $symptomId;
        }
        $this->form['gejala_terpilih'] = array_values($this->form['gejala_terpilih']);
    }

    public function nextStep(MethodService $methodService)
    {
        if ($this->currentStep === 1) {
            if (count($this->form['gejala_terpilih']) === 0) {
                session()->flash('error', 'Silakan pilih minimal satu gejala terlebih dahulu.');
                return;
            }
            $this->currentStep = 2;
        } 
        elseif ($this->currentStep === 2) {
            $this->validate([
                'form.nama_pasien' => 'required|string|max:100',
                'form.usia' => 'required|numeric|min:1|max:120',
                'form.jenis_kelamin' => 'required'
            ], [
                'form.nama_pasien.required' => 'Nama wajib diisi.',
                'form.usia.required' => 'Usia wajib diisi.',
                'form.jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.'
            ]);

            $g06 = Gejala::where('kode_gejala', 'G06')->first();
            if ($g06 && $this->form['usia'] > 40) {
                if (!in_array($g06->id, $this->form['gejala_terpilih'])) {
                    $this->form['gejala_terpilih'][] = $g06->id;
                }
            }

            $this->currentStep = 3;
        }
        elseif ($this->currentStep === 3) {
    if (!$this->form['setuju_disclaimer']) {
        session()->flash('error', 'Anda harus menyetujui pernyataan disclaimer untuk melanjutkan.');
        return;
    }

    try {
        $methodService->determineDisease($this->form);
        
        $this->hasilRiwayat = $methodService->getResults($this->form['nama_pasien']);

    } catch (\Throwable $th) {
        session()->flash('error', $th->getMessage());
        return;
    }
    
    $this->currentStep = 4;
}
    }

    public function previousStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    public function render()
    {
        $gejalas = Gejala::when($this->search, function ($query) {
                $query->where('nama_gejala', 'like', '%' . $this->search . '%');
            })
            ->get();

        $selectedGejalaItems = Gejala::whereIn('id', $this->form['gejala_terpilih'])
            ->get();

        return view('livewire.diagnosis-wizard', [
            'gejalas' => $gejalas,
            'selectedGejalaItems' => $selectedGejalaItems,
            'hasilRiwayat' => $this->hasilRiwayat ?? null
        ])->layout('layouts.app');
    }

    public function resetKonsultasi()
    {
        $this->currentStep = 1;
        $this->search = '';
        $this->hasilRiwayat = null; 
        $this->form = [
            'gejala_terpilih' => [],
            'nama_pasien' => '',
            'usia' => '',
            'jenis_kelamin' => '',
            'setuju_disclaimer' => false
        ];
    }
}
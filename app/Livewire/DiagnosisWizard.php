<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Gejala;
use App\Services\MethodService;

class DiagnosisWizard extends Component
{
    public $currentStep = 1;
    public $search = '';
    public $selectedSymptoms = [];
    public $nama_pasien = '';
    public $usia = '';
    public $jenis_kelamin = '';
    public $setuju_disclaimer = false;

    public function toggleSymptom($symptomId)
    {
        if (in_array($symptomId, $this->selectedSymptoms)) {
            $this->selectedSymptoms = array_diff($this->selectedSymptoms, [$symptomId]);
        } else {
            $this->selectedSymptoms[] = $symptomId;
        }
        $this->selectedSymptoms = array_values($this->selectedSymptoms);
    }

    public function nextStep()
    {
        if ($this->currentStep === 1) {
            if (count($this->selectedSymptoms) === 0) {
                session()->flash('error', 'Silakan pilih minimal satu gejala terlebih dahulu.');
                return;
            }
            $this->currentStep = 2;
        } 
        elseif ($this->currentStep === 2) {
            $this->validate([
                'nama_pasien' => 'required|string|max:100',
                'usia' => 'required|numeric|min:1|max:120',
                'jenis_kelamin' => 'required'
            ], [
                'nama_pasien.required' => 'Nama wajib diisi.',
                'usia.required' => 'Usia wajib diisi.',
                'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.'
            ]);

            $g06 = Gejala::where('kode_gejala', 'G06')->first();
            if ($g06 && $this->usia > 40) {
                if (!in_array($g06->id, $this->selectedSymptoms)) {
                    $this->selectedSymptoms[] = $g06->id;
                }
            }

            $this->currentStep = 3;
        }
        elseif ($this->currentStep === 3) {
            if (!$this->setuju_disclaimer) {
                session()->flash('error', 'Anda harus menyetujui pernyataan disclaimer untuk melanjutkan.');
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

        $selectedGejalaItems = Gejala::whereIn('id', $this->selectedSymptoms)
            ->get();

        return view('livewire.diagnosis-wizard', [
            'gejalas' => $gejalas,
            'selectedGejalaItems' => $selectedGejalaItems
        ])->layout('layouts.app');
    }
}
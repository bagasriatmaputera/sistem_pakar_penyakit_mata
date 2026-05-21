<?php

namespace App\Livewire;

use App\Models\Rule;
use App\Models\Penyakit;
use App\Models\Gejala;
use Livewire\Component;

class RuleCreateOrUpdate extends Component
{
    public $isEdit = false;
    public $ruleId;

    public $penyakit_id = '';
    
    public $gejala_ids = []; 
    
    public $gejala_id = ''; 

    public function mount($id = null)
    {
        if ($id) {
            $this->isEdit = true;
            $this->ruleId = $id;
            $rule = Rule::findOrFail($id);
            
            $this->penyakit_id = $rule->penyakit_id;
            $this->gejala_id = $rule->gejala_id;
        }
    }

    public function save()
    {
        if ($this->isEdit) {
            $this->validate([
                'penyakit_id' => 'required|exists:penyakits,id',
                'gejala_id' => 'required|exists:gejalas,id'
            ], [
                'penyakit_id.required' => 'Wajib memilih target penyakit.',
                'gejala_id.required' => 'Wajib memilih indikator gejala.'
            ]);

            $duplikat = Rule::where('penyakit_id', $this->penyakit_id)
                ->where('gejala_id', $this->gejala_id)
                ->where('id', '!=', $this->ruleId)
                ->exists();

            if ($duplikat) {
                $namaPenyakit = Penyakit::find($this->penyakit_id)->nama_penyakit;
                $namaGejala = Gejala::find($this->gejala_id)->nama_gejala;
                session()->flash('error', "Aturan Gagal Disimpan! Kombinasi Aturan untuk penyakit [{$namaPenyakit}] dengan gejala [{$namaGejala}] sudah terdaftar sebelumnya di database.");
                return;
            }

            $rule = Rule::findOrFail($this->ruleId);
            $rule->update([
                'penyakit_id' => $this->penyakit_id,
                'gejala_id' => $this->gejala_id
            ]);

            session()->flash('success', 'Kombinasi aturan berhasil diperbarui.');

        } else {
            $this->validate([
                'penyakit_id' => 'required|exists:penyakits,id',
                'gejala_ids' => 'required|array|min:1'
            ], [
                'penyakit_id.required' => 'Silakan pilih penyakit terlebih dahulu.',
                'gejala_ids.required' => 'Pilih minimal satu gejala untuk dikombinasikan.'
            ]);

            $namaPenyakit = Penyakit::find($this->penyakit_id)->nama_penyakit;
            $adaDuplikasi = false;
            $daftarGejalaDuplikat = [];

            foreach ($this->gejala_ids as $gId) {
                $cek = Rule::where('penyakit_id', $this->penyakit_id)
                    ->where('gejala_id', $gId)
                    ->exists();
                
                if ($cek) {
                    $adaDuplikasi = true;
                    $daftarGejalaDuplikat[] = Gejala::find($gId)->kode_gejala;
                }
            }

            if ($adaDuplikasi) {
                $listKode = implode(', ', $daftarGejalaDuplikat);
                session()->flash('error', "Gagal Menyimpan! Di dalam basis aturan, penyakit [{$namaPenyakit}] sudah memiliki relasi dengan kode gejala: ({$listKode}). Silakan hapus tanda centang pada gejala tersebut.");
                return;
            }

            foreach ($this->gejala_ids as $gId) {
                Rule::create([
                    'penyakit_id' => $this->penyakit_id,
                    'gejala_id' => $gId
                ]);
            }

            session()->flash('success', "Seluruh aturan kombinasi baru untuk {$namaPenyakit} sukses disimpan.");
        }

        return redirect()->route('admin.rule.index');
    }

    public function render()
    {
        return view('livewire.rule-create-or-update', [
            'listPenyakit' => Penyakit::all(),
            'listGejala' => Gejala::all()
        ])->layout('layouts.app');
    }
}
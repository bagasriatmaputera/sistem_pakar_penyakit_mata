<?php

namespace App\Livewire;

use App\Models\Gejala;
use Livewire\Component;

class GejalaCreateOrUpdate extends Component
{
    public $isEdit = false;
    public $gejalaId;
    
    public $kode_gejala;
    public $nama_gejala;
    public $deskripsi_gejala;

    public function mount($id = null)
    {
        if ($id) {
            $this->isEdit = true;
            $this->gejalaId = $id;
            $gejala = Gejala::findOrFail($id);
            
            $this->kode_gejala = $gejala->kode_gejala;
            $this->nama_gejala = $gejala->nama_gejala;
            $this->deskripsi_gejala = $gejala->deskripsi_gejala;
        } else {
            $this->kode_gejala = $this->generateNextKodeGejala();
        }
    }

    private function generateNextKodeGejala()
    {
        // Mendapatkan kode_gejala terakhir yang ada di DB (termasuk yang softDeleted)
        $lastGejala = Gejala::latest('id')->first();
        
        if (!$lastGejala) {
            return 'G01';
        }

        // Ekstraksi angka dari kode menggunakan regex (Contoh 'G42' diambil 42)
        preg_match('/\d+/', $lastGejala->kode_gejala, $matches);
        $nextNumber = isset($matches[0]) ? (int)$matches[0] + 1 : 1;

        // Pad dengan angka 0 di depan agar konsisten dua digit (G01, G11, G105)
        return 'G' . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);
    }

    public function save()
    {
        $rules = [
            'nama_gejala' => 'required|string|max:255',
            'deskripsi_gejala' => 'nullable|string',
        ];

        if ($this->isEdit) {
            $rules['kode_gejala'] = 'required|string|max:10|unique:gejalas,kode_gejala,' . $this->gejalaId;
        } else {
            $rules['kode_gejala'] = 'required|string|max:10|unique:gejalas,kode_gejala';
        }

        $this->validate($rules, [
            'nama_gejala.required' => 'Nama gejala harus diisi.',
            'kode_gejala.unique' => 'Kode gejala sudah terdaftar di sistem.'
        ]);

        if ($this->isEdit) {
            $gejala = Gejala::findOrFail($this->gejalaId);
            $gejala->update([
                'kode_gejala' => $this->kode_gejala,
                'nama_gejala' => $this->nama_gejala,
                'deskripsi_gejala' => $this->deskripsi_gejala,
            ]);
            session()->flash('success', 'Data gejala berhasil diperbarui.');
        } else {
            Gejala::create([
                'kode_gejala' => $this->kode_gejala,
                'nama_gejala' => $this->nama_gejala,
                'deskripsi_gejala' => $this->deskripsi_gejala,
            ]);
            session()->flash('success', 'Gejala baru berhasil disimpan.');
        }

        return redirect()->route('admin.gejala.index');
    }

    public function render()
    {
        return view('livewire.gejala-create-or-update')
            ->layout('layouts.app');
    }
}
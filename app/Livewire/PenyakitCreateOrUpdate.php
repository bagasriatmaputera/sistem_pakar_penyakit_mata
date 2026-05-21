<?php

namespace App\Livewire;

use App\Models\Penyakit;
use Livewire\Component;

class PenyakitCreateOrUpdate extends Component
{
    public $isEdit = false;
    public $penyakitId;
    
    public $kode_penyakit;
    public $nama_penyakit;
    public $deskripsi_penyakit;
    public $saran_perawatan;

    public function mount($id = null)
    {
        if ($id) {
            $this->isEdit = true;
            $this->penyakitId = $id;
            $penyakit = Penyakit::findOrFail($id);
            
            $this->kode_penyakit = $penyakit->kode_penyakit;
            $this->nama_penyakit = $penyakit->nama_penyakit;
            $this->deskripsi_penyakit = $penyakit->deskripsi_penyakit;
            $this->saran_perawatan = $penyakit->saran_perawatan;
        } else {
            $this->kode_penyakit = $this->generateNextKodePenyakit();
        }
    }

    private function generateNextKodePenyakit()
    {
        // Mendapatkan kode_penyakit terakhir yang ada di DB (termasuk yang softDeleted)
        $lastPenyakit = Penyakit::latest('id')->first();
        
        if (!$lastPenyakit) {
            return 'P01';
        }

        // Ambil bagian angka numerik saja menggunakan regular expression
        preg_match('/\d+/', $lastPenyakit->kode_penyakit, $matches);
        $nextNumber = isset($matches[0]) ? (int)$matches[0] + 1 : 1;

        // Cetak format kode ber-padding angka 0 di depan
        return 'P' . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);
    }

    public function save()
    {
        $rules = [
            'nama_penyakit' => 'required|string|max:100',
            'deskripsi_penyakit' => 'required|string',
            'saran_perawatan' => 'required|string',
        ];

        if ($this->isEdit) {
            $rules['kode_penyakit'] = 'required|string|max:10|unique:penyakits,kode_penyakit,' . $this->penyakitId;
        } else {
            $rules['kode_penyakit'] = 'required|string|max:10|unique:penyakits,kode_penyakit';
        }

        $this->validate($rules, [
            'nama_penyakit.required' => 'Nama penyakit wajib diisi.',
            'deskripsi_penyakit.required' => 'Deskripsi patologis penyakit tidak boleh kosong.',
            'saran_perawatan.required' => 'Saran perawatan/intervensi awal wajib dicantumkan.',
            'kode_penyakit.unique' => 'Kode penyakit ini sudah terdaftar sebelumnya.'
        ]);

        if ($this->isEdit) {
            $penyakit = Penyakit::findOrFail($this->penyakitId);
            $penyakit->update([
                'kode_penyakit' => $this->kode_penyakit,
                'nama_penyakit' => $this->nama_penyakit,
                'deskripsi_penyakit' => $this->deskripsi_penyakit,
                'saran_perawatan' => $this->saran_perawatan,
            ]);
            session()->flash('success', 'Data entitas penyakit berhasil dimodifikasi.');
        } else {
            Penyakit::create([
                'kode_penyakit' => $this->kode_penyakit,
                'nama_penyakit' => $this->nama_penyakit,
                'deskripsi_penyakit' => $this->deskripsi_penyakit,
                'saran_perawatan' => $this->saran_perawatan,
            ]);
            session()->flash('success', 'Data penyakit baru berhasil didaftarkan ke sistem.');
        }

        return redirect()->route('admin.penyakit.index');
    }

    public function render()
    {
        return view('livewire.penyakit-create-or-update')
            ->layout('layouts.app');
    }
}
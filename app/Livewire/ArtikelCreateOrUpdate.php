<?php

namespace App\Livewire;

use App\Models\Artikel;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ArtikelCreateOrUpdate extends Component
{
    use WithFileUploads; // Kunci wajib untuk upload berkas biner di Livewire

    public $isEdit = false;
    public $artikelId;

    public $title;
    public $penulis;
    public $content;
    public $is_active = true;
    public $gambar; 
    public $existingGambar; // Menampung path gambar lama dari database

    // Entitas JSON Key Insight (Untuk poin ringkasan penting skripsi Anda)
    public $key_insights = [];
    public $newInsightItem = '';

    public function mount($id = null)
    {
        if ($id) {
            $this->isEdit = true;
            $this->artikelId = $id;
            $artikel = Artikel::findOrFail($id);

            $this->title = $artikel->title;
            $this->penulis = $artikel->penulis;
            $this->content = $artikel->content;
            $this->is_active = (bool)$artikel->is_active;
            $this->existingGambar = $artikel->gambar;
            
            // Konversi dari data JSON/Array DB ke properti array komponen
            $this->key_insights = is_array($artikel->key_insight) ? $artikel->key_insight : ($artikel->key_insight ? json_decode($artikel->key_insight, true) : []);
        }
    }

    public function addInsight()
    {
        if (trim($this->newInsightItem) !== '') {
            $this->key_insights[] = trim($this->newInsightItem);
            $this->newInsightItem = '';
        }
    }

    public function removeInsight($index)
    {
        unset($this->key_insights[$index]);
        $this->key_insights = array_values($this->key_insights);
    }

    public function save()
    {
        $rules = [
            'title'   => 'required|string|max:255',
            'penulis' => 'required|string|max:100',
            'content' => 'required|string',
            'is_active' => 'required|boolean',
            'gambar'  => 'nullable|' . ($this->isEdit ? 'nullable' : 'required') . '|image|max:2048', // Maksimal berkas gambar 2MB
        ];

        $this->validate($rules, [
            'title.required'   => 'Judul artikel wajib diisi.',
            'penulis.required' => 'Nama kontributor/penulis wajib dicantumkan.',
            'content.required' => 'Batang tubuh naskah artikel tidak boleh kosong.',
            'gambar.required'  => 'Sampul foto artikel wajib diunggah.',
            'gambar.image'     => 'Format berkas wajib berupa file gambar (png, jpg, jpeg).',
            'gambar.max'       => 'Ukuran file gambar tidak boleh melebihi batas aman 2MB.'
        ]);

        $imagePath = $this->existingGambar;

        // Logika Eksekusi Upload Gambar Baru
        if ($this->gambar) {
            // Hapus gambar lama jika masuk dalam mode edit konten
            if ($this->isEdit && $this->existingGambar && Storage::disk('public')->exists($this->existingGambar)) {
                Storage::disk('public')->delete($this->existingGambar);
            }
            // Simpan gambar baru ke folder public/artikels
            $imagePath = $this->gambar->store('artikels', 'public');
        }

        $payload = [
            'title'       => $this->title,
            'penulis'     => $this->penulis,
            'content'     => $this->content,
            'is_active'   => $this->is_active,
            'key_insight' => $this->key_insights, // Laravel otomatis mengubah ke JSON jika casts sudah disetel di Model
            'gambar'      => $imagePath
        ];

        if ($this->isEdit) {
            $artikel = Artikel::findOrFail($this->artikelId);
            $artikel->update($payload);
            session()->flash('success', 'Naskah edukasi artikel berhasil diperbarui.');
        } else {
            Artikel::create($payload);
            session()->flash('success', 'Artikel literasi baru berhasil diterbitkan.');
        }

        return redirect()->route('admin.artikel.index');
    }

    public function render()
    {
        return view('livewire.artikel-create-or-update')
            ->layout('layouts.app');
    }
}
<?php

namespace App\Livewire;

use App\Models\Artikel;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class ArtikelIndex extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function toggleStatus($id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->update([
            'is_active' => !$artikel->is_active
        ]);

        session()->flash('success', "Status publikasi artikel berhasil diubah.");
    }

    public function deleteArtikel($id)
    {
        $artikel = Artikel::findOrFail($id);
        
        // Hapus berkas gambar fisik dari storage jika ada
        if ($artikel->gambar && Storage::disk('public')->exists($artikel->gambar)) {
            Storage::disk('public')->delete($artikel->gambar);
        }

        $artikel->delete();

        session()->flash('success', "Artikel berhasil dihapus secara permanen.");
    }

    public function render()
    {
        $artikels = Artikel::where(function($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('penulis', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(10);

        return view('livewire.artikel-index', [
            'artikels' => $artikels
        ])->layout('layouts.app');
    }
}
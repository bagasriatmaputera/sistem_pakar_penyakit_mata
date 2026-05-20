<?php

namespace App\Livewire;

use App\Models\Artikel;
use Livewire\Component;

class ArtikelShowPage extends Component
{
    public $artikel;

    /**
     * Fungsi mount dijalankan otomatis saat halaman pertama kali dimuat.
     * Parameter $id diambil langsung secara dinamis dari URL hantaran Route.
     */
    public function mount($id)
    {
        // Mengambil data artikel berdasarkan ID, jika tidak ada akan melempar error 404
        $this->artikel = Artikel::where('is_active', true)->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.artikel-show-page')
            ->layout('layouts.app');
    }
}
<?php

namespace App\Livewire;

use App\Models\Artikel;
use Livewire\Component;

class ArtikelShowPage extends Component
{
    public $artikel;

    
    public function mount($id)
    {
        $this->artikel = Artikel::where('is_active', true)->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.artikel-show-page')
            ->layout('layouts.app');
    }
}
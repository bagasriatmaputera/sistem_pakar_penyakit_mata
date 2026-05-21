<?php

namespace App\Livewire;

use App\Models\Artikel;
use Livewire\Component;

class HomePage extends Component
{
    public function render()
    {
        // Mengambil 2 artikel terbaru untuk ditampilkan sebagai cuplikan di landing page
        $latestArtikels = Artikel::where('is_active', true)->latest()->take(2)->get();

        return view('livewire.home-page', [
            'latestArtikels' => $latestArtikels
        ])->layout('layouts.app');
    }
}
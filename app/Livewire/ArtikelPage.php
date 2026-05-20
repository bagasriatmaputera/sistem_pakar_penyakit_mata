<?php

namespace App\Livewire;

use App\Models\Artikel;
use Livewire\Component;
use Livewire\WithPagination;

class ArtikelPage extends Component
{
    use WithPagination;

    public $search = '';
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $artikels = Artikel::where('is_active', true)
            ->where('title', 'like', '%' . $this->search . '%')
            ->latest()
            ->paginate(4);

        return view('livewire.artikel-page', [
            'artikels' => $artikels
        ]);
    }
}
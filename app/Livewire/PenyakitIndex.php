<?php

namespace App\Livewire;

use App\Models\Penyakit;
use Livewire\Component;
use Livewire\WithPagination;

class PenyakitIndex extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function deletePenyakit($id)
    {
        $penyakit = Penyakit::findOrFail($id);
        $penyakit->delete();

        session()->flash('success', "Penyakit {$penyakit->kode_penyakit} berhasil dihapus.");
    }

    public function render()
    {
        $penyakits = Penyakit::where(function($query) {
                $query->where('kode_penyakit', 'like', '%' . $this->search . '%')
                      ->orWhere('nama_penyakit', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(10);

        return view('livewire.penyakit-index', [
            'penyakits' => $penyakits
        ])->layout('layouts.app');
    }
}
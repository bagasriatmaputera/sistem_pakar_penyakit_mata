<?php

namespace App\Livewire;

use App\Models\Gejala;
use Livewire\Component;
use Livewire\WithPagination;

class GejalaIndex extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function deleteGejala($id)
    {
        $gejala = Gejala::findOrFail($id);
        $gejala->delete();

        session()->flash('success', "Gejala {$gejala->kode_gejala} berhasil dihapus.");
    }

    public function render()
    {
        $gejalas = Gejala::where(function($query) {
                $query->where('kode_gejala', 'like', '%' . $this->search . '%')
                      ->orWhere('nama_gejala', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(10);

        return view('livewire.gejala-index', [
            'gejalas' => $gejalas
        ])->layout('layouts.app');
    }
}
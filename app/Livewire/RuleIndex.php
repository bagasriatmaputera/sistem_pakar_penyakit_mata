<?php

namespace App\Livewire;

use App\Models\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class RuleIndex extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function deleteRule($id)
    {
        $rule = Rule::findOrFail($id);
        $rule->delete();

        session()->flash('success', "Aturan relasi berhasil dihapus dari sistem pakar.");
    }

    public function render()
    {
        $rulesData = Rule::with(['penyakit', 'gejala'])
            ->whereHas('penyakit', function($query) {
                $query->where('nama_penyakit', 'like', '%' . $this->search . '%')
                      ->orWhere('kode_penyakit', 'like', '%' . $this->search . '%');
            })
            ->orWhereHas('gejala', function($query) {
                $query->where('nama_gejala', 'like', '%' . $this->search . '%')
                      ->orWhere('kode_gejala', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(10);

        return view('livewire.rule-index', [
            'rulesData' => $rulesData
        ])->layout('layouts.app');
    }
}
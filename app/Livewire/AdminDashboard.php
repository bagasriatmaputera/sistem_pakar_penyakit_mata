<?php

namespace App\Livewire;

use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\Rule;
use App\Models\Riwayat;
use Livewire\Component;

class AdminDashboard extends Component
{
    public function logout()
    {
        \Illuminate\Support\Facades\Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('home');
    }

    public function render()
    {
        // Mengambil counter statistik data langsung dari database
        $stats = [
            'total_gejala'   => Gejala::count(),
            'total_penyakit' => Penyakit::count(),
            'total_rule'     => Rule::count(),
            'total_riwayat'  => Riwayat::count(),
        ];

        return view('livewire.admin-dashboard', [
            'stats' => $stats
        ])->layout('layouts.app');
    }
}
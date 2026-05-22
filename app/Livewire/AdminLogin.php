<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminLogin extends Component
{
    public $email = '';
    public $password = '';

    public function mount()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
    }

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:5',
        ], [
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Kata sandi wajib diisi.'
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->regenerate();

            return redirect()->route('admin.dashboard');
        }

        session()->flash('error', 'Kredensial login Admin tidak cocok dengan data kami.');
    }

    public function render()
    {
        return view('livewire.admin-login')->layout('layouts.app');
    }
}
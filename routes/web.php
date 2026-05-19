<?php

use App\Livewire\DiagnosisWizard;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/diagnosis', DiagnosisWizard::class)->name('diagnosis.wizard');

<?php

use App\Livewire\ArtikelPage;
use App\Livewire\DiagnosisWizard;
use App\Livewire\ArtikelShowPage;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/diagnosis', DiagnosisWizard::class)->name('diagnosis.wizard');
Route::get('/artikel', ArtikelPage::class)->name('artikel.index');
Route::get('/artikel/{id}', ArtikelShowPage::class)->name('artikel.show');

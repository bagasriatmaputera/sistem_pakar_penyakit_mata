<?php

use App\Http\Controllers\PdfController;
use App\Livewire\HomePage;
use App\Livewire\DiagnosisWizard;
use App\Livewire\ArtikelPage;
use App\Livewire\ArtikelShowPage;
use App\Livewire\AdminLogin;
use App\Livewire\AdminDashboard;
use App\Livewire\GejalaIndex;
use App\Livewire\GejalaCreateOrUpdate;
use App\Livewire\PenyakitIndex;
use App\Livewire\PenyakitCreateOrUpdate;
use App\Livewire\RuleIndex;
use App\Livewire\RuleCreateOrUpdate;
use App\Livewire\ArtikelIndex;
use App\Livewire\ArtikelCreateOrUpdate;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class)->name('home');
Route::get('/diagnosis', DiagnosisWizard::class)->name('diagnosis.wizard');
Route::get('/artikel', ArtikelPage::class)->name('artikel.index');
Route::get('/artikel/{id}', ArtikelShowPage::class)->name('artikel.show');  
Route::get('/riwayat/export-pdf/{id}', [PdfController::class, 'cetakRiwayat']);

Route::get('/admin/login', AdminLogin::class)->name('login');



Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    Route::get('/', AdminDashboard::class)->name('dashboard');

    Route::get('/gejala', GejalaIndex::class)->name('gejala.index');
    Route::get('/gejala/create', GejalaCreateOrUpdate::class)->name('gejala.create');
    Route::get('/gejala/edit/{id}', GejalaCreateOrUpdate::class)->name('gejala.edit');

    Route::get('/penyakit', PenyakitIndex::class)->name('penyakit.index');
    Route::get('/penyakit/create', PenyakitCreateOrUpdate::class)->name('penyakit.create');
    Route::get('/penyakit/edit/{id}', PenyakitCreateOrUpdate::class)->name('penyakit.edit');

    Route::get('/rule', RuleIndex::class)->name('rule.index');
    Route::get('/rule/create', RuleCreateOrUpdate::class)->name('rule.create');
    Route::get('/rule/edit/{id}', RuleCreateOrUpdate::class)->name('rule.edit');

    Route::get('/artikel', ArtikelIndex::class)->name('artikel.index');
    Route::get('/artikel', ArtikelIndex::class)->name('artikel.index');
    Route::get('/artikel/create', ArtikelCreateOrUpdate::class)->name('artikel.create');
    Route::get('/artikel/edit/{id}', ArtikelCreateOrUpdate::class)->name('artikel.edit');

});
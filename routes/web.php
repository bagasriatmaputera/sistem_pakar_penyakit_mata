<?php

use App\Http\Controllers\PdfController;
use App\Livewire\ArtikelPage;
use App\Livewire\DiagnosisWizard;
use App\Livewire\ArtikelShowPage;
use App\Livewire\HomePage;
use Illuminate\Support\Facades\Route;
use App\Livewire\GejalaIndex;
use App\Livewire\GejalaCreateOrUpdate;
use App\Livewire\PenyakitIndex;
use App\Livewire\PenyakitCreateOrUpdate;
use App\Livewire\RuleIndex;
use App\Livewire\RuleCreateOrUpdate;
use App\Livewire\AdminDashboard;

Route::get('/', HomePage::class)->name('home');

Route::get('/diagnosis', DiagnosisWizard::class)->name('diagnosis.wizard');
Route::get('/artikel', ArtikelPage::class)->name('artikel.index');
Route::get('/artikel/{id}', ArtikelShowPage::class)->name('artikel.show');  
Route::get('/riwayat/export-pdf/{id}', [PdfController::class, 'cetakRiwayat']);

Route::get('/admin/gejala', GejalaIndex::class)->name('admin.gejala.index');
Route::get('/admin/gejala/create', GejalaCreateOrUpdate::class)->name('admin.gejala.create');
Route::get('/admin/gejala/edit/{id}', GejalaCreateOrUpdate::class)->name('admin.gejala.edit');

Route::get('/admin/penyakit', PenyakitIndex::class)->name('admin.penyakit.index');
Route::get('/admin/penyakit/create', PenyakitCreateOrUpdate::class)->name('admin.penyakit.create');
Route::get('/admin/penyakit/edit/{id}', PenyakitCreateOrUpdate::class)->name('admin.penyakit.edit');

Route::get('/admin/rule', RuleIndex::class)->name('admin.rule.index');
Route::get('/admin/rule/create', RuleCreateOrUpdate::class)->name('admin.rule.create');
Route::get('/admin/rule/edit/{id}', RuleCreateOrUpdate::class)->name('admin.rule.edit');

Route::get('/admin', AdminDashboard::class)->name('admin.dashboard');
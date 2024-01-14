<?php

use App\Livewire\AkunPage;
use App\Livewire\DashboardPage;
use App\Livewire\DataOlimpiadeDetailPage;
use App\Livewire\DataOlimpiadePage;
use App\Livewire\HomePage;
use App\Livewire\KelasPage;
use App\Livewire\KriteriaBobotPage;
use App\Livewire\PesertaPage;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Livewire::setUpdateRoute(function ($handle) {
    return Route::post(env('APP_LIVEWIRE_URL') . '/livewire/update', $handle);
});
Livewire::setScriptRoute(function ($handle) {
    return Route::get(env('APP_LIVEWIRE_URL') . '/livewire/livewire.js', $handle);
});

Route::get('/', HomePage::class)->name('/');
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', DashboardPage::class);
    Route::get('akun', AkunPage::class);
    Route::get('kriteria-bobot', KriteriaBobotPage::class);
    Route::get('data-olimpiade', DataOlimpiadePage::class);
    Route::get('data-olimpiade/{id}', DataOlimpiadeDetailPage::class);
    Route::get('kelas', KelasPage::class);
    Route::get('peserta', PesertaPage::class);
});

// Route::get('/', function () {
//     return view('welcome');
// });

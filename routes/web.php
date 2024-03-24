<?php

use App\Http\Controllers\PendidikanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RencanaKerjaController;

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

Route::get('/', function () {
    return view('Auth.login');
});

Route::get('/dashboard', function() {
    return view('Template.app');
});

Route::get('/profile', function(){
    return view('App.Profile.profile');
});

Route::prefix('/formRencanaKerja')->group(function () {
    // Rute untuk menampilkan semua data
    Route::get('/pendidikan', [PendidikanController::class, 'getAll'])->name('rk-pendidikan.all');

    // Rute untuk data teori
    Route::get('/pendidikan/teori', [PendidikanController::class, 'getTeori'])->name('rk-pendidikan.teori');
    Route::post('/pendidikan/teori-tambah', [PendidikanController::class, 'postTeori'])->name('rk-pendidikan.teori.create');
    Route::delete('/pendidikan/teori/{id}', [PendidikanController::class, 'deleteTeori'])->name('rk-pendidikan.teori.destroy');
    Route::post('/pendidikan/edit/teori', [PendidikanController::class, 'editTeori'])->name('rk-pendidikan.teori.update');

    // Rute untuk data bimbingan
    Route::get('/pendidikan/bimbingan', [PendidikanController::class, 'getBimbingan'])->name('rk-pendidikan.bimbingan');
    Route::post('/pendidikan/bimbingan-tambah', [PendidikanController::class, 'postBimbingan'])->name('rk-pendidikan.bimbingan.create');
    Route::delete('/pendidikan/bimbingan/{id}', [PendidikanController::class, 'deleteBimbingan'])->name('rk-pendidikan.bimbingan.destroy');

    // Rute untuk data seminar
    Route::get('/pendidikan/seminar', [PendidikanController::class, 'getSeminar'])->name('rk-pendidikan.seminar');
    Route::post('/pendidikan/seminar-tambah', [PendidikanController::class, 'postSeminar'])->name('rk-pendidikan.seminar.create');
    Route::delete('/pendidikan/seminar/{id}', [PendidikanController::class, 'deleteSeminar'])->name('rk-pendidikan.seminar.destroy');

    // Rute untuk data Tugas Akhir
    Route::get('/pendidikan/tugasAkhir', [PendidikanController::class, 'getTugasAkhir'])->name('rk-pendidikan.seminar');
    Route::post('/pendidikan/tugasAkhir-tambah', [PendidikanController::class, 'postTugasAkhir'])->name('rk-pendidikan.tugasAkhir.create');
    Route::post('/pendidikan/editTugasAkhir', [PendidikanController::class, 'editTugasAkhir'])->name('rk-pendidikan.tugasAkhir.update');
    Route::delete('/pendidikan/tugasAkhir/{id}', [PendidikanController::class, 'deleteTugasAkhir'])->name('rk-pendidikan.tugasAkhir.destroy');
});


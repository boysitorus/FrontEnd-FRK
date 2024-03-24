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

    //rute untuk data praktikum
    Route::post('/pendidikan/praktikum-tambah', [PendidikanController::class, 'postPraktikum'])->name('rk-pendidikan.praktikum.create');
    Route::delete('/pendidikan/praktikum/{id}', [PendidikanController::class, 'deletePraktikum'])->name('rk-pendidikan.praktikum.destroy');
    Route::post('/pendidikan/edit/praktikum', [PendidikanController::class, 'editPraktikum'])->name('rk-pendidikan.praktikum.update');

    // Rute untuk data bimbingan
    Route::get('/pendidikan/bimbingan', [PendidikanController::class, 'getBimbingan'])->name('rk-pendidikan.bimbingan');
    Route::post('/pendidikan/bimbingan-tambah', [PendidikanController::class, 'postBimbingan'])->name('rk-pendidikan.bimbingan.create');
    Route::delete('/pendidikan/bimbingan/{id}', [PendidikanController::class, 'deleteBimbingan'])->name('rk-pendidikan.bimbingan.destroy');
    Route::post('/pendidikan/edit/bimbingan', [PendidikanController::class, 'editBimbingan'])->name('rk-pendidikan.bimbingan.update');

    // Rute untuk data seminar
    Route::get('/pendidikan/seminar', [PendidikanController::class, 'getSeminar'])->name('rk-pendidikan.seminar');
    Route::post('/pendidikan/seminar-tambah', [PendidikanController::class, 'postSeminar'])->name('rk-pendidikan.seminar.create');
    Route::delete('/pendidikan/seminar/{id}', [PendidikanController::class, 'deleteSeminar'])->name('rk-pendidikan.seminar.destroy');
});


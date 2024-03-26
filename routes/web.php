<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RencanaKerjaController;
use App\Http\Controllers\PenelitianController;

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

Route::get('/formRencanaKerja', function() {
    return view('App.Rencana.penelitian');
});

Route::prefix('/formRencanaKerja')->group(function () {
    Route::get('/pendidikan', [RencanaKerjaController::class, 'getPendidikanPanel'])->name('rk-pendidikkan');
    Route::get('/penelitian', [PenelitianController::class, 'getAll'])->name('rk-penelitian');
    Route::get('/simpulan', [RencanaKerjaController::class, 'getsimpulanPanel'])->name('rk-simpulan');

    // Rute untuk data penelitian kelompok
    Route::get('/penelitian/penelitian_kelompok', [PenelitianController::class, 'getPenelitianKelompok'])->name('rk-penelitian.penelitian_kelompok');
    Route::post('/penelitian/penelitian_kelompok-tambah', [PenelitianController::class, 'postPenelitianKelompok'])->name('rk-penelitian.penelitian_kelompok.create');
    Route::delete('/penelitian/penelitian_kelompok/{id}', [PenelitianController::class, 'deletePenelitianKelompok'])->name('rk-penelitian.penelitian_kelompok.destroy');
    Route::post('/penelitian/edit/penelitian_kelompok', [PenelitianController::class, 'editPenelitianKelompok'])->name('rk-penelitian.penelitian_kelompok.update');

    // Rute untuk data Penelitian Tridharma
    Route::get('/penelitian/penelitian_tridharma', [PenelitianController::class,'getPenelitianTridharma'])->name('rk-penelitian.penelitian_tridharma');
    Route::post('/penelitian/penelitian_tridharma', [PenelitianController::class,'postPenelitianTridharma'])->name('rk-penelitian.penelitian_tridharma.create');
    Route::delete('/penelitian/penelitian_tridharma', [PenelitianController::class,'deletePenelitianTridharma'])->name('rk-penelitian.penelitian_tridharma.destroy');
    Route::edit('/penelitian/penelitian_tridharma', [PenelitianController::class,'editPenelitianTridharma'])->name('rk-penelitian.penelitian_tridharma.update');
});


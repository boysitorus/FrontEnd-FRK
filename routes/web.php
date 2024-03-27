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

    // Rute untuk data ___

    // Rute untuk data menyadur naskah buku
    Route::get('/penelitian/menyadur', [PenelitianController::class, 'getMenyadur'])->name('rk-penelitian.menyadur');
    Route::post('/penelitian/menyadur-tambah', [PenelitianController::class, 'postMenyadur'])->name('rk-penelitian.menyadur.create');
    Route::delete('/penelitian/menyadur/{id}', [PenelitianController::class, 'deleteMenyadur'])->name('rk-penelitian.menyadur.destroy');
    Route::post('/penelitian/edit/menyadur', [PenelitianController::class, 'editMenyadur'])->name('rk-penelitian.menyadur.update');

    // Rute untuk data menyunting naskah buku
    Route::get('/penelitian/menyunting', [PenelitianController::class, 'getMenyunting'])->name('rk-penelitian.menyunting');
    Route::post('/penelitian/menyunting-tambah', [PenelitianController::class, 'postMenyunting'])->name('rk-penelitian.menyunting.create');
    Route::delete('/penelitian/menyunting/{id}', [PenelitianController::class, 'deleteMenyunting'])->name('rk-penelitian.menyunting.destroy');
    Route::post('/penelitian/edit/menyunting', [PenelitianController::class, 'editMenyunting'])->name('rk-penelitian.menyunting.update');

    // Rute untuk hak_paten
    Route::post('/penelitian/hak_paten', [PenelitianController::class, 'postHakPaten'])->name('rk-penelitian.hak_paten.create');
    Route::post('/penelitian/edit/hak_paten', [PenelitianController::class, 'editHakPaten'])->name('rk-penelitian.hak_paten.update');
    Route::delete('/penelitian/hak_paten/{id}', [PenelitianController::class, 'deleteHakPaten'])->name('rk-penelitian.hak_paten.destroy');

    // Rute untuk media_massa
    Route::post('/penelitian/media_massa', [PenelitianController::class, 'postMediaMassa'])->name('rk-penelitian.media_massa.create');
    Route::post('/penelitian/edit/media_massa', [PenelitianController::class, 'editMediaMassa'])->name('rk-penelitian.media_massa.update');
    Route::delete('/penelitian/media_massa/{id}', [PenelitianController::class, 'deleteMediaMassa'])->name('rk-penelitian.media_massa.destroy');
});


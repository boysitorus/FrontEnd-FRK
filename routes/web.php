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

Route::get('/formPengabdian', function() {
    return view('App.Rencana.pengabdian');
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

    // Rute untuk data penelitian mandiri
    Route::get('/penelitian/penelitian_mandiri', [PenelitianController::class, 'getPenelitianMandiri'])->name('rk-penelitian.penelitian_mandiri');
    Route::post('/penelitian/penelitian_mandiri-tambah', [PenelitianController::class, 'postPenelitianMandiri'])->name('rk-penelitian.penelitian_mandiri.create');
    Route::delete('/penelitian/penelitian_mandiri/{id}', [PenelitianController::class, 'deletePenelitianMandiri'])->name('rk-penelitian.penelitian_mandiri.destroy');
    Route::post('/penelitian/edit/penelitian_mandiri', [PenelitianController::class, 'editPenelitianMandiri'])->name('rk-penelitian.penelitian_mandiri.update');

    // Rute untuk data ___

    // Rute untuk data Penelitian Tridharma
    Route::get('/penelitian/penelitian_tridharma', [PenelitianController::class,'getPenelitianTridharma'])->name('rk-penelitian.penelitian_tridharma');
    Route::post('/penelitian/penelitian_tridharma', [PenelitianController::class,'postPenelitianTridharma'])->name('rk-penelitian.penelitian_tridharma.create');
    Route::delete('/penelitian/penelitian_tridharma', [PenelitianController::class,'deletePenelitianTridharma'])->name('rk-penelitian.penelitian_tridharma.destroy');
    Route::post('/penelitian/edit/penelitian_tridharma', [PenelitianController::class,'editPenelitianTridharma'])->name('rk-penelitian.penelitian_tridharma.update');

    // Rute untuk data Menulis Jurnal Ilmiah
    Route::get('/penelitian/jurnal_ilmiah', [PenelitianController::class,'getJurnalIlmiah'])->name('rk-penelitian.jurnal_ilmiah');
    Route::post('/penelitian/jurnal_ilmiah', [PenelitianController::class,'postJurnalIlmiah'])->name('rk-penelitian.jurnal_ilmiah.create');
    Route::delete('/penelitian/jurnal_ilmiah', [PenelitianController::class,'deleteJurnalIlmiah'])->name('rk-penelitian.jurnal_ilmiah.destroy');
    Route::post('/penelitian/edit/jurnal_ilmiah', [PenelitianController::class,'editJurnalIlmiah'])->name('rk-penelitian.jurnal_ilmiah.update');

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

    // Rute untuk data penelitian modul
    Route::get('/penelitian/penelitian_modul', [PenelitianController::class, 'getPenelitianModul'])->name('rk-penelitian.penelitian_modul');
    Route::post('/penelitian/penelitian_modul-tambah', [PenelitianController::class, 'postPenelitianModul'])->name('rk-penelitian.penelitian_modul.create');
    Route::delete('/penelitian/penelitian_modul/{id}', [PenelitianController::class, 'deletePenelitianModul'])->name('rk-penelitian.penelitian_modul.destroy');
    Route::post('/penelitian/edit/penelitian_modul', [PenelitianController::class, 'editPenelitianModul'])->name('rk-penelitian.penelitian_modul.update');

    // Rute untuk data penelitian pekerti
    Route::get('/penelitian/penelitian_pekerti', [PenelitianController::class, 'getPenelitianPekerti'])->name('rk-penelitian.penelitian_pekerti');
    Route::post('/penelitian/penelitian_pekerti-tambah', [PenelitianController::class, 'postPenelitianPekerti'])->name('rk-penelitian.penelitian_pekerti.create');
    Route::delete('/penelitian/penelitian_pekerti/{id}', [PenelitianController::class, 'deletePenelitianPekerti'])->name('rk-penelitian.penelitian_pekerti.destroy');
    Route::post('/penelitian/edit/penelitian_pekerti', [PenelitianController::class, 'editPenelitianPekerti'])->name('rk-penelitian.penelitian_pekerti.update');

    // Rute untuk hak_paten
    Route::get('/penelitian/hak_paten', [PenelitianController::class, 'getHakPaten'])->name('rk-penelitian.hak_paten');
    Route::post('/penelitian/hak_paten', [PenelitianController::class, 'postHakPaten'])->name('rk-penelitian.hak_paten.create');
    Route::post('/penelitian/edit/hak_paten', [PenelitianController::class, 'editHakPaten'])->name('rk-penelitian.hak_paten.update');
    Route::delete('/penelitian/hak_paten/{id}', [PenelitianController::class, 'deleteHakPaten'])->name('rk-penelitian.hak_paten.destroy');

    // Rute untuk media_massa
    Route::get('/penelitian/media_massa', [PenelitianController::class, 'getMediaMassa'])->name('rk-penelitian.media_massa');
    Route::post('/penelitian/media_massa', [PenelitianController::class, 'postMediaMassa'])->name('rk-penelitian.media_massa.create');
    Route::post('/penelitian/edit/media_massa', [PenelitianController::class, 'editMediaMassa'])->name('rk-penelitian.media_massa.update');
    Route::delete('/penelitian/media_massa/{id}', [PenelitianController::class, 'deleteMediaMassa'])->name('rk-penelitian.media_massa.destroy');

    // Rute untuk data pembicara seminar
    Route::get('/penelitian/pembicara_seminar', [PenelitianController::class, 'getPembicaraSeminar '])->name('rk-penelitian.pembicara_seminar');
    Route::post('/penelitian/pembicara_seminar-tambah', [PenelitianController::class, 'postPembicaraSeminar'])->name('rk-penelitian.pembicara_seminar.create');
    Route::delete('/penelitian/pembicara_seminar/{id}', [PenelitianController::class, 'deletePembicaraSeminar'])->name('rk-penelitian.pembicara_seminar.destroy');
    Route::post('/penelitian/edit/pembicara_seminar', [PenelitianController::class, 'editPembicaraSeminar'])->name('rk-penelitian.pembicara_seminar.update');

    // Rute untuk data penyajian makalah
    Route::get('/penelitian/penyajian_makalah', [PenelitianController::class, 'getPenyajianMakalah '])->name('rk-penelitian.penyajian_makalah');
    Route::post('/penelitian/penyajian_makalah-tambah', [PenelitianController::class, 'postPenyajianMakalah'])->name('rk-penelitian.penyjajian_makalah.create');
    Route::delete('/penelitian/penyajian_makalah/{id}', [PenelitianController::class, 'deletePenyajianMakalah'])->name('rk-penelitian.penyajian_makalah.destroy');
    Route::post('/penelitian/edit/penyajian_makalah', [PenelitianController::class, 'editPenyajianMakalah'])->name('rk-penelitian.penyajian_makalah.update');
});
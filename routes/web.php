<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RencanaKerjaController;
use App\Http\Controllers\PenelitianController;
use App\Http\Controllers\PengabdianController;

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


Route::post('/', [AuthenticationController::class, 'post'])->name('user.login.post');
Route::get('/', [AuthenticationController::class, 'get'])->name('user.login.get');
Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout.get');


Route::group(['middleware' => ['check.token']], function() {
    Route::get('/dashboard', [UserController::class, 'userDashboard'])->name('home');

    Route::get('/profile', [UserController::class, 'userProfile'])->name('profile');

    Route::get('/formRencanaKerja', function() {
        return view('App.Rencana.penelitian');
    });

   Route::prefix('/formRencanaKerja')->group(function () {
       Route::get('/pendidikan', [RencanaKerjaController::class, 'getPendidikanPanel'])->name('rk-pendidikkan');
       Route::get('/penelitian', [PenelitianController::class, 'getPenelitianPanel'])->name('rk-penelitian');
       Route::get('/simpulan', [RencanaKerjaController::class, 'getsimpulanPanel'])->name('rk-simpulan');
       Route::get('/pengabdian', [PengabdianController::class, 'getPengabdianPanel'])->name('rk-pengabdian');

       // Kelompok rute untuk form penelitian
       Route::prefix('/penelitian')->group(function () {
            // Rute untuk data tabel a. penelitian kelompok
            Route::get('/penelitian_kelompok', [PenelitianController::class, 'getPenelitianKelompok'])->name('rk-penelitian.penelitian_kelompok');
            Route::post('/penelitian_kelompok-tambah', [PenelitianController::class, 'postPenelitianKelompok'])->name('rk-penelitian.penelitian_kelompok.create');
            Route::delete('/penelitian_kelompok/{id}', [PenelitianController::class, 'deletePenelitianKelompok'])->name('rk-penelitian.penelitian_kelompok.destroy');
            Route::post('/edit/penelitian_kelompok', [PenelitianController::class, 'editPenelitianKelompok'])->name('rk-penelitian.penelitian_kelompok.update');

            // Rute untuk data tabel b. penelitian mandiri
            Route::get('/penelitian_mandiri', [PenelitianController::class, 'getPenelitianMandiri'])->name('rk-penelitian.penelitian_mandiri');
            Route::post('/penelitian_mandiri-tambah', [PenelitianController::class, 'postPenelitianMandiri'])->name('rk-penelitian.penelitian_mandiri.create');
            Route::delete('/penelitian_mandiri/{id}', [PenelitianController::class, 'deletePenelitianMandiri'])->name('rk-penelitian.penelitian_mandiri.destroy');
            Route::post('/edit/penelitian_mandiri', [PenelitianController::class, 'editPenelitianMandiri'])->name('rk-penelitian.penelitian_mandiri.update');

            // Rute untuk data tabel c. buku terbit
            Route::get('/buku_terbit', [PenelitianController::class, 'getBukuTerbit'])->name('rk-penelitian.buku_terbit');
            Route::post('/buku_terbit-tambah', [PenelitianController::class, 'postBukuTerbit'])->name('rk-penelitian.buku_terbit.create');
            Route::delete('/buku_terbit/{id}', [PenelitianController::class, 'deleteBukuTerbit'])->name('rk-penelitian.buku_terbit.destroy');
            Route::post('/edit/buku_terbit', [PenelitianController::class, 'editBukuTerbit'])->name('rk-penelitian.buku_terbit.update');

            // route untuk data tabel d. buku internasional
            Route::get('/buku_internasional', [PenelitianController::class, 'getBukuInternasional'])->name('rk-penelitian.buku_internasional');
            Route::post('/buku_internasional-tambah', [PenelitianController::class, 'postBukuInternasional'])->name('rk-penelitian.buku_internasional.create');
            Route::delete('/buku_internasional/{id}', [PenelitianController::class, 'deleteBukuInternasional'])->name('rk-penelitian.buku_internasional.destroy');
            Route::post('/edit/buku_internasional', [PenelitianController::class, 'editBukuInternasional'])->name('rk-penelitian.buku_internasional.update');

            // Rute untuk data tabel e. penelitian Tridharma
            Route::get('/penelitian_tridharma', [PenelitianController::class,'getPenelitianTridharma'])->name('rk-penelitian.penelitian_tridharma');
            Route::post('/penelitian_tridharma', [PenelitianController::class,'postPenelitianTridharma'])->name('rk-penelitian.penelitian_tridharma.create');
            Route::delete('/penelitian_tridharma/{id}', [PenelitianController::class,'deletePenelitianTridharma'])->name('rk-penelitian.penelitian_tridharma.destroy');
            Route::post('/edit/penelitian_tridharma', [PenelitianController::class,'editPenelitianTridharma'])->name('rk-penelitian.penelitian_tridharma.update');

            // Rute untuk data tabel f. menulis Jurnal Ilmiah
            Route::get('/jurnal_ilmiah', [PenelitianController::class,'getJurnalIlmiah'])->name('rk-penelitian.jurnal_ilmiah');
            Route::post('/jurnal_ilmiah', [PenelitianController::class,'postJurnalIlmiah'])->name('rk-penelitian.jurnal_ilmiah.create');
            Route::delete('/jurnal_ilmiah/{id}', [PenelitianController::class,'deleteJurnalIlmiah'])->name('rk-penelitian.jurnal_ilmiah.destroy');
            Route::post('/edit/jurnal_ilmiah', [PenelitianController::class,'editJurnalIlmiah'])->name('rk-penelitian.jurnal_ilmiah.update');

            // Rute untuk data tabel g. menyadur naskah buku
            Route::get('/menyadur', [PenelitianController::class, 'getMenyadur'])->name('rk-penelitian.menyadur');
            Route::post('/menyadur-tambah', [PenelitianController::class, 'postMenyadur'])->name('rk-penelitian.menyadur.create');
            Route::delete('/menyadur/{id}', [PenelitianController::class, 'deleteMenyadur'])->name('rk-penelitian.menyadur.destroy');
            Route::post('/edit/menyadur', [PenelitianController::class, 'editMenyadur'])->name('rk-penelitian.menyadur.update');

            // Rute untuk data tabel h. menyunting naskah buku
            Route::get('/menyunting', [PenelitianController::class, 'getMenyunting'])->name('rk-penelitian.menyunting');
            Route::post('/menyunting-tambah', [PenelitianController::class, 'postMenyunting'])->name('rk-penelitian.menyunting.create');
            Route::delete('/menyunting/{id}', [PenelitianController::class, 'deleteMenyunting'])->name('rk-penelitian.menyunting.destroy');
            Route::post('/edit/menyunting', [PenelitianController::class, 'editMenyunting'])->name('rk-penelitian.menyunting.update');

            // Rute untuk data tabel i. penelitian modul
            Route::get('/penelitian_modul', [PenelitianController::class, 'getPenelitianModul'])->name('rk-penelitian.penelitian_modul');
            Route::post('/penelitian_modul-tambah', [PenelitianController::class, 'postPenelitianModul'])->name('rk-penelitian.penelitian_modul.create');
            Route::delete('/penelitian_modul/{id}', [PenelitianController::class, 'deletePenelitianModul'])->name('rk-penelitian.penelitian_modul.destroy');
            Route::post('/edit/penelitian_modul', [PenelitianController::class, 'editPenelitianModul'])->name('rk-penelitian.penelitian_modul.update');

            // Rute untuk data tabel j. penelitian pekerti
            Route::get('/penelitian_pekerti', [PenelitianController::class, 'getPenelitianPekerti'])->name('rk-penelitian.penelitian_pekerti');
            Route::post('/penelitian_pekerti-tambah', [PenelitianController::class, 'postPenelitianPekerti'])->name('rk-penelitian.penelitian_pekerti.create');
            Route::delete('/penelitian_pekerti/{id}', [PenelitianController::class, 'deletePenelitianPekerti'])->name('rk-penelitian.penelitian_pekerti.destroy');
            Route::post('/edit/penelitian_pekerti', [PenelitianController::class, 'editPenelitianPekerti'])->name('rk-penelitian.penelitian_pekerti.update');

            // Rute untuk data tabel k. hak paten
            Route::get('/hak_paten', [PenelitianController::class, 'getHakPaten'])->name('rk-penelitian.hak_paten');
            Route::post('/hak_paten', [PenelitianController::class, 'postHakPaten'])->name('rk-penelitian.hak_paten.create');
            Route::post('/edit/hak_paten', [PenelitianController::class, 'editHakPaten'])->name('rk-penelitian.hak_paten.update');
            Route::delete('/hak_paten/{id}', [PenelitianController::class, 'deleteHakPaten'])->name('rk-penelitian.hak_paten.destroy');

            // Rute untuk data tabel l. media_massa
            Route::get('/media_massa', [PenelitianController::class, 'getMediaMassa'])->name('rk-penelitian.media_massa');
            Route::post('/media_massa', [PenelitianController::class, 'postMediaMassa'])->name('rk-penelitian.media_massa.create');
            Route::post('/edit/media_massa', [PenelitianController::class, 'editMediaMassa'])->name('rk-penelitian.media_massa.update');
            Route::delete('/media_massa/{id}', [PenelitianController::class, 'deleteMediaMassa'])->name('rk-penelitian.media_massa.destroy');

            // Rute untuk data tabel m. pembicara seminar
            Route::get('/pembicara_seminar', [PenelitianController::class, 'getPembicaraSeminar '])->name('rk-penelitian.pembicara_seminar');
            Route::post('/pembicara_seminar-tambah', [PenelitianController::class, 'postPembicaraSeminar'])->name('rk-penelitian.pembicara_seminar.create');
            Route::delete('/pembicara_seminar/{id}', [PenelitianController::class, 'deletePembicaraSeminar'])->name('rk-penelitian.pembicara_seminar.destroy');
            Route::post('/edit/pembicara_seminar', [PenelitianController::class, 'editPembicaraSeminar'])->name('rk-penelitian.pembicara_seminar.update');

            // Rute untuk data tabel n. penyajian makalah
            Route::get('/penyajian_makalah', [PenelitianController::class, 'getPenyajianMakalah '])->name('rk-penelitian.penyajian_makalah');
            Route::post('/penyajian_makalah-tambah', [PenelitianController::class, 'postPenyajianMakalah'])->name('rk-penelitian.penyajian_makalah.create');
            Route::delete('/penyajian_makalah/{id}', [PenelitianController::class, 'deletePenyajianMakalah'])->name('rk-penelitian.penyajian_makalah.destroy');
            Route::post('/edit/penyajian_makalah', [PenelitianController::class, 'editPenyajianMakalah'])->name('rk-penelitian.penyajian_makalah.update');
       });
       
       // Kelompok rute untuk bagian pengabdian
       Route::prefix('/pengabdian')->group(function () {
            // Rute untuk data tabel a. kegiatan


            // Rute untuk data tabel b. penyuluhan


            // Rute untuk data tabel c. konsultan


            // Rute untuk data tabel d. karya
            Route::get('/karya', [PengabdianController::class, 'getKarya'])->name('rk-pengabdian.karya');
            Route::post('/karya-tambah', [PengabdianController::class, 'postKarya'])->name('rk-pengabdian.karya.create');
            Route::delete('/karya/{id}', [PengabdianController::class, 'deleteKarya'])->name('rk-pengabdian.karya.destroy');
            Route::post('/edit/karya', [PengabdianController::class, 'editKarya'])->name('rk-pengabdian.karya.update');

       });
   });
});
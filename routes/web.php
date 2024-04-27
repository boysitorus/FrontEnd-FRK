<?php

use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RencanaKerjaController;
use App\Http\Controllers\PenunjangController;
use App\Http\Controllers\SimpulanController;
use App\Http\Controllers\PenelitianController;
use App\Http\Controllers\PengabdianController;
use App\Http\Controllers\EvaluasiDiriController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AsesorController;

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

Route::prefix('/admin')->group(function () {
    Route::get('/generateFRK', [AdminController::class, 'getGenerateFRK'])->name('admin.generate_frk');
    Route::get('/generateFED', [AdminController::class, 'getGenerateFED'])->name('admin.generate_fed');
});

Route::group(['middleware' => ['check.token']], function() {
    Route::get('/dashboard', [UserController::class, 'userDashboard'])->name('home');

    Route::get('/profile', [UserController::class, 'userProfile'])->name('profile');

    Route::get('/formRencanaKerja', function() {
        return view('App.Rencana.penelitian');
    });

    Route::get('/formEvaluasiDiri', function() {
        return view('App.Evaluasi.pendidikan');
    });

    Route::get('/formEvaluasiDiri', function() {
        return view('App.Evaluasi.penunjang');
    });

   Route::prefix('/formRencanaKerja')->group(function () {
       Route::get('/pendidikan', [PendidikanController::class, 'getAll'])->name('rk-pendidikan');
       Route::get('/penelitian', [PenelitianController::class, 'getPenelitianPanel'])->name('rk-penelitian');
    //    Route::get('/simpulan', [RencanaKerjaController::class, 'getsimpulanPanel'])->name('rk-simpulan');
       Route::get('/pengabdian', [PengabdianController::class, 'getPengabdianPanel'])->name('rk-pengabdian');
       Route::get('/penunjang', [PenunjangController::class, 'getAll'])->name('rk-penunjang');
       Route::get('/simpulan', [SimpulanController::class, 'getAll'])->name('rk-simpulan');
       Route::post('/simpanRencana', [SimpulanController::class, 'simpanRencana'])->name('rk-simpan-rencana');

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
            Route::get('/kegiatan',[PengabdianController::class, 'getKegiatan'] )->name('rk-pengabdian.kegiatan');
            Route::post('/kegiatan-tambah', [PengabdianController::class, 'postKegiatan'])->name('rk-pengabdian.kegiatan.create');
            Route::delete('/kegiatan/{id}', [PengabdianController::class, 'deleteKegiatan'])->name('rk-pengabdian.kegiatan.destroy');
            Route::post('/edit/kegiatan', [PengabdianController::class, 'editKegiatan'])->name('rk-pengabdian.kegiatan.update');

            // Rute untuk data tabel b. penyuluhan
            Route::get('/penyuluhan', [PengabdianController::class, 'getPenyuluhan'])->name('rk-pengabdian.penyuluhan');
            Route::post('/penyuluhan-tambah', [PengabdianController::class, 'postPenyuluhan'])->name('rk-pengabdian.penyuluhan.create');
            Route::delete('/penyuluhan/{id}', [PengabdianController::class, 'deletePenyuluhan'])->name('rk-pengabdian.penyuluhan.destroy');
            Route::post('/edit/penyuluhan', [PengabdianController::class, 'editPenyuluhan'])->name('rk-pengabdian.penyuluhan.update');

            // Rute untuk data tabel c. konsultan
            Route::get('/konsultan', [PengabdianController::class, 'getKonsultan'])->name('rk-pengabdian.konsultan');
            Route::post('/konsultan-tambah', [PengabdianController::class, 'postKonsultan'])->name('rk-pengabdian.konsultan.create');
            Route::delete('/konsultan/{id}', [PengabdianController::class, 'deleteKonsultan'])->name('rk-pengabdian.konsultan.destroy');
            Route::post('/edit/konsultan', [PengabdianController::class, 'editKonsultan'])->name('rk-pengabdian.konsultan.update');


            // Rute untuk data tabel d. karya
            Route::get('/karya', [PengabdianController::class, 'getKarya'])->name('rk-pengabdian.karya');
            Route::post('/karya-tambah', [PengabdianController::class, 'postKarya'])->name('rk-pengabdian.karya.create');
            Route::delete('/karya/{id}', [PengabdianController::class, 'deleteKarya'])->name('rk-pengabdian.karya.destroy');
            Route::post('/edit/karya', [PengabdianController::class, 'editKarya'])->name('rk-pengabdian.karya.update');
        });

       //START ROUTE PENDIDIKAN
        Route::prefix('/pendidikan')->group(function () {

            // Rute untuk data teori
            Route::post('/teori-tambah', [PendidikanController::class, 'postTeori'])->name('rk-pendidikan.teori.create');
            Route::delete('/teori/{id}', [PendidikanController::class, 'deleteTeori'])->name('rk-pendidikan.teori.destroy');
            Route::post('/edit/teori', [PendidikanController::class, 'editTeori'])->name('rk-pendidikan.teori.update');

            //rute untuk data praktikum
            Route::post('/praktikum-tambah', [PendidikanController::class, 'postPraktikum'])->name('rk-pendidikan.praktikum.create');
            Route::delete('/praktikum/{id}', [PendidikanController::class, 'deletePraktikum'])->name('rk-pendidikan.praktikum.destroy');
            Route::post('/edit/praktikum', [PendidikanController::class, 'editPraktikum'])->name('rk-pendidikan.praktikum.update');

            // Rute untuk data bimbingan
            Route::get('/bimbingan', [PendidikanController::class, 'getBimbingan'])->name('rk-pendidikan.bimbingan');
            Route::post('/bimbingan-tambah', [PendidikanController::class, 'postBimbingan'])->name('rk-pendidikan.bimbingan.create');
            Route::delete('/bimbingan/{id}', [PendidikanController::class, 'deleteBimbingan'])->name('rk-pendidikan.bimbingan.destroy');
            Route::post('/edit/bimbingan', [PendidikanController::class, 'editBimbingan'])->name('rk-pendidikan.bimbingan.update');

            // Rute untuk data seminar
            Route::get('/seminar', [PendidikanController::class, 'getSeminar'])->name('rk-pendidikan.seminar');
            Route::post('/seminar-tambah', [PendidikanController::class, 'postSeminar'])->name('rk-pendidikan.seminar.create');
            Route::delete('/seminar/{id}', [PendidikanController::class, 'deleteSeminar'])->name('rk-pendidikan.seminar.destroy');
            Route::post('/edit/seminar', [PendidikanController::class, 'editSeminar'])->name('rk-pendidikan.seminar.update');

            // Rute untuk data rendah
            // Route::get('/rendah', [PendidikanController::class, 'getRendah'])->name('rk-pendidikan.rendah');
            Route::post('/rendah-tambah', [PendidikanController::class, 'postRendah'])->name('rk-pendidikan.rendah.create');
            Route::post('/edit/rendah', [PendidikanController::class, 'editRendah'])->name('rk-pendidikan.rendah.update');
            Route::delete('/rendah/{id}', [PendidikanController::class, 'deleteRendah'])->name('rk-pendidikan.rendah.destroy');

            // Rute untuk data kembang
            // Route::get('/kembang', [PendidikanController::class, 'getKembang'])->name('rk-pendidikan.kembang');
            Route::post('/kembang-tambah', [PendidikanController::class, 'postKembang'])->name('rk-pendidikan.kembang.create');
            Route::post('/edit/kembang', [PendidikanController::class, 'editKembang'])->name('rk-pendidikan.kembang.update');
            Route::delete('/kembang/{id}', [PendidikanController::class, 'deleteKembang'])->name('rk-pendidikan.kembang.destroy');

            // Rute untuk data cangkok
            // Route::get('/rendah', [PendidikanController::class, 'getRendah'])->name('rk-pendidikan.rendah');
            Route::post('/cangkok-tambah', [PendidikanController::class, 'postCangkok'])->name('rk-pendidikan.cangkok.create');
            Route::post('/edit/cangkok', [PendidikanController::class, 'editCangkok'])->name('rk-pendidikan.cangkok.update');
            Route::delete('/cangkok/{id}', [PendidikanController::class, 'deleteCangkok'])->name('rk-pendidikan.cangkok.destroy');

            // Rute untuk data koordinator
            // Route::get('/rendah', [PendidikanController::class, 'getRendah'])->name('rk-pendidikan.rendah');
            Route::post('/koordinator-tambah', [PendidikanController::class, 'postKoordinator'])->name('rk-pendidikan.koordinator.create');
            Route::post('/edit/koordinator', [PendidikanController::class, 'editKoordinator'])->name('rk-pendidikan.koordinator.update');
            Route::delete('/koordinator/{id}', [PendidikanController::class, 'deleteKoordinator'])->name('rk-pendidikan.koordinator.destroy');

            //Rute Untuk TugasAkhir

            Route::post('/tugasAkhir', [PendidikanController::class, 'postTugasAkhir'])->name('rk-pendidikan.tugasAkhir.create');
            Route::post('/edit/tugasAkhir', [PendidikanController::class, 'editTugasAkhir'])->name('rk-pendidikan.tugasAkhir.update');
            Route::delete('/tugasAkhir/{id}', [PendidikanController::class, 'deleteTugasAkhir'])->name('rk-pendidikan.tugasAkhir.destroy');


            //Rute Untuk Proposal

            Route::post('/proposal', [PendidikanController::class, 'postProposal'])->name('rk-pendidikan.proposal.create');
            Route::post('/edit/proposal', [PendidikanController::class, 'editProposal'])->name('rk-pendidikan.proposal.update');
            Route::delete('/proposal/{id}', [PendidikanController::class, 'deleteProposal'])->name('rk-pendidikan.proposal.destroy');
        });
        //END OF ROUTE PENDIDIKAN

        //START ROUTE PENUNJANG
        Route::prefix('/penunjang')->group(function () {

            // A.
            Route::post('/akademik', [PenunjangController::class, 'postAkademik'])->name('rk-penunjang.akademik.create');
            Route::post('/edit/akademik', [PenunjangController::class, 'editAkademik'])->name('rk-penunjang.akademik.update');
            Route::delete('/akademik/{id}', [PenunjangController::class, 'deleteAkademik'])->name('rk-penunjang.akademik.destroy');

            // B.
            Route::post('/bimbingan', [PenunjangController::class, 'postBimbingan'])->name('rk-penunjang.bimbingan.create');
            Route::post('/edit/bimbingan', [PenunjangController::class, 'editBimbingan'])->name('rk-penunjang.bimbingan.update');
            Route::delete('/bimbingan/{id}', [PenunjangController::class, 'deleteBimbingan'])->name('rk-penunjang.bimbingan.destroy');

            // C.
            Route::post('/ukm', [PenunjangController::class, 'postUkm'])->name('rk-penunjang.ukm.create');
            Route::post('/edit/ukm', [PenunjangController::class, 'editUkm'])->name('rk-penunjang.ukm.update');
            Route::delete('/ukm/{id}', [PenunjangController::class, 'deleteUkm'])->name('rk-penunjang.ukm.destroy');

            // D.
            Route::post('/sosial', [PenunjangController::class, 'postSosial'])->name('rk-penunjang.sosial.create');
            Route::post('/edit/sosial', [PenunjangController::class, 'editSosial'])->name('rk-penunjang.sosial.update');
            Route::delete('/sosial/{id}', [PenunjangController::class, 'deleteSosial'])->name('rk-penunjang.sosial.destroy');

            // E.
            Route::post('/struktural', [PenunjangController::class, 'postStruktural'])->name('rk-penunjang.struktural.create');
            Route::post('/edit/struktural', [PenunjangController::class, 'editStruktural'])->name('rk-penunjang.struktural.update');
            Route::delete('/struktural/{id}', [PenunjangController::class, 'deleteStruktural'])->name('rk-penunjang.struktural.destroy');

            // F
            Route::post('/nonstruktural', [PenunjangController::class, 'postNonstruktural'])->name('rk-penunjang.nonstruktural.create');
            Route::post('/edit/nonstruktural', [PenunjangController::class, 'editNonstruktural'])->name('rk-penunjang.nonstruktural.update');
            Route::delete('/nonstruktural/{id}', [PenunjangController::class, 'deleteNonstruktural'])->name('rk-penunjang.nonstruktural.destroy');

            // G
            Route::post('/redaksi', [PenunjangController::class, 'postRedaksi'])->name('rk-penunjang.redaksi.create');
            Route::post('/edit/redaksi', [PenunjangController::class, 'editRedaksi'])->name('rk-penunjang.redaksi.update');
            Route::delete('/redaksi/{id}', [PenunjangController::class, 'deleteRedaksi'])->name('rk-penunjang.redaksi.destroy');

            // H
            Route::post('/adhoc', [PenunjangController::class, 'postAdhoc'])->name('rk-penunjang.adhoc.create');
            Route::post('/edit/adhoc', [PenunjangController::class, 'editAdhoc'])->name('rk-penunjang.adhoc.update');
            Route::delete('/adhoc/{id}', [PenunjangController::class, 'deleteAdhoc'])->name('rk-penunjang.adhoc.destroy');

            // I.
            Route::post('/ketuapanitia', [PenunjangController::class, 'postKetuaPanitia'])->name('rk-penunjang.ketuapanitia.create');
            Route::post('/edit/ketuapanitia', [PenunjangController::class, 'editKetuaPanitia'])->name('rk-penunjang.ketuapanitia.update');
            Route::delete('/ketuapanitia/{id}', [PenunjangController::class, 'deleteKetuaPanitia'])->name('rk-penunjang.ketuapanitia.destroy');

            // J.
            Route::post('/anggotapanitia', [PenunjangController::class, 'postAnggotaPanitia'])->name('rk-penunjang.anggotapanitia.create');
            Route::post('/edit/anggotapanitia', [PenunjangController::class, 'editAnggotaPanitia'])->name('rk-penunjang.anggotapanitia.update');
            Route::delete('/anggotapanitia/{id}', [PenunjangController::class, 'deleteAnggotaPanitia'])->name('rk-penunjang.anggotapanitia.destroy');

            // K.
            Route::post('/pengurusyayasan', [PenunjangController::class, 'postPengurusYayasan'])->name('rk-penunjang.pengurusyayasan.create');
            Route::post('/edit/pengurusyayasan', [PenunjangController::class, 'editPengurusYayasan'])->name('rk-penunjang.pengurusyayasan.update');
            Route::delete('/pengurusyayasan/{id}', [PenunjangController::class, 'deletePengurusYayasan'])->name('rk-penunjang.pengurusyayasan.destroy');

            // L.
            Route::post('/asosiasi', [PenunjangController::class, 'postAsosiasi'])->name('rk-penunjang.asosiasi.create');
            Route::post('/edit/asosiasi', [PenunjangController::class, 'editAsosiasi'])->name('rk-penunjang.asosiasi.update');
            Route::delete('/asosiasi/{id}', [PenunjangController::class, 'deleteAsosiasi'])->name('rk-penunjang.asosiasi.destroy');

            // M.
            Route::post('/seminar', [PenunjangController::class, 'postSeminar'])->name('rk-penunjang.seminar.create');
            Route::post('/edit/seminar', [PenunjangController::class, 'editSeminar'])->name('rk-penunjang.seminar.update');
            Route::delete('/seminar/{id}', [PenunjangController::class, 'deleteSeminar'])->name('rk-penunjang.seminar.destroy');

            // N.
            Route::post('/reviewer', [PenunjangController::class, 'postReviewer'])->name('rk-penunjang.reviewer.create');
            Route::post('/edit/reviewer', [PenunjangController::class, 'editReviewer'])->name('rk-penunjang.reviewer.update');
            Route::delete('/reviewer/{id}', [PenunjangController::class, 'deleteReviewer'])->name('rk-penunjang.reviewer.destroy');
        });
        //END OF ROUTE PENUNJANG
   });

    Route::prefix('/formEvaluasiDiri')->group(function () {
        Route::get('/penelitian', [EvaluasiDiriController::class, 'getPenelitianPanel'])->name('ed-penelitian');
        Route::get('/pengabdian', [EvaluasiDiriController::class, 'getPengabdianPanel'])->name('ed-pengabdian');
    });

    Route::get('/generate-simpulan-pdf', [SimpulanController::class, 'generatePdf'])->name('rk-generatePdf');

    Route::prefix('/Asesor')->group(function () {
        Route::get('/Rekap-Kegiatan', [AsesorController::class, 'getRencanaKegiatan'])->name('rk-asesor');
        Route::get('/Rekap-Kegiatan-Setuju', [AsesorController::class, 'getRencanaKegiatanSetuju'])->name('rk-asesor-setuju');
        Route::get('/Rekap-Kegiatan-Asesor-pendidikan/{id}', [AsesorController::class, 'getRencanaPendidikan'])->name('rk-asesor-detail-pendidikan');
        Route::get('/Rekap-Kegiatan-Asesor-penelitian/{id}', [AsesorController::class, 'getRencanaPenelitian'])->name('rk-asesor-detail-penelitian');
        Route::get('/Rekap-Kegiatan-Asesor-pengabdian/{id}', [AsesorController::class, 'getRencanaPengabdian'])->name('rk-asesor-detail-pengabdian');
        Route::get('/Rekap-Kegiatan-Asesor-penunjang/{id}', [AsesorController::class, 'getRencanaPenunjang'])->name('rk-asesor-detail-penunjang');
        Route::post('/review-rencana-kerja', [AsesorController::class, 'reviewRencana'])->name('rk-asesor-review-rencana');
    });
});



<?php

use App\Http\Controllers\PendidikanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RencanaKerjaController;
use App\Http\Controllers\PenunjangController;

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

Route::get('/dashboard', function () {
    return view('Template.app');
});

Route::get('/profile', function () {
    return view('App.Profile.profile');
});

Route::prefix('/formRencanaKerja')->group(function () {
    // Rute untuk menampilkan semua data
    Route::get('/pendidikan', [PendidikanController::class, 'getAll'])->name('rk-pendidikan.all');

    // Rute untuk data teori
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
    Route::post('/pendidikan/edit/seminar', [PendidikanController::class, 'editSeminar'])->name('rk-pendidikan.seminar.update');

    // Rute untuk data rendah
    // Route::get('/pendidikan/rendah', [PendidikanController::class, 'getRendah'])->name('rk-pendidikan.rendah');
    Route::post('/pendidikan/rendah-tambah', [PendidikanController::class, 'postRendah'])->name('rk-pendidikan.rendah.create');
    Route::post('/pendidikan/edit/rendah', [PendidikanController::class, 'editRendah'])->name('rk-pendidikan.rendah.update');
    Route::delete('/pendidikan/rendah/{id}', [PendidikanController::class, 'deleteRendah'])->name('rk-pendidikan.rendah.destroy');

    // Rute untuk data kembang
    // Route::get('/pendidikan/kembang', [PendidikanController::class, 'getKembang'])->name('rk-pendidikan.kembang');
    Route::post('/pendidikan/kembang-tambah', [PendidikanController::class, 'postKembang'])->name('rk-pendidikan.kembang.create');
    Route::post('/pendidikan/edit/kembang', [PendidikanController::class, 'editKembang'])->name('rk-pendidikan.kembang.update');
    Route::delete('/pendidikan/kembang/{id}', [PendidikanController::class, 'deleteKembang'])->name('rk-pendidikan.kembang.destroy');

    // Rute untuk data cangkok
    // Route::get('/pendidikan/rendah', [PendidikanController::class, 'getRendah'])->name('rk-pendidikan.rendah');
    Route::post('/pendidikan/cangkok-tambah', [PendidikanController::class, 'postCangkok'])->name('rk-pendidikan.cangkok.create');
    Route::post('/pendidikan/edit/cangkok', [PendidikanController::class, 'editCangkok'])->name('rk-pendidikan.cangkok.update');
    Route::delete('/pendidikan/cangkok/{id}', [PendidikanController::class, 'deleteCangkok'])->name('rk-pendidikan.cangkok.destroy');

    // Rute untuk data koordinator
    // Route::get('/pendidikan/rendah', [PendidikanController::class, 'getRendah'])->name('rk-pendidikan.rendah');
    Route::post('/pendidikan/koordinator-tambah', [PendidikanController::class, 'postKoordinator'])->name('rk-pendidikan.koordinator.create');
    Route::post('/pendidikan/edit/koordinator', [PendidikanController::class, 'editKoordinator'])->name('rk-pendidikan.koordinator.update');
    Route::delete('/pendidikan/koordinator/{id}', [PendidikanController::class, 'deleteKoordinator'])->name('rk-pendidikan.koordinator.destroy');

    //Rute Untuk TugasAkhir

    Route::post('/pendidikan/tugasAkhir', [PendidikanController::class, 'postTugasAkhir'])->name('rk-pendidikan.tugasAkhir.create');
    Route::post('/pendidikan/edit/tugasAkhir', [PendidikanController::class, 'editTugasAkhir'])->name('rk-pendidikan.tugasAkhir.update');
    Route::delete('/pendidikan/tugasAkhir/{id}', [PendidikanController::class, 'deleteTugasAkhir'])->name('rk-pendidikan.tugasAkhir.destroy');


    //Rute Untuk Proposal

    Route::post('/pendidikan/proposal', [PendidikanController::class, 'postProposal'])->name('rk-pendidikan.proposal.create');
    Route::post('/pendidikan/edit/proposal', [PendidikanController::class, 'editProposal'])->name('rk-pendidikan.proposal.update');
    Route::delete('/pendidikan/proposal/{id}', [PendidikanController::class, 'deleteProposal'])->name('rk-pendidikan.proposal.destroy');

    Route::prefix('/penunjang')->group(function () {
        // Rute untuk data penunjang
        Route::get('/', [PenunjangController::class, 'getAll'])->name('rk-penunjang.all');

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

    Route::get('/simpulan', function () {
        return view('App.Rencana.simpulan');
    })->name('rk-simpulan');

});

Route::prefix('/formEvaluasiDiri')->group(function () {
    Route::get('/penelitian', function () {
        return view('App.Evaluasi.penelitian');
    });
    
    Route::get('/pengabdian', function () {
        return view('App.Evaluasi.pengabdian');
    });

    Route::get('/simpulan', function () {
        return view('App.Rencana.FEDsimpulan');
    });
});

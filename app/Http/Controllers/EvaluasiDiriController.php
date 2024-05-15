<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use App\Utils\Tools;

class EvaluasiDiriController extends Controller
{
    public function getPendidikanPanel(Request $request){
        $auth = Tools::getAuth($request);
        $id_dosen = json_decode(json_encode($auth->user->data_lengkap->pegawai),true)['user_id'];
        try {
            // Mengambil data teori dari Lumen
            $responseTeori = Http::get(env('API_FED_SERVICE') . '/pendidikan/teori/' . $id_dosen);
            $teori = $responseTeori->json();

            $responsePraktikum = Http::get(env('API_FED_SERVICE') . '/pendidikan/praktikum/' . $id_dosen);
            $praktikum = $responsePraktikum->json();

            // Mengambil data bimbingan dari Lumen
            $responseBimbingan = Http::get(env('API_FED_SERVICE') . '/pendidikan/bimbingan/' . $id_dosen);
            $bimbingan = $responseBimbingan->json();

            //Mengambil data seminar dari Lumen
            $responseSeminar = Http::get(env('API_FED_SERVICE') . '/pendidikan/seminar/' . $id_dosen);
            $seminar = $responseSeminar->json();

            //Mengambil data rendah dari Lumen
            $responseRendah = Http::get(env('API_FED_SERVICE') . '/pendidikan/rendah/' . $id_dosen);
            $rendah = $responseRendah->json();

            //Mengambil data kembang dari Lumen
            $responseKembang = Http::get(env('API_FED_SERVICE') . '/pendidikan/kembang/' . $id_dosen);
            $kembang = $responseKembang->json();

            $responseTugasAkhir = Http::get(env('API_FED_SERVICE') . '/pendidikan/tugasAkhir/' . $id_dosen);
            $tugasAkhir = $responseTugasAkhir->json();

            //Mengambil data cangkok dari Lumen
            $responseCangkok = Http::get(env('API_FED_SERVICE') . '/pendidikan/cangkok/' . $id_dosen);
            $cangkok = $responseCangkok->json();

            //Mengambil data koordinator dari Lumen
            $responseKoordinator = Http::get(env('API_FED_SERVICE') . '/pendidikan/koordinator/' . $id_dosen);
            $koordinator = $responseKoordinator->json();

            $responseProposal = Http::get(env('API_FED_SERVICE') . '/pendidikan/proposal/' . $id_dosen);
            $proposal = $responseProposal->json();


            // Menggabungkan data teori dan bimbingan
            $data = [
                'teori' => $teori,
                'bimbingan' => $bimbingan,
                'seminar' => $seminar,
                'praktikum' => $praktikum,
                'rendah' => $rendah,
                'kembang' => $kembang,
                'tugasAkhir' => $tugasAkhir,
                'cangkok' => $cangkok,
                'koordinator' => $koordinator,
                'proposal' => $proposal,
                'auth' => $auth,
                'id_dosen' => $id_dosen
            ];

            // Mengirim data ke view
            return view('App.Evaluasi.pendidikan', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API',], 500);
        }
    }

    public function getPenunjangPanel(Request $request){
        $auth = Tools::getAuth($request);
        $id_dosen = json_decode(json_encode($auth->user->data_lengkap->pegawai),true)['user_id'];
        try {
            $responseAkademik = Http::get(env('API_FED_SERVICE') . '/penunjang/akademik/' . $id_dosen);
            $akademik = $responseAkademik->json();

            $responseBimbingan = Http::get(env('API_FED_SERVICE') . '/penunjang/bimbingan/' . $id_dosen);
            $bimbingan = $responseBimbingan->json();

            $responseUkm = Http::get(env('API_FED_SERVICE') . '/penunjang/ukm/' . $id_dosen);
            $ukm = $responseUkm->json();

            $responseSosial = Http::get(env('API_FED_SERVICE') . '/penunjang/sosial/' . $id_dosen);
            $sosial = $responseSosial->json();

            $responseSturuktural = Http::get(env('API_FED_SERVICE') . '/penunjang/struktural/' . $id_dosen);
            $struktural = $responseSturuktural->json();

            $responsenonSturuktural = Http::get(env('API_FED_SERVICE') . '/penunjang/nonstruktural/' . $id_dosen);
            $nonstruktural = $responsenonSturuktural->json();

            $responseRedaksi = Http::get(env('API_FED_SERVICE') . '/penunjang/redaksi/' . $id_dosen);
            $redaksi = $responseRedaksi->json();

            $responseAdhoc = Http::get(env('API_FED_SERVICE') . '/penunjang/adhoc/' . $id_dosen);
            $adhoc = $responseAdhoc->json();

            $responseAsosiasi = Http::get(env('API_FED_SERVICE') . '/penunjang/asosiasi/' . $id_dosen);
            $asosiasi = $responseAsosiasi->json();

            $responseSeminar = Http::get(env('API_FED_SERVICE') . '/penunjang/seminar/' . $id_dosen);
            $seminar = $responseSeminar->json();

            $responseReviewer = Http::get(env('API_FED_SERVICE') . '/penunjang/reviewer/' . $id_dosen);
            $reviewer = $responseReviewer->json();

            $responseKetuaPanitia = Http::get(env('API_FED_SERVICE') . '/penunjang/ketuapanitia/' . $id_dosen);
            $ketuapanitia = $responseKetuaPanitia->json();

            $responseAnggotaPanitia = Http::get(env('API_FED_SERVICE') . '/penunjang/anggotapanitia/' . $id_dosen);
            $anggotapanitia = $responseAnggotaPanitia->json();

            $responsePengurusYayasan = Http::get(env('API_FED_SERVICE') . '/penunjang/pengurusyayasan/' . $id_dosen);
            $pengurusyayasan = $responsePengurusYayasan->json();

            $data = [
                'akademik' => $akademik,
                'bimbingan' => $bimbingan,
                'ukm' => $ukm,
                'sosial' => $sosial,
                'struktural' => $struktural,
                'nonstruktural' => $nonstruktural,
                'redaksi' => $redaksi,
                'adhoc' => $adhoc,
                'asosiasi' => $asosiasi,
                'seminar' => $seminar,
                'reviewer' => $reviewer,
                'ketuapanitia' => $ketuapanitia,
                'anggotapanitia' => $anggotapanitia,
                'pengurusyayasan' => $pengurusyayasan,
                'auth' => $auth,
                'id_dosen' => $id_dosen
            ];

            return view('App.Evaluasi.penunjang', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function getPenelitianPanel(){
        return view('App.Evaluasi.penelitian');
    }

    public function getPengabdianPanel(){
        return view('App.Evaluasi.pengabdian');
    }

    public function getSimpulanPanel(){
        return view('App.Evaluasi.simpulanPendidikan');
    }

    // METHOD FOR PENDIDIKAN // METHOD FOR PENDIDIKAN // METHOD FOR PENDIDIKAN 
    // Tabel A. Teori
    public function postTeori(Request $request)
    {
        Http::post(
            env('API_FED_SERVICE') . '/pendidikan/teori',
            [
                'id_rencana' => $request->get('id_rencana'),
                'fileInput[]' => $request->file('fileInput'),
            ]
        );

        return redirect()->back()->with('success', 'Pendidikan teori upload successfully');
    }

    // Tabel B. Praktikum
    public function postPraktikum(Request $request)
    {
        Http::post(
            env('API_FED_SERVICE') . '/pendidikan/praktikum',
            [
                'id_rencana' => $request->get('id_rencana'),
                'fileInput[]' => $request->file('fileInput'),
            ]
        );

        return redirect()->back()->with('success', 'Pendidikan praktikum upload successfully');
    }

    // Tabel C. Bimbingan
    public function postBimbinganPendidikan(Request $request)
    {
        Http::post(
            env('API_FED_SERVICE') . '/pendidikan/bimbingan',
            [
                'id_rencana' => $request->get('id_rencana'),
                'fileInput[]' => $request->file('fileInput'),
            ]
        );

        return redirect()->back()->with('success', 'Pendidikan bimbingan upload successfully');
    }

    // Tabel D. Seminar
    public function postSeminar(Request $request)
    {
        Http::post(
            env('API_FED_SERVICE') . '/pendidikan/seminar',
            [
                'id_rencana' => $request->get('id_rencana'),
                'fileInput[]' => $request->file('fileInput'),
            ]
        ); 

        return redirect()->back()->with('success', 'Pendidikan seminar upload successfully');
    }

    // Tabel E. Tugas Akhir
    public function postTugasAkhir(Request $request)
    {
        Http::post(
            env('API_FED_SERVICE') . '/pendidikan/tugasakhir',
            [
                'id_rencana' => $request->get('id_rencana'),
                'fileInput[]' => $request->file('fileInput'),
            ]
        );

        return redirect()->back()->with('success', 'Pendidikan tugas akhir upload successfully');
    }

    // END OF METHOD FOR PENDIDIKAN // END OF METHOD FOR PENDIDIKAN // END OF METHOD FOR PENDIDIKAN 


    // METHOD FOR PENUNJANG // METHOD FOR PENUNJANG // METHOD FOR PENUNJANG // METHOD FOR PENUNJANG 
    // Tabel A. Akademik
    public function postAkademik(Request $request)
    {
        Http::post(
            env('API_FED_SERVICE') . '/penunjang/akademik',
            [
                'id_rencana' => $request->get('id_rencana'),
                'fileInput[]' => $request->file('fileInput[]'),
            ]
        );

        return redirect()->back()->with('success', 'Penunjang akademik upload successfully');
    }

    // Tabel B. Bimbingan
    public function postBimbingan(Request $request)
    {
        Http::post(
            env('API_FED_SERVICE') . '/penunjang/bimbingan',
            [
                'id_rencana' => $request->get('id_rencana'),
                'fileInput[]' => $request->file('fileInput'),
            ]
        );

        return redirect()->back()->with('success', 'Penunjang bimbingan upload successfully');
    }

    // Tabel C. UKM
    public function postUkm(Request $request)
    {
        Http::post(
            env('API_FED_SERVICE') . '/penunjang/ukm',
            [
                'id_rencana' => $request->get('id_rencana'),
                'fileInput[]' => $request->file('fileInput[]'),
            ]
        );

        return redirect()->back()->with('success', 'Penunjang ukm upload successfully');
    }

    // Tabel D.
    public function postSosial(Request $request)
    {
        Http::post(
            env('API_FED_SERVICE') . '/penunjang/sosial',
            [
                'id_rencana' => $request->get('id_rencana'),
                'fileInput[]' => $request->file('fileInput[]'),
            ]
        );

        return redirect()->back()->with('success', 'Penunjang sosial upload successfully');
    }

    // Tabel E. Struktural
    public function postStruktural(Request $request)
    {
        Http::post(
            env('API_FED_SERVICE') . '/penunjang/struktural',
            [
                'id_rencana' => $request->get('id_rencana'),
                'fileInput[]' => $request->file('fileInput[]'),
            ]
        );

        return redirect()->back()->with('success', 'Penunjang struktural upload successfully');
    }
    
    // Tabel F. Non Struktural
    public function postNonStruktural(Request $request)
    {
        Http::post(
            env('API_FED_SERVICE') . '/penunjang/nonstruktural',
            [
                'id_rencana' => $request->get('id_rencana'),
                'fileInput[]' => $request->file('fileInput[]'),
            ]
        );

        return redirect()->back()->with('success', 'Penunjang non struktural upload successfully');
    }
        
    // Tabel G. Redaksi
    public function postRedaksi(Request $request)
    {
        Http::post(
            env('API_FED_SERVICE') . '/penunjang/redaksi',
            [
                'id_rencana' => $request->get('id_rencana'),
                'fileInput[]' => $request->file('fileInput[]'),
            ]
        );

        return redirect()->back()->with('success', 'Penunjang redaksi upload successfully');
    }
    
    // Tabel H. Ad Hoc
    public function postAdHoc(Request $request)
    {
        Http::post(
            env('API_FED_SERVICE') . '/penunjang/adhoc',
            [
                'id_rencana' => $request->get('id_rencana'),
                'fileInput[]' => $request->file('fileInput[]'),
            ]
        );

        return redirect()->back()->with('success', 'Penunjang adhoc upload successfully');
    
    }
    
    // Tabel I. Ketua Panitia
    public function postKetuaPanitia(Request $request)
    {
        Http::post(
            env('API_FED_SERVICE') . '/penunjang/ketuapanitia',
            [
                'id_rencana' => $request->get('id_rencana'),
                'fileInput[]' => $request->file('fileInput[]'),
            ]
        );

        return redirect()->back()->with('success', 'Penunjang ketua panitia upload successfully');
    }
    
    // Tabel J. Anggota Panitia
    public function postAnggotaPanitia(Request $request)
    {
        Http::post(
            env('API_FED_SERVICE') . '/penunjang/anggotapanitia',
            [
                'id_rencana' => $request->get('id_rencana'),
                'fileInput[]' => $request->file('fileInput[]'),
            ]
        );

        return redirect()->back()->with('success', 'Penunjang anggota panitia upload successfully');
    }
    
    // Tabel K. Pengurus Yayasan
    public function postPengurusYayasan(Request $request)
    {
        Http::post(
            env('API_FED_SERVICE') . '/penunjang/pengurusyayasan',
            [
                'id_rencana' => $request->get('id_rencana'),
                'fileInput[]' => $request->file('fileInput[]'),
            ]
        );

        return redirect()->back()->with('success', 'Penunjang pengurus yayasan upload successfully');
    }
    
    // Tabel L. Asosiasi
    public function postAssosiasi(Request $request)
    {
        Http::post(
            env('API_FED_SERVICE') . '/penunjang/assosiasi',
            [
                'id_rencana' => $request->get('id_rencana'),
                'fileInput[]' => $request->file('fileInput[]'),
            ]
        );

        return redirect()->back()->with('success', 'Penunjang assosiasi upload successfully');
    }
    
    // Tabel M. Seminar
    public function postSeminar(Request $request)
    {
        Http::post(
            env('API_FED_SERVICE') . '/penunjang/seminar',
            [
                'id_rencana' => $request->get('id_rencana'),
                'fileInput[]' => $request->file('fileInput[]'),
            ]
        );

        return redirect()->back()->with('success', 'Penunjang seminar upload successfully');
    }
    
    // Tabel N. Reviewer
    public function postReviewer(Request $request)
    {
        Http::post(
            env('API_FED_SERVICE') . '/penunjang/reviewer',
            [
                'id_rencana' => $request->get('id_rencana'),
                'fileInput[]' => $request->file('fileInput[]'),
            ]
        );

        return redirect()->back()->with('success', 'Penunjang reviewer upload successfully');
    }
    

    // END OF METHOD FOR PENUNJANG // END OF METHOD FOR PENUNJANG // END OF METHOD FOR PENUNJANG 
}
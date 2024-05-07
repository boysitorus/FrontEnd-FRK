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

    public function postAkademik(Request $request)
    {
        Http::post(
            env('API_FED_SERVICE') . '/penunjang/akademik',
            [
                'id_rencana' => $request->get('id_rencana'),
                'fileInput[]' => $request->file('fileInput'),
            ]
        );

        return redirect()->back()->with('success', 'Pendidikan teori upload successfully');
    }
}
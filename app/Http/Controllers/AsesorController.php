<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Utils\Tools;
use Illuminate\Http\Client\RequestException;

class AsesorController extends Controller
{
    public function getDosen($uid, $token){
        $requestDataDosen = Http::withToken($token)->asForm()->post(env('API_DATA_DOSEN') . $uid)->body();
        $jsonDataDosen = json_decode($requestDataDosen, true);

        $data = [
            "id_dosen" => $uid,
            "nidn" => $jsonDataDosen['data']['dosen'][0]['nidn'],
            "nama" => $jsonDataDosen['data']['dosen'][0]['nama'],
            "prodi" => $jsonDataDosen['data']['dosen'][0]['prodi'],
        ];

        return $data;
    }
    public function getEvaluasiDiri(Request $request)
    {
        // $auth = Tools::getAuth($request);
        // $token = json_decode(json_encode($auth->user),true)['token'];
        // $response_dosen = Http::get(env('API_FRK_SERVICE') . '/asesor-frk/getAllDosen');


        // $data_dosen = [];
        // if(sizeof($response_dosen->json()) > 0){
        //     foreach($response_dosen->json() as $item){
        //         $res = $this->getDosen($item["id_dosen"], $token);

        //         array_push($data_dosen, $res);
        //     }
        // }




        // return view('App.Asesor.rekapKegiatan',
        // [
        //     'auth' => $auth,
        //     'data_dosen' => $data_dosen,
        // ]);
        return view('App.AsesorFED.rekapEvaluasi');
    }

    // public function getDosen($uid, $token){
    //     $requestDataDosen = Http::withToken($token)->asForm()->post(env('API_DATA_DOSEN') . $uid)->body();
    //     $jsonDataDosen = json_decode($requestDataDosen, true);

    //     $data = [
    //         "id_dosen" => $uid,
    //         "nidn" => $jsonDataDosen['data']['dosen'][0]['nidn'],
    //         "nama" => $jsonDataDosen['data']['dosen'][0]['nama'],
    //         "prodi" => $jsonDataDosen['data']['dosen'][0]['prodi'],
    //     ];

    //     return $data;
    // }

    public function getEvaluasiDiriSetuju(Request $request)
    {
        $auth = Tools::getAuth($request);

        return view('App.AsesorFED.rekapEvaluasiSetuju',
        [
            'auth' => $auth
        ]);
    }

    public function getEvaluasiPendidikan(Request $request, $id)
    {
        $auth = Tools::getAuth($request);
        $token = json_decode(json_encode($auth->user),true)['token'];
        $dataDosen = $auth->user->data_lengkap->dosen;
        // dd($dataDosen);
        // try {
            // Mengambil data teori dari Lumen
            $responseTeori = Http::get(env('API_FRK_SERVICE') . '/pendidikan/teori/' . $id);
            $teori = $responseTeori->json();

            $responsePraktikum = Http::get(env('API_FRK_SERVICE') . '/pendidikan/praktikum/' . $id);
            $praktikum = $responsePraktikum->json();

            // Mengambil data bimbingan dari Lumen
            $responseBimbingan = Http::get(env('API_FRK_SERVICE') . '/pendidikan/bimbingan/' . $id);
            $bimbingan = $responseBimbingan->json();

            //Mengambil data seminar dari Lumen
            $responseSeminar = Http::get(env('API_FRK_SERVICE') . '/pendidikan/seminar/' . $id);
            $seminar = $responseSeminar->json();

            //Mengambil data rendah dari Lumen
            $responseRendah = Http::get(env('API_FRK_SERVICE') . '/pendidikan/rendah/' . $id);
            $rendah = $responseRendah->json();

            //Mengambil data kembang dari Lumen
            $responseKembang = Http::get(env('API_FRK_SERVICE') . '/pendidikan/kembang/' . $id);
            $kembang = $responseKembang->json();

            $responseTugasAkhir = Http::get(env('API_FRK_SERVICE') . '/pendidikan/tugasAkhir/' . $id);
            $tugasAkhir = $responseTugasAkhir->json();

            //Mengambil data cangkok dari Lumen
            $responseCangkok = Http::get(env('API_FRK_SERVICE') . '/pendidikan/cangkok/' . $id);
            $cangkok = $responseCangkok->json();

            //Mengambil data koordinator dari Lumen
            $responseKoordinator = Http::get(env('API_FRK_SERVICE') . '/pendidikan/koordinator/' . $id);
            $koordinator = $responseKoordinator->json();

            $responseProposal = Http::get(env('API_FRK_SERVICE') . '/pendidikan/proposal/' . $id);
            $proposal = $responseProposal->json();


            // Menggabungkan data teori dan bimbingan
            $data = [
                'id' => $id,
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
                'dataDosen' => json_decode(json_encode($dataDosen), true)    
            ];

            //Mengirim data ke view
            return view('App.AsesorFED.pendidikanAsesorFED', $data);
            // return view('App.AsesorFED.pendidikanAsesorFED');
        // } catch (\Throwable $th) {
            // Tangani error jika terjadi
            // return response()->json($th);
            // return response()->json(['error' => 'Failed to retrieve data from API',], 500);
        // }
    }

    public function getEvaluasiPenelitian(Request $request, $id)
    {
        $auth = Tools::getAuth($request);
        $token = json_decode(json_encode($auth->user),true)['token'];
        $dataDosen = $auth->user->data_lengkap->dosen;
        try {
            // Mengambil data a. penelitian kelompok dari Lumen
            $responsePenelitianKelompok = Http::get(env('API_FRK_SERVICE') . '/penelitian/penelitian_kelompok/' . $id);
            $PenelitianKelompok = $responsePenelitianKelompok->json();

            // Mengambil data b. penelitian mandiri dari Lumen
            $responsePenelitianMandiri = Http::get(env('API_FRK_SERVICE') . '/penelitian/penelitian_mandiri/' . $id);
            $PenelitianMandiri = $responsePenelitianMandiri->json();

            // Mengambil data c. buku terbit dari Lumen
            $responseBukuTerbit = Http::get(env('API_FRK_SERVICE') . '/penelitian/buku_terbit/' . $id);
            $BukuTerbit = $responseBukuTerbit->json();

            //Mengambil data d. buku internasional dari Lumen
            $responseBukuInternasional = Http::get(env('API_FRK_SERVICE') . '/penelitian/buku_internasional/' . $id);
            $BukuInternasional = $responseBukuInternasional->json();

            //Mengambil data e. menydur dari Lumen
            $responseMenyadur = Http::get(env('API_FRK_SERVICE') . '/penelitian/menyadur/' . $id);
            $Menyadur = $responseMenyadur->json();

            //Mengambil data f. menyunting dari Lumen
            $responseMenyunting = Http::get(env('API_FRK_SERVICE') . '/penelitian/menyunting/' . $id);
            $Menyunting = $responseMenyunting->json();

            //Mengambil data g. penelitian dari Lumen
            $responsePenelitianModul = Http::get(env('API_FRK_SERVICE') . '/penelitian/penelitian_modul/' . $id);
            $PenelitianModul = $responsePenelitianModul->json();

            //Mengambil data h. pekerti dari Lumen
            $responsePenelitianPekerti = Http::get(env('API_FRK_SERVICE') . '/penelitian/penelitian_pekerti/' . $id);
            $PenelitianPekerti = $responsePenelitianPekerti->json();

            //Mengambil data i. tridharma dari Lumen
            $responsePenelitianTridharma = Http::get(env('API_FRK_SERVICE') . '/penelitian/penelitian_tridharma/' . $id);
            $PenelitianTridharma = $responsePenelitianTridharma->json();

            //Mengambil data j. jurnal ilmiah dari Lumen
            $responseJurnalIlmiah = Http::get(env('API_FRK_SERVICE') . '/penelitian/jurnal_ilmiah/' . $id);
            $JurnalIlmiah = $responseJurnalIlmiah->json();

            //Mengambil data k. hak paten dari Lumen
            $responseHakPaten = Http::get(env('API_FRK_SERVICE') . '/penelitian/hak_paten/' . $id);
            $HakPaten = $responseHakPaten->json();

            //Mengambil data l. media massa dari Lumen
            $responseMediaMassa = Http::get(env('API_FRK_SERVICE') . '/penelitian/media_massa/' . $id);
            $MediaMassa = $responseMediaMassa->json();

            //Mengambil data m. pembicara seminar dari Lumen
            $responsePembicaraSeminar = Http::get(env('API_FRK_SERVICE') . '/penelitian/pembicara_seminar/' . $id);
            $PembicaraSeminar = $responsePembicaraSeminar->json();

            //Mengambil data n. penyajian makalah  dari Lumen
            $responsePenyajianMakalah = Http::get(env('API_FRK_SERVICE') . '/penelitian/penyajian_makalah/' . $id);
            $PenyajianMakalah = $responsePenyajianMakalah->json();


            // Menggabungkan data
            $data = [
                'penelitian_kelompok' => $PenelitianKelompok,
                'penelitian_mandiri' => $PenelitianMandiri,
                'buku_terbit' => $BukuTerbit,
                'buku_internasional' => $BukuInternasional,
                'menyadur'=>$Menyadur,
                'menyunting'=>$Menyunting,
                'penelitian_modul' => $PenelitianModul,
                'penelitian_pekerti' => $PenelitianPekerti,
                'penelitian_tridharma' => $PenelitianTridharma,
                'jurnal_ilmiah' => $JurnalIlmiah,
                'pembicara_seminar'=>$PembicaraSeminar,
                'penyajian_makalah'=>$PenyajianMakalah,
                'hak_paten'=>$HakPaten,
                'media_massa'=>$MediaMassa,
                'auth' => $auth,
                'id' => $id,
                'dataDosen' => json_decode(json_encode($dataDosen), true)
            ];

            // Mengirim data ke view
            return view('App.AsesorFED.penelitianAsesorFED', $data);
        // return view('App.AsesorFED.penelitianAsesorFED');
        } catch (\Throwable $th) {
        //     // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function getEvaluasiPengabdian(Request $request, $id)
    {
        // $auth = Tools::getAuth($request);
        // $token = json_decode(json_encode($auth->user),true)['token'];
        // $dataDosen = $this->getDosen($id, $token);
        // try{
        //     // Mengambil data a. kegiatan dari lumen
        //     $responsKegiatan = Http::get(env('API_FRK_SERVICE') .'/pengabdian/kegiatan/' . $id);
        //     $Kegiatan = $responsKegiatan->json();

        //     // Mengambil data b. penyuluhan dari lumen
        //     $responsePenyuluhan = Http::get(env('API_FRK_SERVICE') .'/pengabdian/penyuluhan/' . $id);
        //     $Penyuluhan = $responsePenyuluhan->json();

        //     // Mengambil data c. konsultan dari lumen
        //     $responsekonsultan = Http::get(env('API_FRK_SERVICE') .'/pengabdian/konsultan/' . $id);
        //     $konsultan = $responsekonsultan->json();

        //     // Mengambil data d. karya dari lumen
        //     $responseKarya = Http::get(env('API_FRK_SERVICE') .'/pengabdian/karya/' . $id);
        //     $Karya = $responseKarya->json();


        //     // Menggabungkan data
        //     $data = [
        //         //data a
        //         'kegiatan' => $Kegiatan,
        //         //data b
        //         'penyuluhan' => $Penyuluhan,

        //         //data c
        //         'konsultan' => $konsultan,
        //         //data d
        //         'karya' => $Karya,
        //         'auth' => $auth,
        //         'id' => $id,
        //         'dataDosen' => $dataDosen
        //     ];

        //     // Mengirim data ke view
        //     return view('App.Asesor.pengabdianAsesor', $data);
        return view('App.AsesorFED.pengabdianAsesor');
        // }catch (\Throwable $th) {
        //     // Tangani error jika terjadi
        //     return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        // }
    }
    public function getEvaluasiPenunjang(Request $request, $id)
    {
        // $auth = Tools::getAuth($request);
        // $token = json_decode(json_encode($auth->user),true)['token'];
        // $dataDosen = $this->getDosen($id, $token);

        // try {
        //     $responseAkademik = Http::get(env('API_FRK_SERVICE') . '/penunjang/akademik/' . $id);
        //     $akademik = $responseAkademik->json();

        //     $responseBimbingan = Http::get(env('API_FRK_SERVICE') . '/penunjang/bimbingan/' . $id);
        //     $bimbingan = $responseBimbingan->json();

        //     $responseUkm = Http::get(env('API_FRK_SERVICE') . '/penunjang/ukm/' . $id);
        //     $ukm = $responseUkm->json();

        //     $responseSosial = Http::get(env('API_FRK_SERVICE') . '/penunjang/sosial/' . $id);
        //     $sosial = $responseSosial->json();

        //     $responseSturuktural = Http::get(env('API_FRK_SERVICE') . '/penunjang/struktural/' . $id);
        //     $struktural = $responseSturuktural->json();

        //     $responsenonSturuktural = Http::get(env('API_FRK_SERVICE') . '/penunjang/nonstruktural/' . $id);
        //     $nonstruktural = $responsenonSturuktural->json();

        //     $responseRedaksi = Http::get(env('API_FRK_SERVICE') . '/penunjang/redaksi/' . $id);
        //     $redaksi = $responseRedaksi->json();

        //     $responseAdhoc = Http::get(env('API_FRK_SERVICE') . '/penunjang/adhoc/' . $id);
        //     $adhoc = $responseAdhoc->json();

        //     $responseAsosiasi = Http::get(env('API_FRK_SERVICE') . '/penunjang/asosiasi/' . $id);
        //     $asosiasi = $responseAsosiasi->json();

        //     $responseSeminar = Http::get(env('API_FRK_SERVICE') . '/penunjang/seminar/' . $id);
        //     $seminar = $responseSeminar->json();

        //     $responseReviewer = Http::get(env('API_FRK_SERVICE') . '/penunjang/reviewer/' . $id);
        //     $reviewer = $responseReviewer->json();

        //     $responseKetuaPanitia = Http::get(env('API_FRK_SERVICE') . '/penunjang/ketuapanitia/' . $id);
        //     $ketuapanitia = $responseKetuaPanitia->json();

        //     $responseAnggotaPanitia = Http::get(env('API_FRK_SERVICE') . '/penunjang/anggotapanitia/' . $id);
        //     $anggotapanitia = $responseAnggotaPanitia->json();

        //     $responsePengurusYayasan = Http::get(env('API_FRK_SERVICE') . '/penunjang/pengurusyayasan/' . $id);
        //     $pengurusyayasan = $responsePengurusYayasan->json();

        //     $data = [
        //         'akademik' => $akademik,
        //         'bimbingan' => $bimbingan,
        //         'ukm' => $ukm,
        //         'sosial' => $sosial,
        //         'struktural' => $struktural,
        //         'nonstruktural' => $nonstruktural,
        //         'redaksi' => $redaksi,
        //         'adhoc' => $adhoc,
        //         'asosiasi' => $asosiasi,
        //         'seminar' => $seminar,
        //         'reviewer' => $reviewer,
        //         'ketuapanitia' => $ketuapanitia,
        //         'anggotapanitia' => $anggotapanitia,
        //         'pengurusyayasan' => $pengurusyayasan,
        //         'auth' => $auth,
        //         'id' => $id,
        //         'dataDosen' => $dataDosen
        //     ];

        //     return view('App.Asesor.penunjangAsesor', $data);
        return view('App.AsesorFED.penunjangAsesor');
        // } catch (\Throwable $th) {
        //     // Tangani error jika terjadi
        //     return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        // }
    }

    public function reviewEvaluasi(Request $request){
        // $id_rencana = $request->get('id_rencana');
        // $komentar = $request->get('komentar');
        // $toastMsg = "";
        // if($komentar == "setuju"){
        //     $toastMsg = "Berhasil mengapprove rencana kerja";
        // } else{
        //     $toastMsg = "Berhasil menolak rencana kerja";
        // }
        // try {
        //     $response = Http::post(env('API_FRK_SERVICE') . '/asesor-frk/reviewRencana', [
        //        "id_rencana" => $id_rencana,
        //        "komentar" => $komentar
        //     ]);
        //     if($response->status() === 200){
        //         return back()->with('message', $toastMsg);
        //     } else {
        //         throw new RequestException($response);
        //     }
        // } catch (RequestException $e) {
        //     return back()->with('message', 'Gagal approve rencana kerja');
        // }
    }

    public function simpulanAsesor()
    {
        return view('App.AsesorFED.simpulanAsesorFED');
    }
}
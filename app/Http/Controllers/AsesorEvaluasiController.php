<?php

namespace App\Http\Controllers;

use App\Utils\Tools;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AsesorEvaluasiController extends Controller
{
    public function getEvaluasiKegiatan(Request $request)
    {
        $auth = Tools::getAuth($request);
        $token = json_decode(json_encode($auth->user), true)['token'];
        $response_dosen = Http::get(env('API_FED_SERVICE') . '/asesor-fed/getAllDosen');


        $data_dosen = [];
        if (sizeof($response_dosen->json()) > 0) {
            foreach ($response_dosen->json() as $item) {
                $res = $this->getDosen($item["id_dosen"], $token);

                array_push($data_dosen, $res);
            }
        }

        return view(
            'App.AsesorEvaluasi.rekapKegiatan',
            [
                'auth' => $auth,
                'data_dosen' => $data_dosen,
            ]
        );
    }

    public function getDosen($uid, $token)
    {
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

    public function getEvaluasiPendidikan(Request $request, $id)
    {
        $auth = Tools::getAuth($request);
        $id_pegawai = json_decode(json_encode($auth->user->data_lengkap->pegawai), true)['pegawai_id'];
        $token = json_decode(json_encode($auth->user), true)['token'];
        $dataDosen = $this->getDosen($id, $token);
        try {
            $response = Http::get(env('API_FED_SERVICE') . '/asesor-fed/get-all-pendidikan/' . $id);
            $responsePendidikan = $response->json();

            // Menggabungkan data teori dan bimbingan
            $data = [
                'id' => $id,
                'teori' => $responsePendidikan["teori"],
                'bimbingan' => $responsePendidikan["bimbingan"],
                'seminar' => $responsePendidikan["seminar"],
                'praktikum' => $responsePendidikan["praktikum"],
                'rendah' => $responsePendidikan["rendah"],
                'kembang' => $responsePendidikan["kembang"],
                'tugasAkhir' => $responsePendidikan["tugasAkhir"],
                'cangkok' => $responsePendidikan["cangkok"],
                'koordinator' => $responsePendidikan["koordinator"],
                'proposal' => $responsePendidikan["proposal"],
                'auth' => $auth,
                'dataDosen' => $dataDosen,
                'idPegawai' => $id_pegawai
            ];

            // Mengirim data ke view
            return view('App.AsesorEvaluasi.pendidikanAsesor', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API',], 500);
        }
    }

    public function getEvaluasiPenelitian(Request $request, $id)
    {
        $auth = Tools::getAuth($request);
        $id_pegawai = json_decode(json_encode($auth->user->data_lengkap->pegawai), true)['user_id'];
        $token = json_decode(json_encode($auth->user), true)['token'];
        $dataDosen = $this->getDosen($id, $token);
        try {
            // Mengambil data a. penelitian kelompok dari Lumen
            $response = Http::get(env('API_FED_SERVICE') . '/asesor-fed/get-all-penelitian/' . $id);
            $responsePenelitian = $response->json();


            // Menggabungkan data
            $data = [
                'penelitian_kelompok' => $responsePenelitian["penelitian_kelompok"],
                'penelitian_mandiri' => $responsePenelitian["penelitian_mandiri"],
                'buku_terbit' => $responsePenelitian["buku_terbit"],
                'buku_internasional' => $responsePenelitian["buku_internasional"],
                'menyadur' => $responsePenelitian["menyadur"],
                'menyunting' => $responsePenelitian["menyunting"],
                'penelitian_modul' => $responsePenelitian["penelitian_modul"],
                'penelitian_pekerti' => $responsePenelitian["penelitian_pekerti"],
                'penelitian_tridharma' => $responsePenelitian["penelitian_tridharma"],
                'jurnal_ilmiah' => $responsePenelitian["jurnal_ilmiah"],
                'pembicara_seminar' => $responsePenelitian["pembicara_seminar"],
                'penyajian_makalah' => $responsePenelitian["penyajian_makalah"],
                'hak_paten' => $responsePenelitian["hak_paten"],
                'media_massa' => $responsePenelitian["media_massa"],
                'auth' => $auth,
                'id' => $id,
                'dataDosen' => $dataDosen,
                'idPegawai' => $id_pegawai
            ];

            // Mengirim data ke view
            return view('App.AsesorEvaluasi.penelitianAsesor', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function getEvaluasiPengabdian(Request $request, $id)
    {
        $auth = Tools::getAuth($request);
        $id_pegawai = json_decode(json_encode($auth->user->data_lengkap->pegawai), true)['user_id'];
        $token = json_decode(json_encode($auth->user), true)['token'];
        $dataDosen = $this->getDosen($id, $token);

        try {
            // Mengambil data a. kegiatan dari lumen
            $response = Http::get(env('API_FED_SERVICE') . '/asesor-fed/get-all-pengabdian/' . $id);
            $responsePengabdian = $response->json();

            // Menggabungkan data
            $data = [
                'kegiatan' => $responsePengabdian["kegiatan"],
                'penyuluhan' => $responsePengabdian["penyuluhan"],
                'konsultan' => $responsePengabdian["konsultan"],
                'karya' => $responsePengabdian["karya"],
                'auth' => $auth,
                'id' => $id,
                'dataDosen' => $dataDosen,
                'idPegawai' => $id_pegawai
            ];

            // Mengirim data ke view
            return view('App.AsesorEvaluasi.pengabdianAsesor', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }
    public function getEvaluasiPenunjang(Request $request, $id)
    {
        $auth = Tools::getAuth($request);
        $id_pegawai = json_decode(json_encode($auth->user->data_lengkap->pegawai), true)['user_id'];
        $token = json_decode(json_encode($auth->user), true)['token'];
        $dataDosen = $this->getDosen($id, $token);

        try {
            // Mengambil data a. kegiatan dari lumen
            $response = Http::get(env('API_FED_SERVICE') . '/asesor-fed/get-all-penunjang/' . $id);
            $responsePenunjang = $response->json();

            // Menggabungkan data
            $data = [
                'akademik' => $responsePenunjang["akademik"],
                'bimbingan' => $responsePenunjang["bimbingan"],
                'ukm' => $responsePenunjang["ukm"],
                'sosial' => $responsePenunjang["sosial"],
                'struktural' => $responsePenunjang["struktural"],
                'nonstruktural' => $responsePenunjang["nonstruktural"],
                'redaksi' => $responsePenunjang["redaksi"],
                'adhoc' => $responsePenunjang["adhoc"],
                'ketuapanitia' => $responsePenunjang["ketuapanitia"],
                'anggotapanitia' => $responsePenunjang["anggotapanitia"],
                'pengurusyayasan' => $responsePenunjang["pengurusyayasan"],
                'asosiasi' => $responsePenunjang["asosiasi"],
                'seminar' => $responsePenunjang["seminar"],
                'reviewer' => $responsePenunjang["reviewer"],
                'auth' => $auth,
                'id' => $id,
                'dataDosen' => $dataDosen,
                'idPegawai' => $id_pegawai
            ];

            // Mengirim data ke view
            return view('App.AsesorEvaluasi.penunjangAsesor', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function reviewEvaluasi(Request $request)
    {
        $auth = Tools::getAuth($request);
        $check = Tools::checkAsesor(
            json_decode(json_encode($auth->user->data_lengkap->dosen), true)['pegawai_id'],
        );

        $id_rencana = $request->get('id_rencana');
        $komentar = $request->get('komentar');
        $toastMsg = "";
        if ($komentar == "setuju") {
            $toastMsg = "Berhasil mengapprove rencana kerja";
        } else {
            $toastMsg = "Berhasil menolak rencana kerja";
        }
        try {
            $response = Http::post(env('API_FED_SERVICE') . '/asesor-fed/reviewEvaluasi', [
                "id_rencana" => $id_rencana,
                "komentar" => $komentar,
                "role" => $check["data"]["tipe_asesor"]
            ]);
            if ($response->status() === 200) {
                return back()->with('message', $toastMsg);
            } else {
                throw new RequestException($response);
            }
        } catch (RequestException $e) {
            return back()->with('message', 'Gagal approve rencana kerja');
        }
    }

    public function getEvaluasiKegiatanSetuju(Request $request)
    {
        $auth = Tools::getAuth($request);
        $token = json_decode(json_encode($auth->user), true)['token'];
        $auth = Tools::getAuth($request);
        $check = Tools::checkAsesor(
            json_decode(json_encode($auth->user->data_lengkap->dosen), true)['pegawai_id'],
        );
        $role = $check["data"]["tipe_asesor"] == '1' ? 'asesor1' : 'asesor2';
        $response_dosen = Http::get(env('API_FED_SERVICE') . '/asesor-fed/getAllCompleteDosen/' . $role);


        $data_dosen = [];
        if (sizeof($response_dosen->json()) > 0) {
            foreach ($response_dosen->json() as $item) {
                $res = $this->getDosen($item, $token);

                array_push($data_dosen, $res);
            }
        }


        return view(
            'App.AsesorEvaluasi.rekapKegiatanSetuju',
            [
                'auth' => $auth,
                'data_dosen' => $data_dosen,
            ]
        );
    }
}

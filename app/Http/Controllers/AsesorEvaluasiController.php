<?php

namespace App\Http\Controllers;

use App\Utils\Tools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AsesorEvaluasiController extends Controller
{
    public function getRencanaKegiatan(Request $request)
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

    public function getRencanaPendidikan(Request $request, $id)
    {
        $auth = Tools::getAuth($request);
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
                'dataDosen' => $dataDosen
            ];

            // Mengirim data ke view
            return view('App.AsesorEvaluasi.pendidikanAsesor', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API',], 500);
        }
    }

    public function getRencanaPenelitian(Request $request, $id)
    {
        $auth = Tools::getAuth($request);
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
                'dataDosen' => $dataDosen
            ];

            // Mengirim data ke view
            return view('App.AsesorEvaluasi.penelitianAsesor', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Utils\Tools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LihatKerjaController extends Controller
{
    public function getTahunAjaranAsesor(Request $request)
    {
        $auth = Tools::getAuth($request);
        $token = Tools::getToken($request);
        $listTahunAjaran = Tools::getListTahunAjaran($token);

        $role_dosen = "Asesor Program Studi " . $auth->user->data_lengkap->dosen->prodi;
        $responseAsesor =  json_decode(Http::withToken($auth->user->token)->get(env('API_ADMIN_SERVICE') . 'get-asesor')->body(), true);

        $listIdAssesor = [];

        foreach ($responseAsesor['data'] as $e) {
            $listIdAssesor[] = $e['id_pegawai'];
        }

        $role = json_decode(json_encode($auth->user->data_lengkap->pegawai), true)['posisi '];
        $isHumanResources = ($role === 'Staf Human Resources');
        if($isHumanResources){
            $role_dosen = "Staf Human Resources";
        }


        $data = [
            'auth' => $auth,
            'idAsesor' => $listIdAssesor,
            'isHumanResources' => $isHumanResources,
            'role_dosen' => $role_dosen,
            'list_tahun_ajaran' => $listTahunAjaran['data']
        ];
        return view('App.AsesorLihatKerja.AsessorLihatTahunAjaran', $data);
    }

    public function getViewDosenAsesor(Request $request, $id_ta)
    {

        $auth = Tools::getAuth($request);
        $role_dosen = "Asesor Program Studi " . $auth->user->data_lengkap->dosen->prodi;
        $token = Tools::getToken($request);
        $listDosen = Tools::getListDosenByIdTahunAjaran($token, $id_ta);
        $data_tanggal = Tools::getDataTahunAjaran($token, $id_ta);
        $tahun_ajaran = $data_tanggal['data'][0]['tahun_ajaran'];
        $semester = $data_tanggal['data'][0]['semester'];


        $data_dosen = [];
        if (sizeof($listDosen['data']) > 0) {
            foreach ($listDosen['data'] as $item) {
                $res = $this->getDosen($item["id_dosen"], $token);

                array_push($data_dosen, $res);
            }
        }

        // dd($data_dosen);

        $responseAsesor =  json_decode(Http::withToken($auth->user->token)->get(env('API_ADMIN_SERVICE') . 'get-asesor')->body(), true);

        $listIdAssesor = [];

        foreach ($responseAsesor['data'] as $e) {
            $listIdAssesor[] = $e['id_pegawai'];
        }

        $role = json_decode(json_encode($auth->user->data_lengkap->pegawai), true)['posisi '];
        $isHumanResources = ($role === 'Staf Human Resources');
        if($isHumanResources){
            $role_dosen = "Staf Human Resources";
        }


        $data = [
            'auth' => $auth,
            'idAsesor' => $listIdAssesor,
            'isHumanResources' => $isHumanResources,
            'role_dosen' => $role_dosen,
            'list_dosen' => $data_dosen,
            'tahun_ajaran' => $tahun_ajaran,
            'semester' => $semester,
            'id_ta' => $id_ta
        ];

        return view('App.AsesorLihatKerja.AsessorLihatKerjaViewDosen', $data);
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

    public function getDetailPendidikan(Request $request, $id, $id_ta)
    {
        $auth = Tools::getAuth($request);
        $token = Tools::getToken($request);

        $data_dosen = $this->getDosen($id, $token);

        $data_tanggal = Tools::getDataTahunAjaran($token, $id_ta);
        $tahun_ajaran = $data_tanggal['data'][0]['tahun_ajaran'];
        $semester = $data_tanggal['data'][0]['semester'];

        $role = json_decode(json_encode($auth->user->data_lengkap->pegawai), true)['posisi '];
        $isHumanResources = ($role === 'Staf Human Resources');
        if($isHumanResources){
            $role_dosen = "Staf Human Resources";
        }

        try {
            $response = Http::get(env('API_FED_SERVICE') . '/riwayat-kegiatan/getAllPendidikan/' . $id . '/' . $id_ta);
            $responsePendidikan = $response->json();

            // Menggabungkan data teori dan bimbingan
            $data = [
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
                'id_dosen' => $id,
                'id_ta' => $id_ta,
                'tahun_ajaran' => $tahun_ajaran,
                'semester' => $semester,
                'isHumanResources' => $isHumanResources,
                'data_dosen' => $data_dosen,

            ];

            // Mengirim data ke view
            return view('App.AsesorLihatKerja.LihatDetailPendidikan', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function getDetailPenelitian(Request $request, $id, $id_ta)
    {
        $auth = Tools::getAuth($request);
        $token = Tools::getToken($request);

        $data_dosen = $this->getDosen($id, $token);

        $data_tanggal = Tools::getDataTahunAjaran($token, $id_ta);
        $tahun_ajaran = $data_tanggal['data'][0]['tahun_ajaran'];
        $semester = $data_tanggal['data'][0]['semester'];

        $role = json_decode(json_encode($auth->user->data_lengkap->pegawai), true)['posisi '];
        $isHumanResources = ($role === 'Staf Human Resources');
        if($isHumanResources){
            $role_dosen = "Staf Human Resources";
        }
        try {
            // Mengambil data a. penelitian kelompok dari Lumen
            $response = Http::get(env('API_FED_SERVICE') . '/riwayat-kegiatan/getAllPenelitian/' . $id . '/' . $id_ta);
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
                'id_dosen' => $id,
                'id_ta' => $id_ta,
                'tahun_ajaran' => $tahun_ajaran,
                'semester' => $semester,
                'isHumanResources' => $isHumanResources,
                'data_dosen' => $data_dosen,
            ];

            // Mengirim data ke view
            return view('App.AsesorLihatKerja.LihatDetailPenelitian', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function getDetailPengabdian(Request $request, $id, $id_ta)
    {
        $auth = Tools::getAuth($request);
        $token = Tools::getToken($request);

        $data_dosen = $this->getDosen($id, $token);

        $data_tanggal = Tools::getDataTahunAjaran($token, $id_ta);
        $tahun_ajaran = $data_tanggal['data'][0]['tahun_ajaran'];
        $semester = $data_tanggal['data'][0]['semester'];

        $role = json_decode(json_encode($auth->user->data_lengkap->pegawai), true)['posisi '];
        $isHumanResources = ($role === 'Staf Human Resources');
        if($isHumanResources){
            $role_dosen = "Staf Human Resources";
        }
        try {
            // Mengambil data a. kegiatan dari lumen
            $response = Http::get(env('API_FED_SERVICE') . '/riwayat-kegiatan/getAllPengabdian/' . $id . '/' . $id_ta);
            $responsePengabdian = $response->json();

            // Menggabungkan data
            $data = [
                'kegiatan' => $responsePengabdian["kegiatan"],
                'penyuluhan' => $responsePengabdian["penyuluhan"],
                'konsultan' => $responsePengabdian["konsultan"],
                'karya' => $responsePengabdian["karya"],
                'auth' => $auth,
                'id_dosen' => $id,
                'id_ta' => $id_ta,
                'tahun_ajaran' => $tahun_ajaran,
                'semester' => $semester,
                'isHumanResources' => $isHumanResources,
                'data_dosen' => $data_dosen,
            ];

            // Mengirim data ke view
            return view('App.AsesorLihatKerja.LihatDetailPengabdian', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }
    public function getDetailPenunjang(Request $request, $id, $id_ta)
    {
        $auth = Tools::getAuth($request);
        $token = Tools::getToken($request);

        $data_dosen = $this->getDosen($id, $token);

        $data_tanggal = Tools::getDataTahunAjaran($token, $id_ta);
        $tahun_ajaran = $data_tanggal['data'][0]['tahun_ajaran'];
        $semester = $data_tanggal['data'][0]['semester'];
        $role = json_decode(json_encode($auth->user->data_lengkap->pegawai), true)['posisi '];
        $isHumanResources = ($role === 'Staf Human Resources');
        if($isHumanResources){
            $role_dosen = "Staf Human Resources";
        }
        try {
            // Mengambil data a. kegiatan dari lumen
            $response = Http::get(env('API_FED_SERVICE') . '/riwayat-kegiatan/getAllPenunjang/' . $id . '/' . $id_ta);
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
                'id_dosen' => $id,
                'id_ta' => $id_ta,
                'tahun_ajaran' => $tahun_ajaran,
                'semester' => $semester,
                'isHumanResources' => $isHumanResources,
                'data_dosen' => $data_dosen,
            ];

            // Mengirim data ke view
            return view('App.AsesorLihatKerja.LihatDetailPenunjang', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }
    public function getDetailSimpulan(Request $request, $id, $id_ta)
    {
        $auth = Tools::getAuth($request);
        $token = Tools::getToken($request);

        $data_dosen = $this->getDosen($id, $token);

        $data_tanggal = Tools::getDataTahunAjaran($token, $id_ta);
        $tahun_ajaran = $data_tanggal['data'][0]['tahun_ajaran'];
        $semester = $data_tanggal['data'][0]['semester'];

        $role = json_decode(json_encode($auth->user->data_lengkap->pegawai), true)['posisi '];
        $isHumanResources = ($role === 'Staf Human Resources');
        if($isHumanResources){
            $role_dosen = "Staf Human Resources";
        }
        try {
            $dataSks = Http::get(env('API_FED_SERVICE') . '/riwayat-kegiatan/getSimpulan/' . $id . '/' . $id_ta);

            $totalSksPendidikan = $dataSks["sks_pendidikan"];
            $totalSksPenelitian = $dataSks["sks_penelitian"];
            $totalSksPengabdian = $dataSks["sks_pengabdian"];
            $totalSksPenunjang = $dataSks["sks_penunjang"];
            $totalSks = $dataSks["sks_total"];

            return view(
                'App.AsesorLihatKerja.LihatSimpulan',
                [
                    'pendidikanSks' => $totalSksPendidikan,
                    'penelitianSks' => $totalSksPenelitian,
                    'pengabdianSks' => $totalSksPengabdian,
                    'penunjangSks' => $totalSksPenunjang,
                    'totalSks' => $totalSks,
                    'auth' => $auth,
                    'id_dosen' => $id,
                    'id_ta' => $id_ta,
                    'tahun_ajaran' => $tahun_ajaran,
                    'semester' => $semester,
                    'isHumanResources' => $isHumanResources,
                    'data_dosen' => $data_dosen,
                ]
            );
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Utils\Tools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RiwayatKerjaController extends Controller
{
    public function getTahunAjaran(Request $request)
    {
        $auth = Tools::getAuth($request);
        $token = Tools::getToken($request);
        $listTahunAjaran = Tools::getListTahunAjaran($token);

        // $id_dosen = json_decode(json_encode($auth->user->data_lengkap->pegawai), true)['user_id'];
        // $nidn_dosen = json_decode(json_encode($auth->user->data_lengkap->dosen), true)['nidn'];
        // $nama_dosen = json_decode(json_encode($auth->user->data_lengkap->dosen), true)['nama'];
        $role_dosen = json_decode(json_encode($auth->user->data_lengkap->pegawai), true)['posisi '] . " Program Studi " . $auth->user->data_lengkap->dosen->prodi;

        $responseAsesor =  json_decode(Http::withToken($auth->user->token)->get(env('API_ADMIN_SERVICE') . 'get-asesor')->body(), true);

        $listIdAssesor = [];

        foreach ($responseAsesor['data'] as $e) {
            $listIdAssesor[] = $e['id_pegawai'];
        }

        $role = json_decode(json_encode($auth->user->data_lengkap->pegawai), true)['posisi '];
        $isHumanResources = ($role === 'Staf Human Resources');

        $data = [
            'auth' => $auth,
            'idAsesor' => $listIdAssesor,
            'isHumanResources' => $isHumanResources,
            'role_dosen' => $role_dosen,
            'list_tahun_ajaran' => $listTahunAjaran['data']
        ];
        return view('App.RiwayatKerja.ListTahunAjaran', $data);
    }

    public function getDetailPendidikan(Request $request, $id_ta)
    {
        $auth = Tools::getAuth($request);
        $id_dosen = json_decode(json_encode($auth->user->data_lengkap->pegawai), true)['user_id'];
        $token = Tools::getToken($request);
        $data_tanggal = Tools::getDataTahunAjaran($token, $id_ta);
        $tahun_ajaran = $data_tanggal['data'][0]['tahun_ajaran'];
        $semester = $data_tanggal['data'][0]['semester'];

        try {
            $response = Http::get(env('API_FED_SERVICE') . '/riwayat-kegiatan/getAllPendidikan/' . $id_dosen . '/' . $id_ta);
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
                'id_ta' => $id_ta,
                'tahun_ajaran' => $tahun_ajaran,
                'semester' => $semester
            ];

            // Mengirim data ke view
            return view('App.RiwayatKerja.DetailPendidikan', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function getDetailPenelitian(Request $request, $id_ta)
    {

        $auth = Tools::getAuth($request);
        $id_dosen = json_decode(json_encode($auth->user->data_lengkap->pegawai), true)['user_id'];
        $token = Tools::getToken($request);
        $data_tanggal = Tools::getDataTahunAjaran($token, $id_ta);
        $tahun_ajaran = $data_tanggal['data'][0]['tahun_ajaran'];
        $semester = $data_tanggal['data'][0]['semester'];
        try {
            // Mengambil data a. penelitian kelompok dari Lumen
            $response = Http::get(env('API_FED_SERVICE') . '/riwayat-kegiatan/getAllPenelitian/' . $id_dosen . '/' . $id_ta);
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
                'id_ta' => $id_ta,
                'tahun_ajaran' => $tahun_ajaran,
                'semester' => $semester
            ];

            // Mengirim data ke view
            return view('App.RiwayatKerja.DetailPenelitian', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }
    public function getDetailPengabdian(Request $request, $id_ta)
    {
        $auth = Tools::getAuth($request);
        $id_dosen = json_decode(json_encode($auth->user->data_lengkap->pegawai), true)['user_id'];
        $token = Tools::getToken($request);
        $data_tanggal = Tools::getDataTahunAjaran($token, $id_ta);
        $tahun_ajaran = $data_tanggal['data'][0]['tahun_ajaran'];
        $semester = $data_tanggal['data'][0]['semester'];
        try {
            // Mengambil data a. kegiatan dari lumen
            $response = Http::get(env('API_FED_SERVICE') . '/riwayat-kegiatan/getAllPengabdian/' . $id_dosen . '/' . $id_ta);
            $responsePengabdian = $response->json();

            // Menggabungkan data
            $data = [
                'kegiatan' => $responsePengabdian["kegiatan"],
                'penyuluhan' => $responsePengabdian["penyuluhan"],
                'konsultan' => $responsePengabdian["konsultan"],
                'karya' => $responsePengabdian["karya"],
                'auth' => $auth,
                'id_ta' => $id_ta,
                'tahun_ajaran' => $tahun_ajaran,
                'semester' => $semester
            ];

            // Mengirim data ke view
            return view('App.RiwayatKerja.DetailPengabdian', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }
    public function getDetailPenunjang(Request $request, $id_ta)
    {
        $auth = Tools::getAuth($request);
        $id_dosen = json_decode(json_encode($auth->user->data_lengkap->pegawai), true)['user_id'];
        $token = Tools::getToken($request);
        $data_tanggal = Tools::getDataTahunAjaran($token, $id_ta);
        $tahun_ajaran = $data_tanggal['data'][0]['tahun_ajaran'];
        $semester = $data_tanggal['data'][0]['semester'];

        try {
            // Mengambil data a. kegiatan dari lumen
            $response = Http::get(env('API_FED_SERVICE') . '/riwayat-kegiatan/getAllPenunjang/' . $id_dosen . '/' . $id_ta);
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
                'id_ta' => $id_ta,
                'tahun_ajaran' => $tahun_ajaran,
                'semester' => $semester
            ];

            // Mengirim data ke view
            return view('App.RiwayatKerja.DetailPenunjang', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }
    public function getDetailSimpulan(Request $request, $id_ta)
    {
        $auth = Tools::getAuth($request);
        $id_dosen = json_decode(json_encode($auth->user->data_lengkap->pegawai), true)['user_id'];
        $token = Tools::getToken($request);
        $data_tanggal = Tools::getDataTahunAjaran($token, $id_ta);
        $tahun_ajaran = $data_tanggal['data'][0]['tahun_ajaran'];
        $semester = $data_tanggal['data'][0]['semester'];

        try {
            $dataSks = Http::get(env('API_FED_SERVICE') . '/riwayat-kegiatan/getSimpulan/' . $id_dosen . '/' . $id_ta);

            $totalSksPendidikan = $dataSks["sks_pendidikan"];
            $totalSksPenelitian = $dataSks["sks_penelitian"];
            $totalSksPengabdian = $dataSks["sks_pengabdian"];
            $totalSksPenunjang = $dataSks["sks_penunjang"];
            $totalSks = $dataSks["sks_total"];

            return view(
                'App.RiwayatKerja.DetailSimpulan',
                [
                    'pendidikanSks' => $totalSksPendidikan,
                    'penelitianSks' => $totalSksPenelitian,
                    'pengabdianSks' => $totalSksPengabdian,
                    'penunjangSks' => $totalSksPenunjang,
                    'totalSks' => $totalSks,
                    'auth' => $auth,
                    'id_ta' => $id_ta,
                    'tahun_ajaran' => $tahun_ajaran,
                    'semester' => $semester
                ]
            );
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }
}

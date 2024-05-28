<?php

namespace App\Http\Controllers;

use App\Utils\Tools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PengabdianController extends Controller
{
    public function getPengabdianPanel(Request $request){
        $auth = Tools::getAuth($request);
        $getTanggal = json_decode(json_encode(Tools::getPeriod($auth->user->token, "FRK")), true)['data'];
        $id_dosen = json_decode(json_encode($auth->user->data_lengkap->pegawai),true)['user_id'];
        try{
            // Mengambil data a. kegiatan dari lumen
            $responsKegiatan = Http::get(env('API_FRK_SERVICE') .'/pengabdian/kegiatan/' . $id_dosen);
            $Kegiatan = $responsKegiatan->json();

            // Mengambil data b. penyuluhan dari lumen
            $responsePenyuluhan = Http::get(env('API_FRK_SERVICE') .'/pengabdian/penyuluhan/' . $id_dosen);
            $Penyuluhan = $responsePenyuluhan->json();

            // Mengambil data c. konsultan dari lumen
            $responsekonsultan = Http::get(env('API_FRK_SERVICE') .'/pengabdian/konsultan/' . $id_dosen);
            $konsultan = $responsekonsultan->json();

            // Mengambil data d. karya dari lumen
            $responseKarya = Http::get(env('API_FRK_SERVICE') .'/pengabdian/karya/' . $id_dosen);
            $Karya = $responseKarya->json();

            $responseAsesor =  json_decode(Http::withToken($auth->user->token)->get(env('API_ADMIN_SERVICE') . 'get-asesor')->body(), true);

            $listIdAssesor = [];


            foreach ($responseAsesor['data'] as $e) {
                $listIdAssesor[] = $e['id_pegawai'];
            }


            // Menggabungkan data
            $data = [
                //data a
                'kegiatan' => $Kegiatan,
                //data b
                'penyuluhan' => $Penyuluhan,

                //data c
                'konsultan' => $konsultan,
                //data d
                'karya' => $Karya,
                'auth' => $auth,
                'id_dosen' => $id_dosen,
                'periode' => $getTanggal,
                'idAsesor' => $listIdAssesor
            ];

            // Mengirim data ke view
            return view('App.Rencana.pengabdian', $data);
        }catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    // CRUD Tabel A. Kegiatan Setara // CRUD A. Kegiatan Setara
    public function getKegiatan(Request $request){
        try{
            $responsKegiatan = Http::get(env('API_FRK_SERVICE') .'/pengabdian/kegiatan');
            $Kegiatan = $responsKegiatan->json();

            $data = [
                'kegiatan' => $Kegiatan,
            ];
        }catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function postKegiatan(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') .'/pengabdian/kegiatan',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jumlah_durasi' => $request->get('jumlah_durasi'),
            ]
        );

        return redirect()->back()->with('success', 'Pengabdian kegiatan setara added successfully');
    }

    public function editKegiatan(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') .'/pengabdian/edit/kegiatan',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jumlah_durasi' => $request->get('jumlah_durasi'),
            ]
        );

        return redirect()->back()->with('success', 'Pengabdian kegiatan setara updated successfully');
    }

    public function deleteKegiatan($id)
    {
        Http::delete(env('API_FRK_SERVICE') ."/pengabdian/kegiatan/{$id}");

        return redirect()->back()->with('success', 'Item in pengabdian kegiatan setara successfully deleted');
    }
    // END CRUD Tabel A. Kegiatan Setara // END CRUD Tabel A. Kegiatan Setara


    // CRUD Tabel B.Penyuluhan // CRUD Tabel B.Penyuluhan // CRUD B.Penyuluhan
    public function getPenyuluhan()
    {
        try {
            // Mengambil data Penyuluhan dari Lumen
            $responsePenyuluhan = Http::get(env('API_FRK_SERVICE') .'/pengabdian/penyuluhan');
            $Penyuluhan = $responsePenyuluhan->json();

            $data = [
                'penyuluhan' => $Penyuluhan,
            ];

            // Mengirim data ke view
            return view('App.Rencana.pengabdian', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function postPenyuluhan(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') .'/pengabdian/penyuluhan',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jumlah_durasi' => $request->get('jumlah_durasi'),
            ]
        );

        return redirect()->back()->with('success', 'Pengabdian penyuluhan added successfully');
    }

    public function editPenyuluhan(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') .'/pengabdian/edit/penyuluhan',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jumlah_durasi' => $request->get('jumlah_durasi'),
            ]
        );

        return redirect()->back()->with('success', 'Pengabdian penyuluhan updated successfully');
    }

    public function deletePenyuluhan($id)
    {
        Http::delete(env('API_FRK_SERVICE') ."/pengabdian/penyuluhan/{$id}");

        return redirect()->back()->with('success', 'Item in pengabdian penyuluhan successfully deleted');
    }
    // END CRUD Tabel B.Penyuluhan // END CRUD Tabel B.Penyuluhan

    // CRUD Tabel C.Konsultan // CRUD Tabel C.Konsultan // CRUD Tabel C.Konsultan
    public function getKonsultan()
    {
        try {
            // Mengambil data konsultan dari Lumen
            $responseKonsultan = Http::get(env('API_FRK_SERVICE') .'/pengabdian/konsultan');
            $Konsultan = $responseKonsultan->json();

            $data = [
                'konsultan' => $Konsultan,
            ];

            // Mengirim data ke view
            return view('App.Rencana.pengabdian', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function postKonsultan(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') .'/pengabdian/konsultan',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'posisi' => $request->get('posisi'),
            ]
        );

        return redirect()->back()->with('success', 'Pengabdian konsultan added successfully');
    }

    public function editKonsultan(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') .'/pengabdian/edit/konsultan',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'posisi' => $request->get('posisi'),
            ]
        );

        return redirect()->back()->with('success', 'Pengabdian konsultan updated successfully');
    }

    public function deleteKonsultan($id)
    {
        Http::delete(env('API_FRK_SERVICE') ."/pengabdian/konsultan/{$id}");

        return redirect()->back()->with('success', 'Item in pengabdian konsultan successfully deleted');
    }
    // END CRUD Tabel C.Konsultan // END CRUD Tabel C.Konsultan // END CRUD Tabel C.Konsultan


    // CRUD Tabel D.Karya // CRUD Tabel D.Karya // CRUD Tabel D.Karya
    public function getKarya()
    {
        try {
            // Mengambil data karya dari Lumen
            $responseKarya = Http::get(env('API_FRK_SERVICE') .'/pengabdian/karya');
            $Karya = $responseKarya->json();

            $data = [
                'karya' => $Karya,
            ];

            // Mengirim data ke view
            return view('App.Rencana.pengabdian', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function postKarya(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') .'/pengabdian/karya',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jenis_terbit' => $request->get('jenis_terbit'),
                'status_tahapan' => $request->get('status_tahapan'),
                'peran' => $request->get('peran'),
                'jumlah_anggota' => $request->get('jumlah_anggota'),
                'jenis_pengerjaan' => $request->get('jenis_pengerjaan'),
            ]
        );

        return redirect()->back()->with('success', 'Pengabdian karya added successfully');
    }

    public function editKarya(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') .'/pengabdian/edit/karya',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jenis_terbit' => $request->get('jenis_terbit'),
                'status_tahapan' => $request->get('status_tahapan'),
                'peran' => $request->get('peran'),
                'jumlah_anggota' => $request->get('jumlah_anggota'),
                'jenis_pengerjaan' => $request->get('jenis_pengerjaan'),
            ]
        );

        return redirect()->back()->with('success', 'Pengabdian karya updated successfully');
    }

    public function deleteKarya($id)
    {
        Http::delete(env('API_FRK_SERVICE') ."/pengabdian/karya/{$id}");

        return redirect()->back()->with('success', 'Item in pengabdian karya successfully deleted');
    }
    // END CRUD Tabel D.Karya // END CRUD Tabel D.Karya // END CRUD Tabel D.Karya
}

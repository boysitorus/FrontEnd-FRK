<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
class PenelitianController extends Controller
{
    //
    public function getAll()
    {
        try {
            // Mengambil data penelitian kelompok dari Lumen
            $responsePenelitianKelompok = Http::get('http://localhost:8001/api/penelitian/penelitian_kelompok');
            $PenelitianKelompok = $responsePenelitianKelompok->json();

            // Mengambil data penelitian mandiri dari Lumen

            // Mengambil data c dari Lumen

            //Mengambil data d dari Lumen

            //Mengambil data e dari Lumen
            $responseMenyadur = Http::get('http://localhost:8001/api/penelitian/menyadur');
            $Menyadur = $responseMenyadur->json();

            //Mengambil data f dari Lumen
            $responseMenyunting = Http::get('http://localhost:8001/api/penelitian/menyunting');
            $Menyunting = $responseMenyunting->json();

            //Mengambil data g dari Lumen

            //Mengambil data h dari Lumen

            //Mengambil data i dari Lumen

            //Mengambil data j dari Lumen

            //Mengambil data k dari Lumen
            $responseHakPaten = Http::get('http://localhost:8001/api/penelitian/hak_paten');
            $hakpaten = $responseHakPaten->json();


            //Mengambil data l dari Lumen
            $responseMediaMassa = Http::get('http://localhost:8001/api/penelitian/media_massa');
            $mediamassa = $responseMediaMassa->json();
            //Mengambil data m dari Lumen

            //Mengambil data n dari Lumen


            // Menggabungkan data
            $data = [
                'penelitian_kelompok' => $PenelitianKelompok,
                //'penelitianMandiri' => $PenelitianMandiri
                'menyadur'=>$Menyadur,
                'menyunting'=>$Menyunting,
                'hakpaten' => $hakpaten,
                'mediamassa' => $mediamassa
            ];

            // Mengirim data ke view
            return view('App.Rencana.penelitian', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function getPenelitianKelompok()
    {
        try {
            // Mengambil data penelitian kelompok dari Lumen
            $responsePenelitianKelompok = Http::get('http://localhost:8001/api/penelitian/penelitian_kelompok');
            $PenelitianKelompok = $responsePenelitianKelompok->json();

            $data = [
                'penelitian_kelompok' => $PenelitianKelompok,
            ];

            // Mengirim data ke view
            return view('App.Rencana.penelitian', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function postPenelitianKelompok(Request $request)
    {
        Http::post(
            'http://localhost:8001/api/penelitian/penelitian_kelompok',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'status_tahapan' => $request->get('status_tahapan'),
                'posisi' => $request->get('posisi'),
                'jumlah_anggota' => $request->get('jumlah_anggota'),
            ]
        );

        return redirect()->back()->with('success', 'Penelitian penelitian_kelompok added successfully');
    }

    public function editPenelitianKelompok(Request $request)
    {
        Http::post(
            'http://localhost:8001/api/penelitian/edit/penelitian_kelompok',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'status_tahapan' => $request->get('status_tahapan'),
                'posisi' => $request->get('posisi'),
                'jumlah_anggota' => $request->get('jumlah_anggota'),
            ]
        );

        return redirect()->back()->with('success', 'Item updated successfully');
    }

    public function deletePenelitianKelompok($id)
    {
        Http::delete("http://localhost:8001/api/penelitian/penelitian_kelompok/{$id}");

        return redirect()->back()->with('success', 'Item deleted');
    }

    public function getMenyadur()
    {
        try {
            // Mengambil data Menyadur naskah dari Lumen
            $responseMenyadur = Http::get('http://localhost:8001/api/penelitian/menyadur');
            $Menyadur= $responseMenyadur->json();

            $data = [
                'menyadur' => $Menyadur,
            ];

            // Mengirim data ke view
            return view('App.Rencana.penelitian', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function postMenyadur(Request $request)
    {
        Http::post(
            'http://localhost:8001/api/penelitian/menyadur',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'status_tahapan' => $request->get('status_tahapan'),
                'posisi' => $request->get('posisi'),
            ]
        );

        return redirect()->back()->with('success', 'Penelitian penelitian_kelompok added successfully');
    }

    public function editMenyadur(Request $request)
    {
        Http::post(
            'http://localhost:8001/api/penelitian/edit/menyadur',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'status_tahapan' => $request->get('status_tahapan'),
                'posisi' => $request->get('posisi'),
            ]
        );

        return redirect()->back()->with('success', 'Item updated successfully');
    }

    public function deleteMenyadur($id)
    {
        Http::delete("http://localhost:8001/api/penelitian/menyadur/{$id}");

        return redirect()->back()->with('success', 'Item deleted');
    }

    public function getMenyunting()
    {
        try {
            // Mengambil data Menyunting naskah dari Lumen
            $responseMenyunting = Http::get('http://localhost:8001/api/penelitian/menyunting');
            $Menyunting= $responseMenyunting->json();

            $data = [
                'menyunting' => $Menyunting,
            ];

            // Mengirim data ke view
            return view('App.Rencana.penelitian', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function postMenyunting(Request $request)
    {
        Http::post(
            'http://localhost:8001/api/penelitian/menyunting',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'status_tahapan' => $request->get('status_tahapan'),
                'posisi' => $request->get('posisi'),
            ]
        );

        return redirect()->back()->with('success', 'Penelitian penelitian_kelompok added successfully');
    }

    public function editMenyunting(Request $request)
    {
        Http::post(
            'http://localhost:8001/api/penelitian/edit/menyunting',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'status_tahapan' => $request->get('status_tahapan'),
                'posisi' => $request->get('posisi'),
            ]
        );

        return redirect()->back()->with('success', 'Item updated successfully');
    }

    public function deleteMenyunting($id)
    {
        Http::delete("http://localhost:8001/api/penelitian/menyunting/{$id}");

        return redirect()->back()->with('success', 'Item deleted');
    }

    public function postHakPaten(Request $request){
        Http::post("http://localhost:8001/api/penelitian/hak_paten", 
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'lingkup_wilayah' => $request->get('lingkup_wilayah'),
            ]
        );

        return redirect()->back()->with('success', 'Item stored successfully');
    }

    public function editHakPaten(Request $request)
    {
        Http::post(
            'http://localhost:8001/api/penelitian/edit/hak_paten',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'lingkup_wilayah' => $request->get('lingkup_wilayah'),

            ]
        );

        return redirect()->back()->with('success', 'Item updated successfully');
    }

    public function deleteHakPaten($id)
    {
        Http::delete("http://localhost:8001/api/penelitian/hak_paten/{$id}");

        return redirect()->back()->with('success', 'Item deleted');
    }

    //Media_Massa
    public function postMediaMassa(Request $request){
        Http::post("http://localhost:8001/api/penelitian/media_massa", 
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
            ]
        );

        return redirect()->back()->with('success', 'Item stored successfully');
    }

    public function editMediaMassa(Request $request)
    {
        Http::post(
            'http://localhost:8001/api/penelitian/edit/media_massa',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),

            ]
        );

        return redirect()->back()->with('success', 'Item updated successfully');
    }

    public function deleteMediaMassa($id)
    {
        Http::delete("http://localhost:8001/api/penelitian/media_massa/{$id}");

        return redirect()->back()->with('success', 'Item deleted');
    }
}

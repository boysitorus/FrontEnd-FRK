<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PengabdianController extends Controller
{
    public function getPengabdianPanel(){

        try{
            // Mengambil data a. kegiatan dari lumen


            // Mengambil data b. penyuluhan dari lumen
            $responsePenyuluhan = Http::get('http://localhost:8001/api/pengabdian/penyuluhan');
            $Penyuluhan = $responsePenyuluhan->json();

            // Mengambil data c. konsultan dari lumen
            $responsekonsultan = Http::get('http://localhost:8001/api/pengabdian/konsultan');
            $konsultan = $responsekonsultan->json();

            // Mengambil data d. karya dari lumen
            $responseKarya = Http::get('http://localhost:8001/api/pengabdian/karya');
            $Karya = $responseKarya->json();


            // Menggabungkan data
            $data = [
                //data a

                //data b
                'penyuluhan' => $Penyuluhan,

                //data c
                'konsultan' => $konsultan,
                //data d
                'karya' => $Karya,
            ];

            // Mengirim data ke view
            return view('App.Rencana.pengabdian', $data);
        }catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    // CRUD Tabel B.Penyuluhan // CRUD Tabel B.Penyuluhan // CRUD B.Penyuluhan
    public function getPenyuluhan()
    {
        try {
            // Mengambil data Penyuluhan dari Lumen
            $responsePenyuluhan = Http::get('http://localhost:8001/api/pengabdian/penyuluhan');
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
            'http://localhost:8001/api/pengabdian/penyuluhan',
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
            'http://localhost:8001/api/pengabdian/edit/penyuluhan',
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
        Http::delete("http://localhost:8001/api/pengabdian/penyuluhan/{$id}");

        return redirect()->back()->with('success', 'Item in pengabdian penyuluhan successfully deleted');
    }
    // END CRUD Tabel B.Penyuluhan // END CRUD Tabel B.Penyuluhan

    // CRUD Tabel C.Konsultan // CRUD Tabel C.Konsultan // CRUD Tabel C.Konsultan
    public function getKonsultan()
    {
        try {
            // Mengambil data konsultan dari Lumen
            $responseKonsultan = Http::get('http://localhost:8001/api/pengabdian/konsultan');
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
            'http://localhost:8001/api/pengabdian/konsultan',
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
            'http://localhost:8001/api/pengabdian/edit/konsultan',
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
        Http::delete("http://localhost:8001/api/pengabdian/konsultan/{$id}");

        return redirect()->back()->with('success', 'Item in pengabdian konsultan successfully deleted');
    }
    // END CRUD Tabel C.Konsultan // END CRUD Tabel C.Konsultan // END CRUD Tabel C.Konsultan


    // CRUD Tabel D.Karya // CRUD Tabel D.Karya // CRUD Tabel D.Karya
    public function getKarya()
    {
        try {
            // Mengambil data karya dari Lumen
            $responseKarya = Http::get('http://localhost:8001/api/pengabdian/karya');
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
            'http://localhost:8001/api/pengabdian/karya',
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
            'http://localhost:8001/api/pengabdian/edit/karya',
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
        Http::delete("http://localhost:8001/api/pengabdian/karya/{$id}");

        return redirect()->back()->with('success', 'Item in pengabdian karya successfully deleted');
    }
    // END CRUD Tabel D.Karya // END CRUD Tabel D.Karya // END CRUD Tabel D.Karya
}

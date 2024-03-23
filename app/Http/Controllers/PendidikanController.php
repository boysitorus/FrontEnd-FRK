<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PendidikanController extends Controller
{
    public function getAll()
    {
        try {
            // Mengambil data teori dari Lumen
            $responseTeori = Http::get('http://localhost:9000/api/pendidikan/teori');
            $teori = $responseTeori->json();

            // Mengambil data bimbingan dari Lumen
            $responseBimbingan = Http::get('http://localhost:9000/api/pendidikan/bimbingan');
            $bimbingan = $responseBimbingan->json();

            //Mengambil data seminar dari Lumen
            $responseSeminar = Http::get('http://localhost:9000/api/pendidikan/seminar');
            $seminar = $responseSeminar->json();

            //Mengambil data rendah dari Lumen
            $responseRendah = Http::get('http://localhost:9000/api/pendidikan/rendah');
            $rendah = $responseRendah->json();

            //Mengambil data pengembangan dari Lumen
            $responseKembang = Http::get('http://localhost:9000/api/pendidikan/kembang');
            $kembang = $responseKembang->json();

            // Menggabungkan data teori dan bimbingan
            $data = [
                'teori' => $teori,
                'bimbingan' => $bimbingan,
                'seminar' => $seminar,
                'rendah' => $rendah,
                'kembang' => $kembang
            ];

            // Mengirim data ke view
            return view('App.Rencana.pendidikan', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function postTeori(Request $request)
    {
        Http::post(
            'http://localhost:9000/api/pendidikan/teori',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jumlah_kelas' => $request->get('jumlah_kelas'),
                'jumlah_evaluasi' => $request->get('jumlah_evaluasi'),
                'sks_matakuliah' => $request->get('sks_matakuliah'),
            ]
        );

        return redirect()->back()->with('success', 'Pendidikan teori added successfully');
    }

    public function deleteTeori($id){
        Http::delete("http://localhost:9000/api/pendidikan/teori/{$id}");

        return redirect()->back()->with('success', 'Item deleted');
    }

    public function postBimbingan(Request $request)
    {
        Http::post('http://localhost:9000/api/pendidikan/bimbingan',
        [
            'id_dosen' => $request->get('id_dosen'),
            'nama_kegiatan'=> $request->get('nama_kegiatan'),
            'jumlah_mahasiswa' => $request->get('jumlah_mahasiswa'),
        ]);

        return redirect()->back();
    }

    public function deleteBimbingan($id){
        Http::delete("http://localhost:9000/api/pendidikan/bimbingan/{$id}");

        return redirect()->back();
    }

    public function postSeminar(Request $request)
    {
        Http::post('http://localhost:9000/api/pendidikan/seminar',
        [
            'id_dosen' => $request->get('id_dosen'),
            'nama_kegiatan' => $request->get('nama_kegiatan'),
            'jumlah_kelompok' => $request->get('jumlah_kelompok'),
        ]);

        return redirect()->back();
    }

    public function deleteSeminar($id)
    {
        Http::delete("http://localhost:9000/api/pendidikan/seminar/{$id}");


        return redirect()->back();
    }

    public function postRendah(Request $request)
    {
        Http::post('http://localhost:9000/api/pendidikan/rendah',
        [
            'id_dosen' => $request->get('id_dosen'),
            'nama_kegiatan' => $request->get('nama_kegiatan'),
            'jumlah_dosen' => $request->get('jumlah_dosen'),
        ]);

        return redirect()->back();
    }

    public function deleteRendah($id)
    {
        Http::delete("http://localhost:9000/api/pendidikan/rendah/{$id}");


        return redirect()->back();
    }
    public function postKembang(Request $request)
    {
        Http::post('http://localhost:9000/api/pendidikan/kembang',
        [
            'id_dosen' => $request->get('id_dosen'),
            'nama_kegiatan' => $request->get('nama_kegiatan'),
            'jumlah_sap' => $request->get('jumlah_sap'),
        ]);

        return redirect()->back();
    }

    public function deleteKembang($id)
    {
        Http::delete("http://localhost:9000/api/pendidikan/kembang/{$id}");


        return redirect()->back();
    }
}

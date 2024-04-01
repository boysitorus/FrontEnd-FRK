<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PenunjangController extends Controller
{
    public function getAll()
    {
        try {
            $responseAkademik = Http::get('http://localhost:9000/api/penunjang/akademik');
            $akademik = $responseAkademik->json();

            $responseBimbingan = Http::get('http://localhost:9000/api/penunjang/bimbingan');
            $bimbingan = $responseBimbingan->json();

            $responseUkm = Http::get('http://localhost:9000/api/penunjang/ukm');
            $ukm = $responseUkm->json();

            $responseSosial = Http::get('http://localhost:9000/api/penunjang/sosial');
            $sosial = $responseSosial->json();

            $data = [
                'akademik' => $akademik,
                'bimbingan' => $bimbingan,
                'ukm' => $ukm,
                'sosial' => $sosial,
            ];

            return view('App.Rencana.penunjang', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    // A. Akademik

    public function postAkademik(Request $request)
    {
        Http::post(
            'http://localhost:9000/api/penunjang/akademik',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jumlah_mahasiswa' => $request->get('jumlah_mahasiswa'),
            ]
        );
        return redirect()->back();
    }
    public function editAkademik(Request $request)
    {
        Http::post(
            'http://localhost:9000/api/penunjang/edit/akademik',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jumlah_mahasiswa' => $request->get('jumlah_mahasiswa'),
            ]
        );
        return redirect()->back()->with('success', 'Item updated successfully');
    }
    public function deleteAkademik($id)
    {
        Http::delete("http://localhost:9000/api/penunjang/akademik/{$id}");

        return redirect()->back();
    }

    // B. Bimbingan
    public function postBimbingan(Request $request)
    {
        Http::post(
            'http://localhost:9000/api/penunjang/bimbingan',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jumlah_mahasiswa' => $request->get('jumlah_mahasiswa'),
            ]
        );
        return redirect()->back();
    }
    public function editBimbingan(Request $request)
    {
        Http::post(
            'http://localhost:9000/api/penunjang/edit/bimbingan',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jumlah_mahasiswa' => $request->get('jumlah_mahasiswa'),
            ]
        );
        return redirect()->back()->with('success', 'Item updated successfully');
    }
    public function deleteBimbingan($id)
    {
        Http::delete("http://localhost:9000/api/penunjang/bimbingan/{$id}");

        return redirect()->back();
    }


    // C. Pimpinan Pembinaan Unit kegiatan mahasiswa
    public function postUkm(Request $request)
    {
        Http::post(
            'http://localhost:9000/api/penunjang/ukm',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jumlah_kegiatan' => $request->get('jumlah_kegiatan'),
            ]
        );
        return redirect()->back();
    }

    public function editUkm(Request $request)
    {
        Http::post(
            "http://localhost:9000/api/penunjang/edit/ukm",
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jumlah_kegiatan' => $request->get('jumlah_kegiatan'),
            ]
        );
        return redirect()->back();
    }

    public function deleteUkm($id)
    {
        Http::delete("http://localhost:9000/api/penunjang/ukm/{$id}");

        return redirect()->back();
    }

    //D. Pimpinan organisasi sosial intern sebagai hanya Ketua/Wakil yang dibina Ketua, misal a. Koperasi fakultas, b. Dharma wanita, c. Takmir Masjid/Pastoran

    public function postSosial(Request $request)
    {
        Http::post(
            'http://localhost:9000/api/penunjang/sosial',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
            ]
        );

        return redirect()->back();
    }

    public function editSosial(Request $request)
    {
        Http::post(
            "http://localhost:9000/api/penunjang/edit/sosial",
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
            ]
        );

        return redirect()->back();
    }

    public function deleteSosial($id)
    {
        Http::delete("http://localhost:9000/api/penunjang/sosial/{$id}");

        return redirect()->back();
    }
}

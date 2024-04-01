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

            $responseAsosiasi = Http::get('http://localhost:9000/api/penunjang/asosiasi');
            $asosiasi = $responseAsosiasi->json();

            $responseSeminar = Http::get('http://localhost:9000/api/penunjang/seminar');
            $seminar = $responseSeminar->json();

            $responseReviewer = Http::get('http://localhost:9000/api/penunjang/reviewer');
            $reviewer = $responseReviewer->json();

            $data = [
                'akademik' => $akademik,
                'bimbingan' => $bimbingan,
                'ukm' => $ukm,
                'sosial' => $sosial,
                'asosiasi' => $asosiasi,
                'seminar' => $seminar,
                'reviewer' => $reviewer
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

    // BAGIAN L. Menjadi Pengurus/Anggota Asosiasi Profesi
    public function postAsosiasi(Request $request)
    {
        Http::post(
            'http://localhost:9000/api/penunjang/asosiasi',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jabatan' => $request->get('jabatan'),
            ]
        );
        return redirect()->back();
    }

    public function editAsosiasi(Request $request)
    {
        Http::post(
            "http://localhost:9000/api/penunjang/edit/asosiasi",
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jabatan' => $request->get('jabatan'),
            ]
        );

        return redirect()->back()->with('success', 'Item updated successfully');
    }

    public function deleteAsosiasi($id)
    {
        Http::delete("http://localhost:9000/api/penunjang/asosiasi/{$id}");

        return redirect()->back()->with('success', 'Item deleted successfully');
    }

    // BAGIAN M. Peserta seminar/workshop/kursus berdasar penugasan pimpinan
    public function postSeminar(Request $request)
    {
        Http::post(
            'http://localhost:9000/api/penunjang/seminar',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jenis_tingkatan' => $request->get('jenis_tingkatan'),
            ]
        );
        return redirect()->back()->with('success', 'Item added successfully');
    }

    public function editSeminar(Request $request)
    {
        Http::post(
            "http://localhost:9000/api/penunjang/edit/seminar",
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jenis_tingkatan' => $request->get('jenis_tingkatan'),
            ]
        );

        return redirect()->back()->with('success', 'Item updated successfully');
    }

    public function deleteSeminar($id)
    {
        Http::delete("http://localhost:9000/api/penunjang/seminar/{$id}");

        return redirect()->back()->with('success', 'Item deleted successfully');
    }

    // BAGIAN N. Reviewer jurnal ilmiah , proposal Hibah dll
    public function postReviewer(Request $request)
    {
        Http::post(
            'http://localhost:9000/api/penunjang/reviewer',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
            ]
        );
        return redirect()->back()->with('success', 'Item added successfully');
    }

    public function editReviewer(Request $request)
    {
        Http::post(
            "http://localhost:9000/api/penunjang/edit/reviewer",
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
            ]
        );

        return redirect()->back()->with('success', 'Item updated successfully');
    }

    public function deleteReviewer($id)
    {
        Http::delete("http://localhost:9000/api/penunjang/reviewer/{$id}");

        return redirect()->back()->with('success', 'Item deleted successfully');
    }
}

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

            $responsePraktikum = Http::get('http://localhost:9000/api/pendidikan/praktikum');
            $praktikum = $responsePraktikum->json();

            // Mengambil data bimbingan dari Lumen
            $responseBimbingan = Http::get('http://localhost:9000/api/pendidikan/bimbingan');
            $bimbingan = $responseBimbingan->json();

            //Mengambil data seminar dari Lumen
            $responseSeminar = Http::get('http://localhost:9000/api/pendidikan/seminar');
            $seminar = $responseSeminar->json();

            //Mengambil data rendah dari Lumen
            $responseRendah = Http::get('http://localhost:9000/api/pendidikan/rendah');
            $rendah = $responseRendah->json();

            //Mengambil data kembang dari Lumen
            $responseKembang = Http::get('http://localhost:9000/api/pendidikan/kembang');
            $kembang = $responseKembang->json();

            $responseTugasAkhir = Http::get('http://localhost:9000/api/pendidikan/tugasAkhir');
            $tugasAkhir = $responseTugasAkhir->json();

            //Mengambil data cangkok dari Lumen
            $responseCangkok = Http::get('http://localhost:9000/api/pendidikan/cangkok');
            $cangkok = $responseCangkok->json();

            //Mengambil data koordinator dari Lumen
            $responseKoordinator = Http::get('http://localhost:9000/api/pendidikan/koordinator');
            $koordinator = $responseKoordinator->json();

            //Mengambil data asistensi dari Lumen
            $responseAsistensi = Http::get('http://localhost:9000/api/pendidikan/asistensi');
            $asistensi = $responseAsistensi->json();

            $responseProposal = Http::get('http://localhost:9000/api/pendidikan/proposal');
            $proposal = $responseProposal->json();


            // Menggabungkan data teori dan bimbingan
            $data = [
                'teori' => $teori,
                'bimbingan' => $bimbingan,
                'seminar' => $seminar,
                'praktikum' => $praktikum,
                'rendah' => $rendah,
                'kembang' => $kembang,
                'tugasAkhir' => $tugasAkhir,
                'cangkok' => $cangkok,
                'koordinator' => $koordinator,
                'asistensi' => $asistensi,
                'proposal' => $proposal
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

    public function editTeori(Request $request)
    {
        Http::post(
            'http://localhost:9000/api/pendidikan/edit/teori',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jumlah_kelas' => $request->get('jumlah_kelas'),
                'jumlah_evaluasi' => $request->get('jumlah_evaluasi'),
                'sks_matakuliah' => $request->get('sks_matakuliah'),
            ]
        );

        return redirect()->back()->with('success', 'Item updated successfully');
    }

    public function deleteTeori($id)
    {
        Http::delete("http://localhost:9000/api/pendidikan/teori/{$id}");

        return redirect()->back()->with('success', 'Item deleted');
    }

    // Praktikum

    public function postPraktikum(Request $request)
    {
        Http::post(
            'http://localhost:9000/api/pendidikan/praktikum',
            $request->all()
        );

        return redirect()->back()->with('success', 'Pendidikan praktikum added successfully');
    }

    public function editPraktikum(Request $request)
    {
        Http::post(
            'http://localhost:9000/api/pendidikan/edit/praktikum',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jumlah_kelas' => $request->get('jumlah_kelas'),
                'sks_matakuliah' => $request->get('sks_matakuliah')
            ]
        );

        return redirect()->back()->with('success', 'Item updated successfully');
    }

    public function deletePraktikum($id)
    {
        Http::delete("http://localhost:9000/api/pendidikan/praktikum/{$id}");

        return redirect()->back()->with('success', 'Item deleted');
    }

    // END of Praktikum


    public function postBimbingan(Request $request)
    {
        Http::post(
            'http://localhost:9000/api/pendidikan/bimbingan',
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
            'http://localhost:9000/api/pendidikan/edit/bimbingan',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jumlah_mahasiswa' => $request->get('jumlah_mahasiswa'),
            ]
        );

        return redirect()->back();
    }

    public function deleteBimbingan($id)
    {
        Http::delete("http://localhost:9000/api/pendidikan/bimbingan/{$id}");

        return redirect()->back();
    }

    public function postSeminar(Request $request)
    {
        Http::post(
            'http://localhost:9000/api/pendidikan/seminar',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jumlah_kelompok' => $request->get('jumlah_kelompok'),
            ]
        );

        return redirect()->back();
    }

    public function editSeminar(Request $request)
    {
        Http::post(
            'http://localhost:9000/api/pendidikan/edit/seminar',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jumlah_kelompok' => $request->get('jumlah_kelompok'),
            ]
        );

        return redirect()->back();
    }

    public function deleteSeminar($id)
    {
        Http::delete("http://localhost:9000/api/pendidikan/seminar/{$id}");


        return redirect()->back();
    }

    public function postRendah(Request $request)    
    {
        Http::post(
            'http://localhost:9000/api/pendidikan/rendah',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jumlah_dosen' => $request->get('jumlah_dosen'),
            ]
        );

        return redirect()->back();
    }

    public function editRendah(Request $request)
    {
        Http::post(
            'http://localhost:9000/api/pendidikan/edit/rendah',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jumlah_dosen' => $request->get('jumlah_dosen'),
            ]
        );

        return redirect()->back()->with('success', 'Item updated successfully');
    }

    public function deleteRendah($id)
    {
        Http::delete("http://localhost:9000/api/pendidikan/rendah/{$id}");


        return redirect()->back();
    }
    public function postKembang(Request $request)
    {
        Http::post(
            'http://localhost:9000/api/pendidikan/kembang',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jumlah_sap' => $request->get('jumlah_sap'),
            ]
        );

        return redirect()->back();
    }

    public function editKembang(Request $request)
    {
        Http::post(
            'http://localhost:9000/api/pendidikan/edit/kembang',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jumlah_sap' => $request->get('jumlah_sap'),
            ]
        );

        return redirect()->back()->with('success', 'Item updated successfully');
    }

    public function deleteKembang($id)
    {
        Http::delete("http://localhost:9000/api/pendidikan/kembang/{$id}");


        return redirect()->back();
    }

    public function postCangkok(Request $request)
    {
        Http::post(
            'http://localhost:9000/api/pendidikan/cangkok',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jumlah_dosen' => $request->get('jumlah_dosen'),
            ]
        );

        return redirect()->back();
    }

    public function editCangkok(Request $request){
        $id_rencana = $request->get('id_rencana');
    
        // Pastikan URL API benar dan sesuai dengan konfigurasi server Anda
        $response = Http::post(
            "http://localhost:9000/api/pendidikan/edit/cangkok/{$id_rencana}",
            [
                'id_rencana' => $id_rencana,
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jumlah_dosen' => $request->get('jumlah_dosen'),
            ]
        );
    
        // Cek apakah request berhasil
        if ($response->successful()) {
            return redirect()->back()->with('success', 'Item berhasil diedit');
        } else {
            // Tampilkan pesan error jika gagal
            return redirect()->back()->with('error', 'Failed to update item');
        }
    }
    
    

    public function deleteCangkok($id)
    {
        Http::delete("http://localhost:9000/api/pendidikan/cangkok/{$id}");


        return redirect()->back();
    }

    // KOORDINATOR

    public function postKoordinator(Request $request)
    {
        Http::post(
            'http://localhost:9000/api/pendidikan/koordinator',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan')
            ]
        );

        return redirect()->back();
    }

    public function editKoordinator(Request $request)
    {
        Http::post(
            'http://localhost:9000/api/pendidikan/edit/koordinator',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan')
            ]
        );

        return redirect()->back()->with('success', 'Item updated successfully');
    }

    public function deleteKoordinator($id)
    {
        Http::delete("http://localhost:9000/api/pendidikan/koordinator/{$id}");


        return redirect()->back();
    }

    // ASISTEMSI

    public function postAsistensi(Request $request)
    {
        Http::post('http://localhost:9000/api/pendidikan/asistensi',
        [
            'id_dosen' => $request->get('id_dosen'),
            'nama_kegiatan' => $request->get('nama_kegiatan'),
            'jumlah_dosen' => $request->get('jumlah_dosen'),
            'jumlah_mahasiswa' => $request->get('jumlah_mahasiswa'),
        ]);

        return redirect()->back();
    }

    public function editAsistensi(Request $request){
        $id_rencana = $request->get('id_rencana');

        $response = Http::post(
            'http://localhost:9000/api/pendidikan/edit/asistensi',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jumlah_dosen' => $request->get('jumlah_dosen'),
                'jumlah_mahasiswa' => $request->get('jumlah_mahasiswa'),
            ]
        );

        // Cek apakah request berhasil
        if ($response->successful()) {
            return redirect()->back()->with('success', 'Item berhasil diedit');
        } else {
            // Tampilkan pesan error jika gagal
            return redirect()->back()->with('error', 'Failed to update item');
        }
    }

    public function deleteAsistensi($id)
    {
        Http::delete("http://localhost:9000/api/pendidikan/asistensi/{$id}");


        return redirect()->back();
    }

    public function postTugasAkhir(Request $request)
    {
        Http::post(
            'http://localhost:9000/api/pendidikan/tugasAkhir',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jumlah_mahasiswa' => $request->get('jumlah_mahasiswa'),
            ]
        );

        return redirect()->back()->with('success', 'Pendidikan Tugas Akhir added successfully');
    }

    public function editTugasAkhir(Request $request)
    {
        Http::post(
            'http://localhost:9000/api/pendidikan/edit/tugasAkhir',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jumlah_mahasiswa' => $request->get('jumlah_mahasiswa'),
            ]
        );

        return redirect()->back()->with('success', 'Item updated successfully');
    }

    public function deleteTugasAkhir($id)
    {
        Http::delete("http://localhost:9000/api/pendidikan/tugasAkhir/{$id}");
        return redirect()->back()->with('success', 'Item deleted');
    }

    public function postProposal(Request $request)
    {
        Http::post(
            'http://localhost:9000/api/pendidikan/proposal',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jumlah_mahasiswa' => $request->get('jumlah_mahasiswa'),
            ]
        );

        return redirect()->back()->with('success', 'Pendidikan Tugas Akhir added successfully');
    }

    public function editProposal(Request $request)
    {
        Http::post(
            'http://localhost:9000/api/pendidikan/edit/proposal',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jumlah_mahasiswa' => $request->get('jumlah_mahasiswa'),
            ]
        );

        return redirect()->back()->with('success', 'Item updated successfully');
    }

    public function deleteProposal($id)
    {
        Http::delete("http://localhost:9000/api/pendidikan/proposal/{$id}");
        return redirect()->back()->with('success', 'Item deleted');
    }
}

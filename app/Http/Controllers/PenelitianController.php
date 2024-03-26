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
            $responsePenelitianMandiri = Http::get('http://localhost:8001/api/penelitian/penelitian_mandiri');
            $PenelitianMandiri = $responsePenelitianMandiri->json();
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
            $responsePenelitianTridharma = Http::get('http://localhost:8001/api/penelitian/penelitian_tridharma');
            $PenelitianTridharma = $responsePenelitianTridharma->json();

            //Mengambil data j dari Lumen
            $responseJurnalIlmiah = Http::get('http://localhost:8001/api/penelitian/jurnal_ilmiah');
            $JurnalIlmiah = $responseJurnalIlmiah->json();

            //Mengambil data k dari Lumen

            //Mengambil data l dari Lumen

            //Mengambil data m dari Lumen

            //Mengambil data n dari Lumen


            // Menggabungkan data
            $data = [
                'penelitian_kelompok' => $PenelitianKelompok,
                'penelitian_tridharma' => $PenelitianTridharma,
                'jurnal_ilmiah' => $JurnalIlmiah,
                'penelitian_mandiri' => $PenelitianMandiri,
                'menyadur'=>$Menyadur,
                'menyunting'=>$Menyunting
            ];

            // Mengirim data ke view
            return view('App.Rencana.penelitian', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    // CRUD Tabel A. Penelitian Kelompok
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

        return redirect()->back()->with('success', 'Penelitian kelompok updated successfully');
    }

    public function deletePenelitianKelompok($id)
    {
        Http::delete("http://localhost:8001/api/penelitian/penelitian_kelompok/{$id}");

        return redirect()->back()->with('success', 'Item deleted');
    }

    //END CRUD TABEL A. PENELITIAN KELOMPOK

    // CRUD Tabel B. PENELITIAN MANDIRI

    public function getPenelitianMandiri()
    {
        try {
            // Mengambil data penelitian mandiri dari Lumen
            $responsePenelitianMandiri = Http::get('http://localhost:8001/api/penelitian/penelitian_mandiri');
            $PenelitianMandiri = $responsePenelitianMandiri->json();

            $data = [
                'penelitian_mandiri' => $PenelitianMandiri,
            ];

            // Mengirim data ke view
            return view('App.Rencana.penelitian', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function postPenelitianMandiri(Request $request)
    {
        Http::post(
            'http://localhost:8001/api/penelitian/penelitian_mandiri',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'status_tahapan' => $request->get('status_tahapan')
            ]
        );

        return redirect()->back()->with('success', 'Penelitian penelitian_kelompok added successfully');
    }

    public function editPenelitianMandiri(Request $request)
    {
        Http::post(
            'http://localhost:8001/api/penelitian/edit/penelitian_mandiri',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'status_tahapan' => $request->get('status_tahapan')
            ]
        );

        return redirect()->back()->with('success', 'Penelitian kelompok updated successfully');
    }

    public function deletePenelitianMandiri($id)
    {
        Http::delete("http://localhost:8001/api/penelitian/penelitian_mandiri/{$id}");

        return redirect()->back()->with('success', 'Item deleted');
    }


    //END CRUD TABEL B. PENELITIAN MANDIRI


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

    // untuk bagian I
    public function getPenelitianTridharma(){
        try{
            //Mengambil data i dari Lumen
            $responsePenelitianTridharma = Http::get('http://localhost:8001/api/penelitian/penelitian_tridharma');
            $PenelitianTridharma = $responsePenelitianTridharma->json();

            $data = [
                'penelitian_tridharma' => $PenelitianTridharma,
            ];

            // Mengirim data ke view
            return view('App.Rencana.penelitian', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function postPenelitianTridharma(Request $request){
        Http::post(
            'http://localhost:8001/api/penelitian/penelitian_tridharma',
            [
                'id_tridharma' => $request->get('id_tridharma'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'bkd_evaluasi' => $request->get('bkd_evaluasi'),
            ]
        );

        return redirect()->back()->with('succes', 'Penelitian penelitian_tridharma added successfully');
    }

    public function editPenelitianTridharma(Request $request){
        Http::post(
            'http://localhost:8001/api/penelitian/penelitian_tridharma',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'bkd_evaluasi' => $request->get('bkd_evaluasi'),
            ]
        );

        return redirect()->back()->with('success', 'Item updated succesfully');
    }

    public function deletePenelitianTidharma($id){
        Http::delete("http://localhost:8001/api/penelitian/penelitian_tridharma/{$id}");

        return redirect()->back()->with('success', 'Item deleted');
    }

    // Bagian J
    public function getJurnalIlmiah(){
         try{
            //Mengambil data j dari Lumen
         $responseJurnalIlmiah = Http::get('http://localhost:8001/api/penelitian/jurnal_ilmiah');
         $JurnalIlmiah = $responseJurnalIlmiah->json();

            $data = [
                'jurnal_ilmiah' => $JurnalIlmiah,
            ];

            // Mengirim data ke view
            return view('App.Rencana.penelitian', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function postJurnalIlmiah(Request $request){
        Http::post(
            'http://localhost:8001/api/penelitian/jurnal_ilmiah',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'lingkup_penerbit'=> $request->get('lingkup_penerbit'),
                'jenis_pengerjaan' => $request->get('jenis_pengerjaan'),
                'peran'  => $request->get('peran'),

            ]
        );

        return redirect()->back()->with('succes', 'Penelitian jurnal_ilmiah added successfully');
    }

    public function editJurnalIlmiah(Request $request)
    {
        Http::post(
            'http://localhost:8001/api/penelitian/edit/jurnal_ilmiah',
            [
                'id_jurnal' => $request->get('id_jurnal'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'lingkup_peberbit'=> $request->get('lingkup_penerbit'),
                'jenis_pengerjaan' => $request->get('jenis_pengerjaan'),
                'peran'  => $request->get('peran'),
            ]
        );

        return redirect()->back()->with('success', 'Item updated successfully');
    }

    public function deleteJurnalIlmiah($id){
        Http::delete("http://localhost:8001/api/penelitian/jurnal_ilmiah/{$id}");

        return redirect()->back()->with('success', 'Item deleted');
    }

}

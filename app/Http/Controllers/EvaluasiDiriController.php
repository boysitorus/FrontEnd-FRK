<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utils\Tools;

use Illuminate\Support\Facades\Http;

class EvaluasiDiriController extends Controller
{
    public function getPendidikanPanel(){
        return view('App.Evaluasi.pendidikan');
    }

    public function getPenunjangPanel(){
        return view('App.Evaluasi.penunjang');
    }

    public function getPengabdianPanel(){
        return view('App.Evaluasi.pengabdian');
    }

    public function getPenelitianPanel(Request $request)
    {

        $auth = Tools::getAuth($request);
        $id_dosen = json_decode(json_encode($auth->user->data_lengkap->pegawai),true)['user_id'];
        try {
            // Mengambil data a. penelitian kelompok dari Lumen
            $responsePenelitianKelompok = Http::get(env('API_FRK_SERVICE') . '/penelitian/penelitian_kelompok/' . $id_dosen);
            $PenelitianKelompok = $responsePenelitianKelompok->json();

            // Mengambil data b. penelitian mandiri dari Lumen
            $responsePenelitianMandiri = Http::get(env('API_FRK_SERVICE') . '/penelitian/penelitian_mandiri/' . $id_dosen);
            $PenelitianMandiri = $responsePenelitianMandiri->json();

            // Mengambil data c. buku terbit dari Lumen
            $responseBukuTerbit = Http::get(env('API_FRK_SERVICE') . '/penelitian/buku_terbit/' . $id_dosen);
            $BukuTerbit = $responseBukuTerbit->json();

            //Mengambil data d. buku internasional dari Lumen
            $responseBukuInternasional = Http::get(env('API_FRK_SERVICE') . '/penelitian/buku_internasional/' . $id_dosen);
            $BukuInternasional = $responseBukuInternasional->json();

            //Mengambil data e. menydur dari Lumen
            $responseMenyadur = Http::get(env('API_FRK_SERVICE') . '/penelitian/menyadur/' . $id_dosen);
            $Menyadur = $responseMenyadur->json();

            //Mengambil data f. menyunting dari Lumen
            $responseMenyunting = Http::get(env('API_FRK_SERVICE') . '/penelitian/menyunting/' . $id_dosen);
            $Menyunting = $responseMenyunting->json();

            //Mengambil data g. penelitian dari Lumen
            $responsePenelitianModul = Http::get(env('API_FRK_SERVICE') . '/penelitian/penelitian_modul/' . $id_dosen);
            $PenelitianModul = $responsePenelitianModul->json();

            //Mengambil data h. pekerti dari Lumen
            $responsePenelitianPekerti = Http::get(env('API_FRK_SERVICE') . '/penelitian/penelitian_pekerti/' . $id_dosen);
            $PenelitianPekerti = $responsePenelitianPekerti->json();

            //Mengambil data i. tridharma dari Lumen
            $responsePenelitianTridharma = Http::get(env('API_FRK_SERVICE') . '/penelitian/penelitian_tridharma/' . $id_dosen);
            $PenelitianTridharma = $responsePenelitianTridharma->json();

            //Mengambil data j. jurnal ilmiah dari Lumen
            $responseJurnalIlmiah = Http::get(env('API_FRK_SERVICE') . '/penelitian/jurnal_ilmiah/' . $id_dosen);
            $JurnalIlmiah = $responseJurnalIlmiah->json();

            //Mengambil data k. hak paten dari Lumen
            $responseHakPaten = Http::get(env('API_FRK_SERVICE') . '/penelitian/hak_paten/' . $id_dosen);
            $HakPaten = $responseHakPaten->json();

            //Mengambil data l. media massa dari Lumen
            $responseMediaMassa = Http::get(env('API_FRK_SERVICE') . '/penelitian/media_massa/' . $id_dosen);
            $MediaMassa = $responseMediaMassa->json();

            //Mengambil data m. pembicara seminar dari Lumen
            $responsePembicaraSeminar = Http::get(env('API_FRK_SERVICE') . '/penelitian/pembicara_seminar/' . $id_dosen);
            $PembicaraSeminar = $responsePembicaraSeminar->json();

            //Mengambil data n. penyajian makalah  dari Lumen
            $responsePenyajianMakalah = Http::get(env('API_FRK_SERVICE') . '/penelitian/penyajian_makalah/' . $id_dosen);
            $PenyajianMakalah = $responsePenyajianMakalah->json();


            // Menggabungkan data
            $data = [
                'penelitian_kelompok' => $PenelitianKelompok,
                'penelitian_mandiri' => $PenelitianMandiri,
                'buku_terbit' => $BukuTerbit,
                'buku_internasional' => $BukuInternasional,
                'menyadur'=>$Menyadur,
                'menyunting'=>$Menyunting,
                'penelitian_modul' => $PenelitianModul,
                'penelitian_pekerti' => $PenelitianPekerti,
                'penelitian_tridharma' => $PenelitianTridharma,
                'jurnal_ilmiah' => $JurnalIlmiah,
                'pembicara_seminar'=>$PembicaraSeminar,
                'penyajian_makalah'=>$PenyajianMakalah,
                'hak_paten'=>$HakPaten,
                'media_massa'=>$MediaMassa,
                'auth' => $auth,
                'id_dosen' => $id_dosen
            ];

            // Mengirim data ke view
            return view('App.Evaluasi.penelitian', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function postBukuInternasional(Request $request)
{
    try {
        $files = $request->file('fileInputD');
        $id_rencana = $request->input('id_rencana');
        
        // Create a new Guzzle HTTP client instance
        $client = new \GuzzleHttp\Client();

        // Prepare the form data
        $formData = [
            'id_rencana' => $id_rencana,
        ];

        // Prepare the files to be attached
        foreach ($files as $file) {
            $formData['files[]'] = fopen($file->getRealPath(), 'r');
        }

        // Send the HTTP request with the form data and files attached
        $response = $client->request('POST', env('API_FED_SERVICE') . '/penelitian/buku-internasional', [
            'multipart' => $formData,
        ]);

        // Check the response status code and handle it accordingly
        if ($response->getStatusCode() == 200) {
            return redirect()->back()->with('success', 'Penelitian buku_internasional added successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to add penelitian buku_internasional');
        }
    } catch (\Exception $e) {
        // Handle the exception, log it, or return an error response
        return redirect()->back()->with('error', 'An error occurred while adding penelitian buku_internasional');
    }
}

public function postPembicaraSeminar(Request $request)
{
    try {
        $files = $request->file('fileInputM');
        $id_rencana = $request->input('id_rencana');
        
        // Create a new Guzzle HTTP client instance
        $client = new \GuzzleHttp\Client();

        // Prepare the form data
        $formData = [
            'id_rencana' => $id_rencana,
        ];

        // Prepare the files to be attached
        foreach ($files as $file) {
            $formData['files[]'] = fopen($file->getRealPath(), 'r');
        }

        // Send the HTTP request with the form data and files attached
        $response = $client->request('POST', env('API_FED_SERVICE') . '/penelitian/pembicara-seminar', [
            'multipart' => $formData,
        ]);

        // Check the response status code and handle it accordingly
        if ($response->getStatusCode() == 200) {
            return redirect()->back()->with('success', 'Penelitian pembicara_seminar added successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to add penelitian pembicara_seminar');
        }
    } catch (\Exception $e) {
        // Handle the exception, log it, or return an error response
        return redirect()->back()->with('error', 'An error occurred while adding penelitian pembicara_seminar');
    }
}

    public function getSimpulanPanel(){
        return view('App.Evaluasi.FEDsimpulan');
    }

    public function getPendidikanSimpulanPanel(){
        return view('App.Evaluasi.simpulanPendidikan');
    }
    public function getPenelitianSimpulanPanel(){
        return view('App.Evaluasi.simpulanPenelitian');
    }
    public function getPengabdianSimpulanPanel(){
        return view('App.Evaluasi.simpulanPengabdian');
    }
    public function getPenunjangSimpulanPanel(){
        return view('App.Evaluasi.simpulanPenunjang');
    }
}
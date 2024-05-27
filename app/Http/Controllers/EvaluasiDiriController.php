<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utils\Tools;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class EvaluasiDiriController extends Controller
{
    public function getPendidikanPanel()
    {
        return view('App.Evaluasi.pendidikan');
    }

    public function getPenunjangPanel()
    {
        return view('App.Evaluasi.penunjang');
    }

    public function getPengabdianPanel(Request $request)
    {
        $auth = Tools::getAuth($request);
        $id_dosen = json_decode(json_encode($auth->user->data_lengkap->pegawai), true)['user_id'];
        try {
            // Mengambil data a. kegiatan dari lumen
            $responsKegiatan = Http::get(env('API_FRK_SERVICE') . '/pengabdian/kegiatan/' . $id_dosen);
            $Kegiatan = $responsKegiatan->json();

            // Mengambil data b. penyuluhan dari lumen
            $responsePenyuluhan = Http::get(env('API_FRK_SERVICE') . '/pengabdian/penyuluhan/' . $id_dosen);
            $Penyuluhan = $responsePenyuluhan->json();

            // Mengambil data c. konsultan dari lumen
            $responsekonsultan = Http::get(env('API_FRK_SERVICE') . '/pengabdian/konsultan/' . $id_dosen);
            $konsultan = $responsekonsultan->json();

            // Mengambil data d. karya dari lumen
            $responseKarya = Http::get(env('API_FRK_SERVICE') . '/pengabdian/karya/' . $id_dosen);
            $Karya = $responseKarya->json();


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
                'id_dosen' => $id_dosen
            ];

            // Mengirim data ke view
            return view('App.Evaluasi.pengabdian', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function getPenelitianPanel(Request $request)
    {

        $auth = Tools::getAuth($request);
        $id_dosen = json_decode(json_encode($auth->user->data_lengkap->pegawai), true)['user_id'];
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
                'menyadur' => $Menyadur,
                'menyunting' => $Menyunting,
                'penelitian_modul' => $PenelitianModul,
                'penelitian_pekerti' => $PenelitianPekerti,
                'penelitian_tridharma' => $PenelitianTridharma,
                'jurnal_ilmiah' => $JurnalIlmiah,
                'pembicara_seminar' => $PembicaraSeminar,
                'penyajian_makalah' => $PenyajianMakalah,
                'hak_paten' => $HakPaten,
                'media_massa' => $MediaMassa,
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

    //HANDLER UPLOAD LAMPIRAN
    public function postLampiran(Request $request)
    {
        $id_rencana = $request->get("id_rencana");
        $jenis_penelitian = $request->get("jenis_penelitian");
        $filePaths = [];
        $url = env('API_FED_SERVICE') . '/penelitian/upload-lampiran';

        if ($request->hasFile('fileInput')) {
            $files = $request->file('fileInput');
            foreach ($files as $file) {
                if ($file->isValid()) {
                    $extension = $file->getClientOriginalExtension();
                    $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . "_" . $id_rencana . "." . $extension;
                    $file->move(app()->basePath('storage/documents/'), $filename);
                    $filePaths[] = 'documents/' . $filename;
                } else {
                    return redirect()->back()->with('Error', 'error 0');
                }
            }
            //kirim kan file ke api
            $http = Http::asMultipart();
            foreach ($filePaths as $filePath) {
                if (file_exists(storage_path($filePath))) {
                    $fileName = basename($filePath);
                    $fileContent = file_get_contents(storage_path($filePath));
                    $http->attach('fileInput[]', $fileContent, $fileName);
                } else {
                    return response()->json(['error' => "File not found: $filePath"], 404);
                }
            }

            $response = $http->post($url, [
                'id_rencana' => $id_rencana,
                'jenis_penelitian' => $jenis_penelitian
            ]);

            if ($response->successful()) {
                foreach ($filePaths as $filePath) {
                    if (file_exists(storage_path($filePath))) {
                        unlink(storage_path($filePath));
                    }
                }
                return redirect()->back()->with('message', 'Berhasil mengupload lampiran');
            } else {
                return response()->json(['error' => $response->body()], 404);
            }
        } else {
            return redirect()->back()->with('error', 'No file selected');
        }
    }

    public function deleteLampiranPenelitian(Request $request)
    {
        $id_rencana = $request->get("id_rencana");
        $fileName = $request->get("fileName");

        $result = Http::delete(
            env('API_FED_SERVICE') . '/penelitian/lampiran/' . $id_rencana . "/delete/" . $fileName,
        );

        if ($result->successful()) {
            return redirect()->back()->with('message', 'Berhasil menghapus lampiran');
        } else {
            return redirect()->back()->with('error', 'Gagal Menghapus File');
        }
    }

    public function postLampiranPengabdian(Request $request)
    {
        $id_rencana = $request->get("id_rencana");
        $jenis_pengabdian = $request->get("jenis_pengabdian");
        $filePaths = [];
        $url = env('API_FED_SERVICE') . '/pengabdian/upload-lampiran';

        if ($request->hasFile('fileInput')) {
            $files = $request->file('fileInput');
            foreach ($files as $file) {
                if ($file->isValid()) {
                    $extension = $file->getClientOriginalExtension();
                    $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . "_" . $id_rencana . "." . $extension;
                    $file->move(app()->basePath('storage/documents/'), $filename);
                    $filePaths[] = 'documents/' . $filename;
                } else {
                    return redirect()->back()->with('Error', 'error 0');
                }
            }
            //kirim kan file ke api
            $http = Http::asMultipart();
            foreach ($filePaths as $filePath) {
                if (file_exists(storage_path($filePath))) {
                    $fileName = basename($filePath);
                    $fileContent = file_get_contents(storage_path($filePath));
                    $http->attach('fileInput[]', $fileContent, $fileName);
                } else {
                    return response()->json(['error' => "File not found: $filePath"], 404);
                }
            }

            $response = $http->post($url, [
                'id_rencana' => $id_rencana,
                'jenis_pengabdian' => $jenis_pengabdian
            ]);

            if ($response->successful()) {
                foreach ($filePaths as $filePath) {
                    if (file_exists(storage_path($filePath))) {
                        unlink(storage_path($filePath));
                    }
                }
                return redirect()->back()->with('message', 'Berhasil mengupload lampiran');
            } else {
                return response()->json(['error' => $response->body()], 404);
            }
        } else {
            return redirect()->back()->with('error', 'No file selected');
        }
    }

    public function deleteLampiranPengabdian(Request $request)
    {
        $id_rencana = $request->get("id_rencana");
        $fileName = $request->get("fileName");

        $result = Http::delete(
            env('API_FED_SERVICE') . '/pengabdian/lampiran/' . $id_rencana . "/delete/" . $fileName,
        );

        if ($result->successful()) {
            return redirect()->back()->with('message', 'Berhasil menghapus lampiran');
        } else {
            return redirect()->back()->with('error', 'Gagal Menghapus File');
        }
    }
    //END OF HANDLER UPLOAD LAMPIRAN

    public function getSimpulanPanel(Request $request)
    {
        $auth = Tools::getAuth($request);
        $id_dosen = json_decode(json_encode($auth->user->data_lengkap->pegawai), true)['user_id'];
        try {
            $dataSks = Http::get(env("API_FED_SERVICE") . '/simpulan/' . $id_dosen);

            $totalSksPendidikan = $dataSks["sks_pendidikan"];
            $totalSksPenelitian = $dataSks["sks_penelitian"];
            $totalSksPengabdian = $dataSks["sks_pengabdian"];
            $totalSksPenunjang = $dataSks["sks_penunjang"];
            $totalSks = $dataSks["sks_total"];

            return view(
                'App.Evaluasi.FEDsimpulan',
                [
                    'pendidikanSks' => $totalSksPendidikan,
                    'penelitianSks' => $totalSksPenelitian,
                    'pengabdianSks' => $totalSksPengabdian,
                    'penunjangSks' => $totalSksPenunjang,
                    'totalSks' => $totalSks,
                    'auth' => $auth,
                    'id_dosen' => $id_dosen
                ]
            );
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    //Download PDF
    public function generatePdf(Request $request)
    {
        $auth = Tools::getAuth($request);
        $id_dosen = json_decode(json_encode($auth->user->data_lengkap->pegawai), true)['user_id'];
        try {
            // $dataSks = Http::get(env("API_FRK_SERVICE") . '/simpulan/' . $id_dosen);

            // $totalSksPendidikan = $dataSks["sks_pendidikan"];
            // $totalSksPenelitian = $dataSks["sks_penelitian"];
            // $totalSksPengabdian = $dataSks["sks_pengabdian"];
            // $totalSksPenunjang = $dataSks["sks_penunjang"];
            // $totalSks = $dataSks["sks_total"];

            $data = [
                // 'pendidikanSks' => $totalSksPendidikan,
                // 'penelitianSks' => $totalSksPenelitian,
                // 'pengabdianSks' => $totalSksPengabdian,
                // 'penunjangSks' => $totalSksPenunjang,
                // 'totalSks' => $totalSks,
            ];

            $pdf = Pdf::loadView('App.Evaluasi.PDFSimpulanFED', $data);
            return $pdf->download('Simpulan-Evaluasi-Diri.pdf');
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Failed to generate PDF'], 500);
        }
    }
}

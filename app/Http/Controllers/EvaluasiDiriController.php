<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utils\Tools;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

class EvaluasiDiriController extends Controller
{
    public function getPendidikanPanel(Request $request){
        $auth = Tools::getAuth($request);
        $id_dosen = json_decode(json_encode($auth->user->data_lengkap->pegawai),true)['user_id'];
        $getTanggal = json_decode(json_encode(Tools::getPeriod($auth->user->token, "FED")), true)['data'];
        try {
            // Mengambil data teori dari Lumen
            $responseTeori = Http::get(env('API_FED_SERVICE') . '/pendidikan/teori/' . $id_dosen);
            $teori = $responseTeori->json();

            $responsePraktikum = Http::get(env('API_FED_SERVICE') . '/pendidikan/praktikum/' . $id_dosen);
            $praktikum = $responsePraktikum->json();

            // Mengambil data bimbingan dari Lumen
            $responseBimbingan = Http::get(env('API_FED_SERVICE') . '/pendidikan/bimbingan/' . $id_dosen);
            $bimbingan = $responseBimbingan->json();

            //Mengambil data seminar dari Lumen
            $responseSeminar = Http::get(env('API_FED_SERVICE') . '/pendidikan/seminar/' . $id_dosen);
            $seminar = $responseSeminar->json();

            //Mengambil data rendah dari Lumen
            $responseRendah = Http::get(env('API_FED_SERVICE') . '/pendidikan/rendah/' . $id_dosen);
            $rendah = $responseRendah->json();

            //Mengambil data kembang dari Lumen
            $responseKembang = Http::get(env('API_FED_SERVICE') . '/pendidikan/kembang/' . $id_dosen);
            $kembang = $responseKembang->json();

            $responseTugasAkhir = Http::get(env('API_FED_SERVICE') . '/pendidikan/tugasAkhir/' . $id_dosen);
            $tugasAkhir = $responseTugasAkhir->json();

            //Mengambil data cangkok dari Lumen
            $responseCangkok = Http::get(env('API_FED_SERVICE') . '/pendidikan/cangkok/' . $id_dosen);
            $cangkok = $responseCangkok->json();

            //Mengambil data koordinator dari Lumen
            $responseKoordinator = Http::get(env('API_FED_SERVICE') . '/pendidikan/koordinator/' . $id_dosen);
            $koordinator = $responseKoordinator->json();

            $responseProposal = Http::get(env('API_FED_SERVICE') . '/pendidikan/proposal/' . $id_dosen);
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
                'proposal' => $proposal,
                'auth' => $auth,
                'id_dosen' => $id_dosen,
                'periode' => $getTanggal
            ];

            // Mengirim data ke view
            return view('App.Evaluasi.pendidikan', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API',], 500);
        }
    }

    public function getPenunjangPanel(Request $request)
    {
        $auth = Tools::getAuth($request);
        $id_dosen = json_decode(json_encode($auth->user->data_lengkap->pegawai),true)['user_id'];
        $getTanggal = json_decode(json_encode(Tools::getPeriod($auth->user->token, "FED")), true)['data'];
        try {
            $responseAkademik = Http::get(env('API_FED_SERVICE') . '/penunjang/akademik/' . $id_dosen);
            $akademik = $responseAkademik->json();

            $responseBimbingan = Http::get(env('API_FED_SERVICE') . '/penunjang/bimbingan/' . $id_dosen);
            $bimbingan = $responseBimbingan->json();

            $responseUkm = Http::get(env('API_FED_SERVICE') . '/penunjang/ukm/' . $id_dosen);
            $ukm = $responseUkm->json();

            $responseSosial = Http::get(env('API_FED_SERVICE') . '/penunjang/sosial/' . $id_dosen);
            $sosial = $responseSosial->json();

            $responseSturuktural = Http::get(env('API_FED_SERVICE') . '/penunjang/struktural/' . $id_dosen);
            $struktural = $responseSturuktural->json();

            $responsenonSturuktural = Http::get(env('API_FED_SERVICE') . '/penunjang/nonstruktural/' . $id_dosen);
            $nonstruktural = $responsenonSturuktural->json();

            $responseRedaksi = Http::get(env('API_FED_SERVICE') . '/penunjang/redaksi/' . $id_dosen);
            $redaksi = $responseRedaksi->json();

            $responseAdhoc = Http::get(env('API_FED_SERVICE') . '/penunjang/adhoc/' . $id_dosen);
            $adhoc = $responseAdhoc->json();

            $responseAsosiasi = Http::get(env('API_FED_SERVICE') . '/penunjang/asosiasi/' . $id_dosen);
            $asosiasi = $responseAsosiasi->json();

            $responseSeminar = Http::get(env('API_FED_SERVICE') . '/penunjang/seminar/' . $id_dosen);
            $seminar = $responseSeminar->json();

            $responseReviewer = Http::get(env('API_FED_SERVICE') . '/penunjang/reviewer/' . $id_dosen);
            $reviewer = $responseReviewer->json();

            $responseKetuaPanitia = Http::get(env('API_FED_SERVICE') . '/penunjang/ketuapanitia/' . $id_dosen);
            $ketuapanitia = $responseKetuaPanitia->json();

            $responseAnggotaPanitia = Http::get(env('API_FED_SERVICE') . '/penunjang/anggotapanitia/' . $id_dosen);
            $anggotapanitia = $responseAnggotaPanitia->json();

            $responsePengurusYayasan = Http::get(env('API_FED_SERVICE') . '/penunjang/pengurusyayasan/' . $id_dosen);
            $pengurusyayasan = $responsePengurusYayasan->json();

            $data = [
                'akademik' => $akademik,
                'bimbingan' => $bimbingan,
                'ukm' => $ukm,
                'sosial' => $sosial,
                'struktural' => $struktural,
                'nonstruktural' => $nonstruktural,
                'redaksi' => $redaksi,
                'adhoc' => $adhoc,
                'asosiasi' => $asosiasi,
                'seminar' => $seminar,
                'reviewer' => $reviewer,
                'ketuapanitia' => $ketuapanitia,
                'anggotapanitia' => $anggotapanitia,
                'pengurusyayasan' => $pengurusyayasan,
                'auth' => $auth,
                'id_dosen' => $id_dosen,
                'periode' => $getTanggal
            ];

            return view('App.Evaluasi.penunjang', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function getPengabdianPanel(Request $request)
    {
        $auth = Tools::getAuth($request);
        $id_dosen = json_decode(json_encode($auth->user->data_lengkap->pegawai), true)['user_id'];
        $getTanggal = json_decode(json_encode(Tools::getPeriod($auth->user->token, "FED")), true)['data'];
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
                'id_dosen' => $id_dosen,
                'periode' => $getTanggal
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
        $getTanggal = json_decode(json_encode(Tools::getPeriod($auth->user->token, "FED")), true)['data'];
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
                'id_dosen' => $id_dosen,
                'periode' => $getTanggal
            ];

            // Mengirim data ke view
            return view('App.Evaluasi.penelitian', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    //HANDLER UPLOAD LAMPIRAN PENELITIAN
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

    //HANDLER UPLOAD LAMPIRAN PENGABDIAN
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

    // HANDLE UPLOAD LAMPIRAN PENDIDIKAN
    public function postPendidikan(Request $request){
        $id_rencana = $request->get("id_rencana");
        $jenis_pendidikan = $request->get("jenis_pendidikan");
        $filePaths = [];
        $url = env('API_FED_SERVICE') . '/pendidikan/upload-lampiran';

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
                'jenis_pendidikan' => $jenis_pendidikan
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

    public function deletePendidikan(Request $request){
        $id_rencana = $request->get("id_rencana");
        $fileName = $request->get("fileName");

        $result = Http::delete(
            env('API_FED_SERVICE') . '/pendidikan/lampiran/' . $id_rencana . "/delete/" . $fileName,
        );

        if($result->successful()){
            return redirect()->back()->with('message', 'Berhasil menghapus lampiran');
        } else {
            return redirect()->back()->with('error', 'Gagal Menghapus File');
        }
    }
    //END OF HANDLER UPLOAD LAMPIRAN

    //HANDLER UPLOAD PENUNJANG
    public function postPenunjang(Request $request){
        $id_rencana = $request->get("id_rencana");
        $jenis_penunjang = $request->get("jenis_penunjang");
        $filePaths = [];
        $url = env('API_FED_SERVICE') . '/penunjang/upload-lampiran';

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
                'jenis_penunjang' => $jenis_penunjang
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

    public function deletePenunjang(Request $request){
        $id_rencana = $request->get("id_rencana");
        $fileName = $request->get("fileName");

        $result = Http::delete(
            env('API_FED_SERVICE') . '/penunjang/lampiran/' . $id_rencana . "/delete/" . $fileName,
        );

        if($result->successful()){
            return redirect()->back()->with('message', 'Berhasil menghapus lampiran');
        } else {
            return redirect()->back()->with('error', 'Gagal Menghapus File');
        }
    }

    public function getSimpulanPanel(Request $request)
    {
        $auth = Tools::getAuth($request);
        $id_dosen = json_decode(json_encode($auth->user->data_lengkap->pegawai), true)['user_id'];
        $nidn_dosen = json_decode(json_encode($auth->user->data_lengkap->dosen), true)['nidn'];
        $nama_dosen = json_decode(json_encode($auth->user->data_lengkap->dosen), true)['nama'];
        $role_dosen = json_decode(json_encode($auth->user->data_lengkap->pegawai), true)['posisi '] . " Program Studi " . $auth->user->data_lengkap->dosen->prodi;
        try {
            $dataSks = Http::get(env('API_FED_SERVICE') . '/simpulan/' . $id_dosen);

            $totalSksPendidikan = $dataSks["sks_pendidikan"];
            $totalSksPenelitian = $dataSks["sks_penelitian"];
            $totalSksPengabdian = $dataSks["sks_pengabdian"];
            $totalSksPenunjang = $dataSks["sks_penunjang"];
            $totalSks = $dataSks["sks_total"];

            return view(
                'App.Evaluasi.FEDsimpulan',
                [
                    'nidn_dosen' => $nidn_dosen,
                    'nama_dosen' => $nama_dosen,
                    'role_dosen' => $role_dosen,
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
        $nidn_dosen = json_decode(json_encode($auth->user->data_lengkap->dosen), true)['nidn'];
        $nama_dosen = json_decode(json_encode($auth->user->data_lengkap->dosen), true)['nama'];
        $role_dosen = json_decode(json_encode($auth->user->data_lengkap->pegawai), true)['posisi '] . " Program Studi " . $auth->user->data_lengkap->dosen->prodi;
        try {
            $dataSks = Http::get(env("API_FED_SERVICE") . '/simpulan/' . $id_dosen);

            $totalSksPendidikan = $dataSks["sks_pendidikan"];
            $totalSksPenelitian = $dataSks["sks_penelitian"];
            $totalSksPengabdian = $dataSks["sks_pengabdian"];
            $totalSksPenunjang = $dataSks["sks_penunjang"];
            $totalSks = $dataSks["sks_total"];

            $data = [
                'nidn_dosen' => $nidn_dosen,
                'nama_dosen' => $nama_dosen,
                'role_dosen' => $role_dosen,
                'pendidikanSks' => $totalSksPendidikan,
                'penelitianSks' => $totalSksPenelitian,
                'pengabdianSks' => $totalSksPengabdian,
                'penunjangSks' => $totalSksPenunjang,
                'totalSks' => $totalSks,
            ];

            $pdf = Pdf::loadView('App.Evaluasi.pdf', $data);
            return $pdf->download('Simpulan-Evaluasi-Diri.pdf');
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Failed to generate PDF'], 500);
        }
    }

    public function simpanEvaluasi(Request $request)
    {
        $id_dosen = $request->get('id_dosen');
        try {
            $response = Http::post(env('API_FED_SERVICE') . '/simpulan/simpan-rencana/' . $id_dosen);
            if ($response->status() === 200) {
                return back()->with('message', $response["message"]);
            } else {
                throw new RequestException($response);
            }
        } catch (RequestException $e) {
            $message = $response['message'];
            return back()->with('error', $message);
        }
    }
}

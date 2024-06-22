<?php

namespace App\Http\Controllers;

use App\Utils\Tools;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class PenelitianController extends Controller
{
    //
    public function getPenelitianPanel(Request $request)
    {

        $auth = Tools::getAuth($request);
        $id_dosen = json_decode(json_encode($auth->user->data_lengkap->pegawai), true)['user_id'];
        $getTanggal = json_decode(json_encode(Tools::getPeriod($auth->user->token, "FRK")), true)['data'];
        try {
            $responseAll = Http::get(env('API_FRK_SERVICE') . '/pendidikan/all/' . $id_dosen);
            $all = $responseAll->json();

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
                'all' => $all,
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
            return view('App.Rencana.penelitian', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    // CRUD Tabel A. PENELITIAN KELOMPOK // CRUD Tabel A. PENELITIAN KELOMPOK
    public function getPenelitianKelompok()
    {
        try {
            // Mengambil data penelitian kelompok dari Lumen
            $responsePenelitianKelompok = Http::get(env('API_FRK_SERVICE') . '/penelitian/penelitian_kelompok');
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
        $token = Tools::getToken($request);
        $id_frk = Tools::getPeriod($token, "FRK");
        $id_fed = Tools::getPeriod($token, "FED");
        Http::post(
            env('API_FRK_SERVICE') . '/penelitian/penelitian_kelompok',
            [
                'id_frk' => $id_frk['data']['id'],
                'id_fed' => $id_fed['data']['id'],
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
            env('API_FRK_SERVICE') . '/penelitian/edit/penelitian_kelompok',
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
        Http::delete(env('API_FRK_SERVICE') . "/penelitian/penelitian_kelompok/{$id}");

        return redirect()->back()->with('success', 'Item deleted');
    }

    //END CRUD TABEL A. PENELITIAN KELOMPOK //END CRUD TABEL A. PENELITIAN KELOMPOK

    //CRUD TABEL B. PENELITIAN MANDIRI //CRUD TABEL B. PENELITIAN MANDIRI

    public function getPenelitianMandiri()
    {
        try {
            // Mengambil data penelitian mandiri dari Lumen
            $responsePenelitianMandiri = Http::get(env('API_FRK_SERVICE') . '/penelitian/penelitian_mandiri');
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
        $token = Tools::getToken($request);
        $id_frk = Tools::getPeriod($token, "FRK");
        $id_fed = Tools::getPeriod($token, "FED");
        Http::post(
            env('API_FRK_SERVICE') . '/penelitian/penelitian_mandiri',
            [
                'id_frk' => $id_frk['data']['id'],
                'id_fed' => $id_fed['data']['id'],
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
            env('API_FRK_SERVICE') . '/penelitian/edit/penelitian_mandiri',
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
        Http::delete(env('API_FRK_SERVICE') . "/penelitian/penelitian_mandiri/{$id}");

        return redirect()->back()->with('success', 'Item deleted');
    }

    //END CRUD TABEL B. PENELITIAN MANDIRI //END CRUD TABEL B. PENELITIAN MANDIRI

    //CRUD TABEL C. BUKU TERBIT //CRUD TABEL C. BUKU TERBIT //CRUD TABEL C. BUKU TERBIT
    public function getBukuTerbit()
    {
        try {
            // Mengambil data penelitian kelompok dari Lumen
            $responseBukuTerbit = Http::get(env('API_FRK_SERVICE') . '/penelitian/buku_terbit');
            $BukuTerbit = $responseBukuTerbit->json();

            $data = [
                'buku_terbit' => $BukuTerbit,
            ];

            // Mengirim data ke view
            return view('App.Rencana.penelitian', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function postBukuTerbit(Request $request)
    {
        $token = Tools::getToken($request);
        $id_frk = Tools::getPeriod($token, "FRK");
        $id_fed = Tools::getPeriod($token, "FED");
        Http::post(
            env('API_FRK_SERVICE') . '/penelitian/buku_terbit',
            [
                'id_frk' => $id_frk['data']['id'],
                'id_fed' => $id_fed['data']['id'],
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'status_tahapan' => $request->get('status_tahapan'),
                'jenis_pengerjaan' => $request->get('jenis_pengerjaan'),
                'peran' => $request->get('peran')
            ]
        );

        return redirect()->back()->with('success', 'Penelitian buku_terbit added successfully');
    }

    public function editBukuTerbit(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . '/penelitian/edit/buku_terbit',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'status_tahapan' => $request->get('status_tahapan'),
                'jenis_pengerjaan' => $request->get('jenis_pengerjaan'),
                'peran' => $request->get('peran')
            ]
        );

        return redirect()->back()->with('success', 'Buku Terbit updated successfully');
    }

    public function deleteBukuTerbit($id)
    {
        Http::delete(env('API_FRK_SERVICE') . "/penelitian/buku_terbit/{$id}");

        return redirect()->back()->with('success', 'Item deleted');
    }
    //END CRUD TABEL C. BUKU TERBIT //END CRUD TABEL C. BUKU TERBIT

    //CRUD TABEL D. BUKU INTERNASIONAL //CRUD TABEL D. BUKU INTERNASIONAL
    public function getBukuInternasional()
    {
        try {
            // Mengambil data penelitian kelompok dari Lumen
            $responseBukuInternasional = Http::get(env('API_FRK_SERVICE') . '/penelitian/buku_internasional');
            $BukuInternasional = $responseBukuInternasional->json();

            $data = [
                'buku_internasional' => $BukuInternasional,
            ];

            // Mengirim data ke view
            return view('App.Rencana.penelitian', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function postBukuInternasional(Request $request)
    {
        $token = Tools::getToken($request);
        $id_frk = Tools::getPeriod($token, "FRK");
        $id_fed = Tools::getPeriod($token, "FED");
        Http::post(
            env('API_FRK_SERVICE') . '/penelitian/buku_internasional',
            [
                'id_frk' => $id_frk['data']['id'],
                'id_fed' => $id_fed['data']['id'],
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'status_tahapan' => $request->get('status_tahapan'),
                'jenis_pengerjaan' => $request->get('jenis_pengerjaan'),
                'peran' => $request->get('peran')
            ]
        );

        return redirect()->back()->with('success', 'Penelitian buku_internasional added successfully');
    }

    public function editBukuInternasional(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . '/penelitian/edit/buku_internasional',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'status_tahapan' => $request->get('status_tahapan'),
                'jenis_pengerjaan' => $request->get('jenis_pengerjaan'),
                'peran' => $request->get('peran')
            ]
        );

        return redirect()->back()->with('success', 'Buku Internasional updated successfully');
    }

    public function deleteBukuInternasional($id)
    {
        Http::delete(env('API_FRK_SERVICE') . "/penelitian/buku_internasional/{$id}");

        return redirect()->back()->with('success', 'Item deleted');
    }
    //END CRUD TABEL D. BUKU INTERNASIONAL //END CRUD TABEL D. BUKU INTERNASIONAL

    //CRUD TABEL E. MENYADUR //CRUD TABEL E. MENYADUR //CRUD TABEL E. MENYADUR
    public function getMenyadur()
    {
        try {
            // Mengambil data Menyadur naskah dari Lumen
            $responseMenyadur = Http::get(env('API_FRK_SERVICE') . '/penelitian/menyadur');
            $Menyadur = $responseMenyadur->json();

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
        $token = Tools::getToken($request);
        $id_frk = Tools::getPeriod($token, "FRK");
        $id_fed = Tools::getPeriod($token, "FED");
        Http::post(
            env('API_FRK_SERVICE') . '/penelitian/menyadur',
            [
                'id_frk' => $id_frk['data']['id'],
                'id_fed' => $id_fed['data']['id'],
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
            env('API_FRK_SERVICE') . '/penelitian/edit/menyadur',
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
        Http::delete(env('API_FRK_SERVICE') . "/penelitian/menyadur/{$id}");

        return redirect()->back()->with('success', 'Item deleted');
    }
    //END CRUD TABEL E. MENYADUR //END CRUD TABEL E. MENYADUR //END CRUD TABEL E. MENYADUR

    //CRUD TABEL F. MENYUNTING //CRUD TABEL F. MENYUNTING //CRUD TABEL F. MENYUNTING
    public function getMenyunting()
    {
        try {
            // Mengambil data Menyunting naskah dari Lumen
            $responseMenyunting = Http::get(env('API_FRK_SERVICE') . '/penelitian/menyunting');
            $Menyunting = $responseMenyunting->json();

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
        $token = Tools::getToken($request);
        $id_frk = Tools::getPeriod($token, "FRK");
        $id_fed = Tools::getPeriod($token, "FED");
        Http::post(
            env('API_FRK_SERVICE') . '/penelitian/menyunting',
            [
                'id_frk' => $id_frk['data']['id'],
                'id_fed' => $id_fed['data']['id'],
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
            env('API_FRK_SERVICE') . '/penelitian/edit/menyunting',
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
        Http::delete(env('API_FRK_SERVICE') . "/penelitian/menyunting/{$id}");

        return redirect()->back()->with('success', 'Item deleted');
    }
    //END CRUD TABEL F. MENYUNTING //END CRUD TABEL F. MENYUNTING

    // CRUD TABEL G. PENELITIAN MODUL // CRUD TABEL G. PENELITIAN MODUL
    public function getPenelitianModul()
    {
        try {
            // Mengambil data penelitian modul dari Lumen
            $responsePenelitianModul = Http::get(env('API_FRK_SERVICE') . '/penelitian/penelitian_modul');
            $PenelitianModul = $responsePenelitianModul->json();

            $data = [
                'penelitian_modul' => $PenelitianModul,
            ];

            // Mengirim data ke view
            return view('App.Rencana.penelitian', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function postPenelitianModul(Request $request)
    {
        $token = Tools::getToken($request);
        $id_frk = Tools::getPeriod($token, "FRK");
        $id_fed = Tools::getPeriod($token, "FED");
        Http::post(
            env('API_FRK_SERVICE') . '/penelitian/penelitian_modul',
            [
                'id_frk' => $id_frk['data']['id'],
                'id_fed' => $id_fed['data']['id'],
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'status_tahapan' => $request->get('status_tahapan'),
                'jenis_pengerjaan' => $request->get('jenis_pengerjaan'),
                'peran' => $request->get('peran'),
            ]
        );

        return redirect()->back()->with('success', 'Penelitian penelitian_modul added successfully');
    }

    public function editPenelitianModul(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . '/penelitian/edit/penelitian_modul',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'status_tahapan' => $request->get('status_tahapan'),
                'jenis_pengerjaan' => $request->get('jenis_pengerjaan'),
                'peran' => $request->get('peran'),
            ]
        );

        return redirect()->back()->with('success', 'Penelitian modul updated successfully');
    }

    public function deletePenelitianModul($id)
    {
        Http::delete(env('API_FRK_SERVICE') . "/penelitian/penelitian_modul/{$id}");

        return redirect()->back()->with('success', 'Item deleted');
    }
    //END CRUD TABEL G. PENELITIAN MODUL //END CRUD TABEL G. PENELITIAN MODUL

    // CRUD TABEL H. PENELITIAN PEKERTI // CRUD TABEL H. PENELITIAN PEKERTI
    public function getPenelitianPekerti()
    {
        try {
            // Mengambil data penelitian modul dari Lumen
            $responsePenelitianPekerti = Http::get(env('API_FRK_SERVICE') . '/penelitian/penelitian_pekerti');
            $PenelitianPekerti = $responsePenelitianPekerti->json();

            $data = [
                'penelitian_pekerti' => $PenelitianPekerti,
            ];

            // Mengirim data ke view
            return view('App.Rencana.penelitian', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function postPenelitianPekerti(Request $request)
    {
        $token = Tools::getToken($request);
        $id_frk = Tools::getPeriod($token, "FRK");
        $id_fed = Tools::getPeriod($token, "FED");
        Http::post(
            env('API_FRK_SERVICE') . '/penelitian/penelitian_pekerti',
            [
                'id_frk' => $id_frk['data']['id'],
                'id_fed' => $id_fed['data']['id'],
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
            ]
        );

        return redirect()->back()->with('success', 'Penelitian penelitian_pekerti added successfully');
    }

    public function editPenelitianPekerti(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . '/penelitian/edit/penelitian_pekerti',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan')
            ]
        );

        return redirect()->back()->with('success', 'Penelitian pekerti updated successfully');
    }

    public function deletePenelitianPekerti($id)
    {
        Http::delete(env('API_FRK_SERVICE') . "/penelitian/penelitian_pekerti/{$id}");

        return redirect()->back()->with('success', 'Item deleted');
    }
    //END CRUD TABEL H. PENELITIAN PEKERTI //END CRUD TABEL H. PENELITIAN PEKERTI


    //CRUD TABEL I PELAKSANAAN TRIDHARMA //CRUD TABEL I PELAKSANAAN TRIDHARMA
    public function getPenelitianTridharma()
    {
        try {
            // Mengambil data penelitian kelompok dari Lumen
            $responsePenelitianTridharma = Http::get(env('API_FRK_SERVICE') . '/penelitian/penelitian_tridharma');
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

    public function postPenelitianTridharma(Request $request)
    {
        $token = Tools::getToken($request);
        $id_frk = Tools::getPeriod($token, "FRK");
        $id_fed = Tools::getPeriod($token, "FED");
        Http::post(
            env('API_FRK_SERVICE') . '/penelitian/penelitian_tridharma',
            [
                'id_frk' => $id_frk['data']['id'],
                'id_fed' => $id_fed['data']['id'],
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jumlah_bkd' => $request->get('jumlah_bkd'),
            ]
        );

        return redirect()->back()->with('success', 'Penelitian penyajian_makalah added successfully');
    }

    public function editPenelitianTridharma(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . '/penelitian/edit/penelitian_tridharma',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jumlah_bkd' => $request->get('jumlah_bkd'),
            ]
        );

        return redirect()->back()->with('success', 'Item updated successfully');
    }

    public function deletePenelitianTridharma($id)
    {
        Http::delete(env('API_FRK_SERVICE') . "/penelitian/penelitian_tridharma/{$id}");

        return redirect()->back()->with('success', 'Item deleted');
    }
    // END CRUD BAGIAN I. PELAKSANAAN TRIDHARMA // END CRUD BAGIAN I. PELAKSANAAN TRIDHARMA

    // START CRUD BAGIAN J. JURNAL ILMIAH // START CRUD BAGIAN J. JURNAL ILMIAH
    public function getJurnalIlmiah()
    {
        try {
            //Mengambil data j dari Lumen
            $responseJurnalIlmiah = Http::get(env('API_FRK_SERVICE') . '/penelitian/jurnal_ilmiah');
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

    public function postJurnalIlmiah(Request $request)
    {
        $this->validate(
            $request,
            [
                'id_dosen' => 'required',
                'nama_kegiatan' => 'required',
                'lingkup_penerbit' => 'required',
                'jenis_pengerjaan' => 'required',
                'peran' => 'required',
            ]
        );
        $token = Tools::getToken($request);
        $id_frk = Tools::getPeriod($token, "FRK");
        $id_fed = Tools::getPeriod($token, "FED");
        Http::post(
            env('API_FRK_SERVICE') . '/penelitian/jurnal_ilmiah',
            [
                'id_frk' => $id_frk['data']['id'],
                'id_fed' => $id_fed['data']['id'],
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'lingkup_penerbit' => $request->get('lingkup_penerbit'),
                'jenis_pengerjaan' => $request->get('jenis_pengerjaan'),
                'peran'  => $request->get('peran'),

            ]
        );

        return redirect()->back()->with('success', 'Penelitian jurnal_ilmiah added successfully');
    }

    public function editJurnalIlmiah(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . '/penelitian/edit/jurnal_ilmiah',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'lingkup_peberbit' => $request->get('lingkup_penerbit'),
                'jenis_pengerjaan' => $request->get('jenis_pengerjaan'),
                'peran'  => $request->get('peran'),
            ]
        );

        return redirect()->back()->with('success', 'Item updated successfully');
    }

    public function deleteJurnalIlmiah($id)
    {
        Http::delete(env('API_FRK_SERVICE') . "/penelitian/jurnal_ilmiah/{$id}");

        return redirect()->back()->with('success', 'Item deleted');
    }
    //END CRUD TABEL J JURNAL ILMIAH //END CRUD TABEL J JURNAL ILMIAH

    //CRUD TABEL K. HAK PATEN //CRUD TABEL K. HAK PATEN //CRUD TABEL K. HAK PATEN
    public function getHakPaten()
    {
        try {
            // Mengambil data Hak Paten naskah dari Lumen
            $responseHakPaten = Http::get(env('API_FRK_SERVICE') . '/penelitian/hak_paten');
            $HakPaten = $responseHakPaten->json();

            $data = [
                'hak_paten' => $HakPaten,
            ];

            // Mengirim data ke view
            return view('App.Rencana.penelitian', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function postHakPaten(Request $request)
    {
        $token = Tools::getToken($request);
        $id_frk = Tools::getPeriod($token, "FRK");
        $id_fed = Tools::getPeriod($token, "FED");
        Http::post(
            env('API_FRK_SERVICE') . "/penelitian/hak_paten",
            [
                'id_frk' => $id_frk['data']['id'],
                'id_fed' => $id_fed['data']['id'],
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
            env('API_FRK_SERVICE') . '/penelitian/edit/hak_paten',
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
        Http::delete(env('API_FRK_SERVICE') . "/penelitian/hak_paten/{$id}");

        return redirect()->back()->with('success', 'Item deleted');
    }

    //END CRUD TABEL K. HAK PATEN //END CRUD TABEL K. HAK PATEN //END CRUD TABEL K. HAK PATEN

    // CRUD TABEL L. MEDIA MASSA // CRUD TABEL L. MEDIA MASSA // CRUD TABEL L. MEDIA MASSA
    public function getMediaMassa()
    {
        try {
            // Mengambil data Media Massa naskah dari Lumen
            $responseMediaMassa = Http::get(env('API_FRK_SERVICE') . '/penelitian/media_massa');
            $MediaMassa = $responseMediaMassa->json();

            $data = [
                'media_massa' => $MediaMassa,
            ];

            // Mengirim data ke view
            return view('App.Rencana.penelitian', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function postMediaMassa(Request $request)
    {
        $token = Tools::getToken($request);
        $id_frk = Tools::getPeriod($token, "FRK");
        $id_fed = Tools::getPeriod($token, "FED");
        Http::post(
            env('API_FRK_SERVICE') . "/penelitian/media_massa",
            [
                'id_frk' => $id_frk['data']['id'],
                'id_fed' => $id_fed['data']['id'],
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
            ]
        );

        return redirect()->back()->with('success', 'Item stored successfully');
    }

    public function editMediaMassa(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . '/penelitian/edit/media_massa',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),

            ]
        );

        return redirect()->back()->with('success', 'Item updated successfully');
    }

    public function deleteMediaMassa($id)
    {
        Http::delete(env('API_FRK_SERVICE') . "/penelitian/media_massa/{$id}");

        return redirect()->back()->with('success', 'Item deleted');
    }
    //END CRUD TABEL L. MEDIA MASSA // END CRUD TABEL L. MEDIA MASSA

    //CRUD TABEL M. PEMBICARA SEMINAR //CRUD TABEL M. PEMBICARA SEMINAR
    public function getPembicaraSeminar()
    {
        try {
            $responsePembicaraSeminar = Http::get(env('API_FRK_SERVICE') . '/penelitian/pembicara_seminar');
            $PembicaraSeminar = $responsePembicaraSeminar->json();

            $data = [
                'pembicara_seminar' => $PembicaraSeminar,
            ];

            return view('App.Rencana.penelitian', $data);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function postPembicaraSeminar(Request $request)
    {
        $token = Tools::getToken($request);
        $id_frk = Tools::getPeriod($token, "FRK");
        $id_fed = Tools::getPeriod($token, "FED");
        Http::post(
            env('API_FRK_SERVICE') . '/penelitian/pembicara_seminar',
            [
                'id_frk' => $id_frk['data']['id'],
                'id_fed' => $id_fed['data']['id'],
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'tingkatan' => $request->get('tingkatan'),
            ]
        );

        return redirect()->back()->with('success', 'Penelitian pembicara_seminar added successfully');
    }

    public function editPembicaraSeminar(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . '/penelitian/edit/pembicara_seminar',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'tingkatan' => $request->get('tingkatan'),
            ]
        );

        return redirect()->back()->with('success', 'Item updated successfully');
    }

    public function deletePembicaraSeminar($id)
    {
        Http::delete(env('API_FRK_SERVICE') . "/penelitian/pembicara_seminar/{$id}");

        return redirect()->back()->with('success', 'Item deleted');
    }
    //END CRUD TABEL M. PEMBICARA SEMINAR //END CRUD TABEL M. PEMBICARA SEMINAR

    //CRUD TABEL N PENYAJIAN MAKALAH //CRUD TABEL N PENYAJIAN MAKALAH
    public function getPenyajianMakalah()
    {
        try {
            // Mengambil data penelitian kelompok dari Lumen
            $responsePenyajianMakalah = Http::get(env('API_FRK_SERVICE') . '/penelitian/penyajian_makalah');
            $PenyajianMakalah = $responsePenyajianMakalah->json();

            $data = [
                'penyajian_makalah' => $PenyajianMakalah,
            ];

            // Mengirim data ke view
            return view('App.Rencana.penelitian', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function postPenyajianMakalah(Request $request)
    {
        $token = Tools::getToken($request);
        $id_frk = Tools::getPeriod($token, "FRK");
        $id_fed = Tools::getPeriod($token, "FED");
        Http::post(
            env('API_FRK_SERVICE') . '/penelitian/penyajian_makalah',
            [
                'id_frk' => $id_frk['data']['id'],
                'id_fed' => $id_fed['data']['id'],
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'tingkatan' => $request->get('tingkatan'),
                'jenis_kegiatan' => $request->get('jenis_kegiatan'),
                'posisi' => $request->get('posisi'),
                'jumlah_anggota' => $request->get('jumlah_anggota'),
                'jenis_pengerjaan' => $request->get('jenis_pengerjaan'),
            ]
        );

        return redirect()->back()->with('success', 'Penelitian penyajian_makalah added successfully');
    }

    public function editPenyajianMakalah(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . '/penelitian/edit/penyajian_makalah',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'tingkatan' => $request->get('tingkatan'),
                'jenis_pengerjaan' => $request->get('jenis_pengerjaan'),
                'posisi' => $request->get('posisi'),
                'jumlah_anggota' => $request->get('jumlah_anggota'),
            ]
        );

        return redirect()->back()->with('success', 'Item updated successfully');
    }

    public function deletePenyajianMakalah($id)
    {
        Http::delete(env('API_FRK_SERVICE') . "/penelitian/penyajian_makalah/{$id}");

        return redirect()->back()->with('success', 'Item deleted');
    }
    //END CRUD TABEL N. PENYAJIAN MAKALAH

    //END PENELITIAN CONTROLLER
}

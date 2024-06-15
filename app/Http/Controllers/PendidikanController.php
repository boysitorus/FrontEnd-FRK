<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Utils\Tools;

class PendidikanController extends Controller
{
    public function getAll(Request $request)
    {
        $auth = Tools::getAuth($request);

        $getTanggal = json_decode(json_encode(Tools::getPeriod($auth->user->token, "FRK")), true)['data'];

        $id_dosen = json_decode(json_encode($auth->user->data_lengkap->pegawai),true)['user_id'];

        try {
            $responseAll = Http::get(env('API_FRK_SERVICE'). '/pendidikan/all/' . $id_dosen);
            $all = $responseAll->json();

            // Mengambil data teori dari Lumen
            $responseTeori = Http::get(env('API_FRK_SERVICE') . '/pendidikan/teori/' . $id_dosen);
            $teori = $responseTeori->json();

            $responsePraktikum = Http::get(env('API_FRK_SERVICE') . '/pendidikan/praktikum/' . $id_dosen);
            $praktikum = $responsePraktikum->json();

            // Mengambil data bimbingan dari Lumen
            $responseBimbingan = Http::get(env('API_FRK_SERVICE') . '/pendidikan/bimbingan/' . $id_dosen);
            $bimbingan = $responseBimbingan->json();

            //Mengambil data seminar dari Lumen
            $responseSeminar = Http::get(env('API_FRK_SERVICE') . '/pendidikan/seminar/' . $id_dosen);
            $seminar = $responseSeminar->json();

            //Mengambil data rendah dari Lumen
            $responseRendah = Http::get(env('API_FRK_SERVICE') . '/pendidikan/rendah/' . $id_dosen);
            $rendah = $responseRendah->json();

            //Mengambil data kembang dari Lumen
            $responseKembang = Http::get(env('API_FRK_SERVICE') . '/pendidikan/kembang/' . $id_dosen);
            $kembang = $responseKembang->json();

            $responseTugasAkhir = Http::get(env('API_FRK_SERVICE') . '/pendidikan/tugasAkhir/' . $id_dosen);
            $tugasAkhir = $responseTugasAkhir->json();

            //Mengambil data cangkok dari Lumen
            $responseCangkok = Http::get(env('API_FRK_SERVICE') . '/pendidikan/cangkok/' . $id_dosen);
            $cangkok = $responseCangkok->json();

            //Mengambil data koordinator dari Lumen
            $responseKoordinator = Http::get(env('API_FRK_SERVICE') . '/pendidikan/koordinator/' . $id_dosen);
            $koordinator = $responseKoordinator->json();

            $responseProposal = Http::get(env('API_FRK_SERVICE') . '/pendidikan/proposal/' . $id_dosen);
            $proposal = $responseProposal->json();

            $responseAsesor =  json_decode(Http::withToken($auth->user->token)->get(env('API_ADMIN_SERVICE') . 'get-asesor')->body(), true);

            $listIdAssesor = [];

            $responseMataKuliah = json_decode(
                Http::withToken($auth->user->token)->get(
                    env('API_CIS') . '/library-api/matkul-by-prodi-sem-ta?prodi_id='.$auth->user->data_lengkap->dosen->prodi_id.'&sem_ta=2&ta=2020'
                )->body(),
            true);

            foreach ($responseAsesor['data'] as $e) {
                $listIdAssesor[] = $e['id_pegawai'];
            }

            // Menggabungkan data teori dan bimbingan
            $data = [
                'all' => $all,
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
                'periode' => $getTanggal,
                'idAsesor' => $listIdAssesor,
                'mataKuliah' => $responseMataKuliah['data'],
            ];

//            dd($data);
            // Mengirim sdata ke view
            return view('App.Rencana.pendidikan', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API',], 500);
        }
    }

    public function postTeori(Request $request)
    {
            Http::post(
                env('API_FRK_SERVICE') . '/pendidikan/teori',
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
                env('API_FRK_SERVICE') . '/pendidikan/edit/teori',
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
        Http::delete(env('API_FRK_SERVICE') . "/pendidikan/teori/{$id}");

        return redirect()->back()->with('success', 'Item deleted');
    }

    // Praktikum

    public function postPraktikum(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . '/pendidikan/praktikum',
            $request->all()
        );

        return redirect()->back()->with('success', 'Pendidikan praktikum added successfully');
    }

    public function editPraktikum(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . '/pendidikan/edit/praktikum',
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
        Http::delete(env('API_FRK_SERVICE') . "/pendidikan/praktikum/{$id}");

        return redirect()->back()->with('success', 'Item deleted');
    }

    // END of Praktikum


    public function postBimbingan(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . '/pendidikan/bimbingan',
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
            env('API_FRK_SERVICE') . '/pendidikan/edit/bimbingan',
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
        Http::delete(env('API_FRK_SERVICE') . "/pendidikan/bimbingan/{$id}");

        return redirect()->back();
    }

    public function postSeminar(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . '/pendidikan/seminar',
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
            env('API_FRK_SERVICE') . '/pendidikan/edit/seminar',
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
        Http::delete(env('API_FRK_SERVICE') . "/pendidikan/seminar/{$id}");


        return redirect()->back();
    }

    public function postRendah(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . '/pendidikan/rendah',
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
            env('API_FRK_SERVICE') . '/pendidikan/edit/rendah',
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
        Http::delete(env('API_FRK_SERVICE') . "/pendidikan/rendah/{$id}");


        return redirect()->back();
    }
    public function postKembang(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . '/pendidikan/kembang',
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
            env('API_FRK_SERVICE') . '/pendidikan/edit/kembang',
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
        Http::delete(env('API_FRK_SERVICE') . "/pendidikan/kembang/{$id}");


        return redirect()->back();
    }

    public function postCangkok(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . '/pendidikan/cangkok',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jumlah_dosen' => $request->get('jumlah_dosen'),
            ]
        );

        return redirect()->back();
    }

    public function editCangkok(Request $request)
    {
        $id_rencana = $request->get('id_rencana');

        // Pastikan URL API benar dan sesuai dengan konfigurasi server Anda
        $response = Http::post(
            env('API_FRK_SERVICE') . "/pendidikan/edit/cangkok/{$id_rencana}",
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
        Http::delete(env('API_FRK_SERVICE') . "/pendidikan/cangkok/{$id}");


        return redirect()->back();
    }

    // KOORDINATOR

    public function postKoordinator(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . '/pendidikan/koordinator',
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
            env('API_FRK_SERVICE') . '/pendidikan/edit/koordinator',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan')
            ]
        );

        return redirect()->back()->with('success', 'Item updated successfully');
    }

    public function deleteKoordinator($id)
    {
        Http::delete(env('API_FRK_SERVICE') . "/pendidikan/koordinator/{$id}");


        return redirect()->back();
    }


    public function postTugasAkhir(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . '/pendidikan/tugasAkhir',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jumlah_kelompok' => $request->get('jumlah_kelompok'),
            ]
        );

        return redirect()->back()->with('success', 'Pendidikan Tugas Akhir added successfully');
    }

    public function editTugasAkhir(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . '/pendidikan/edit/tugasAkhir',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jumlah_kelompok' => $request->get('jumlah_kelompok'),
            ]
        );

        return redirect()->back()->with('success', 'Item updated successfully');
    }

    public function deleteTugasAkhir($id)
    {
        Http::delete(env('API_FRK_SERVICE') . "/pendidikan/tugasAkhir/{$id}");
        return redirect()->back()->with('success', 'Item deleted');
    }

    public function postProposal(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . '/pendidikan/proposal',
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
            env('API_FRK_SERVICE') . '/pendidikan/edit/proposal',
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
        Http::delete(env('API_FRK_SERVICE') . "/pendidikan/proposal/{$id}");
        return redirect()->back()->with('success', 'Item deleted');
    }


}

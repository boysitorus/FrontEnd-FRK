<?php

namespace App\Http\Controllers;

use App\Utils\Tools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PenunjangController extends Controller
{
    public function getAll(Request $request)
    {
        $auth = Tools::getAuth($request);
        $id_dosen = json_decode(json_encode($auth->user->data_lengkap->pegawai),true)['user_id'];
        try {
            $responseAkademik = Http::get(env('API_FRK_SERVICE') . '/penunjang/akademik/' . $id_dosen);
            $akademik = $responseAkademik->json();

            $responseBimbingan = Http::get(env('API_FRK_SERVICE') . '/penunjang/bimbingan/' . $id_dosen);
            $bimbingan = $responseBimbingan->json();

            $responseUkm = Http::get(env('API_FRK_SERVICE') . '/penunjang/ukm/' . $id_dosen);
            $ukm = $responseUkm->json();

            $responseSosial = Http::get(env('API_FRK_SERVICE') . '/penunjang/sosial/' . $id_dosen);
            $sosial = $responseSosial->json();

            $responseSturuktural = Http::get(env('API_FRK_SERVICE') . '/penunjang/struktural/' . $id_dosen);
            $struktural = $responseSturuktural->json();

            $responsenonSturuktural = Http::get(env('API_FRK_SERVICE') . '/penunjang/nonstruktural/' . $id_dosen);
            $nonstruktural = $responsenonSturuktural->json();

            $responseRedaksi = Http::get(env('API_FRK_SERVICE') . '/penunjang/redaksi/' . $id_dosen);
            $redaksi = $responseRedaksi->json();

            $responseAdhoc = Http::get(env('API_FRK_SERVICE') . '/penunjang/adhoc/' . $id_dosen);
            $adhoc = $responseAdhoc->json();

            $responseAsosiasi = Http::get(env('API_FRK_SERVICE') . '/penunjang/asosiasi/' . $id_dosen);
            $asosiasi = $responseAsosiasi->json();

            $responseSeminar = Http::get(env('API_FRK_SERVICE') . '/penunjang/seminar/' . $id_dosen);
            $seminar = $responseSeminar->json();

            $responseReviewer = Http::get(env('API_FRK_SERVICE') . '/penunjang/reviewer/' . $id_dosen);
            $reviewer = $responseReviewer->json();

            $responseKetuaPanitia = Http::get(env('API_FRK_SERVICE') . '/penunjang/ketuapanitia/' . $id_dosen);
            $ketuapanitia = $responseKetuaPanitia->json();

            $responseAnggotaPanitia = Http::get(env('API_FRK_SERVICE') . '/penunjang/anggotapanitia/' . $id_dosen);
            $anggotapanitia = $responseAnggotaPanitia->json();

            $responsePengurusYayasan = Http::get(env('API_FRK_SERVICE') . '/penunjang/pengurusyayasan/' . $id_dosen);
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
                'id_dosen' => $id_dosen
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
            env('API_FRK_SERVICE') . '/penunjang/akademik',
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
            env('API_FRK_SERVICE') . '/penunjang/edit/akademik',
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
        Http::delete(env('API_FRK_SERVICE') . "/penunjang/akademik/{$id}");

        return redirect()->back();
    }

    // B. Bimbingan
    public function postBimbingan(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . '/penunjang/bimbingan',
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
            env('API_FRK_SERVICE') . '/penunjang/edit/bimbingan',
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
        Http::delete(env('API_FRK_SERVICE') . "/penunjang/bimbingan/{$id}");

        return redirect()->back();
    }


    // C. Pimpinan Pembinaan Unit kegiatan mahasiswa
    public function postUkm(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . '/penunjang/ukm',
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
            env('API_FRK_SERVICE') . "/penunjang/edit/ukm",
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
        Http::delete(env('API_FRK_SERVICE') . "/penunjang/ukm/{$id}");

        return redirect()->back();
    }

    //D. Pimpinan organisasi sosial intern sebagai hanya Ketua/Wakil yang dibina Ketua, misal a. Koperasi fakultas, b. Dharma wanita, c. Takmir Masjid/Pastoran

    public function postSosial(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . '/penunjang/sosial',
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
            env('API_FRK_SERVICE') . "/penunjang/edit/sosial",
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
            ]
        );

        return redirect()->back();
    }

    public function deleteSosial($id)
    {
        Http::delete(env('API_FRK_SERVICE') . "/penunjang/sosial/{$id}");

        return redirect()->back();
    }

    // BAGIAN E. Jabatan struktural (berdasarkan beban/semester)
    public function postStruktural(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . '/penunjang/struktural',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jenis_jabatan_struktural' => $request->get('jenis_jabatan_struktural'),
            ]
        );
        return redirect()->back();
    }

    public function editStruktural(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . "/penunjang/edit/struktural",
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jenis_jabatan_struktural' => $request->get('jenis_jabatan_struktural'),

            ]
        );
        return redirect()->back();
    }

    public function deleteStruktural($id)
    {
        Http::delete(env('API_FRK_SERVICE') . "/penunjang/struktural/{$id}");

        return redirect()->back();
    }

    // BAGIAN F. Jabatan non struktural
    public function postNonstruktural(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . '/penunjang/nonstruktural',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jenis_jabatan_nonstruktural' => $request->get('jenis_jabatan_nonstruktural'),
            ]
        );
        return redirect()->back();
    }

    public function editNonstruktural(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . "/penunjang/edit/nonstruktural",
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jenis_jabatan_nonstruktural' => $request->get('jenis_jabatan_nonstruktural'),

            ]
        );
        return redirect()->back();
    }

    public function deleteNonstruktural($id)
    {
        Http::delete(env('API_FRK_SERVICE') . "/penunjang/nonstruktural/{$id}");

        return redirect()->back();
    }

    // BAGIAN G. Redaksi
    public function postRedaksi(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . '/penunjang/redaksi',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jabatan' => $request->get('jabatan'),
            ]
        );
        return redirect()->back();
    }

    public function editRedaksi(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . "/penunjang/edit/redaksi",
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jabatan' => $request->get('jabatan'),

            ]
        );
        return redirect()->back();
    }

    public function deleteRedaksi($id)
    {
        Http::delete(env('API_FRK_SERVICE') . "/penunjang/redaksi/{$id}");

        return redirect()->back();
    }

    // BAGIAN G. Ad Hoc
    public function postAdhoc(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . '/penunjang/adhoc',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jabatan' => $request->get('jabatan'),
            ]
        );
        return redirect()->back();
    }

    public function editAdhoc(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . "/penunjang/edit/adhoc",
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jabatan' => $request->get('jabatan'),

            ]
        );
        return redirect()->back();
    }

    public function deleteAdhoc($id)
    {
        Http::delete(env('API_FRK_SERVICE') . "/penunjang/adhoc/{$id}");

        return redirect()->back();
    }

    // BAGIAN I
    public function postKetuaPanitia(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . '/penunjang/ketuapanitia',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jenis_tingkatan' => $request->get('jenis_tingkatan'),
            ]
        );
        return redirect()->back()->with('success', 'Item berhasil ditambahkan');
    }

    public function editKetuaPanitia(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . "/penunjang/edit/ketuapanitia",
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jenis_tingkatan' => $request->get('jenis_tingkatan'),
            ]
        );

        return redirect()->back()->with('success', 'Item berhasil diperbaharui');
    }

    public function deleteKetuaPanitia($id)
    {
        Http::delete(env('API_FRK_SERVICE') . "/penunjang/ketuapanitia/{$id}");

        return redirect()->back()->with('success', 'Item berhasil dihapus');
    }

    // BAGIAN J
    public function postAnggotaPanitia(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . '/penunjang/anggotapanitia',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jenis_tingkatan' => $request->get('jenis_tingkatan'),
            ]
        );
        return redirect()->back()->with('success', 'Item berhasil ditambahkan');
    }

    public function editAnggotaPanitia(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . "/penunjang/edit/anggotapanitia",
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jenis_tingkatan' => $request->get('jenis_tingkatan'),
            ]
        );

        return redirect()->back()->with('success', 'Item berhasil diperbaharui');
    }

    public function deleteAnggotaPanitia($id)
    {
        Http::delete(env('API_FRK_SERVICE') . "/penunjang/anggotapanitia/{$id}");

        return redirect()->back()->with('success', 'Item berhasil dihapus');
    }

    // BAGIAN I
    public function postPengurusYayasan(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . '/penunjang/pengurusyayasan',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jabatan' => $request->get('jabatan'),
            ]
        );
        return redirect()->back()->with('success', 'Item berhasil ditambahkan');
    }

    public function editPengurusYayasan(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . "/penunjang/edit/pengurusyayasan",
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jabatan' => $request->get('jabatan'),
            ]
        );

        return redirect()->back()->with('success', 'Item berhasil diperbaharui');
    }

    public function deletePengurusYayasan($id)
    {
        Http::delete(env('API_FRK_SERVICE') . "/penunjang/pengurusyayasan/{$id}");

        return redirect()->back()->with('success', 'Item berhasil dihapus');
    }

    // BAGIAN L. Menjadi Pengurus/Anggota Asosiasi Profesi
    public function postAsosiasi(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . '/penunjang/asosiasi',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jabatan' => $request->get('jabatan'),
                'jenis_tingkatan' => $request->get('jenis_tingkatan'),
            ]
        );
        return redirect()->back()->with('success', 'Item berhasil ditambahkan');
    }

    public function editAsosiasi(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . "/penunjang/edit/asosiasi",
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jabatan' => $request->get('jabatan'),
                'jenis_tingkatan' => $request->get('jenis_tingkatan'),
            ]
        );

        return redirect()->back()->with('success', 'Item berhasil diperbaharui');
    }

    public function deleteAsosiasi($id)
    {
        Http::delete(env('API_FRK_SERVICE') . "/penunjang/asosiasi/{$id}");

        return redirect()->back()->with('success', 'Item berhasil dihapus');
    }

    // BAGIAN M. Peserta seminar/workshop/kursus berdasar penugasan pimpinan
    public function postSeminar(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . '/penunjang/seminar',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jenis_tingkatan' => $request->get('jenis_tingkatan'),
            ]
        );
        return redirect()->back()->with('success', 'Item berhasil ditambahkan');
    }

    public function editSeminar(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . "/penunjang/edit/seminar",
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jenis_tingkatan' => $request->get('jenis_tingkatan'),
            ]
        );

        return redirect()->back()->with('success', 'Item berhasil diperbaharui');
    }

    public function deleteSeminar($id)
    {
        Http::delete(env('API_FRK_SERVICE') . "/penunjang/seminar/{$id}");

        return redirect()->back()->with('success', 'Item berhasil dihapus');
    }

    // BAGIAN N. Reviewer jurnal ilmiah , proposal Hibah dll
    public function postReviewer(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . '/penunjang/reviewer',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
            ]
        );
        return redirect()->back()->with('success', 'Item berhasil ditambahkan');
    }

    public function editReviewer(Request $request)
    {
        Http::post(
            env('API_FRK_SERVICE') . "/penunjang/edit/reviewer",
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
            ]
        );

        return redirect()->back()->with('success', 'Item berhasil diperbaharui');
    }

    public function deleteReviewer($id)
    {
        Http::delete(env('API_FRK_SERVICE') . "/penunjang/reviewer/{$id}");

        return redirect()->back()->with('success', 'Item berhasil dihapus');
    }


}

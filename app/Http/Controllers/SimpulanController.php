<?php

namespace App\Http\Controllers;

use App\Utils\Tools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Client\RequestException;

use function PHPUnit\Framework\throwException;

class SimpulanController extends Controller
{

    public function getAll(Request $request)
    {
        $auth = Tools::getAuth($request);
        $id_dosen = json_decode(json_encode($auth->user->data_lengkap->pegawai), true)['user_id'];

        try {
            $dataSks = Http::get(env("API_FRK_SERVICE") . '/simpulan/' . $id_dosen);

            $totalSksPendidikan = $dataSks["sks_pendidikan"];
            $totalSksPenelitian = $dataSks["sks_penelitian"];
            $totalSksPengabdian = $dataSks["sks_pengabdian"];
            $totalSksPenunjang = $dataSks["sks_penunjang"];
            $totalSks = $dataSks["sks_total"];

            return view(
                'App.Rencana.simpulan',
                [
                    'pendidikanSks' => $totalSksPendidikan,
                    'penelitianSks' => $totalSksPenelitian,
                    'pengabdianSks' => $totalSksPengabdian,
                    'penunjangSks' => $totalSksPenunjang,
                    'totalSks' => $totalSks,
                    'auth' => $auth,
                    'id_dosen' => $id_dosen,
                ]
            );
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function generatePdf(Request $request)
    {
        $auth = Tools::getAuth($request);
        $id_dosen = json_decode(json_encode($auth->user->data_lengkap->pegawai), true)['user_id'];
        $nidn_dosen = json_decode(json_encode($auth->user->data_lengkap->dosen), true)['nidn'];
        $nama_dosen = json_decode(json_encode($auth->user->data_lengkap->dosen), true)['nama'];
        $role_dosen = json_decode(json_encode($auth->user->data_lengkap->pegawai), true)['posisi '] . " Program Studi " . $auth->user->data_lengkap->dosen->prodi;
        try {
            $dataSks = Http::get(env("API_FRK_SERVICE") . '/simpulan/' . $id_dosen);

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

            $pdf = Pdf::loadView('App.Rencana.pdf', $data);
            return $pdf->download('Simpulan-Rencana-Kerja.pdf');
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Failed to generate PDF'], 500);
        }
    }

    public function simpanRencana(Request $request)
    {
        $id_dosen = $request->get('id_dosen');
        try {
            $response = Http::post(env('API_FRK_SERVICE') . '/simpulan-simpan-rencana/' . $id_dosen);
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

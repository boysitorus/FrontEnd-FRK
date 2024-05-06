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
        $id_dosen = json_decode(json_encode($auth->user->data_lengkap->pegawai),true)['user_id'];
        try {
            $responsePendidikan = Http::get(env('API_FRK_SERVICE') . '/simpulan-pendidikan');
            $totalSksPendidikan = $responsePendidikan->json();

            $responsePenelitian = Http::get(env('API_FRK_SERVICE') . '/simpulan-penelitian');
            $totalSksPenelitian = $responsePenelitian->json();

            $responsePengabdian = Http::get(env('API_FRK_SERVICE') . '/simpulan-pengabdian');
            $totalSksPengabdian = $responsePengabdian->json();

            $responsePenunjang = Http::get(env('API_FRK_SERVICE') . '/simpulan-penunjang');
            $totalSksPenunjang = $responsePenunjang->json();

            $responseTotal = Http::get(env('API_FRK_SERVICE') . '/simpulan-total');
            $totalSksTotal = $responseTotal->json();


            return view('App.Rencana.simpulan',
            [
                'pendidikanSks' => $totalSksPendidikan,
                'penelitianSks' => $totalSksPenelitian,
                'pengabdianSks' => $totalSksPengabdian,
                'penunjangSks' => $totalSksPenunjang,
                'totalSks' => $totalSksTotal,
                'auth' => $auth,
                'id_dosen' => $id_dosen
            ]
            );

        } catch(\Throwable $th) {
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function generatePdf()
    {
        try {
            // Ambil data dari API untuk setiap jenis sks
            $responsePendidikan = Http::get(env('API_FRK_SERVICE') . '/simpulan-pendidikan');
            $totalSksPendidikan = $responsePendidikan->json();

            $responsePenelitian = Http::get(env('API_FRK_SERVICE') . '/simpulan-penelitian');
            $totalSksPenelitian = $responsePenelitian->json();

            $responsePengabdian = Http::get(env('API_FRK_SERVICE') . '/simpulan-pengabdian');
            $totalSksPengabdian = $responsePengabdian->json();

            $responsePenunjang = Http::get(env('API_FRK_SERVICE') . '/simpulan-penunjang');
            $totalSksPenunjang = $responsePenunjang->json();

            $responseTotal = Http::get(env('API_FRK_SERVICE') . '/simpulan-total');
            $totalSksTotal = $responseTotal->json();

            $data = [
                'pendidikanSks' => $totalSksPendidikan,
                'penelitianSks' => $totalSksPenelitian,
                'pengabdianSks' => $totalSksPengabdian,
                'penunjangSks' => $totalSksPenunjang,
                'totalSks' => $totalSksTotal,
            ];

            $pdf = Pdf::loadView('App.Rencana.pdf', $data);
            return $pdf->download('coba.pdf');


        } catch(\Throwable $th) {
            return response()->json(['error' => 'Failed to generate PDF'], 500);
        }
    }

    public function simpanRencana(Request $request){
        $id_dosen = $request->get('id_dosen');
        try {
            $response = Http::post(env('API_FRK_SERVICE') . '/simpulan-simpan-rencana/' . $id_dosen);
            if($response->status() === 200){
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

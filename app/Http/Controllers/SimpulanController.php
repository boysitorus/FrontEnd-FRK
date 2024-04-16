<?php

namespace App\Http\Controllers;

use App\Utils\Tools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade\Pdf;

class SimpulanController extends Controller
{
    
    public function getAll(Request $request)
    {
        $auth = Tools::getAuth($request);
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
                'auth' => $auth
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
}

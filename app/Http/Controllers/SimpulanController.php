<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade\Pdf;

class SimpulanController extends Controller
{
    public function getAll()
    {
        try {
            $responsePendidikan = Http::get('http://localhost:9000/api/simpulan-pendidikan');
            $totalSksPendidikan = $responsePendidikan->json();

            $responsePenelitian = Http::get('http://localhost:9000/api/simpulan-penelitian');
            $totalSksPenelitian = $responsePenelitian->json();

            $responsePengabdian = Http::get('http://localhost:9000/api/simpulan-pengabdian');
            $totalSksPengabdian = $responsePengabdian->json();

            $responsePenunjang = Http::get('http://localhost:9000/api/simpulan-penunjang');
            $totalSksPenunjang = $responsePenunjang->json();

            $responseTotal = Http::get('http://localhost:9000/api/simpulan-total');
            $totalSksTotal = $responseTotal->json();


            return view('App.Rencana.simpulan', 
            [
                'pendidikanSks' => $totalSksPendidikan,
                'penelitianSks' => $totalSksPenelitian,
                'pengabdianSks' => $totalSksPengabdian,
                'penunjangSks' => $totalSksPenunjang,
                'totalSks' => $totalSksTotal,
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
            $responsePendidikan = Http::get('http://localhost:9000/api/simpulan-pendidikan');
            $totalSksPendidikan = $responsePendidikan->json();

            $responsePenelitian = Http::get('http://localhost:9000/api/simpulan-penelitian');
            $totalSksPenelitian = $responsePenelitian->json();

            $responsePengabdian = Http::get('http://localhost:9000/api/simpulan-pengabdian');
            $totalSksPengabdian = $responsePengabdian->json();

            $responsePenunjang = Http::get('http://localhost:9000/api/simpulan-penunjang');
            $totalSksPenunjang = $responsePenunjang->json();

            $responseTotal = Http::get('http://localhost:9000/api/simpulan-total');
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

<?php

namespace App\Http\Controllers;

use App\Utils\Tools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{

    public function getGenerateFRK(Request $request)
    {
        $auth = Tools::getAuth($request);
        return view('App.Admin.generateRencana', ['auth' => $auth]);
    }

    public function postGenerateFRK(Request $request)
    {
        $auth = Tools::getAuth($request);

        try {
            $genData = Http::asForm()->post(env('API_ADMIN_SERVICE', false) . 'generate-tanggal', [
                'role' => json_decode(json_encode($auth->user->data_lengkap->pegawai), true)['posisi '],
                'tipe_tanggal' => 'FRK',
                "tahun_ajaran" => $request->tahun_ajaran,
                "tgl_awal_pengisian" => $request->tanggal_awal_rencana_kerja,
                "tgl_akhir_pengisian" => $request->tanggal_akhir_rencana_kerja,
                "periode_awal_approve_assesor_1" => $request->periode_awal_asesor_i,
                "periode_akhir_approve_assesor_1" => $request->periode_akhir_asesor_i,
                "periode_awal_approve_assesor_2" => $request->periode_awal_asesor_ii,
                "periode_akhir_approve_assesor_2" => $request->periode_akhir_asesor_ii,
            ]);

        } catch (\Exception $err) {
            return redirect()->back()->with('error', $err->getMessage());
        }

        return redirect()->back()->with('success', 'Tanggal FRK added successfully');
    }

    public function postGenerateFED(Request $request)
    {
        $auth = Tools::getAuth($request);

        try {
            $genData = Http::asForm()->post(env('API_ADMIN_SERVICE', false) . 'generate-tanggal', [
                'role' => json_decode(json_encode($auth->user->data_lengkap->pegawai), true)['posisi '],
                'tipe_tanggal' => 'FED',
                "tahun_ajaran" => $request->tahun_ajaran,
                "tgl_awal_pengisian" => $request->tanggal_awal_rencana_kerja,
                "tgl_akhir_pengisian" => $request->tanggal_akhir_rencana_kerja,
                "periode_awal_approve_assesor_1" => $request->periode_awal_asesor_i,
                "periode_akhir_approve_assesor_1" => $request->periode_akhir_asesor_i,
                "periode_awal_approve_assesor_2" => $request->periode_awal_asesor_ii,
                "periode_akhir_approve_assesor_2" => $request->periode_akhir_asesor_ii,
            ]);

        } catch (\Exception $err) {
            return redirect()->back()->with('error', $err->getMessage());
        }

        return redirect()->back()->with('success', 'Tanggal FED added successfully');
    }

    public function getGenerateFED(Request $request)
    {
        $auth = Tools::getAuth($request);
        return view('App.Admin.generateEvaluasi', ['auth' => $auth]);
    }
}

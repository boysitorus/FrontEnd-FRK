<?php

namespace App\Http\Controllers;

use App\Utils\Tools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function gettahunAjaran(Request $request)
    {
        $auth = Tools::getAuth($request);

        $getSemesterFRK = Tools::getPeriod($auth->user->token, 'FRK');
        $getSemesterFED = Tools::getPeriod($auth->user->token, 'FED');

        $data = [
            'data' => Tools::getAllPeriod($auth->user->token),
            'tanggal_frk' => $getSemesterFRK,
            'tanggal_fed' => $getSemesterFED,
        ];

        return view('App.Admin.tahunAjaran', $data);
    }

    public function getGenerateFRK(Request $request)
    {
        $auth = Tools::getAuth($request);

        $getSemester = Tools::getPeriod($auth->user->token, 'FRK');

        return view('App.Admin.generateRencana', ['auth' => $auth, 'semester' => $getSemester['data']]);
    }

    public function postGenerateFRK(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tahun_ajaran' => 'required|string',
            'semester',
            'tanggal_awal_rencana_kerja' => 'required|date',
            'tanggal_akhir_rencana_kerja' => 'required|date|after_or_equal:tanggal_awal_rencana_kerja',
            'periode_awal_asesor_i' => 'required|date',
            'periode_akhir_asesor_i' => 'required|date|after_or_equal:periode_awal_asesor_i',
            'periode_awal_asesor_ii' => 'required|date',
            'periode_akhir_asesor_ii' => 'required|date|after_or_equal:periode_awal_asesor_ii',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.generate_frk')->withErrors($validator)->withInput();
        }

        $auth = Tools::getAuth($request);

        try {
            $genData = Http::asForm()->post(env('API_ADMIN_SERVICE', false) . 'generate-tanggal', [
                'role' => json_decode(json_encode($auth->user->data_lengkap->pegawai), true)['posisi '],
                'tipe_tanggal' => 'FRK',
                "tahun_ajaran" => $request->tahun_ajaran,
                "semester" => $request->semester,
                "tgl_awal_pengisian" => $request->tanggal_awal_rencana_kerja,
                "tgl_akhir_pengisian" => $request->tanggal_akhir_rencana_kerja,
                "periode_awal_approve_assesor_1" => $request->periode_awal_asesor_i,
                "periode_akhir_approve_assesor_1" => $request->periode_akhir_asesor_i,
                "periode_awal_approve_assesor_2" => $request->periode_awal_asesor_ii,
                "periode_akhir_approve_assesor_2" => $request->periode_akhir_asesor_ii,
            ]);

        } catch (\Exception $err) {

            return redirect()->route('admin.generate_frk')->withErrors(['error' => $err->getMessage()]);
        }

        return redirect()->route('admin.generate_frk')->with('success', 'Tanggal FRK added successfully');
    }

    public function updateGenerateFRK(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'tahun_ajaran' => 'required|string',
            'semester',
            'tanggal_awal_rencana_kerja' => 'required|date',
            'tanggal_akhir_rencana_kerja' => 'required|date|after_or_equal:tanggal_awal_rencana_kerja',
            'periode_awal_asesor_i' => 'required|date',
            'periode_akhir_asesor_i' => 'required|date|after_or_equal:periode_awal_asesor_i',
            'periode_awal_asesor_ii' => 'required|date',
            'periode_akhir_asesor_ii' => 'required|date|after_or_equal:periode_awal_asesor_ii',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.generate_frk')->withErrors($validator)->withInput();
        }

        $auth = Tools::getAuth($request);

        try {
            $genData = Http::asForm()->post(env('API_ADMIN_SERVICE', false) . 'generate-tanggal', [
                'role' => json_decode(json_encode($auth->user->data_lengkap->pegawai), true)['posisi '],
                'tipe_tanggal' => 'FRK',
                "tahun_ajaran" => $request->tahun_ajaran,
                "semester" => $request->semester,
                "tgl_awal_pengisian" => $request->tanggal_awal_rencana_kerja,
                "tgl_akhir_pengisian" => $request->tanggal_akhir_rencana_kerja,
                "periode_awal_approve_assesor_1" => $request->periode_awal_asesor_i,
                "periode_akhir_approve_assesor_1" => $request->periode_akhir_asesor_i,
                "periode_awal_approve_assesor_2" => $request->periode_awal_asesor_ii,
                "periode_akhir_approve_assesor_2" => $request->periode_akhir_asesor_ii,
            ]);

        } catch (\Exception $err) {

            return redirect()->route('admin.generate_frk')->withErrors(['error' => $err->getMessage()]);
        }

        return redirect()->route('admin.generate_frk')->with('success', 'Tanggal FRK added successfully');
    }

    public function postGenerateFED(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tahun_ajaran' => 'required|string',
            'semester',
            'tanggal_awal_rencana_kerja' => 'required|date',
            'tanggal_akhir_rencana_kerja' => 'required|date|after_or_equal:tanggal_awal_rencana_kerja',
            'periode_awal_asesor_i' => 'required|date',
            'periode_akhir_asesor_i' => 'required|date|after_or_equal:periode_awal_asesor_i',
            'periode_awal_asesor_ii' => 'required|date',
            'periode_akhir_asesor_ii' => 'required|date|after_or_equal:periode_awal_asesor_ii',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.generate_frk')->withErrors($validator)->withInput();
        }

        $auth = Tools::getAuth($request);

        try {
            $genData = Http::asForm()->post(env('API_ADMIN_SERVICE', false) . 'generate-tanggal', [
                'role' => json_decode(json_encode($auth->user->data_lengkap->pegawai), true)['posisi '],
                'tipe_tanggal' => 'FED',
                "tahun_ajaran" => $request->tahun_ajaran,
                "semester" => $request->semester,
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

        $getSemester = Tools::getPeriod($auth->user->token, 'FED');

        return view('App.Admin.generateEvaluasi', ['auth' => $auth, 'semester' => $getSemester['data']]);
    }

    public function getAssignRole(Request $request)
    {
        $auth = Tools::getAuth($request);

        $getSemesterFRK = Tools::getPeriod($auth->user->token, 'FRK');
        $getSemesterFED = Tools::getPeriod($auth->user->token, 'FED');

        $requestData = Http::withToken($auth->user->token)->get(env('API_ADMIN_SERVICE') . 'get-eligible-asesor');

        $requestListAsesor = Http::withToken($auth->user->token)->get(env('API_ADMIN_SERVICE') . 'get-asesor');

        if (json_decode($requestData, true)['result'] == true)
        {
            $data = [
                'eligible_asesor' => json_decode($requestData, true),
                'tanggal_frk' => $getSemesterFRK['data'],
                'tanggal_fed' => $getSemesterFED['data'],
                'list_asesor' => json_decode($requestListAsesor,true),
            ];

            return view('App.Admin.assignRole', $data);
        } else {
            return redirect()->route('logout.get');
        }
    }

    public function postAssignRole(Request $request)
    {
        $auth = Tools::getAuth($request);

        $token = $auth->user->token;

        try {
            $requestData = Http::withToken($token)->asForm()->post(env('API_ADMIN_SERVICE', false) . 'assign-role', [
                'id_pegawai' => $request->id_pegawai,
                'id_FRK' => $request->id_FRK,
                'id_FED' => $request->id_FED,
                'jabatan' => $request->jabatan,
            ]);

            $decodeData = json_decode($requestData, true);

            if ($decodeData['result'] == false)
            {
                return redirect()->back()->with('error', $decodeData['error']);
            }
        } catch (\Exception $err) {
            return redirect()->back()->with('error', $err->getMessage());
        }


        return redirect()->back()->with('success', 'Asesor added successfully');
    }

    public function postTahunAjaran(Request $request)
    {
        $auth = Tools::getAuth($request);
    }

}

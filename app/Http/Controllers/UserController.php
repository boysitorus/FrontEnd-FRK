<?php

namespace App\Http\Controllers;

use App\Utils\Tools;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function userDashboard(Request $request)
    {
        $auth = Tools::getAuth($request);
        return view('Template.app', ['auth' => $auth]);
    }

    public function userProfile(Request $request)
    {
        $auth = Tools::getAuth($request);

        $decodeKeanggotaan = json_decode(json_encode($auth->user->data_lengkap->dosen), true)['prodi'];

        $prodiFITE = ['S1 Informatika','S1 Sistem Informasi','S1 Teknik Elektro'];
        $prodiVokasi = ['DIII Teknologi Informasi','DIII Teknologi Komputer', 'DIV Teknologi Rekayasa Perangkat Lunak'];
        $prodiBP = ['S1 Teknik Bioproses'];
        $prodiFTI = ['S1 Manajemen Rekayasa'];

        if (in_array($decodeKeanggotaan, $prodiFITE)) {
            $fakultas = "Fakultas Informatika dan Teknik Elektro";
        } else if (in_array($decodeKeanggotaan, $prodiVokasi)) {
            $fakultas = "Fakultas Vokasi";
        } else if (in_array($decodeKeanggotaan, $prodiBP)) {
            $fakultas = "Fakultas Bioteknologi";
        } else if (in_array($decodeKeanggotaan, $prodiFTI)) {
            $fakultas = "Fakultas Teknik Industri";
        }

        $role = json_decode(json_encode($auth->user->data_lengkap->pegawai), true)['posisi '];
        $isHumanResources = ($role === 'Staf Human Resources');

        $data = [
            'auth' => $auth, 
            'keanggotaan' => $fakultas,
            'isHumanResources' => $isHumanResources
        ];

        return view('App.Profile.profile', $data);
    }
}

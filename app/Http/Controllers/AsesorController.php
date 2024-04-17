<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Utils\Tools;

class AsesorController extends Controller
{
    public function getRencanaKegiatan(Request $request)
    {
        $auth = Tools::getAuth($request);

        return view('App.Asesor.rekapKegiatan',
        [
            'auth' => $auth
        ]);
    }

    public function getRencanaKegiatanSetuju(Request $request)
    {
        $auth = Tools::getAuth($request);

        return view('App.Asesor.rekapKegiatanSetuju',
        [
            'auth' => $auth
        ]);
    }

    public function getRencanaPendidikan(Request $request)
    {
        $auth = Tools::getAuth($request);

        return view('App.Asesor.pendidikanAsesor',
        [
            'auth' => $auth
        ]);
    }

    public function getRencanaPenelitian(Request $request)
    {
        $auth = Tools::getAuth($request);

        return view('App.Asesor.penelitianAsesor',
        [
            'auth' => $auth
        ]);
    }

    public function getRencanaPengabdian(Request $request)
    {
        $auth = Tools::getAuth($request);

        return view('App.Asesor.pengabdianAsesor',
        [
            'auth' => $auth
        ]);
    }
    public function getRencanaPenunjang(Request $request)
    {
        $auth = Tools::getAuth($request);

        return view('App.Asesor.penunjangAsesor',
        [
            'auth' => $auth
        ]);
    }
}

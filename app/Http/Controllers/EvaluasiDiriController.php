<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class EvaluasiDiriController extends Controller
{
    public function getPendidikanPanel(){
        return view('App.Evaluasi.pendidikan');
    }

    public function getPenunjangPanel(){
        return view('App.Evaluasi.penunjang');
    }

    public function getPengabdianPanel(){
        return view('App.Evaluasi.pengabdian');
    }

    public function getPenelitianPanel(){
        return view('App.Evaluasi.penelitian');
    }

    public function getSimpulanPanel(){
        return view('App.Evaluasi.FEDsimpulan');
    }

    public function getPendidikanSimpulanPanel(){
        return view('App.Evaluasi.simpulanPendidikan');
    }
    public function getPenelitianSimpulanPanel(){
        return view('App.Evaluasi.simpulanPenelitian');
    }
    public function getPengabdianSimpulanPanel(){
        return view('App.Evaluasi.simpulanPengabdian');
    }
    public function getPenunjangSimpulanPanel(){
        return view('App.Evaluasi.simpulanPenunjang');
    }
}
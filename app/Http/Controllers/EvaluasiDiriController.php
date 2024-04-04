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
}
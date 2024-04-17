<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RencanaKerjaController extends Controller
{
    public function getPendidikanPanel(){
        return view('App.Rencana.pendidikan');
    }

    public function getPenelitianPanel(){
        return view('App.Rencana.penelitian');
    }

    public function getSimpulanPanel(){
        return view('App.Rencana.simpulan');
    }

    public function getFEDSimpulanPanel(){
        return view('App.Rencana.FEDsimpulan');
    }
}

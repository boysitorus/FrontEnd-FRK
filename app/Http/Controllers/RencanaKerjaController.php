<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RencanaKerjaController extends Controller
{
    public function getPendidikanPanel(){
        return view('App.Rencana.pendidikan');
    }
}

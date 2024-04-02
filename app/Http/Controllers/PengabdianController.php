<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengabdianController extends Controller
{
    public function getAllPengabdian(){
        return view('App.Rencana.pengabdian');
    }
}
<?php

namespace App\Http\Controllers;

use App\Utils\Tools;
use Illuminate\Http\Request;

class AdminController extends Controller {
    public function getGenerateFRK()
    {
        return view('App.Admin.generateRencana');
    }
    public function getGenerateFED()
    {
        return view('App.Admin.generateEvaluasi');
    }
}
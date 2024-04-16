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
        return view('App.Profile.profile', ['auth' => $auth, 'keanggotaan' => json_decode(json_encode($auth->user->jabatan), true)[3]['jabatan']]);
    }
}

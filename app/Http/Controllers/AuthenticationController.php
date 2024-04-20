<?php

namespace App\Http\Controllers;

use App\Utils\Tools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthenticationController extends Controller
{
    public function get()
    {
        return view('Auth.login');
    }

    public function post(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

    //    dd($request);

        $parseResponse = null;

        try {
            $response =  Http::asForm()->post(env('API_USER_SERVICE', false) . 'login', [
                'username' => $request->username,
                'password' => $request->password
            ]);

            $parseData = json_decode($response->body(), true);

            if(!$parseData['result'])
            {
                return back()->with('error', 'Error, silahkan hubungi Developer! [3]');
            }

            Tools::setAuth($request, $parseData['data']);
            Tools::setToken($request, $parseData['token']);
            Tools::setTokenRefresh($request, $parseData['refresh_token']);

        //    dd(Tools::getAuth($request));

            return redirect()->route('profile');

        } catch (\Exception $err) {
//            dd($err);
            return back()->with('error', "Silahkan coba lagi!");
        }
//        try {
//            $response =  Http::asForm()->post(env('API_USER_SERVICE', false) . 'login', [
//                'username' => $request->username,
//                'password' => $request->password
//            ]);
//
//            $parseResponse = json_decode($response->body(), true);
//
//            if ($response->status() == 405) {
//                return back()->with('error', 'Terdapat kesalahan, silahkan hubungi Developer! [1]');
//            } else if ($response->status() >= 200) {
//                return back()->with('error', 'Terdapat kesalahan, silahkan hubungi Developer! [2]');
//            }
//
//            if(!$parseResponse['result'])
//            {
//                return back()->with('error', 'Error, silahkan hubungi Developer! [3]');
//            }
//
//            Tools::setAuth($request, $parseResponse['data']);
//            Tools::setToken($request, $parseResponse['token']);
//            Tools::setTokenRefresh($request, $parseResponse['refresh_token']);
//        } catch (\Exception $err) {
//            return back()->with('error', "Silahkan coba lagi!");
//        }

    }

    public function  logout(Request $request){

        Tools::setTokenRefresh($request, "");
        Tools::setToken($request, "");
        Tools::setAuth($request, "");
        return redirect()->route("user.login.get");

    }
}

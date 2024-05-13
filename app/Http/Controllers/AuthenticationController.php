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

            return redirect()->route('profile');

        } catch (\Exception $err) {
            return back()->with('error', "Silahkan coba lagi!");
        }
    }

    public function  logout(Request $request){

        Tools::setTokenRefresh($request, "");
        Tools::setToken($request, "");
        Tools::setAuth($request, "");
        return redirect()->route("user.login.get");

    }
}

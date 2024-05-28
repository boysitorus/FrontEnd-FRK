<?php

namespace App\Http\Controllers;

use App\Utils\Tools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    public function get()
    {
        return view('Auth.login');
    }

    public function post(Request $request)
    {
        // Validasi awal request
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        if ($validator->fails()) {
            return redirect()->route('user.login.get')->withErrors($validator)->withInput();
        }

        // Kirim permintaan ke API login
        $response = Http::asForm()->post(env('API_USER_SERVICE') . 'login', [
            'username' => $request->username,
            'password' => $request->password
        ]);

        $parseData = json_decode($response->body(), true);

        // Validasi respon dari API
        if (!$response->successful() || !$parseData['result']) {
            return redirect()->route('user.login.get')->withErrors(['error-login' => 'Error, akun anda salah'])->withInput();
        }

        // Set autentikasi dan token
        Tools::setAuth($request, $parseData['data']);
        Tools::setToken($request, $parseData['token']);
        Tools::setTokenRefresh($request, $parseData['refresh_token']);

        return redirect()->route('profile');
    }


    public function  logout(Request $request){

        Tools::setTokenRefresh($request, "");
        Tools::setToken($request, "");
        Tools::setAuth($request, "");
        return redirect()->route("user.login.get");

    }
}

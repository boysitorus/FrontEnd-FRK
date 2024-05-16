<?php

namespace App\Utils;

use Illuminate\Support\Facades\Http;

class   Tools{

    public static $SESSION_TOKEN = "itdel-token";
    public static $SESSION_TOKEN_REFRESH = "itdel-token-refresh";
    public static $SESSION_AUTH = "itdel-auth";

    public static function getAuth($request){
        return json_decode($request->session()->get(Tools::$SESSION_AUTH));
    }

    public static function setAuth($request, $data){
        $request->session()->put(Tools::$SESSION_AUTH, json_encode($data));
    }

    public static function getToken($request){
        return $request->session()->get(Tools::$SESSION_TOKEN);
    }

    public static function setToken($request, $token){
        $request->session()->put(Tools::$SESSION_TOKEN, $token);
    }

    public static function getTokenRefresh($request){
        return $request->session()->get(Tools::$SESSION_TOKEN_REFRESH);
    }

    public static function setTokenRefresh($request, $token_refresh){
        $request->session()->put(Tools::$SESSION_TOKEN_REFRESH, $token_refresh);
    }

    public static function getUserIdFromToken($token){

        $tokenData = explode(".", $token);
        if(is_array($tokenData) && sizeof($tokenData) < 3){
            return 0;
        }

        $payloadData = json_decode(base64_decode($tokenData[1]));
        if(!$payloadData || !isset($payloadData->uid)){
            return 0;
        }

        return $payloadData->uid;
    }

    public static function getPeriod($token, $type)
    {
        $requestDataTanggal = json_decode(Http::withToken($token)->asForm()->post(env('API_ADMIN_SERVICE').'get-tanggal', [
            'type' => $type
        ])->body(), true);

        return $requestDataTanggal;
    }

    public static function checkPeriodFRK($token)
    {

        /*
         * Format Tanggal ( Tahun - Tanggal - Bulan)
         *  Y - d - m
         */

        $requestDataTanggal = json_decode(Http::withToken($token)->asForm()->post(env('API_ADMIN_SERVICE').'get-tanggal', [
            'type' => 'FRK'
        ])->body(), true);

        $currentDate = strtotime(date("Y-m-d"));
        $tanggalAwal = strtotime($requestDataTanggal['data']['tgl_awal_pengisian']);
        $tanggalAkhir = strtotime($requestDataTanggal['data']['tgl_akhir_pengisian']);

        if ($tanggalAwal <= $currentDate && $currentDate <= $tanggalAkhir) {
            return true;
        } else {
            return false;
        }
    }

    public static function checkPeriodFED($token)
    {

        /*
         * Format Tanggal ( Tahun - Tanggal - Bulan)
         *  Y - d - m
         */

        $requestDataTanggal = json_decode(Http::withToken($token)->asForm()->post(env('API_ADMIN_SERVICE').'get-tanggal', [
            'type' => 'FED'
        ])->body(), true);

        $currentDate = strtotime(date("Y-m-d"));
        $tanggalAwal = strtotime($requestDataTanggal['data']['tgl_awal_pengisian']);
        $tanggalAkhir = strtotime($requestDataTanggal['data']['tgl_akhir_pengisian']);

        if ($tanggalAwal <= $currentDate && $currentDate <= $tanggalAkhir) {
            return true;
        } else {
            return false;
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PendidikanController extends Controller
{
    //

    public function getTeori()
    {
        $response = Http::get('http://localhost:9000/api/pendidikan/teori');
        $teori = json_decode($response, true);
        $data = ["teori" => $teori];

        return view('App.Rencana.pendidikan', $data);
    }

    public function postTeori(Request $request)
    {
        Http::post(
            'http://localhost:9000/api/pendidikan/teori',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jumlah_kelas' => $request->get('jumlah_kelas'),
                'jumlah_evaluasi' => $request->get('jumlah_evaluasi'),
                'sks_matakuliah' => $request->get('sks_matakuliah'),
            ]
        );

        return redirect()->back()->with('success', 'Pendidikan teori added successfully');
    }

    public function deleteTeori($id){
        $response = Http::delete("http://localhost:9000/api/pendidikan/teori/{$id}");

        if($response->successful()){
            
        }
    }
}

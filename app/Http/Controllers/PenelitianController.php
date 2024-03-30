<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
class PenelitianController extends Controller
{
    //
    public function getAll()
    {
        try {
            // Mengambil data penelitian kelompok dari Lumen
            $responsePenelitianKelompok = Http::get('http://localhost:8001/api/penelitian/penelitian_kelompok');
            $PenelitianKelompok = $responsePenelitianKelompok->json();

            // Mengambil data penelitian mandiri dari Lumen
            $responsePenelitianMandiri = Http::get('http://localhost:8001/api/penelitian/penelitian_mandiri');
            $PenelitianMandiri = $responsePenelitianMandiri->json();
            // Mengambil data c dari Lumen

            //Mengambil data d dari Lumen

            //Mengambil data e dari Lumen
            $responseMenyadur = Http::get('http://localhost:8001/api/penelitian/menyadur');
            $Menyadur = $responseMenyadur->json();

            //Mengambil data f dari Lumen
            $responseMenyunting = Http::get('http://localhost:8001/api/penelitian/menyunting');
            $Menyunting = $responseMenyunting->json();

            //Mengambil data g dari Lumen
            $responsePenelitianModul = Http::get('http://localhost:8001/api/penelitian/penelitian_modul');
            $PenelitianModul = $responsePenelitianModul->json();

            //Mengambil data h dari Lumen
            $responsePenelitianPekerti = Http::get('http://localhost:8001/api/penelitian/penelitian_pekerti');
            $PenelitianPekerti = $responsePenelitianPekerti->json();

            //Mengambil data i dari Lumen
            $responsePenelitianTridharma = Http::get('http://localhost:8001/api/penelitian/penelitian_tridharma');
            $PenelitianTridharma = $responsePenelitianTridharma->json();

            //Mengambil data j dari Lumen
            $responseJurnalIlmiah = Http::get('http://localhost:8001/api/penelitian/jurnal_ilmiah');
            $JurnalIlmiah = $responseJurnalIlmiah->json();

            //Mengambil data k dari Lumen
            $responseHakPaten = Http::get('http://localhost:8001/api/penelitian/hak_paten');
            $HakPaten = $responseHakPaten->json();

            //Mengambil data l dari Lumen
            $responseMediaMassa = Http::get('http://localhost:8001/api/penelitian/media_massa');
            $MediaMassa = $responseMediaMassa->json();

            //Mengambil data m dari Lumen
            $responsePembicaraSeminar = Http::get('http://localhost:8001/api/penelitian/pembicara_seminar');
            $PembicaraSeminar = $responsePembicaraSeminar->json();
            //Mengambil data n dari Lumen
            $responsePenyajianMakalah = Http::get('http://localhost:8001/api/penelitian/penyajian_makalah');
            $PenyajianMakalah = $responsePenyajianMakalah->json();


            // Menggabungkan data
            $data = [
                'penelitian_kelompok' => $PenelitianKelompok,
                'penelitian_mandiri' => $PenelitianMandiri,
                'menyadur'=>$Menyadur,
                'menyunting'=>$Menyunting,
                'penelitian_modul' => $PenelitianModul,
                'penelitian_pekerti' => $PenelitianPekerti,
                'penelitian_tridharma' => $PenelitianTridharma,
                'jurnal_ilmiah' => $JurnalIlmiah,
                'pembicara_seminar'=>$PembicaraSeminar,
                'penyajian_makalah'=>$PenyajianMakalah,
                'hak_paten'=>$HakPaten,
                'media_massa'=>$MediaMassa
            ];

            // Mengirim data ke view
            return view('App.Rencana.penelitian', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    // CRUD Tabel A. Penelitian Kelompok
    public function getPenelitianKelompok()
    {
        try {
            // Mengambil data penelitian kelompok dari Lumen
            $responsePenelitianKelompok = Http::get('http://localhost:8001/api/penelitian/penelitian_kelompok');
            $PenelitianKelompok = $responsePenelitianKelompok->json();

            $data = [
                'penelitian_kelompok' => $PenelitianKelompok,
            ];

            // Mengirim data ke view
            return view('App.Rencana.penelitian', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function postPenelitianKelompok(Request $request)
    {
        Http::post(
            'http://localhost:8001/api/penelitian/penelitian_kelompok',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'status_tahapan' => $request->get('status_tahapan'),
                'posisi' => $request->get('posisi'),
                'jumlah_anggota' => $request->get('jumlah_anggota'),
            ]
        );

        return redirect()->back()->with('success', 'Penelitian penelitian_kelompok added successfully');
    }

    public function editPenelitianKelompok(Request $request)
    {
        Http::post(
            'http://localhost:8001/api/penelitian/edit/penelitian_kelompok',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'status_tahapan' => $request->get('status_tahapan'),
                'posisi' => $request->get('posisi'),
                'jumlah_anggota' => $request->get('jumlah_anggota'),
            ]
        );

        return redirect()->back()->with('success', 'Penelitian kelompok updated successfully');
    }

    public function deletePenelitianKelompok($id)
    {
        Http::delete("http://localhost:8001/api/penelitian/penelitian_kelompok/{$id}");

        return redirect()->back()->with('success', 'Item deleted');
    }

    //END CRUD TABEL A. PENELITIAN KELOMPOK

    // CRUD Tabel B. PENELITIAN MANDIRI

    public function getPenelitianMandiri()
    {
        try {
            // Mengambil data penelitian mandiri dari Lumen
            $responsePenelitianMandiri = Http::get('http://localhost:8001/api/penelitian/penelitian_mandiri');
            $PenelitianMandiri = $responsePenelitianMandiri->json();

            $data = [
                'penelitian_mandiri' => $PenelitianMandiri,
            ];

            // Mengirim data ke view
            return view('App.Rencana.penelitian', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function postPenelitianMandiri(Request $request)
    {
        Http::post(
            'http://localhost:8001/api/penelitian/penelitian_mandiri',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'status_tahapan' => $request->get('status_tahapan')
            ]
        );

        return redirect()->back()->with('success', 'Penelitian penelitian_kelompok added successfully');
    }

    public function editPenelitianMandiri(Request $request)
    {
        Http::post(
            'http://localhost:8001/api/penelitian/edit/penelitian_mandiri',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'status_tahapan' => $request->get('status_tahapan')
            ]
        );

        return redirect()->back()->with('success', 'Penelitian kelompok updated successfully');
    }

    public function deletePenelitianMandiri($id)
    {
        Http::delete("http://localhost:8001/api/penelitian/penelitian_mandiri/{$id}");

        return redirect()->back()->with('success', 'Item deleted');
    }


    //END CRUD TABEL B. PENELITIAN MANDIRI

    // CRUD TABEL E. Menyadur
    public function getMenyadur()
    {
        try {
            // Mengambil data Menyadur naskah dari Lumen
            $responseMenyadur = Http::get('http://localhost:8001/api/penelitian/menyadur');
            $Menyadur= $responseMenyadur->json();

            $data = [
                'menyadur' => $Menyadur,
            ];

            // Mengirim data ke view
            return view('App.Rencana.penelitian', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function postMenyadur(Request $request)
    {
        Http::post(
            'http://localhost:8001/api/penelitian/menyadur',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'status_tahapan' => $request->get('status_tahapan'),
                'posisi' => $request->get('posisi'),
            ]
        );

        return redirect()->back()->with('success', 'Penelitian penelitian_kelompok added successfully');
    }

    public function editMenyadur(Request $request)
    {
        Http::post(
            'http://localhost:8001/api/penelitian/edit/menyadur',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'status_tahapan' => $request->get('status_tahapan'),
                'posisi' => $request->get('posisi'),
            ]
        );

        return redirect()->back()->with('success', 'Item updated successfully');
    }

    public function deleteMenyadur($id)
    {
        Http::delete("http://localhost:8001/api/penelitian/menyadur/{$id}");

        return redirect()->back()->with('success', 'Item deleted');
    }

    public function getMenyunting()
    {
        try {
            // Mengambil data Menyunting naskah dari Lumen
            $responseMenyunting = Http::get('http://localhost:8001/api/penelitian/menyunting');
            $Menyunting= $responseMenyunting->json();

            $data = [
                'menyunting' => $Menyunting,
            ];

            // Mengirim data ke view
            return view('App.Rencana.penelitian', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function postMenyunting(Request $request)
    {
        Http::post(
            'http://localhost:8001/api/penelitian/menyunting',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'status_tahapan' => $request->get('status_tahapan'),
                'posisi' => $request->get('posisi'),
            ]
        );

        return redirect()->back()->with('success', 'Penelitian penelitian_kelompok added successfully');
    }

    public function editMenyunting(Request $request)
    {
        Http::post(
            'http://localhost:8001/api/penelitian/edit/menyunting',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'status_tahapan' => $request->get('status_tahapan'),
                'posisi' => $request->get('posisi'),
            ]
        );

        return redirect()->back()->with('success', 'Item updated successfully');
    }

    public function deleteMenyunting($id)
    {
        Http::delete("http://localhost:8001/api/penelitian/menyunting/{$id}");

        return redirect()->back()->with('success', 'Item deleted');
    }

    // CRUD Tabel G. Penelitian Modul
    public function getPenelitianModul()
    {
        try {
            // Mengambil data penelitian modul dari Lumen
            $responsePenelitianModul = Http::get('http://localhost:8001/api/penelitian/penelitian_modul');
            $PenelitianModul = $responsePenelitianModul->json();

            $data = [
                'penelitian_modul' => $PenelitianModul,
            ];

            // Mengirim data ke view
            return view('App.Rencana.penelitian', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function postPenelitianModul(Request $request)
    {
        Http::post(
            'http://localhost:8001/api/penelitian/penelitian_modul',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'status_tahapan' => $request->get('status_tahapan'),
                'jenis_pengerjaan' => $request->get('jenis_pengerjaan'),
                'peran' => $request->get('peran'),
            ]
        );

        return redirect()->back()->with('success', 'Penelitian penelitian_modul added successfully');
    }

    public function editPenelitianModul(Request $request)
    {
        Http::post(
            'http://localhost:8001/api/penelitian/edit/penelitian_modul',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'status_tahapan' => $request->get('status_tahapan'),
                'jenis_pengerjaan' => $request->get('jenis_pengerjaan'),
                'peran' => $request->get('peran'),
            ]
        );

        return redirect()->back()->with('success', 'Penelitian modul updated successfully');
    }

    public function deletePenelitianModul($id)
    {
        Http::delete("http://localhost:8001/api/penelitian/penelitian_modul/{$id}");

        return redirect()->back()->with('success', 'Item deleted');
    }

    //END CRUD TABEL G. PENELITIAN MODUL

    // CRUD Tabel H. Penelitian Pekerti
    public function getPenelitianPekerti()
    {
        try {
            // Mengambil data penelitian modul dari Lumen
            $responsePenelitianPekerti = Http::get('http://localhost:8001/api/penelitian/penelitian_pekerti');
            $PenelitianPekerti = $responsePenelitianPekerti->json();

            $data = [
                'penelitian_pekerti' => $PenelitianPekerti,
            ];

            // Mengirim data ke view
            return view('App.Rencana.penelitian', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function postPenelitianPekerti(Request $request)
    {
        Http::post(
            'http://localhost:8001/api/penelitian/penelitian_pekerti',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
            ]
        );

        return redirect()->back()->with('success', 'Penelitian penelitian_pekerti added successfully');
    }

    public function editPenelitianPekerti(Request $request)
    {
        Http::post(
            'http://localhost:8001/api/penelitian/edit/penelitian_pekerti',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan')
            ]
        );

        return redirect()->back()->with('success', 'Penelitian pekerti updated successfully');
    }

    public function deletePenelitianPekerti($id)
    {
        Http::delete("http://localhost:8001/api/penelitian/penelitian_pekerti/{$id}");

        return redirect()->back()->with('success', 'Item deleted');
    }

    //END CRUD TABEL H. PENELITIAN PEKERTI


    //START CRUD TABEL I PELAKSANAAN TRIDHARMA


    public function getPenelitianTridharma()
    {
        try {
            // Mengambil data penelitian kelompok dari Lumen
            $responsePenelitianTridharma = Http::get('http://localhost:8001/api/penelitian/penelitian_tridharma');
            $PenelitianTridharma = $responsePenelitianTridharma->json();

            $data = [
                'penelitian_tridharma' => $PenelitianTridharma,
            ];

            // Mengirim data ke view
            return view('App.Rencana.penelitian', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function postPenelitianTridharma(Request $request)
    {
        Http::post(
            'http://localhost:8001/api/penelitian/penelitian_tridharma',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jumlah_bkd' => $request->get('jumlah_bkd'),
            ]
        );

        return redirect()->back()->with('success', 'Penelitian penyajian_makalah added successfully');
    }

    public function editPenelitianTridharma(Request $request)
    {
        Http::post(
            'http://localhost:8001/api/penelitian/edit/penelitian_tridharma',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'jumlah_bkd' => $request->get('jumlah_bkd'),
            ]
        );

        return redirect()->back()->with('success', 'Item updated successfully');
    }

    public function deletePenelitianTridharma($id){
        Http::delete("http://localhost:8001/api/penelitian/penelitian_tridharma/{$id}");

        return redirect()->back()->with('success', 'Item deleted');
    }

    // END CRUD BAGIAN I. PELAKSANAAN TRIDHARMA



    // START CRUD BAGIAN J. JURNAL ILMIAH
    public function getJurnalIlmiah(){
         try{
            //Mengambil data j dari Lumen
         $responseJurnalIlmiah = Http::get('http://localhost:8001/api/penelitian/jurnal_ilmiah');
         $JurnalIlmiah = $responseJurnalIlmiah->json();

            $data = [
                'jurnal_ilmiah' => $JurnalIlmiah,
            ];

            // Mengirim data ke view
            return view('App.Rencana.penelitian', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function postJurnalIlmiah(Request $request){
        $this->validate($request, 
        [
            'id_dosen'=> 'required',
            'nama_kegiatan' => 'required',
            'lingkup_penerbit'=> 'required',
            'jenis_pengerjaan' => 'required',
            'peran' => 'required',
        ]);

        Http::post(
            'http://localhost:8001/api/penelitian/jurnal_ilmiah',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'lingkup_penerbit'=> $request->get('lingkup_penerbit'),
                'jenis_pengerjaan' => $request->get('jenis_pengerjaan'),
                'peran'  => $request->get('peran'),

            ]
        );

        return redirect()->back()->with('success', 'Penelitian jurnal_ilmiah added successfully');
    }

    public function editJurnalIlmiah(Request $request)
    {
        Http::post(
            'http://localhost:8001/api/penelitian/edit/jurnal_ilmiah',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'lingkup_peberbit'=> $request->get('lingkup_penerbit'),
                'jenis_pengerjaan' => $request->get('jenis_pengerjaan'),
                'peran'  => $request->get('peran'),
            ]
        );

        return redirect()->back()->with('success', 'Item updated successfully');
    }

    public function deleteJurnalIlmiah($id){
        Http::delete("http://localhost:8001/api/penelitian/jurnal_ilmiah/{$id}");

        return redirect()->back()->with('success', 'Item deleted');
    }

    //END CRUD TABEL J JURNAL ILMIAH


    // CRUD TABEL K. HAK PATEN
    public function getHakPaten()
    {
        try {
            // Mengambil data Hak Paten naskah dari Lumen
            $responseHakPaten = Http::get('http://localhost:8001/api/penelitian/hak_paten');
            $HakPaten= $responseHakPaten->json();

            $data = [
                'hak_paten' => $HakPaten,
            ];

            // Mengirim data ke view
            return view('App.Rencana.penelitian', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function postHakPaten(Request $request){
        Http::post("http://localhost:8001/api/penelitian/hak_paten",
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'lingkup_wilayah' => $request->get('lingkup_wilayah'),
            ]
        );

        return redirect()->back()->with('success', 'Item stored successfully');
    }

    public function editHakPaten(Request $request)
    {
        Http::post(
            'http://localhost:8001/api/penelitian/edit/hak_paten',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'lingkup_wilayah' => $request->get('lingkup_wilayah'),

            ]
        );

        return redirect()->back()->with('success', 'Item updated successfully');
    }

    public function deleteHakPaten($id)
    {
        Http::delete("http://localhost:8001/api/penelitian/hak_paten/{$id}");

        return redirect()->back()->with('success', 'Item deleted');
    }

    // END CRUD TABEL K


    // CRUD TABEL L
    public function getMediaMassa()
    {
        try {
            // Mengambil data Media Massa naskah dari Lumen
            $responseMediaMassa = Http::get('http://localhost:8001/api/penelitian/media_massa');
            $MediaMassa= $responseMediaMassa->json();

            $data = [
                'media_massa' => $MediaMassa,
            ];

            // Mengirim data ke view
            return view('App.Rencana.penelitian', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function postMediaMassa(Request $request){
        Http::post("http://localhost:8001/api/penelitian/media_massa",
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
            ]
        );

        return redirect()->back()->with('success', 'Item stored successfully');
    }

    public function editMediaMassa(Request $request)
    {
        Http::post(
            'http://localhost:8001/api/penelitian/edit/media_massa',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),

            ]
        );

        return redirect()->back()->with('success', 'Item updated successfully');
    }

    public function deleteMediaMassa($id)
    {
        Http::delete("http://localhost:8001/api/penelitian/media_massa/{$id}");

        return redirect()->back()->with('success', 'Item deleted');
    }

    // END CRUD TABEL L



    // CRUD Tabel M

    public function getPembicaraSeminar()
    {
        try { 
            $responsePembicaraSeminar = Http::get('http://localhost:8001/api/penelitian/pembicara_seminar');
            $PembicaraSeminar= $responsePembicaraSeminar->json();
            
            $data = [
                'pembicara_seminar' => $PembicaraSeminar,
            ];
            
            return view('App.Rencana.penelitian', $data);
        } catch (\Throwable $th) { 
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }
    
    public function postPembicaraSeminar(Request $request)
    {
        Http::post(
            'http://localhost:8001/api/penelitian/pembicara_seminar',
            [
            'id_dosen' => $request->get('id_dosen'),
            'nama_kegiatan' => $request->get('nama_kegiatan'),
            'tingkatan' => $request->get('tingkatan'),
            ]
        );
            
        return redirect()->back()->with('success', 'Penelitian pembicara_seminar added successfully');
    }
            
    public function editPembicaraSeminar(Request $request)
    {  
        Http::post(
            'http://localhost:8001/api/penelitian/edit/pembicara_seminar',
            [
            'id_rencana' => $request->get('id_rencana'),
            'nama_kegiatan' => $request->get('nama_kegiatan'),
            'tingkatan' => $request->get('tingkatan'),
            ]
        );         
            
        return redirect()->back()->with('success', 'Item updated successfully');
    }
            
    public function deletePembicaraSeminar($id)
    {
        Http::delete("http://localhost:8001/api/penelitian/pembicara_seminar/{$id}");
            
    return redirect()->back()->with('success', 'Item deleted');
    }

    // CRUD Tabel N
    public function getPenyajianMakalah()
    {
        try {
            // Mengambil data penelitian kelompok dari Lumen
            $responsePenyajianMakalah = Http::get('http://localhost:8001/api/penelitian/penyajian_makalah');
            $PenyajianMakalah = $responsePenyajianMakalah->json();

            $data = [
                'penyajian_makalah' => $PenyajianMakalah,
            ];

            // Mengirim data ke view
            return view('App.Rencana.penelitian', $data);
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Failed to retrieve data from API'], 500);
        }
    }

    public function postPenyajianMakalah(Request $request)
    { 
        Http::post(
            'http://localhost:8001/api/penelitian/penyajian_makalah',
            [
                'id_dosen' => $request->get('id_dosen'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'tingkatan' => $request->get('tingkatan'),
                'jenis_kegiatan' => $request->get('jenis_kegiatan'),
                'posisi'=> $request ->get('posisi'),
                'jumlah_anggota' => $request->get('jumlah_anggota'),
                'jenis_pengerjaan' => $request->get('jenis_pengerjaan'),
            ]
        );

        return redirect()->back()->with('success', 'Penelitian penyajian_makalah added successfully');
    }

    public function editPenyajianMakalah(Request $request)
    { 
        Http::post(
            'http://localhost:8001/api/penelitian/edit/penyajian_makalah',
            [
                'id_rencana' => $request->get('id_rencana'),
                'nama_kegiatan' => $request->get('nama_kegiatan'),
                'tingkatan' => $request->get('tingkatan'),
                'jenis_pengerjaan' => $request->get('jenis_pengerjaan'),
                'posisi'=> $request ->get('posisi'),
                'jumlah_anggota' => $request->get('jumlah_anggota'), 
            ]
        );

        return redirect()->back()->with('success', 'Item updated successfully');
    }

    public function deletePenyajianMakalah($id)
    {
        Http::delete("http://localhost:8001/api/penelitian/penyajian_makalah/{$id}");

        return redirect()->back()->with('success', 'Item deleted');
    }



}
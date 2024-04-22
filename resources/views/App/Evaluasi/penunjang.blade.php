@extends('Template.evaluasi')

@section('content-kegiatan')

    {{-- TAMPILAN BAGIAN EVALUASI PENUNJANG --}}
<style>
  .border-hijau {
    border: 2px solid #008000; /* Border berwarna hijau */
    padding: 3px; /* Padding untuk memberi ruang di sekitar teks */
    border-radius: 5px; /* Untuk memberikan sudut-sudut yang melengkung pada border */
    display: inline-block; /* Mengatur agar border memenuhi ruang yang tersedia */
    background-color: #008000;
    color: #FFFFFF;
  }

  .border-kuning {
    border: 2px solid #FFFF00; 
    padding: 3px;
    border-radius: 5px; 
    display: inline-block; 
    background-color: #FFD700;
  }
</style>

    {{-- BAGIAN A --}}
    <div id="ed-penunjang-A" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>A. Bimbingan Akademik (perwalian/penasehat akademik)</b></h6>
            <hr />

    <div class="text-sm">
                <table id="tableEvaluasiPenunjang-A" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Mahasiswa</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                            <th scope="col" colspan="2 " class="allign-middle fw-bold col-2">Status</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                        </tr>
                        <tr>
                            <th scope="col" class="fw-bold">Asesor 1</th>
                            <th scope="col" class="fw-bold">Asesor 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>
                                <div class="border-kuning">
                                    <p>Lampiran belum di upload</p>
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditEvaluasiPenunjang_A"><i class="bi bi-plus-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN A --}}

    {{-- TEMPAT MODAL ADD FILE A--}}
    <div class="modal fade" id="modalEditEvaluasiPenunjang_A" tabindex="-1" aria-labelledby="modalEditEvaluasiPenunjangALabel"
    aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6
                     class="modal-title" id="modalEditEvaluasiPenunjangALabel">A. Bimbingan Akademik (perwalian/penasehat akademik)</h6
                    >
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                <ol>
                                    <li>Surat Tugas atau Surat Keputusan Membimbing dari Pimpinan</li>
                                    <li>Bukti Bimbingan</li>
                                    <li>Presensi Mahasiswa</li>
                                </ol>
                                <!-- File input -->
                                <input type="file" id="fileInput" multiple>
                            </br>
                            </br>
                                <p>*Dokumen yang dilengkapi dapat lebih dari 1 </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="uploadFiles()">Upload Lampiran</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL ADD FILE A--}}

    {{-- BAGIAN B --}}
    <div id="ed-penunjang-B" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>B.Bimbingan dan Konseling</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tableEvaluasiPenunjang-B" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Mahasiswa</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                            <th scope="col" colspan="2 " class="allign-middle fw-bold col-2">Status</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                        </tr>
                        <tr>
                            <th scope="col" class="fw-bold">Asesor 1</th>
                            <th scope="col" class="fw-bold">Asesor 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>
                                <div class="border-hijau">
                                    <p>Lampiran sudah di upload</p>
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditEvaluasiPenunjang_B"><i class="bi bi-plus-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN B --}}

    {{-- TEMPAT MODAL ADD FILE B--}}
    <div class="modal fade" id="modalEditEvaluasiPenunjang_B" tabindex="-1" aria-labelledby="modalEditEvaluasiPenunjangBLabel"
    aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6
                     class="modal-title" id="modalEditEvaluasiPenunjangBLabel">B.Bimbingan dan Konseling</h6
                    >
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                <ol>
                                    <li>Surat Tugas atau Surat Keputusan Membimbing dari Pimpinan</li>
                                    <li>Bukti Bimbingan</li>
                                    <li>Presensi mahasiswa yang memperoleh bimbingan dan konseling</li>
                                </ol>
                                <!-- File input -->
                                <input type="file" id="fileInput" multiple>
                            </br>
                            </br>
                                <p>*Dokumen yang dilengkapi dapat lebih dari 1 </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="uploadFiles()">Upload Lampiran</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL ADD FILE B--}}

    {{-- BAGIAN C --}}
    <div id="ed-penunjang-C" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>C. Pimpinan Pembinaan Unit kegiatan mahasiswa seperti; UKM, Ormawa (Organisasi Mahasiswa),
                    Himadep (Himpunan Mahasiswa Departemen), BEM (Badan Eksekutif Mahasiswa),
                    BLM (Badan Legislatif Mahasiswa, BSO (Badan Semi Otonom: misal SKI, kelompok kajian),
                    Majalah Mahasiswa, Bimbingan penalaran Mhs, LKMM, LKTI, LKIP)</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tableEvaluasiPenunjang-C" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                            <th scope="col" colspan="2 " class="allign-middle fw-bold col-2">Status</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                        </tr>
                        <tr>
                            <th scope="col" class="fw-bold">Asesor 1</th>
                            <th scope="col" class="fw-bold">Asesor 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>
                                <div class="border-hijau">
                                    <p>Lampiran sudah di upload</p>
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditEvaluasiPenunjang_C"><i class="bi bi-plus-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{--AKHIR BAGIAN C --}}

    {{-- TEMPAT MODAL ADD FILE C--}}
    <div class="modal fade" id="modalEditEvaluasiPenunjang_C" tabindex="-1" aria-labelledby="modalEditEvaluasiPenunjangCLabel"
    aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6
                     class="modal-title" id="modalEditEvaluasiPenunjangCLabel">C. Pimpinan Pembinaan Unit kegiatan mahasiswa seperti; UKM, Ormawa (Organisasi Mahasiswa),
                    Himadep (Himpunan Mahasiswa Departemen), BEM (Badan Eksekutif Mahasiswa),
                    BLM (Badan Legislatif Mahasiswa, BSO (Badan Semi Otonom: misal SKI, kelompok kajian),
                    Majalah Mahasiswa, Bimbingan penalaran Mhs, LKMM, LKTI, LKIP)</h6
                    >
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                <ol>
                                    <li>Surat Tugas/Surat  Keputusan/ Surat  Pengangkatan dari  Pimpinan</li>
                                    <li>Bukti pembinaan,  misal; kehadiran  dalam kegiatan  organisasi mahasiswa</li>
                                </ol>
                                <!-- File input -->
                                <input type="file" id="fileInput" multiple>
                            </br>
                            </br>
                                <p>*Dokumen yang dilengkapi dapat lebih dari 1 </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="uploadFiles()">Upload Lampiran</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL ADD FILE C--}}

    {{-- BAGIAN D --}}
    <div id="ed-penunjang-D" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>D. Pimpinan organisasi sosial intern sebagai hanya Ketua/Wakil yang dibina Ketua, misal
                    a. Koperasi fakultas, b. Dharma wanita, c. Takmir Masjid/Pastoran</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tableEvaluasiPenunjang-D" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle" 
                style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-4">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                        <th scope="col" colspan="2" class="align-middle fw-bold col-2">Status</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                    </tr>
                    <tr>
                        <th scope="col" class="fw-bold col-1">Asesor 1</th>
                        <th scope="col" class="fw-bold col-1">Asesor 2</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row1">1</td>
                        <td>
                            <div class="border-hijau">
                                <p>Lampiran sudah di upload</p>
                            </div>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <button type="button" class="btn btn-warning mr-1" 
                                data-bs-toggle="modal" data-bs-target="#modalEditEvaluasiPenunjang_D"><i class="bi bi-plus-square"></i></button>
                            <button type="button" class="btn btn-danger" 
                                data-bs-toggle="modal" data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN D --}}

    {{-- TEMPAT MODAL ADD FILE D--}}
    <div class="modal fade" id="modalEditEvaluasiPenunjang_D" tabindex="-1" aria-labelledby="modalEditEvaluasiPenunjangDLabel"
    aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6
                     class="modal-title" id="modalEditEvaluasiPenunjangDLabel">D. Pimpinan organisasi sosial intern sebagai hanya Ketua/Wakil yang dibina Ketua</h6
                    >
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                <ol>
                                    <li>Surat Tugas/ Surat Keputusan  Pimpinan</li> 
                                    <li>Laporan kegiatan atau  daftar hadir rapat  organisasi internal  tersebut</li>
                                </ol>
                                <!-- File input -->
                                <input type="file" id="fileInput" multiple>
                            </br>
                            </br>
                                <p>*Dokumen yang dilengkapi dapat lebih dari 1 </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="uploadFiles()">Upload Lampiran</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL ADD FILE D--}}

    {{-- BAGIAN E --}}
    <div id="ed-penunjang-E" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>E. Jabatan struktural (berdasarkan beban/semester)</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tableEvaluasiPenunjang-E" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jabatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                            <th scope="col" colspan="2 " class="allign-middle fw-bold col-2">Status</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                        </tr>
                        <tr>
                            <th scope="col" class="fw-bold">Asesor 1</th>
                            <th scope="col" class="fw-bold">Asesor 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>
                                <div class="border-hijau">
                                    <p>Lampiran sudah di upload</p>
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>   
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditEvaluasiPenunjang_E"><i class="bi bi-plus-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN E --}}

    {{-- TEMPAT MODAL ADD FILE E--}}
    <div class="modal fade" id="modalEditEvaluasiPenunjang_E" tabindex="-1" aria-labelledby="modalEditEvaluasiPenunjangELabel"
    aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6
                     class="modal-title" id="modalEditEvaluasiPenunjangELabel">E. Jabatan struktural (berdasarkan beban/semester)</h6
                    >
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                <ol>
                                    <li>SK Pengangkatan / Surat  Tugas dari Pejabat yang  berwenang</li>
                                </ol>
                                <!-- File input -->
                                <input type="file" id="fileInput" multiple>
                            </br>
                            </br>
                                <p>*Dokumen yang dilengkapi dapat lebih dari 1 </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="uploadFiles()">Upload Lampiran</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL ADD FILE E--}}

    {{-- BAGIAN F --}}
    <div id="ed-penunjang-F" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>F. Jabatan non struktural</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tableEvaluasiPenunjang-F" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jabatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                            <th scope="col" colspan="2 " class="allign-middle fw-bold col-2">Status</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                        </tr>
                        <tr>
                            <th scope="col" class="fw-bold">Asesor 1</th>
                            <th scope="col" class="fw-bold">Asesor 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>
                                <div class="border-hijau">
                                    <p>Lampiran sudah di upload</p>
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditEvaluasiPenunjang_F"><i class="bi bi-plus-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN F --}}

    {{-- TEMPAT MODAL ADD FILE F--}}
    <div class="modal fade" id="modalEditEvaluasiPenunjang_F" tabindex="-1" aria-labelledby="modalEditEvaluasiPenunjangFLabel"
    aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6
                     class="modal-title" id="modalEditEvaluasiPenunjangFLabel">F. Jabatan non struktural</h6
                    >
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                <ol>
                                    <li>SK Pengangkatan / Surat  Tugas dari Pejabat yang  berwenang</li>
                                </ol>
                                <!-- File input -->
                                <input type="file" id="fileInput" multiple>
                            </br>
                            </br>
                                <p>*Dokumen yang dilengkapi dapat lebih dari 1 </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="uploadFiles()">Upload Lampiran</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL ADD FILE F--}}

    {{-- BAGIAN G --}}
    <div id="ed-penunjang-G" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>G. Ketua Redaksi Jurnal ber-ISSN / Anggota Redaksi Jurnal ber-ISSN</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tableEvaluasiPenunjang-G" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jabatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                            <th scope="col" colspan="2 " class="allign-middle fw-bold col-2">Status</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                        </tr>
                        <tr>
                            <th scope="col" class="fw-bold">Asesor 1</th>
                            <th scope="col" class="fw-bold">Asesor 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>
                                <div class="border-hijau">
                                    <p>Lampiran sudah di upload</p>
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditEvaluasiPenunjang_G"><i class="bi bi-plus-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN G --}}

    {{-- TEMPAT MODAL ADD FILE G--}}
    <div class="modal fade" id="modalEditEvaluasiPenunjang_G" tabindex="-1" aria-labelledby="modalEditEvaluasiPenunjangGLabel"
    aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6
                     class="modal-title" id="modalEditEvaluasiPenunjangGLabel">G. Ketua Redaksi Jurnal ber-ISSN / Anggota Redaksi Jurnal ber-ISSN</h6
                    >
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                <ol>
                                    <li>Surat Tugas/Surat Keputusan  Pimpinan</li> 
                                    <li>Bukti jurnal yang sudah  terbit</li>
                                </ol>
                                <!-- File input -->
                                <input type="file" id="fileInput" multiple>
                            </br>
                            </br>
                                <p>*Dokumen yang dilengkapi dapat lebih dari 1 </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="uploadFiles()">Upload Lampiran</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL ADD FILE G--}}

    {{-- BAGIAN H --}}
    <div id="ed-penunjang-H" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>H. Ketua Panitia Ad Hoc: (umur panitia sekurang-kurangnya 2 semester),
                    seperti Panitia Reviewer RKAT, Panitia Telaah Prodi Anggota Panitia Ad Hoc</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tableEvaluasiPenunjang-H" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jabatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                            <th scope="col" colspan="2 " class="allign-middle fw-bold col-2">Status</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                        </tr>
                        <tr>
                            <th scope="col" class="fw-bold">Asesor 1</th>
                            <th scope="col" class="fw-bold">Asesor 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>
                                <div class="border-hijau">
                                    <p>Lampiran sudah di upload</p>
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditEvaluasiPenunjang_H"><i class="bi bi-plus-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN H --}}

    {{-- TEMPAT MODAL ADD FILE H--}}
    <div class="modal fade" id="modalEditEvaluasiPenunjang_H" tabindex="-1" aria-labelledby="modalEditEvaluasiPenunjangHLabel"
    aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modalEditEvaluasiPenunjangHLabel">H. Ketua Panitia Ad Hoc: (umur panitia sekurang-kurangnya 2 semester),
                    seperti Panitia Reviewer RKAT, Panitia Telaah Prodi Anggota Panitia Ad Hoc</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                <ol>
                                    <li>Surat Tugas/Surat Keputusan Pimpinan</li>
                                    <li>Laporan Kegiatan</li>
                                </ol>
                                <!-- File input -->
                                <input type="file" id="fileInput" multiple>
                            </br>
                            </br>
                                <p>*Dokumen yang dilengkapi dapat lebih dari 1 </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="uploadFiles()">Upload Lampiran</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL ADD FILE H--}}

    {{-- BAGIAN I --}}
    <div id="ed-penunjang-I" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body"><b><h6>I. Ketua Panitia Tetap: (umur panitia sekurang-kurangnya 2 semester)</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tableEvaluasiPenunjang-I" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Tingkat Jabatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                            <th scope="col" colspan="2 " class="allign-middle fw-bold col-2">Status</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                        </tr>
                        <tr>
                            <th scope="col" class="fw-bold">Asesor 1</th>
                            <th scope="col" class="fw-bold">Asesor 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>
                                <div class="border-hijau">
                                    <p>Lampiran sudah di upload</p>
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditEvaluasiPenunjang_I"><i class="bi bi-plus-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN I --}}

    {{-- TEMPAT MODAL ADD FILE I--}}
    <div class="modal fade" id="modalEditEvaluasiPenunjang_I" tabindex="-1" aria-labelledby="modalEditEvaluasiPenunjangILabel"
    aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modalEditEvaluasiPenunjangILabel">I. Ketua Panitia Tetap: (umur panitia sekurang-kurangnya 2 semester)</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                <ol>
                                    <li>Surat Tugas/Surat Keputusan Pimpinan</li>
                                    <li>Laporan Kegiatan</li>
                                </ol>
                                <!-- File input -->
                                <input type="file" id="fileInput" multiple>
                            </br>
                            </br>
                                <p>*Dokumen yang dilengkapi dapat lebih dari 1 </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="uploadFiles()">Upload Lampiran</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL ADD FILE I--}}

    {{-- BAGIAN J--}}
    <div id="ed-penunjang-J" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
            <div class="card-body">
                <h6><b>J. Anggota Panitia Tetap: (umur panitia sekurang-kurangnya 2 semester)</b></h6>
                <hr />

                <div class="text-sm">
                    <table id="tableEvaluasiPenunjang-J" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                        style="border: 2px;">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">Tingkat Jabatan</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                                <th scope="col" colspan="2 " class="allign-middle fw-bold col-2">Status</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                            </tr>
                            <tr>
                                <th scope="col" class="fw-bold">Asesor 1</th>
                                <th scope="col" class="fw-bold">Asesor 2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">1</td>
                                <td>
                                    <div class="border-hijau">
                                        <p>Lampiran sudah di upload</p>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditEvaluasiPenunjang_J"><i class="bi bi-plus-square"></i></button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    {{-- AKHIR BAGIAN J --}}

    {{-- TEMPAT MODAL ADD FILE J--}}
    <div class="modal fade" id="modalEditEvaluasiPenunjang_J" tabindex="-1" aria-labelledby="modalEditEvaluasiPenunjangJLabel"
    aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6
                     class="modal-title" id="modalEditEvaluasiPenunjangJLabel">J. Anggota Panitia Tetap: (umur panitia sekurang-kurangnya 2 semester)</h6
                    >
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                <ol>
                                    <li>Surat Tugas/Surat Keputusan Pimpinan</li>
                                    <li>Laporan Kegiatan</li>
                                </ol>
                                <!-- File input -->
                                <input type="file" id="fileInput" multiple>
                            </br>
                            </br>
                                <p>*Dokumen yang dilengkapi dapat lebih dari 1 </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="uploadFiles()">Upload Lampiran</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL ADD FILE J--}}

    {{-- BAGIAN K--}}
    <div id="ed-penunjang-K" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
            <div class="card-body">
                <h6><b>K. Menjadi Pengurus Yayasan : APTISI atau BMPTSI , asesor BAN-PT</b></h6>
                <hr />

                <div class="text-sm">
                    <table id="tableEvaluasiPenunjang-K" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                        style="border: 2px;">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">Jabatan(Ketua/Anggota)</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                                <th scope="col" colspan="2 " class="allign-middle fw-bold col-2">Status</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                            </tr>
                            <tr>
                                <th scope="col" class="fw-bold">Asesor 1</th>
                                <th scope="col" class="fw-bold">Asesor 2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">1</td>
                                <td>
                                    <div class="border-hijau">
                                        <p>Lampiran sudah di upload</p>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditEvaluasiPenunjang_K"><i class="bi bi-plus-square"></i></button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    {{-- AKHIR BAGIAN K --}}

    {{-- TEMPAT MODAL ADD FILE K--}}
    <div class="modal fade" id="modalEditEvaluasiPenunjang_K" tabindex="-1" aria-labelledby="modalEditEvaluasiPenunjangKLabel"
    aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6
                     class="modal-title" id="modalEditEvaluasiPenunjangKLabel">K. Menjadi Pengurus Yayasan : APTISI atau BMPTSI , asesor BAN-PT</h6
                    >
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                <ol>
                                    <li>Surat Tugas/Surat Keputusan Pimpinan</li>
                                    <li>Laporan Kegiatan</li>
                                </ol>
                                <!-- File input -->
                                <input type="file" id="fileInput" multiple>
                            </br>
                            </br>
                                <p>*Dokumen yang dilengkapi dapat lebih dari 1 </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="uploadFiles()">Upload Lampiran</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL ADD FILE K--}}

    {{-- BAGIAN L--}}
    <div id="ed-penunjang-L" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
            <div class="card-body">
                <h6><b>L. Menjadi Pengurus/Anggota Asosiasi Profesi</b></h6>
                <hr />

                <div class="text-sm">
                    <table id="tableEvaluasiPenunjang-L" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                        style="border: 2px;">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Jabatan(Ketua/Anggota)</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">Tingkatan</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                                <th scope="col" colspan="2 " class="allign-middle fw-bold col-2">Status</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                            </tr>
                            <tr>
                                <th scope="col" class="fw-bold">Asesor 1</th>
                                <th scope="col" class="fw-bold">Asesor 2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">1</td>
                                <td>
                                    <div class="border-hijau">
                                        <p>Lampiran sudah di upload</p>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditEvaluasiPenunjang_L"><i class="bi bi-plus-square"></i></button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    {{-- AKHIR BAGIAN L --}}

    {{-- TEMPAT MODAL ADD FILE L--}}
    <div class="modal fade" id="modalEditEvaluasiPenunjang_L" tabindex="-1" aria-labelledby="modalEditEvaluasiPenunjangLLabel"
    aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modalEditEvaluasiPenunjangLLabel">L. Menjadi Pengurus/Anggota Asosiasi Profesi</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                <ol>
                                    <li>Surat Tugas/Surat Keputusan Pimpinan</li>
                                    <li>Kartu Anggota</li>
                                    <li>Laporan Kegiatan</li>
                                </ol>
                                <!-- File input -->
                                <input type="file" id="fileInput" multiple>
                            </br>
                            </br>
                                <p>*Dokumen yang dilengkapi dapat lebih dari 1 </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="uploadFiles()">Upload Lampiran</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL ADD FILE L--}}

    {{-- BAGIAN M--}}
    <div id="ed-penunjang-M" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
            <div class="card-body">
                <h6><b>M. Peserta Seminar/Workshop/Kursus Berdasar Penugasan Pimpinan</b></h6>
                <hr />

                <div class="text-sm">
                    <table id="tableEvaluasiPenunjang-M" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                        style="border: 2px;">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">Tingkatan</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                                <th scope="col" colspan="2 " class="allign-middle fw-bold col-2">Status</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                            </tr>
                            <tr>
                                <th scope="col" class="fw-bold">Asesor 1</th>
                                <th scope="col" class="fw-bold">Asesor 2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">1</td>
                                <td>
                                    <div class="border-hijau">
                                        <p>Lampiran sudah di upload</p>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditEvaluasiPenunjang_M"><i class="bi bi-plus-square"></i></button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    {{-- AKHIR BAGIAN M--}}

    {{-- TEMPAT MODAL ADD FILE M--}}
    <div class="modal fade" id="modalEditEvaluasiPenunjang_M" tabindex="-1" aria-labelledby="modalEditEvaluasiPenunjangMLabel"
    aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modalEditEvaluasiPenunjangMLabel">M. Peserta Seminar/Workshop/Kursus Berdasar Penugasan Pimpinan</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                <ol>
                                    <li>Surat Tugas/Surat Keputusan Pimpinan</li>
                                    <li>Sertifikasi atau bukti lain kehadiran di kegiatan tersebut</li>
                                </ol>
                                <!-- File input -->
                                <input type="file" id="fileInput" multiple>
                            </br>
                            </br>
                                <p>*Dokumen yang dilengkapi dapat lebih dari 1 </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="uploadFiles()">Upload Lampiran</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL ADD FILE M--}}

    {{-- BAGIAN N--}}
    <div id="ed-penunjang-N" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
            <div class="card-body">
                <h6><b>N. Reviewer jurnal ilmiah , proposal Hibah dll</b></h6>
                <hr />

                <div class="text-sm">
                    <table id="tableEvaluasiPenunjang-N" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                        style="border: 2px;">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                                <th scope="col" colspan="2 " class="allign-middle fw-bold col-2">Status</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                            </tr>
                            <tr>
                                <th scope="col" class="fw-bold">Asesor 1</th>
                                <th scope="col" class="fw-bold">Asesor 2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">1</td>
                                <td>
                                    <div class="border-hijau">
                                        <p>Lampiran sudah di upload</p>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditEvaluasiPenunjang_N"><i class="bi bi-plus-square"></i></button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    {{-- AKHIR BAGIAN N--}}

    {{-- TEMPAT MODAL ADD FILE N--}}
    <div class="modal fade" id="modalEditEvaluasiPenunjang_N" tabindex="-1" aria-labelledby="modalEditEvaluasiPenunjangNLabel"
    aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modalEditEvaluasiPenunjangNLabel">N. Reviewer jurnal ilmiah , proposal Hibah dll</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                <ol>
                                    <li>Surat Tugas/Surat Keputusan Pimpinan</li>
                                    <li>Bukti hasil telaah artikel/proposal yang direview</li>
                                </ol>
                                <!-- File input -->
                                <input type="file" id="fileInput" multiple>
                            </br>
                            </br>
                                <p>*Dokumen yang dilengkapi dapat lebih dari 1 </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="uploadFiles()">Upload Lampiran</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL ADD FILE N--}}

    {{-- TEMPAT MODAL DELETE CONFIRM --}}
    <div class="modal fade" id="modalDeleteConfirm" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body text-center">
                        <h1><i class="bi bi-x-circle text-danger"></i></h1>
                        <h5>Yakin untuk menghapus kegiatan ini?</h5>
                        <p class="text-muted small">proses ini tidak dapat diurungkan bila anda sudah menekan tombol 'Yakin'
                        </p>
                    </div>

                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                        <button id="confirmDeleteBtn" type="button" class="btn btn-danger">Yakin</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- TEMPAT TOAST --}}

        {{-- TOAST EDIT --}}
        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div id="editToast" class="toast bg-success-subtle" role="alert" aria-live="assertive"
                aria-atomic="true">
                <div class="toast-body">
                    <i class="bi bi-check2-circle"></i>
                    Berhasil Mengubah Kegiatan
                </div>
            </div>
        </div>

        {{-- TOAST DELETE --}}
        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div id="deleteToast" class="toast bg-success-subtle" role="alert" aria-live="assertive"
                aria-atomic="true">
                <div class="toast-body">
                    <i class="bi bi-check2-circle"></i>
                    Berhasil Menghapus Kegiatan
                </div>
            </div>
        </div>

        {{-- TEMPAT JAVASCRIPT --}}
        <script>
            document.getElementById('confirmEditBtn').addEventListener('click', function() {
                showEditToast();
            });

            function showEditToast() {
                // Menutup modal
                $('#modalEditConfirm').modal('hide');

                // Menambahkan kelas 'show' ke elemen toast
                $('#editToast').addClass('show');

                // Menghapus kelas 'show' setelah beberapa detik (sesuaikan dengan durasi animasi toast)
                setTimeout(function() {
                    $('#editToast').removeClass('show');
                }, 3000); // 3000 milidetik (3 detik) disesuaikan dengan durasi animasi toast
            }
        </script>

        <script>
            document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
                showDeleteToast();
            });

            function showDeleteToast() {
                // Menutup modal
                $('#modalDeleteConfirm').modal('hide');

                // Menambahkan kelas 'show' ke elemen toast
                $('#deleteToast').addClass('show');

                // Menghapus kelas 'show' setelah beberapa detik (sesuaikan dengan durasi animasi toast)
                setTimeout(function() {
                    $('#deleteToast').removeClass('show');
                }, 3000); // 3000 milidetik (3 detik) disesuaikan dengan durasi animasi toast
            }
        </script>

@endsection
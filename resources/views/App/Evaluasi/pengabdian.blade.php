@extends('Template.evaluasi')

@section('content-kegiatan')

    {{-- TAMPILAN BAGIAN EVALUASI PENGABDIAN --}}

    {{-- BAGIAN A --}}
    
    <div id="pengabdian-A" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>A. Satu kegiatan yang setara dengan 50 jam kerja</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablePengabdian-A" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Durasi Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" colspan="2 " class="allign-middle fw-bold col-3">Status</th>
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
                            <td>Lorem ipsum dolor sit amet consectetur.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPengabdian_A"><i class="bi bi-plus-square"></i></button>
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

    {{-- MODAL UPLOAD A --}}
    <div class="modal fade" id="modalEditPengabdian_A" tabindex="-1" aria-labelledby="modalEditPengabdian_A_label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditPengabdian_A_label"><b>A. Satu kegiatan yang setara dengan 50 jam kerja</h5></b>
                    </div>
                    <div class="modal-body">
                        
                    <form>
                                <div class="mb-3">
                                <label for="formFile" class="form-label"><b><h6>Surat Permohonan/undangan atau surat penerimaan dari lembaga yang menjadi sasaran pengabdian masyarakat</b></h6></label>
                                <input class="form-control" type="file" id="formFile">
                                </div>
                    </form>
                    <form>
                                <div class="mb-3">
                                <label for="formFile" class="form-label"><b><h6>Surat tugas/ijin/persetujuan dari pimpinan</b></h6></label>
                                <input class="form-control" type="file" id="formFile">
                                </div>
                    </form>
                    <form>
                                <div class="mb-3">
                                <label for="formFile" class="form-label"><b><h6>Laporan kegiatan</b></h6></label>
                                <input class="form-control" type="file" id="formFile">
                                </div>
                    </form>
                    <form>
                                <div class="mb-3">
                                <label for="formFile" class="form-label"><b><h6>Materi yang disampaikan</b></h6> </label>
                                <input class="form-control" type="file" id="formFile">
                                </div>
                    </form>
                    
                    </div>
                    <div class="modal-footer py-4">
                    <button type="button" class="btn btn-outline-primary me-3" data-bs-toggle="modal" 
                    data-bs-target="#modalBatal">Batal</button>
                        <button type="button" class="btn btn-primary" onclick="uploadFiles()">Upload Lampiran</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- AKHIR MODAL UPLOAD A --}}

{{--AKHIR BAGIAN MODAL BATAL UPLOAD A}}

    {{-- BAGIAN B --}}
    <div id="pengabdian-B" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>B. Memberikan penyuluhan/penataran kepada masyarakat</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablePengabdian-B" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Durasi Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Jumlah</th>
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
                            <td>Lorem ipsum dolor sit amet consectetur.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPengabdian_B"><i class="bi bi-plus-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN B --}}

    {{-- MODAL UPLOAD B--}}
    <div class="modal fade" id="modalEditPengabdian_B" tabindex="-1" aria-labelledby="modalEditPengabdian_B_label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditPengabdian_B_label"><b>B. Memberikan penyuluhan/penataran kepada masyarakat </h5></b>
                    </div>
                    <div class="modal-body">
                        
                    <form>
                                <div class="mb-3">
                                <label for="formFile" class="form-label"><b><h6>Surat permohonan/undangan atau surat penerimaan dari lembaga yang menjadi sasaran pengabdian masyarakat</b></h6></label>
                                <input class="form-control" type="file" id="formFile">
                                </div>
                    </form>
                    <form>
                                <div class="mb-3">
                                <label for="formFile" class="form-label"><b><h6>Surat tugas/ijin/persetujuan dari Pimpinan</b></h6></label>
                                <input class="form-control" type="file" id="formFile">
                                </div>
                    </form>
                    <form>
                                <div class="mb-3">
                                <label for="formFile" class="form-label"><b><h6>Laporan kegiatan</b></h6></label>
                                <input class="form-control" type="file" id="formFile">
                                </div>
                    </form>
                    <form>
                                <div class="mb-3">
                                <label for="formFile" class="form-label"><b><h6>Materi yang disampaikan</b></h6> </label>
                                <input class="form-control" type="file" id="formFile">
                                </div>
                    </form>
                    </div>
                    <div class="modal-footer py-4">
                    <button type="button" class="btn btn-outline-primary me-3" data-bs-toggle="modal" 
                    data-bs-target="#modalBatal">Batal</button>
                        <button type="button" class="btn btn-primary" onclick="uploadFiles()">Upload Lampiran</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- AKHIR MODAL UPLOAD B --}}

    {{-- BAGIAN C --}}
    <div id="pengabdian-C" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>C. Memberikan jassa konsultan yang relavan dengan kepakarannya atas persetujuan/penugasan pimpinan PT</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablePengabdian-C" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jabatan(Ketua/Anggota)</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Proyek</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Peran</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Jumlah</th>
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
                            <td>Lorem ipsum dolor sit amet consectetur.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPengabdian_C"><i class="bi bi-plus-square"></i></button>
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

    {{-- MODAL UPLOAD C--}}
    <div class="modal fade" id="modalEditPengabdian_C" tabindex="-1" aria-labelledby="modalEditPengabdian_C_label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditPengabdian_C_label"><b>C. Memberikan jasa konsultan yang relevan kepakarannya atas persetujuan/penugasan pimpinan PT  </h5></b>
                    </div>
                    <div class="modal-body">
                        
                    <form>
                                <div class="mb-3">
                                <label for="formFile" class="form-label"><b><h6>Surat Permohonan/Persetujuan/ Keputusan/Penunjukkan sebagai Konsultan/ Tenaga Ahli/Staf Ahli dari institusi terkait </b></h6></label>
                                <input class="form-control" type="file" id="formFile">
                                </div>
                    </form>
                    <form>
                                <div class="mb-3">
                                <label for="formFile" class="form-label"><b><h6>Laporan progres layanan konsultasi, bagi yang sedang berjalan </b></h6></label>
                                <input class="form-control" type="file" id="formFile">
                                </div>
                    </form>
                    <form>
                                <div class="mb-3">
                                <label for="formFile" class="form-label"><b><h6>Laporan progres layanan konsultasi, bagi yang sedang berjalan </b></h6></label>
                                <input class="form-control" type="file" id="formFile">
                                </div>
                    </form>
                    </div>
                    <div class="modal-footer py-4">
                    <button type="button" class="btn btn-outline-primary me-3" data-bs-toggle="modal" 
                    data-bs-target="#modalBatal">Batal</button>
                        <button type="button" class="btn btn-primary" onclick="uploadFiles()">Upload Lampiran</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- AKHIR MODAL UPLOAD C --}}

    {{-- BAGIAN D --}}
    <div id="pengabdian-D" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>D. Membuat/menulis karya pengabdian kepada masyarakat dengan menulis 1 judul, direncanakan terbit ber ISBN, ada kontrak penerbitan dan atau sudah diterbitkan dan ber-ISBN</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablePengabdian-D" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle" 
                style="border: 2px;">
                <thead>
                     <tr>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Tahapan</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Posisi (Penulis Utama/Penuls lainnya)</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
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
                        <td>Lorem ipsum dolor sit amet consectetur.</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPengabdian_D"><i class="bi bi-plus-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN D --}}

    {{-- MODAL UPLOAD D --}}
    <div class="modal fade" id="modalEditPengabdian_D" tabindex="-1" aria-labelledby="modalEditPengabdian_D_label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditPengabdian_D_label"><b>D. Membuat/menulis karya pengabdian kepada masyarakat dengan menulis 1 judul, direncanakan terbit ber ISBN, ada kontrak penerbitan dan atau sudah diterbitkan dan ber-ISBN </h5></b>
                    </div>
                    <div class="modal-body">
                        
                    <form>
                                <div class="mb-3">
                                <label for="formFile" class="form-label"><b><h6>Buku yang sudah terbit </b></h6></label>
                                <input class="form-control" type="file" id="formFile">
                                </div>
                    </form>
                    <form>
                                <div class="mb-3">
                                <label for="formFile" class="form-label"><b><h6>Bukti kontrak penerbitan jika 
                                masih naik cetak </b></h6></label>
                                <input class="form-control" type="file" id="formFile">
                                </div>
                    </form>
                    <form>
                                <div class="mb-3">
                                <label for="formFile" class="form-label"><b><h6>Surat Keterangan Sedang Menulis 
                                Buku dari Pimpinan bagi yang sedang menulis buku, dengan mencantumkan akan selesai dalam 
                                berapa lama, bagi yang sedang menulis. </b></h6></label>
                                <input class="form-control" type="file" id="formFile">
                                </div>
                    </form>
                    <form>
                                <div class="mb-3">
                                <label for="formFile" class="form-label"><b><h6>Progres penulisan buku dll., bagi 
                                yang sedang dalam proses </b></h6> </label>
                                <input class="form-control" type="file" id="formFile">
                                </div>
                    </form>
                    
                    </div>
                    <div class="modal-footer py-4">
                    <button type="button" class="btn btn-outline-primary me-3" data-bs-toggle="modal" 
                    data-bs-target="#modalBatal">Batal</button>
                        <button type="button" class="btn btn-primary" onclick="uploadFiles()">Upload Lampiran</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- AKHIR MODAL UPLOAD D --}}

    {{-- BAGIAN E --}}
    <div id="pengabdian-E" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>E. Membuat/menulis karya pengabdian masyarakat dengan menulis 1 judul, ada editor, tiap chapter ada kontributor</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablePengabdian-E" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Tahapan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Posisi (Editor/Kontributor)</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
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
                            <td>Lorem ipsum dolor sit amet consectetur.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>   
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPengabdian_E"><i class="bi bi-plus-square"></i></button>
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

    {{-- MODAL UPLOAD E --}}
    <div class="modal fade" id="modalEditPengabdian_E" tabindex="-1" aria-labelledby="modalEditPengabdian_E_label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditPengabdian_E_label"><b>E. Membuat/menulis karya pengabdian masyarakat dengan menulis 1 judul, ada editor, tiap chapter ada kontributor</h5></b>
                    </div>
                    <div class="modal-body">
                        
                    <form>
                                <div class="mb-3">
                                <label for="formFile" class="form-label"><b><h6>Buku yang sudah terbit </b></h6></label>
                                <input class="form-control" type="file" id="formFile">
                                </div>
                    </form>
                    <form>
                                <div class="mb-3">
                                <label for="formFile" class="form-label"><b><h6>Bukti kontrak penerbitan jika 
                                masih naik cetak </b></h6></label>
                                <input class="form-control" type="file" id="formFile">
                                </div>
                    </form>
                    <form>
                                <div class="mb-3">
                                <label for="formFile" class="form-label"><b><h6>Surat Keterangan Sedang Menulis 
                                Buku dari Pimpinan bagi yang sedang menulis buku, dengan mencantumkan akan selesai dalam 
                                berapa lama, bagi yang sedang menulis </b></h6></label>
                                <input class="form-control" type="file" id="formFile">
                                </div>
                    </form>
                    <form>
                                <div class="mb-3">
                                <label for="formFile" class="form-label"><b><h6>Progres penulisan buku dll., bagi 
                                yang sedang dalam proses </b></h6> </label>
                                <input class="form-control" type="file" id="formFile">
                                </div>
                    </form>
                    </div>
                    <div class="modal-footer py-4">
                    <button type="button" class="btn btn-outline-primary me-3" data-bs-toggle="modal" 
                    data-bs-target="#modalBatal">Batal</button>
                        <button type="button" class="btn btn-primary" onclick="uploadFiles()">Upload Lampiran</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- AKHIR MODAL UPLOAD E --}}

    {{-- BAGIAN F --}}
    <div id="pengabdian-F" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>F. Membuat/menulis karya pengabdian kepada masyarakat dengan menulis karya pengabdian yang dipakai sebagai Modul Pelatihan oleh seorang Dosen (Tidak diterbitkan, tetapi digunakan oleh siswa mahasiswa)</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablePengabdian-F" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Tahapan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
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
                            <td>Lorem ipsum dolor sit amet consectetur.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPengabdian_F"><i class="bi bi-plus-square"></i></button>
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

    {{-- MODAL UPLOAD F --}}
    <div class="modal fade" id="modalEditPengabdian_F" tabindex="-1" aria-labelledby="modalEditPengabdian_F_label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditPengabdian_F_label"><b>F. Membuat/menulis karya pengabdian kepada masyarakat dengan menulis karya pengabdian yang dipakai sebagai Modul Pelatihan oleh seorang Dosen (Tidak diterbitkan, tetapi digunakan oleh siswa mahasiswa)</h5></b>
                    </div>
                    <div class="modal-body">
                        
                    <form>
                                <div class="mb-3">
                                <label for="formFile" class="form-label"><b><h6>Buku yang sudah terbit</b></h6></label>
                                <input class="form-control" type="file" id="formFile">
                                </div>
                    </form>
                    <form>
                                <div class="mb-3">
                                <label for="formFile" class="form-label"><b><h6>Buku yang sudah terbit </b></h6></label>
                                <input class="form-control" type="file" id="formFile">
                                </div>
                    </form>
                    <form>
                                <div class="mb-3">
                                <label for="formFile" class="form-label"><b><h6>Bukti kontrak penerbitan jika masih naik cetak</b></h6></label>
                                <input class="form-control" type="file" id="formFile">
                                </div>
                    </form>
                    <form>
                                <div class="mb-3">
                                <label for="formFile" class="form-label"><b><h6>Surat Keterangan Sedang Menulis Buku dari Pimpinan, bagi yang sedng menulis buku, dengan mencantumkan akan selesai dalam berapa lama, bagi yang sedang menulis</b></h6> </label>
                                <input class="form-control" type="file" id="formFile">
                                </div>
                    </form>
                    <form>
                                <div class="mb-3">
                                <label for="formFile" class="form-label"><b><h6>Progres penulisan buku dll., bagi yang sedang dalam proses</b></h6> </label>
                                <input class="form-control" type="file" id="formFile">
                                </div>
                    </form>
                    </div>
                    <div class="modal-footer py-4">
                    <button type="button" class="btn btn-outline-primary me-3" data-bs-toggle="modal" 
                    data-bs-target="#modalBatal">Batal</button>
                        <button type="button" class="btn btn-primary" onclick="uploadFiles()">Upload Lampiran</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- AKHIR MODAL UPLOAD F --}}

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
       
        {{-- MODAL BATAL UPLOAD --}}
        <div class="modal fade" id="modalBatal" tabindex="-1" aria-labelledby="modalBatal_label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-body text-center" style="padding: 8%;">
                        <h5 class="modal-title" id="modalBatal_label py-5">Apakah anda yakin untuk membatalkan pengumpulan lampiran?</h5>
                        <div class="my-4">
                            <button type="button" class="btn btn-primary mx-3" data-bs-dismiss="modal">Yakin</button>
                            <button type="button" class="btn btn-secondary mx-3">Tidak</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- AKHIR BAGIAN MODAL BATAL UPLOAD --}}

        {{-- TEMPAT TOAST --}}

        {{-- TOAS EDIT --}}
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

        <script>
        document.addEventListener("DOMContentLoaded", function() {
            var editButton = document.querySelector("#modalEditButton");

        editButton.addEventListener("click", function() {
            var modalEdit = new bootstrap.Modal(document.querySelector("#modalEditPengabdian_A"));
        modalEdit.show();
            });
        });
        </script>

@endsection
@extends('Template.evaluasi')

@section('content-kegiatan')

{{-- BAGIAN A --}}
    <div id="pengabdian-A" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>A. Satu kegiatan yang setara dengan 50 jam kerja</b></h6>
            <hr />

            <!-- <div class="row justify-content-end mr-0">
                <button id="btnFrkPenunjangA" type="button" class="btn btn-success col-md-auto m-1"
                    data-bs-toggle="modal" data-bs-target="#modalPenunjang_A">
                    Tambah Kegiatan
                </button>
            </div> -->

            <div class="text-sm">
                <table id="tablePenunjang-A" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Jumlah Kelas Tatap Muka</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Jumlah Kelas Evaluasi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Mata Kuliah</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">SKS Terhitung</th>
                            <th scope="col" colspan="2 " class="allign-middle fw-bold col-2">Status</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Aksi</th>
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
                                    data-bs-target="#modalEditPengabdian_A"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn" data-bs-toggle="modal" 
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>


                            </td>
                        </tr>
                        <tr>
                            <td scope="row">2</td>
                            <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit
                                arcu pharetra.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPengabdian_A"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn" data-bs-toggle="modal" 
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN A --}}

    {{-- BAGIAN B --}}
    <div id="pengabdian-b" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>B. Memberikan penyuluhan/penataran kepada masyarakat</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablePenunjang-B" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Jumlah Mahasiswa Bimbingan </th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">SKS Terhitung</th>
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
                                    data-bs-target="#modalEditPengabdian_B"><i class="bi bi-pencil-square"></i></button>
                            <button type="button" class="btn" data-bs-toggle="modal" 
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>

                            </td>
                        </tr>
                        <tr>
                            <td scope="row">2</td>
                            <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit
                                arcu pharetra.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPengabdian_B"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn" data-bs-toggle="modal" 
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN B --}}

    {{-- BAGIAN C --}}
    <div id="pengabdian-C" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>C. Memberikan jasa konsultan yang relevan dengan  kepakarannya atas persetujuan/penugasan pimpinan PT</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablePenunjang-A" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Jumlah Mahasiswa Bimbingan </th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">SKS Terhitung</th>
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
                                    data-bs-target="#modalEditPengabdian_C"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn" data-bs-toggle="modal" 
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>

                            </td>
                        </tr>
                        <tr>
                            <td scope="row">2</td>
                            <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit
                                arcu pharetra.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPengabdian_C"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn" data-bs-toggle="modal" 
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN C --}}

    {{-- BAGIAN D --}}
    <div id="pengabdian-D" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>D. Membuat/menulis karya pengabdian kepada masyarakat dengan menulis 1 judul, direncanakan terbit ber ISBN, ada kontrak penerbitan dan atau sudah diterbitkan dan ber – ISBN</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablePenunjang-A" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Jumlah Kelompok</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">SKS Terhitung</th>
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
                                    data-bs-target="#modalEditPengabdian_D"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn" data-bs-toggle="modal" 
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>

                            </td>
                        </tr>
                        <tr>
                            <td scope="row">2</td>
                            <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit
                                arcu pharetra.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPengabdian_D"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn" data-bs-toggle="modal" 
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN D --}}

    {{-- BAGIAN E --}}
    <div id="pengabdian-E" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>E. Membuat/menulis karya pengabdian kepada masyarakat dengan menulis 1 judul, ada editor, tiap chapter ada kontributor</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablePenunjang-A" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Jumlah Kelompok Dibimbing</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">SKS Terhitung</th>
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
                                    data-bs-target="#modalEditPengabdian_E"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn" data-bs-toggle="modal" 
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>

                            </td>
                        </tr>
                        <tr>
                            <td scope="row">2</td>
                            <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit
                                arcu pharetra.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPengabdian_E"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn" data-bs-toggle="modal" 
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN E --}}

    {{-- BAGIAN F --}}
    <div id="pengabdian-F" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>F. Membuat/menulis karya pengabdian kepada masyarakat dengan menulis karya pengabdian yang dipakai sebagai Modul Pelatihan oleh seorang Dosen (Tidak diterbitkan, tetapi digunakan oleh siswa mahasiswa)</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablePenunjang-A" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Jumlah Mahasiswa Dibimbing</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">SKS Terhitung</th>
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
                                    data-bs-target="#modalEditPengabdian_F"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn" data-bs-toggle="modal" 
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>

                            </td>
                        </tr>
                        <tr>
                            <td scope="row">2</td>
                            <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit
                                arcu pharetra.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPengabdian_F"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn" data-bs-toggle="modal" 
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN F --}}



    {{-- TEMPAT MODAL EDIT CONFIRM A--}}
        <div class="modal fade" id="modalEditPengabdian_A" tabindex="-1" aria-labelledby="modalEditPengabdianALabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="width: 200%;">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="container">
                    <div class="modal-body text-center" style="height: 200px; margin-top: 100px;"> 
                        <b><h5>Choose a file here</b></h5>
                        
                        <input type="file" id="fileInput" multiple>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary" onclick="uploadFiles()">Upload Lampiran</button>
                    </div>
                </div>
            </div>
        </div>

    {{-- AKHIR MODAL EDIT --}}

    {{-- TEMPAT MODAL EDIT CONFIRM B--}}
        <div class="modal fade" id="modalEditPengabdian_B" tabindex="-1" aria-labelledby="modalEditPengabdianBLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="width: 200%;">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="container">
                    <div class="modal-body text-center" style="height: 200px; margin-top: 100px;"> 
                        <b><h5>Choose a file here</b></h5>
                        
                        <input type="file" id="fileInput" multiple>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary" onclick="uploadFiles()">Upload Lampiran</button>
                    </div>
                </div>
            </div>
        </div>
    {{-- AKHIR MODAL EDIT --}}

    {{-- TEMPAT MODAL EDIT CONFIRM C--}}
    <div class="modal fade" id="modalEditPengabdian_C" tabindex="-1" aria-labelledby="modalEditPengabdianCLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="width: 200%;">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="container">
                    <div class="modal-body text-center" style="height: 200px; margin-top: 100px;"> 
                        <b><h5>Choose a file here</b></h5>
                        
                        <input type="file" id="fileInput" multiple>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary" onclick="uploadFiles()">Upload Lampiran</button>
                    </div>
                </div>
            </div>
        </div>
    {{-- AKHIR MODAL EDIT --}}

    {{-- TEMPAT MODAL EDIT CONFIRM D--}}
        <div class="modal fade" id="modalEditPengabdian_D" tabindex="-1" aria-labelledby="modalEditPengabdianDLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditPengabdianDLabel">Edit Kegiatan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                        <form>
                            <div class="mb-3">
                                <label for="editKegiatan" class="form-label">Nama Kegiatan:</label>
                                <input type="text" class="form-control" id="editKegiatan">
                            </div>
                            
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </div>
    {{-- AKHIR MODAL EDIT --}}

    {{-- TEMPAT MODAL EDIT CONFIRM E--}}
        <div class="modal fade" id="modalEditPengabdian_E" tabindex="-1" aria-labelledby="modalEditPengabdianELabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditPengabdianELabel">Edit Kegiatan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                    <form>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Kegiatan:</label>
                                    <input type="text" class="form-control" id="nama">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jabatan:</label>
                                    <input class="form-control" type="text">
                                </div>
                            </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </div>
    {{-- AKHIR MODAL EDIT --}}

    {{-- TEMPAT MODAL EDIT CONFIRM F--}}
        <div class="modal fade" id="modalEditPengabdianF" tabindex="-1" aria-labelledby="modalEditPengabdianFLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditPengabdianFLabel">Edit Kegiatan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                            <form>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Kegiatan:</label>
                                    <input type="text" class="form-control" id="nama">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jabatan:</label>
                                    <input class="form-control" type="text">
                                </div>
                            </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </div>
    {{-- AKHIR MODAL EDIT --}}


 
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

    <script>
        // Fungsi untuk mencegah perilaku default saat drag dan drop
        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        // Inisialisasi dropArea dan menambahkan event listener
        const dropArea = document.getElementById('dropArea');
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, preventDefaults, false);
        });

        // Menandai dropArea saat dragover
        ['dragenter', 'dragover'].forEach(eventName => {
            dropArea.addEventListener(eventName, () => {
                dropArea.classList.add('active');
            }, false);
        });

        // Menghapus penandaan dropArea saat dragleave atau drop
        ['dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, () => {
                dropArea.classList.remove('active');
            }, false);
        });

        // Menangani drop file
        dropArea.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;

            handleFiles(files);
        }

        // Fungsi untuk mengunggah file
        function uploadFiles() {
            const files = document.getElementById('fileInput').files;
            handleFiles(files);
        }

        // Fungsi untuk menangani file yang diunggah
        function handleFiles(files) {
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                // Lakukan sesuatu dengan file yang diunggah, misalnya mengirimnya ke server
                console.log('Uploaded file:', file.name);
            }
        }

    </script> 


@endsection
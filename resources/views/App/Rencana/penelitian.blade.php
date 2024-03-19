@extends('Template.rencana')


@section('content-penelitian')

<div class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
                <div class="card-body">
                    <h5><b>A. Keterlibatan dalam 1 judul penelitian atau pembuatan karya seni atau teknologi yang dilakukan oleh kelompok (disetujui oleh pimpinan dan tercapai)</b></h5>
                    <hr/>

                    <div class = "row justify-content-end mr-0">
                        <button id="btnFrkPenelitianA" type="button" class="btn btn-success col-md-auto mt-2 mb-2">Tambah Kegiatan</button>

                    </div>

                    <table class="table table-striped table-bordered mt-2 text-center" style="border: 2px;">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2" class="align-middle">No.</th>
                                <th scope="col" rowspan="2" class="align-middle">Kegiatan</th>
                                <th scope="col" rowspan="2" class="align-middle">Tahap Pencapaian</th>
                                <th scope="col" rowspan="2" class="align-middle">Posisi (Ketua/Anggota)</th>
                                <th scope="col" rowspan="2" class="align-middle">Jumlah Anggota</th>
                                <th scope="col" rowspan="2" class="align-middle">SKS Terhitung</th>
                                <th scope="col" colspan="2">Status</th>
                                <th scope="col" rowspan="2" class="align-middle" style="width:100px;">Aksi</th>
                            </tr>
                            <tr>
                                <th scope="col">Asesor 1</th>
                                <th scope="col">Asesor 2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">1</td>
                                <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="#">
                                        <img src="{{ asset('assets/icon/Vectoredit.svg') }}" alt="edit"/>
                                    </a>
                                    <a>
                                        <img src="{{ asset('assets/icon/Vectordelete.svg') }}" alt="delete"/>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">2</td>
                                <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td scope="row">3</td>
                                <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
                <div class="card-body">
                    <h5><b>B. Pelaksanaan penelitian mandiri atau pembuatan karya seni atau teknologi (disetujui oleh pimpinan dan tercatat)</b></h5>
                    <hr/>

                    <div class = "row justify-content-end mr-0">
                    <button id="btnFrkPenelitianB" type="button" class="btn btn-success col-md-auto mt-2 mb-2">Tambah Kegiatan</button>
                    </div>

                    <table class="table table-striped table-bordered mt-2 text-center" style="border: 2px;">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2" class="align-middle">No.</th>
                                <th scope="col" rowspan="2" class="align-middle">Kegiatan</th>
                                <th scope="col" rowspan="2" class="align-middle">Tahap Pencapaian</th>
                                <th scope="col" rowspan="2" class="align-middle">SKS Terhitung</th>
                                <th scope="col" colspan="2">Status</th>
                                <th scope="col" rowspan="2" class="align-middle">Aksi</th>
                            </tr>
                            <tr>
                                <th scope="col">Asesor 1</th>
                                <th scope="col">Asesor 2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">1</td>
                                <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td scope="row">2</td>
                                <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td scope="row">3</td>
                                <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
{{-- Wilo --}}
            <div class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
                <div class="card-body">
                    <h5><b>A. Keterlibatan dalam 1 judul penelitian atau pembuatan karya seni atau teknologi yang dilakukan oleh kelompok disetujui oleh pimpinan dan tercapai</b></h5>
                    <hr/>

                    <div class = "row justify-content-end mr-0">
                        <button id="btnFrkPenelitianA" type="button" class="btn btn-success col-md-auto mt-2 mb-2">Tambah Kegiatan</button>

                    </div>

                    <table class="table table-striped table-bordered mt-2 text-center" style="border: 2px;">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2" class="align-middle">No.</th>
                                <th scope="col" rowspan="2" class="align-middle">Kegiatan</th>
                                <th scope="col" rowspan="2" class="align-middle">Tahap Pencapaian</th>
                                <th scope="col" rowspan="2" class="align-middle">Jenis Pengerjaan</th>
                                <th scope="col" rowspan="2" class="align-middle">Peran</th>
                                <th scope="col" rowspan="2" class="align-middle">Kategori</th>
                                <th scope="col" rowspan="2" class="align-middle">SKS Terhitung</th>
                                <th scope="col" colspan="2">Status</th>
                                <th scope="col" rowspan="2" class="align-middle" style="width:100px;">Aksi</th>
                            </tr>
                            <tr>
                                <th scope="col">Asesor 1</th>
                                <th scope="col">Asesor 2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">1</td>
                                <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="#">
                                        <img src="{{ asset('assets/icon/Vectoredit.svg') }}" alt="edit"/>
                                    </a>
                                    <a>
                                        <img src="{{ asset('assets/icon/Vectordelete.svg') }}" alt="delete"/>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">2</td>
                                <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td scope="row">3</td>
                                <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
                <div class="card-body">
                    <h5><b>D. Menulis satu judul naskah buku internasional (berbahasa dan diedarkan secara internasional minimal  tiga negara), disetujui oleh pimpinan dan tercatat</b></h5>
                    <hr/>

                    <div class = "row justify-content-end mr-0">
                        <button id="btnFrkPenelitianA" type="button" class="btn btn-success col-md-auto mt-2 mb-2">Tambah Kegiatan</button>

                    </div>

                    <table class="table table-striped table-bordered mt-2 text-center" style="border: 2px;">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2" class="align-middle">No.</th>
                                <th scope="col" rowspan="2" class="align-middle">Kegiatan</th>
                                <th scope="col" rowspan="2" class="align-middle">Tahap Pencapaian</th>
                                <th scope="col" rowspan="2" class="align-middle">Jenis Pekerjaan</th>
                                <th scope="col" rowspan="2" class="align-middle">Peran</th>
                                <th scope="col" rowspan="2" class="align-middle">SKS Terhitung</th>
                                <th scope="col" colspan="2">Status</th>
                                <th scope="col" rowspan="2" class="align-middle" style="width:100px;">Aksi</th>
                            </tr>
                            <tr>
                                <th scope="col">Asesor 1</th>
                                <th scope="col">Asesor 2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">1</td>
                                <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="#">
                                        <img src="{{ asset('assets/icon/Vectoredit.svg') }}" alt="edit"/>
                                    </a>
                                    <a>
                                        <img src="{{ asset('assets/icon/Vectordelete.svg') }}" alt="delete"/>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">2</td>
                                <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td scope="row">3</td>
                                <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
                <div class="card-body">
                    <h5><b>G. Menulis Modul/Diktat/Bahan Ajar oleh seorang Dosen  yang sesuai dengan bidang ilmu dan tidak diterbitkan,  tetapi digunakan oleh mahasiswa</b></h5>
                    <hr/>

                    <div class = "row justify-content-end mr-0">
                        <button id="btnFrkPenelitianG" type="button" class="btn btn-success col-md-auto mt-2 mb-2">Tambah Kegiatan</button>

                    </div>

                    <table class="table table-striped table-bordered mt-2 text-center" style="border: 2px;">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2" class="align-middle">No.</th>
                                <th scope="col" rowspan="2" class="align-middle">Kegiatan</th>
                                <th scope="col" rowspan="2" class="align-middle">Tahap Pencapaian</th>
                                <th scope="col" rowspan="2" class="align-middle">Jenis Pengerjaan</th>
                                <th scope="col" rowspan="2" class="align-middle">Jumlah Anggota Tim</th>
                                <th scope="col" rowspan="2" class="align-middle">SKS Terhitung</th>
                                <th scope="col" colspan="2">Status</th>
                                <th scope="col" rowspan="2" class="align-middle" style="width:100px;">Aksi</th>
                            </tr>
                            <tr>
                                <th scope="col">Asesor 1</th>
                                <th scope="col">Asesor 2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">1</td>
                                <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="#">
                                        <img src="{{ asset('assets/icon/Vectoredit.svg') }}" alt="edit"/>
                                    </a>
                                    <a>
                                        <img src="{{ asset('assets/icon/Vectordelete.svg') }}" alt="delete"/>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">2</td>
                                <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="#">
                                        <img src="{{ asset('assets/icon/Vectoredit.svg') }}" alt="edit"/>
                                    </a>
                                    <a>
                                        <img src="{{ asset('assets/icon/Vectordelete.svg') }}" alt="delete"/>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">3</td>
                                <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="#">
                                        <img src="{{ asset('assets/icon/Vectoredit.svg') }}" alt="edit"/>
                                    </a>
                                    <a>
                                        <img src="{{ asset('assets/icon/Vectordelete.svg') }}" alt="delete"/>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
                <div class="card-body">
                    <h5><b>H. PEKERTI/AA</b></h5>
                    <hr/>

                    <div class = "row justify-content-end mr-0">
                        <button id="btnFrkPenelitianH" type="button" class="btn btn-success col-md-auto mt-2 mb-2">Tambah Kegiatan</button>

                    </div>

                    <table class="table table-striped table-bordered mt-2 text-center" style="border: 2px;">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2" class="align-middle">No.</th>
                                <th scope="col" rowspan="2" class="align-middle">SKS Terhitung</th>
                                <th scope="col" colspan="2">Status</th>
                                <th scope="col" rowspan="2" class="align-middle" style="width:100px;">Aksi</th>
                            </tr>
                            <tr>
                                <th scope="col">Asesor 1</th>
                                <th scope="col">Asesor 2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">1</td>
                                <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="#">
                                        <img src="{{ asset('assets/icon/Vectoredit.svg') }}" alt="edit"/>
                                    </a>
                                    <a>
                                        <img src="{{ asset('assets/icon/Vectordelete.svg') }}" alt="delete"/>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">2</td>
                                <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="#">
                                        <img src="{{ asset('assets/icon/Vectoredit.svg') }}" alt="edit"/>
                                    </a>
                                    <a>
                                        <img src="{{ asset('assets/icon/Vectordelete.svg') }}" alt="delete"/>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">3</td>
                                <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="#">
                                        <img src="{{ asset('assets/icon/Vectoredit.svg') }}" alt="edit"/>
                                    </a>
                                    <a>
                                        <img src="{{ asset('assets/icon/Vectordelete.svg') }}" alt="delete"/>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
                <div class="card-body">
                    <h5><b>I. Sebagai asesor Beban Kerja Dosen dan Evaluasi Pelaksanaan Tridharma Perguruan Tinggi</b></h5>
                    <hr/>

                    <div class = "row justify-content-end mr-0">
                        <button id="btnFrkPenelitianG" type="button" class="btn btn-success col-md-auto mt-2 mb-2">Tambah Kegiatan</button>

                    </div>

                    <table class="table table-striped table-bordered mt-2 text-center" style="border: 2px;">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2" class="align-middle">No.</th>
                                <th scope="col" rowspan="2" class="align-middle">Kegiatan</th>
                                <th scope="col" rowspan="2" class="align-middle">Banyaknya BKD yang Terhitung</th>
                                <th scope="col" rowspan="2" class="align-middle">SKS Terhitung</th>
                                <th scope="col" colspan="2">Status</th>
                                <th scope="col" rowspan="2" class="align-middle" style="width:100px;">Aksi</th>
                            </tr>
                            <tr>
                                <th scope="col">Asesor 1</th>
                                <th scope="col">Asesor 2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">1</td>
                                <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="#">
                                        <img src="{{ asset('assets/icon/Vectoredit.svg') }}" alt="edit"/>
                                    </a>
                                    <a>
                                        <img src="{{ asset('assets/icon/Vectordelete.svg') }}" alt="delete"/>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">2</td>
                                <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="#">
                                        <img src="{{ asset('assets/icon/Vectoredit.svg') }}" alt="edit"/>
                                    </a>
                                    <a>
                                        <img src="{{ asset('assets/icon/Vectordelete.svg') }}" alt="delete"/>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">3</td>
                                <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="#">
                                        <img src="{{ asset('assets/icon/Vectoredit.svg') }}" alt="edit"/>
                                    </a>
                                    <a>
                                        <img src="{{ asset('assets/icon/Vectordelete.svg') }}" alt="delete"/>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
                <div class="card-body">
                    <h5><b>J. Menulis Jurnal Ilmiah</b></h5>
                    <hr/>

                    <div class = "row justify-content-end mr-0">
                        <button id="btnFrkPenelitianG" type="button" class="btn btn-success col-md-auto mt-2 mb-2">Tambah Kegiatan</button>

                    </div>

                    <table class="table table-striped table-bordered mt-2 text-center" style="border: 2px;">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2" class="align-middle">No.</th>
                                <th scope="col" rowspan="2" class="align-middle">Kegiatan</th>
                                <th scope="col" rowspan="2" class="align-middle">Kategori</th>
                                <th scope="col" rowspan="2" class="align-middle">SKS Terhitung</th>
                                <th scope="col" colspan="2">Status</th>
                                <th scope="col" rowspan="2" class="align-middle" style="width:100px;">Aksi</th>
                            </tr>
                            <tr>
                                <th scope="col">Asesor 1</th>
                                <th scope="col">Asesor 2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">1</td>
                                <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="#">
                                        <img src="{{ asset('assets/icon/Vectoredit.svg') }}" alt="edit"/>
                                    </a>
                                    <a>
                                        <img src="{{ asset('assets/icon/Vectordelete.svg') }}" alt="delete"/>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">2</td>
                                <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="#">
                                        <img src="{{ asset('assets/icon/Vectoredit.svg') }}" alt="edit"/>
                                    </a>
                                    <a>
                                        <img src="{{ asset('assets/icon/Vectordelete.svg') }}" alt="delete"/>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

@endsection

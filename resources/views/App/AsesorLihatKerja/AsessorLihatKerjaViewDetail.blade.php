@extends($isHumanResources ? 'Template.admin' : 'Template.app')

@section('content')
    <div class = "mt-5 flex-wrap ml-4 mr-4 ">
        <div class = "row">
            <div class = "col">
                <h3 class = "font-weight-bold">Rekap Kegiatan</h3>
                <p class = "breadcrumbs">Rencana Kerja / Rekap Kegiatan</p>
            </div>
            <div class = "col-md-auto">
                <div class="alert alert-info alert-sm bg-alert-info" role="alert">
                    <p class = "mb-0 font-weight-bold"> Peran saat ini : Asesor
                </div>
            </div>
        </div>
    </div>

    <div class = "bg-white mt-2 ml-4 mr-4 mb-4">
        <div class = "ml-2 mr-2 pt-4">
            <h4 class = "font-weight-bold">Rekap Kerja - Semester 2023/2024 Genap</h4>
        </div>

        <hr />

        <div>
            <p class="card font-weight-bold">Wilona Diva Artha Simbolon S.Kom</p>
        </div>

        <div class="alert alert-info mt-2 ml-1 mr-1 mb-6 bg-alert-info" role="alert">
            <h5> <b> <u> Info untuk dosen </u> </b> </h5>
            <p><b>Pengisian Lampiran Evaluasi Diri</b> dari 01 Januari 2024 sampai xx xxxxx xxxxx</p>
            <p><b>Periode Penilaian Asesor 1</b> dari 05 Februari 2024 sampai xx xxxxx xxxxx</p>
            <p><b>Periode Penilaian Asesor 1</b> dari 01 Januari 2024 sampai xx xxxxx xxxxx</p>
        </div>


        <!-- Tabel A -->


        <div id="ed-pendidikan-A" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
            <div class="card-body">
                <h6><b>A. Kuliah (Teori) pada tingkat Diploma dan S1 terhadap setiap kelompok</b></h6>
                <hr />

                <div class="text-sm">
                    <table id="tableEvaluasiPendidikan-A"
                        class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                        style="border: 2px;">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">Kegiatan</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Kelas Tatap Muka</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Kelas Evaluasi</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold ">SKS Mata Kuliah</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold ">SKS Terhitung</th>
                                <th scope="col" colspan="2 " class="allign-middle fw-bold ">Lampiran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td>1</td>
                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, deserunt impedit
                                consequatur officiis dolorum et quaerat accusantium? Libero corporis velit natus tempore
                                unde asperiores cum distinctio consequuntur illo. Quasi, quibusdam.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a type="button" href="#" class="btn btn-primary">View Lampiran</a>
                            </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Akhir Tabel A -->

        <!-- Tabel B -->


        <div id="ed-pendidikan-A" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
            <div class="card-body">
                <h6><b>B. Asistensi tugas atau praktikum terhadap setiap kelompok</b></h6>
                <hr />

                <div class="text-sm">
                    <table id="tableEvaluasiPendidikan-A"
                        class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                        style="border: 2px;">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">Kegiatan</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Kelas </th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">SKS Mata Kuliah ( 1SKS
                                    = 2 jam) </th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">SKS Terhitung</th>
                                <th scope="col" colspan="2 " class="allign-middle fw-bold">Lampiran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td>1</td>
                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, deserunt impedit
                                consequatur officiis dolorum et quaerat accusantium? Libero corporis velit natus tempore
                                unde asperiores cum distinctio consequuntur illo. Quasi, quibusdam.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a type="button" href="#" class="btn btn-primary">View Lampiran</a>
                            </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Akhir Tabel B -->

        <!-- Tabel C -->


        <div id="ed-pendidikan-A" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
            <div class="card-body">
                <h6><b>C. Bimbingan kuliah kerja yang terprogram terhadap setiap kelompok, Pembimbingan Praktek
                        Klinik/Lapangan, dan DPL (Dosen Pembimbing lapangan</b></h6>
                <hr />

                <div class="text-sm">
                    <table id="tableEvaluasiPendidikan-A"
                        class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                        style="border: 2px;">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold ">Kegiatan</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Mahasiswa Bimbingan
                                </th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold ">SKS Terhitung</th>
                                <th scope="col" colspan="2 " class="allign-middle fw-bold ">Lampiran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td>1</td>
                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, deserunt impedit
                                consequatur officiis dolorum et quaerat accusantium? Libero corporis velit natus tempore
                                unde asperiores cum distinctio consequuntur illo. Quasi, quibusdam.</td>
                            <td></td>
                            <td></td>
                            <td>
                                <a type="button" href="#" class="btn btn-primary">View Lampiran</a>
                            </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Akhir Tabel C -->

        <!-- Tabel D -->


        <div id="ed-pendidikan-A" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
            <div class="card-body">
                <h6><b>D. Seminar yang terjadwal terhadap setiap kelompok</b></h6>
                <hr />

                <div class="text-sm">
                    <table id="tableEvaluasiPendidikan-D"
                        class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                        style="border: 2px;">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Kelompok</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                                <th scope="col" colspan="2 " class="allign-middle fw-bold col-1">Lampiran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td>1</td>
                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, deserunt impedit
                                consequatur officiis dolorum et quaerat accusantium? Libero corporis velit natus tempore
                                unde asperiores cum distinctio consequuntur illo. Quasi, quibusdam.</td>
                            <td></td>
                            <td></td>
                            <td>
                                <a type="button" href="#" class="btn btn-primary">View Lampiran</a>
                            </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Akhir Tabel D -->

        <!-- Tabel E -->


        <div id="ed-pendidikan-A" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
            <div class="card-body">
                <h6><b>E. Bimbingan dan tugas akhir/Skripsi/Karya Tulis Ilmiah SO (Diploma) dan S1 Dosen Pembimbing utama
                        dan pembimbing penyerta dinilai sama</b></h6>
                <hr />

                <div class="text-sm">
                    <table id="tableEvaluasiPendidikan-A"
                        class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                        style="border: 2px;">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Kelompok Dibimbing
                                </th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                                <th scope="col" colspan="2 " class="allign-middle fw-bold col-1">Lampiran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td>1</td>
                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, deserunt impedit
                                consequatur officiis dolorum et quaerat accusantium? Libero corporis velit natus tempore
                                unde asperiores cum distinctio consequuntur illo. Quasi, quibusdam.</td>
                            <td></td>
                            <td></td>
                            <td>
                                <a type="button" href="#" class="btn btn-primary">View Lampiran</a>
                            </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Akhir Tabel E -->

        <!-- Tabel F -->


        <div id="ed-pendidikan-A" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
            <div class="card-body">
                <h6><b>F. Menguji proposal S1, S2, S3, Kualifikas</b></h6>
                <hr />

                <div class="text-sm">
                    <table id="tableEvaluasiPendidikan-A"
                        class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                        style="border: 2px;">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Mahasiswa Dibimbing
                                </th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                                <th scope="col" colspan="2 " class="allign-middle fw-bold col-1">Lampiran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td>1</td>
                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, deserunt impedit
                                consequatur officiis dolorum et quaerat accusantium? Libero corporis velit natus tempore
                                unde asperiores cum distinctio consequuntur illo. Quasi, quibusdam.</td>
                            <td></td>
                            <td></td>
                            <td>
                                <a type="button" href="#" class="btn btn-primary">View Lampiran</a>
                            </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Akhir Tabel F -->

        <!-- Tabel G -->


        <div id="ed-pendidikan-A" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
            <div class="card-body">
                <h6><b>G. Membimbing dosen yang lebih rendah Jenjang Jabatan Akademiknya</b></h6>
                <hr />

                <div class="text-sm">
                    <table id="tableEvaluasiPendidikan-A"
                        class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                        style="border: 2px;">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Dosen Bimbingan
                                </th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                                <th scope="col" colspan="2 " class="allign-middle fw-bold col-1">Lampiran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td>1</td>
                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, deserunt impedit
                                consequatur officiis dolorum et quaerat accusantium? Libero corporis velit natus tempore
                                unde asperiores cum distinctio consequuntur illo. Quasi, quibusdam.</td>
                            <td></td>
                            <td></td>
                            <td>
                                <a type="button" href="#" class="btn btn-primary">View Lampiran</a>
                            </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Akhir Tabel G -->

        <!-- Tabel H -->


        <div id="ed-pendidikan-A" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
            <div class="card-body">
                <h6><b>H. Mengembangkan program perkuliahan/pengajaran (Silabus, SAP/RPP, GBPP, dll) dalam kelompok atau
                        mandiri yang hasilnya dipakai untuk kegiatan perkuliahan</b></h6>
                <hr />

                <div class="text-sm">
                    <table id="tableEvaluasiPendidikan-A"
                        class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                        style="border: 2px;">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah SAP</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                                <th scope="col" colspan="2 " class="allign-middle fw-bold col-1">Lampiran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td>1</td>
                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, deserunt impedit
                                consequatur officiis dolorum et quaerat accusantium? Libero corporis velit natus tempore
                                unde asperiores cum distinctio consequuntur illo. Quasi, quibusdam.</td>
                            <td></td>
                            <td></td>
                            <td>
                                <a type="button" href="#" class="btn btn-primary">View Lampiran</a>
                            </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Akhir Tabel H -->

        <!-- Tabel I -->


        <div id="ed-pendidikan-A" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
            <div class="card-body">
                <h6><b>I. Melaksanakan kegiatan detasering dan pencangkokan dosen dalam 1 semester</b></h6>
                <hr />

                <div class="text-sm">
                    <table id="tableEvaluasiPendidikan-A"
                        class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                        style="border: 2px;">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Dosen (Maks, 2/smt)
                                </th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                                <th scope="col" colspan="2 " class="allign-middle fw-bold col-1">Lampiran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td>1</td>
                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, deserunt impedit
                                consequatur officiis dolorum et quaerat accusantium? Libero corporis velit natus tempore
                                unde asperiores cum distinctio consequuntur illo. Quasi, quibusdam.</td>
                            <td></td>
                            <td></td>
                            <td>
                                <a type="button" href="#" class="btn btn-primary">View Lampiran</a>
                            </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Akhir Tabel I -->

        <!-- Tabel J -->

        <div id="ed-pendidikan-A" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
            <div class="card-body">
                <h6><b>J. Koordinator Tugas Akhir/Skripsi, Proyek Akhir atau KP</b></h6>
                <hr />

                <div class="text-sm">
                    <table id="tableEvaluasiPendidikan-A"
                        class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                        style="border: 2px;">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                                <th scope="col" colspan="2 " class="allign-middle fw-bold col-1">Lampiran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a type="button" href="#" class="btn btn-primary">View Lampiran</a>
                            </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Akhir Tabel J -->

    </div>
@endsection

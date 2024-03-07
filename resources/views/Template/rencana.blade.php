@extends('Template.app')


@section('content')
    
    <div class = "mt-5 flex-wrap ml-4 mr-4">
        <div class = "row">
            <div class = "col">
                <h3 class = "font-weight-bold">Rekap Kegiatan</h3>
                <p class = "breadcrumbs">Rencana Kerja / Rekap Kegiatan</p>
            </div>
            <div class = "col-md-auto">
                <div class="alert alert-info alert-sm" role="alert">
                    <p class = "mb-0 font-weight-bold"> Peran saat ini  : Dosen Program Studi S1 Informatika </p>
                </div>
            </div>
        </div>

        <div class = "bg-white mt-2">
            <div class = "ml-2 mr-2 pt-4">
                <h4 class = "font-weight-bold">Rekap Kerja - Semester 2023/2024 Genap</h4>
            </div>
            <hr/>

            <div class="alert alert-info mt-2 ml-1 mr-1 mb-6" role="alert">
                <h5> <b> <u> Info untuk dosen </u> </b> </h5>
                <p><b>Penarikan Kinerja</b> dari 01 Januari 2024  sampai xx xxxxx xxxxx</p>
                <p><b>Periode Pengisian</b> dari 05 Februari 2024 sampai xx xxxxx xxxxx</p>
                <p><b>Periode Penilaian</b> dari 01 Januari 2024  sampai xx xxxxx xxxxx</p>
            </div>

            <div class = "mt-5 mb-5">
                <ul class="nav nav-pills justify-content-center text-center">
                    <li class="nav-item nav-item-150">
                        <a class="nav-link " href="#">Rencana Pendidikan</a>
                    </li>
                    <li class="nav-item nav-item-150">
                        <a class="nav-link active" href="#">Rencana Penelitian</a>
                    </li>
                    <li class="nav-item nav-item-150">
                        <a class="nav-link" href="#">Rencana Pengabdian</a>
                    </li>
                    <li class="nav-item nav-item-150">
                        <a class="nav-link" href="#">Tunjangan Lainnya</a>
                    </li>
                    <li class="nav-item nav-item-150">
                        <a class="nav-link" href="#">Simpulan</a>
                    </li>
                </ul>
            </div>
            
            <div class="card shadow-sm mt-5 ml-1 mr-1">
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

            <div class="card shadow-sm mt-5 ml-1 mr-1">
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

        </div>
    <div>
    
    

@endsection
@extends('Template.admin')

@section('content')
    <div class = "mt-5 flex-wrap ml-4 mr-4 ">
        <div class = "row">
            <div class = "col">
                <h3 class = "font-weight-bold">Rekap Kegiatan</h3>
                <p class = "breadcrumbs">Asesor/Rencana Kerja / Rekap Kegiatan</p>
            </div>
            <div class = "col-md-auto">
                <div class="alert alert-info alert-sm bg-alert-info" role="alert">
                    <p class = "mb-0 font-weight-bold"> Peran saat ini : Asesor Program Studi S1 Informatika
                </div>
            </div>
        </div>
    </div>

    <div class = "bg-white mt-2 ml-4 mr-4 mb-4">
        <div class = "ml-2 mr-2 pt-4">
            <h4 class = "font-weight-bold">Rekap Kerja</h4>
            <p class="breadcrumbs">Daftar Rekan Kegiatan T.A 2023/2024</p>
        </div>
        <hr />
        <div class="container-fluid ">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Dosen</th>
                            <th scope="col">NIDN</th>
                            <th scope="col">Program Studi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    @for ($i = 0; $i < 10; $i++)
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Wilona Diva Artha Simbolon S.Kom</td>
                                <td>12AS3456</td>
                                <td>S1 Informatika 2021</td>
                                <td>
                                    <a type="button" href="/admin/LihatKerja/ViewDetail" class="btn btn-primary">View
                                        Detail</a>
                                </td>
                            </tr>
                        </tbody>
                    @endfor
                </table>
            </div>
        </div>
    </div>
@endsection

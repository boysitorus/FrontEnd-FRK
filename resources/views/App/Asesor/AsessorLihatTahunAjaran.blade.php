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
                    <p class = "mb-0 font-weight-bold"> Peran saat ini : Asesor Program Studi S1 Informatika
                </div>
            </div>

            <div class = "bg-white mt-2 mb-4">
                <div class = "ml-2 mr-2 pt-4">
                    <h4 class = "font-weight-bold">Rekap Kerja</h4>
                </div>
                <hr />



                <div class="container-fluid ">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Tahun Ajaran</th>
                                    <th scope="col">Periode Semester</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            @for ($i = 0; $i < 10; $i++)
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>2023/2024</td>
                                        <td>Ganjil</td>
                                        <td>
                                            @if($isHumanResources)
                                                <a type="button" href="{{route('lk-viewDosen')}}"
                                                    class="btn btn-primary">View
                                                    Dosen</a>
                                            @else
                                                <a type="button" href="{{route('lk-viewDosenAsesor')}}"
                                                    class="btn btn-primary">View
                                                    Dosen</a>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            @endfor
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection

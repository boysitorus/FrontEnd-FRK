@extends($isHumanResources ? 'Template.admin' : 'Template.app')

@section('content')
    <div class = "mt-5 flex-wrap ml-4 mr-4 " style="height: 100vh">
        <div class = "row">
            <div class = "col">
                <h3 class = "font-weight-bold">Riwayat Kegiatan</h3>
                <p class = "breadcrumbs">Riwayat Kerja Saya</p>
            </div>
            <div class = "col-md-auto">
                <div class="alert alert-info alert-sm bg-alert-info" role="alert">
                    <p class = "mb-0 font-weight-bold"> Peran saat ini : {{ $role_dosen }}
                </div>
            </div>

            <div class = "bg-white mt-2 mb-4">
                <div class = "ml-2 mr-2 pt-4">
                    <h4 class = "font-weight-bold">List Tahun Ajaran</h4>
                </div>
                <hr />

                <div class="container-fluid ">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <thead>
                                <tr>
                                    <th scope="col" class="align-middle">No</th>
                                    <th scope="col" class="align-middle">Tahun Ajaran</th>
                                    <th scope="col" class="align-middle">Periode Semester</th>
                                    <th scope="col" class="align-middle">Aksi</th>
                                </tr>
                            </thead>

                            @php
                                $counter = 1;
                            @endphp
                            <tbody class="align-middle">
                                @foreach ($list_tahun_ajaran as $item)
                                    <tr>
                                        <th scope="row">{{ $counter++ }}</th>
                                        <td>{{ $item['tahun_ajaran'] }}</td>
                                        <td>{{ $item['semester'] }}</td>
                                        <td>
                                            <a type="button" href="{{ route('detail-pendidikan-riwayat-kerja-saya', ['id_ta' => $item['id']]) }}"
                                                class="btn btn-primary">View Detail
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection

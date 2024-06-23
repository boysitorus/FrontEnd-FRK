@extends($isHumanResources ? 'Template.admin' : 'Template.app')

@section('content')
    <div class = "mt-5 flex-wrap ml-4 mr-4 " style="height: 100vh">
        <div class = "row">
            <div class = "col">
                <h3 class = "font-weight-bold">Lihat Kerja</h3>
                <p class = "breadcrumbs">Lihat Semua Riwayat Kegiatan Dosen</p>
            </div>
            <div class = "col-md-auto">
                <div class="alert alert-info alert-sm bg-alert-info" role="alert">
                    <p class = "mb-0 font-weight-bold"> Peran saat ini : {{ $role_dosen }}
                </div>
            </div>

            <div class = "bg-white mt-2 mb-4">
                <div class = "ml-2 mr-2 pt-4">
                    <h4 class = "font-weight-bold">List Dosen Untuk Kegiatan Tahun Ajaran {{ $tahun_ajaran }} Semester {{ $semester }}</h4>
                </div>
                <hr />

                <div class="container-fluid ">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <thead>
                                <tr>
                                    <th scope="col" class="align-middle">No</th>
                                    <th scope="col" class="align-middle">Nama Dosen</th>
                                    <th scope="col" class="align-middle">NIDN</th>
                                    <th scope="col" class="align-middle">Program Studi</th>
                                    <th scope="col" class="align-middle">Aksi</th>
                                </tr>
                            </thead>
                            @php
                                $counter = 1;
                            @endphp
                            <tbody class="align-middle">
                                @foreach ($list_dosen as $item)
                                    <tr>
                                        <th scope="row">{{ $counter++ }}</th>
                                        <td>{{ $item['nama'] }}</td>
                                        <td>{{ $item['nidn'] }}</td>
                                        <td>{{ $item['prodi'] }}</td>
                                        <td>
                                            <a type="button"
                                                href="{{ route('lk-viewDetailPendidikan', [
                                                    'id' => $item['id_dosen'],
                                                    'id_ta' => $id_ta
                                                ]) }}"
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

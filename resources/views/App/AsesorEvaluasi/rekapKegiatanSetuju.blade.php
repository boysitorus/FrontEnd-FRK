@extends('Template.asesor')

@section('content-kegiatan')

    <div id="asesor-rekapKegiatan-content" class="ml-2 mr-2 pt-4 mb-3">

        <div id="judul">
            <h6>Daftar Rekap Kegiatan T.A 2023/2024</h6>
        </div>

        <div class="text-sm mt-5">
            <table id="listDosen"
                class="table table-striped table -bordered mt-2 text-center border-secondary-subtle align-middle"
                style="border: 2px;">
                <thead>
                    <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                    <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Nama Dosen</th>
                    <th scope="col" rowspan="2" class="align-middle fw-bold col-1">NIDN</th>
                    <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Program Studi</th>
                    <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                </thead>

                <tbody>
                    @if (isset($data_dosen) && sizeof($data_dosen) > 0)
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($data_dosen as $item)
                            <tr>
                                <td>{{ $counter++ }}</td>
                                <td>{{ $item['nama'] }}</td>
                                <td>{{ $item['nidn'] }}</td>
                                <td>{{ $item['prodi'] }}</td>
                                <td><small
                                        class="d-inline-flex px-2 py-2 fw-semibold text-white bg-success border border-success-subtle rounded-2 ">Disetujui</small>
                                </td>
                            </tr>
                        @endforeach
                    @endif

                </tbody>
            </table>
        </div>

    </div>


@endsection

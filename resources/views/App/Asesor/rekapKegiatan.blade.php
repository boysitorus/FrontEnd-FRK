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
                                <td>NAMA_DOSEN</td>
                                <td>{{ $item["id_dosen"] }}</td>
                                <td>PROGRAM_STUDI_DOSEN</td>
                                <td><a href="{{ route('rk-asesor-detail-pendidikan', ['id' => $item["id_dosen"]]) }}"><button type="button"
                                            class="btn btn-primary mr-1">View Detail</button></a></td>
                            </tr>
                        @endforeach
                    @endif

                    {{-- <tr>
                        <td>1</td>
                        <td>Missyolin</td>
                        <td>11S21008</td>
                        <td>S1 Informatika</td>
                        <td><a href="{{ route('rk-asesor-detail') }}"><button type="button"
                                    class="btn btn-primary mr-1">View Detail</button></a></td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>Boy Sitorus</td>
                        <td>11S21008</td>
                        <td>S1 Informatika</td>
                        <td><button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                data-bs-target="#">View Detail</button></td>
                    </tr> --}}

                </tbody>
            </table>
        </div>

    </div>


@endsection

@extends('Template.admin')

@section('content')

    <div class="mt-5 flex-wrap ml-4 mr-4 ">
        <div class="row">
            <div class="col">
                <h3 class="font-weight-bold">Rekap Kegiatan</h3>
                <h7 class="font-weight-medium">Administrator</h7>
            </div>
            <div class="col-md-auto">
                <div class="alert alert-info alert-sm bg-alert-info" role="alert">
                    <p class="mb-0 font-weight-bold"> Peran saat ini : Administrator </p>
                </div>
            </div>
        </div>

        <div class="bg-white mt-2">
            <div class="ml-2 mr-2 pt-4">
                <h4 class="font-weight-bold">Rekap Kerja - Semester 2023/2024 Genap</h4>
            </div>
            <hr/>


            <div class="mt-5 ml-1 mr-1">
                <table class="table table-striped table-bordered mt-2 text-center" style="border: 2px;">
                    <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle">No.</th>
                        <th scope="col" rowspan="2" class="align-middle">Jabatan Struktural</th>
                        <th scope="col" rowspan="2" class="align-middle">Status Assign</th>
                    </tr>

                    </thead>
                    <tbody class="align-middle">
                    @php
                        $i = 0
                    @endphp
                    @if(isset($eligible_asesor))
                        @foreach($eligible_asesor['data'] as $asesor)
                            @php
                                $i++
                            @endphp

                            <tr>
                                <td>{{$i}}</td>
                                <td>
                                    @if(isset($asesor['kepala']))
                                        @switch($asesor['kepala'])
                                            @case('Wakil Rektor Bidang Akademik dan Kemahasiswaan')
                                                Wakil Rektor I
                                                @break
                                            @case('Wakil Rektor Bidang Perencanaan, Keuangan, dan Sumber Daya')
                                                Wakil Rektor II
                                                @break
                                            @case('REKTOR')
                                                Rektor
                                                @break
                                            @default
                                                {{$asesor['kepala']}}
                                        @endswitch
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('admin.assign-role.post') }}" method="POST">
                                        @csrf

                                        <input type="hidden" name="id_pegawai" value="{{$asesor['pegawai_id']}}">
                                        <input type="hidden" name="jabatan" value="{{ $asesor['kepala'] }}">
                                        <input type="hidden" name="id_FRK" value="{{$tanggal_frk['id']}}">
                                        <input type="hidden" name="id_FED" value="{{$tanggal_fed['id']}}">
                                        <button type="submit" class="btn btn-secondary">
                                            Assign Sebagai Assesor
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div>

@endsection

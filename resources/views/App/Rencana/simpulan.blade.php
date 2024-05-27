@extends('Template.simpulan')

@section('content-simpulan')

<div id="simpulan" class="card border-primary mt-5 ml-1 mr-1">
    <div class="card-header bg-primary">
        <h6 style="color: white"><b>Simpulan rencana kerja</b></h6>
    </div>
    <div class="card-body">

        <div style="border: 1px solid black; padding: 10px; background-color: #DFF5FF; color: #008DDA; margin-bottom:50px">
            <p><strong>Keterangan:</strong></p>
            <ul>
                <li><strong>TM:</strong> Tidak Memenuhi </li>
                <li><strong>M:</strong> Memenuhi Keterangan</li>
            </ul>
        </div>

        <div class="text-sm">
            <table id="simpulan" class="table table-striped mt-2 text-center">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle fw-bold " style=" text-align: left; width: 5%;"  >No</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-3" style=" text-align: left; width: 40%;">Jenis Kinerja</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold" style=" text-align: left; width: 30%;">Syarat</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-1">sks Terhitung</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Status</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <tr>
                        <td scope="row"  style=" text-align: left;">1</td>
                        <td style=" text-align: left;">Pelaksanaan Pendidikan </td>
                        <td style=" text-align: left;">Minimal 9 sks</td>
                        <td style="color: {{ $pendidikanSks == 0 ? 'red' : 'green' }}">{{ $pendidikanSks }}</td>
                        @if($pendidikanSks == 0 || $pendidikanSks < 9)
                            <td style="color: red;text-align: center">TM</td>
                        @else
                            <td style="color: green;text-align: center">M</td>
                        @endif

                    </tr>
                    <tr>
                        <td scope="row" style=" text-align: left;">2</td>
                        <td style=" text-align: left;">Pelaksanaan Penelitian </td>
                        <td style=" text-align: left;">Minimal 1 sks</td>
                        <td style="color: {{ $penelitianSks == 0 ? 'red' : 'green' }}">{{ $penelitianSks }}</td>
                        @if($penelitianSks == 0 || $penelitianSks < 1)
                            <td style="color: red;text-align: center">TM</td>
                        @else
                            <td style="color: green;text-align: center">M</td>
                        @endif

                    </tr>
                    <tr>
                        <td scope="row" style=" text-align: left;">3</td>
                        <td style=" text-align: left;">Pelaksanaan Pengabdian </td>
                        <td style=" text-align: left;">Maksimal 3 sks</td>
                        <td style="color: {{ $pengabdianSks == 0 || $pengabdianSks > 3 ? 'red' : 'green' }}">{{ $pengabdianSks }}</td>
                        @if($pengabdianSks == 0 || $pengabdianSks > 3)
                            <td style="color: red;text-align: center">TM</td>
                        @else
                            <td style="color: green;text-align: center">M</td>
                        @endif

                    </tr>
                    <tr>
                        <td scope="row" style=" text-align: left;">4</td>
                        <td style=" text-align: left;">Pelaksanaan Penunjang</td>
                        <td style=" text-align: left;">Maksimal 3 sks</td>
                        <td style="color: {{ $penunjangSks == 0 || $penunjangSks > 3? 'red' : 'green' }}">{{ $penunjangSks }}</td>
                        @if($penunjangSks == 0 || $penunjangSks > 3)
                            <td style="color: red;text-align: center">TM</td>
                        @else
                            <td style="color: green;text-align: center">M</td>
                        @endif
                    </tr>

                    <!-- <tr>
                        <td colspan="5" class="pt-5"></td>
                    </tr> -->
                    <tr style="border-bottom: 2px solid black;">
                        <td colspan="2" style="text-align: center; background-color: #DFF5FF;" ><strong>Total Kinerja</strong></td>
                        <td style=" text-align: left ; background-color: #DFF5FF;"></td>
                        <td style="color: {{ $totalSks < 12 || $totalSks > 16 ? 'red' : 'green' }}; background-color: #DFF5FF; text-align: center">{{ $totalSks }}</td>
                        @if($totalSks < 12 || $totalSks > 16)
                            <td style="color: red;background-color: #DFF5FF;text-align: center">TM</td>
                        @else
                            <td style="color: green;background-color: #DFF5FF;text-align: center">M</td>
                        @endif
                    </tr>

                    <tr>
                        <td colspan="5" class="pt-5"></td>
                    </tr>

                    <tr>
                        <td style="text-align: left;" colspan="2"><strong><i>Kriteria Pelaksanaan Pendidikan dan pelaksanaan Penelitian</i></strong></td>
                        <td style=" text-align: left;"><em>Minimal 9 sks<em></td>
                        <td style="color: green">{{ $pendidikanSks + $penelitianSks }}</td>
                        @if($pendidikanSks + $penelitianSks < 9)
                            <td style="color: red;text-align: center">TM</td>
                        @else
                            <td style="color: green;text-align: center">M</td>
                        @endif
                    </tr>

                    <tr>
                        <td style="text-align: left;" colspan="2"><strong><i>Kriteria Pelaksanaan Pendidikan dan pelaksanaan Penelitian</i></strong></td>
                        <td style=" text-align: left;"><em>Wajib 3 sks<em></td>
                        <td style="color: green">{{ $penunjangSks + $pengabdianSks }}</td>
                        @if($pendidikanSks + $penelitianSks < 9)
                            <td style="color: red;text-align: center">TM</td>
                        @else
                            <td style="color: green;text-align: center">M</td>
                        @endif
                    </tr>

                    <tr style="border-bottom: 2px solid black;">
                        <td colspan="2" style="text-align: center; background-color: #DFF5FF;" ><strong>Kesimpulan Akhir</strong></td>
                        <td style=" text-align: left ; background-color: #DFF5FF;"></td>
                        <td style="color: green; background-color: #DFF5FF; text-align: center"></td>
                        @if($pendidikanSks + $penelitianSks < 9 || $penunjangSks > 3 || $pengabdianSks > 3)
                            <td style="color: red;text-align: center; background-color: #DFF5FF;">TM</td>
                        @else
                            <td style="color: green;background-color: #DFF5FF;text-align: center">M</td>
                        @endif
                    </tr>


                <tbody>
            </table>

        </div>

    </div>


</div>

<!-- <div style="margin-top: 100px;"> </div> -->

<div style="margin-top: 30px; margin-bottom: 25px; text-align: center; color: red;">
        <strong>Tidak memenuhi ketentuan Perundang-undang beban kerja dosen, pelaksanaan kegiatan yang Tidak Memenuhi</strong>
    </div>
    <div style="padding: 8px; "></div>

      <!-- Kembali button with back icon -->
<div class="container">
    <div class="container d-flex justify-content-end mr-0 mb-2">
        <button class="btn btn-primary mt-3 justify-content-end mr-1" type="button" data-bs-toggle="modal" data-bs-target="#modalSubmitConfirm"><i class="fas fa-save"></i> Simpan Permanen</button>
    </div>
</div>
<div style="margin-top: 30px; "></div>
        </div>
</div>

</div>



</div>


@endsection

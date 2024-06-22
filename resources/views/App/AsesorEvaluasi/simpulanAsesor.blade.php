@extends('Template.asesorFedDetail')

@section('content-kegiatan')
    <div class="container d-flex justify-content-end mr-1">
        <form action="{{ route('ed-generatePdf') }}" method="GET">
            <button type="submit" class="btn btn-danger">Download PDF</button>
        </form>
    </div>

    <div id="simpulan-card" class="card border-primary mt-5 ml-1 mr-1">
        <div class="card-header bg-primary">
            <h6 style="color: white"><b>Simpulan Evaluasi Diri</b></h6>
        </div>
        <div class="card-body">
            <div class="text-sm">
                <table id="simpulan" class="table table-striped mt-2 text-center">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold "
                                style=" text-align: left; width: 5%;">No</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3"
                                style=" text-align: left; width: 40%;">Jenis Kinerja</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                        </tr>

                    </thead>
                    <tbody class="align-middle">
                        <tr>
                            <td scope="row" style=" text-align: left;">1</td>
                            <td style=" text-align: left;">Pelaksanaan Pendidikan </td>
                            <td>{{ $pendidikanSks }}</td>
                        </tr>
                        <tr>
                            <td scope="row" style=" text-align: left;">2</td>
                            <td style=" text-align: left;">Pelaksanaan Penelitian </td>
                            <td>{{ $penelitianSks }}</td>
                        </tr>
                        <tr>
                            <td scope="row" style=" text-align: left;">3</td>
                            <td style=" text-align: left;">Pelaksanaan Pengabdian </td>
                            <td>{{ $pengabdianSks }}</td>
                        </tr>
                        <tr>
                            <td scope="row" style=" text-align: left;">4</td>
                            <td style=" text-align: left;">Pelaksanaan Penunjang</td>
                            <td>{{ $penunjangSks }}</td>
                        </tr>
                        <tr style="border-bottom: 2px solid black; ">
                            <td colspan="2" style="text-align: center; background-color: #DFF5FF;"><strong>Total
                                    Kinerja</strong></td>
                            <td style="background-color: #DFF5FF; text-align: center">{{ $totalSks }}</td>
                        </tr>
                    <tbody>
                </table>
            </div>
        </div>
    </div>
    <div style="padding: 8px; "></div>

@endsection

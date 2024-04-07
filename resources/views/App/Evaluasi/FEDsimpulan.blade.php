@extends('Template.FEDsimpulan')

@section('content-FEDsimpulan')

<div class="container d-flex justify-content-end mr-1 ">
    <button class="btn btn-danger">Download PDF</button>
</div>

<div id="simpulan-card" class="card border-primary mt-5 ml-1 mr-1">
    <div class="card-header bg-primary">
        <h6 style="color: white"><b>Simpulan rencana kerja</b></h6>
    </div>
    <div class="card-body">
        <!-- <hr /> -->

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
                        <th scope="col" rowspan="2" class="align-middle fw-bold " style=" text-align: left;" >No.</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-3"  style=" text-align: left;" >Jenis Kinerja</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold" style=" text-align: left;" >Syarat</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Status</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Lampiran</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <tr>
                        <td scope="row"  style=" text-align: left;">1</td>
                        <td  style=" text-align: left;">Pelaksanaan Pendidikan </td>
                        <td style=" text-align: left;">Tidak Boleh Kosong</td>
                        <td style="color: green">M</td>
                        <td><button class="btn btn-primary btn-sm" href="#" data-bs-target="#lihat">Lihat</button></td>

    
                    </tr>
                    <tr>
                        <td scope="row" style=" text-align: left;">2</td>
                        <td style=" text-align: left;">Pelaksanaan Penelitian </td>
                        <td style=" text-align: left;">Tidak Boleh Kosong</td>
                        <td style="color: green">M</td>
                        <td><button class="btn btn-primary btn-sm" href="#" data-bs-target="#lihat">Lihat</button></td>
    
                    </tr>
                    <tr>
                        <td scope="row" style=" text-align: left;">3</td>
                        <td style=" text-align: left;" >Pelaksanaan Pengabdian </td>
                        <td style=" text-align: left;">Tidak Boleh Kosong</td>
                        <td style="color: green">M</td>
                        <td><button class="btn btn-primary btn-sm" href="#" data-bs-target="#liha">Lihat</button></td>
    
                    </tr>
                    <tr>
                        <td scope="row" style=" text-align: left;">4</td>
                        <td style=" text-align: left;">Pelaksanaan Penunjang</td>
                        <td style=" text-align: left  ;">Tidak Boleh Kosong</td>
                        <td style="color: red">TM</td>
                        <td><button class="btn btn-primary btn-sm" href="#" data-bs-target="#liha">Lihat</button></td>
                    </tr>
                    <!-- <tr>
                        <td colspan="5" class="pt-5"></td>
                    </tr> -->
                <tbody>
            </table>
        </div>
      </div>
    </div>
        
    <div style="margin-top: 20px; "></div>

      <!-- Kembali button with back icon -->
    <div class="container">
    <div class="row">
        <div class="col-md-6">
        <button class="btn btn-secondary mt-3 justify-content-end mr-1"><i class="fas fa-arrow-left"></i> Kembali</button>
        </div>
        <div class="col-md-6 text-md-end">
            <!-- Simpan Permanen button with save icon -->
            <button class="btn btn-primary mt-3 justify-content-end mr-1"><i class="fas fa-save"></i> Simpan Permanen</button>
        </div>
    </div>
    </div>

    <div style="margin-top: 20px; "></div>
        </div>

    
      </div>
</div>


@endsection
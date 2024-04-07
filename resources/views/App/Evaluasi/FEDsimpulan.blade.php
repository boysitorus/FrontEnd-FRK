@extends('Template.FEDsimpulan')

@section('content-FEDsimpulan')

<div class="container d-flex justify-content-end mr-1 ">
    <button class="btn btn-danger">Download PDF</button>
</div>

<div id="simpulan-card" class="card border-primary shadow-sm mt-5 ml-1 mr-1 bg-card ">
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
            <table id="simpulan" class="table table-striped mt-2 text-center outer-border-only-table">
            <!-- <table id="simpulan" class="table table-striped mt-2 text-center" style="border: 2px;"> -->
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle fw-bold " style=" text-align: middle;" >No.</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-3"  style=" text-align: middle;" >Jenis Kinerja</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold" style=" text-align: middle;" >Syarat</th>
                        <!-- <th scope="col" rowspan="2" class="align-middle fw-bold" style=" text-align: middle;" >Filter By<select class="sort-option"><option value="">Show All</option></select></th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-1">sks Lebih</th> -->
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Status</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Lampiran</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <tr>
                        <td scope="row"  >1</td>
                        <td  style=" text-align: middle;">Pelaksanaan Pendidikan </td>
                        <td style=" text-align: middle;">Tidak Boleh Kosong</td>
                        <!-- <td style=" text-align: middle;"><strong>T.A 2023/2024</strong></td>
                        <td>3.5</td> -->
                        <td style="color: green">M</td>
                          <td><button class="btn btn-primary btn-sm" href="#" data-bs-target="#liha">Lihat</button></td>
                    </tr>
                </tbody>
                <tbody class="align-middle">
                    <tr>
                        <td scope="row"  style=" text-align: middle;">2</td>
                        <td  style=" text-align: middle;">Pelaksanaan Penelitian </td>
                        <td style=" text-align: middle;">Tidak Boleh Kosong</td>
                        <!-- <td style=" text-align: middle;"><strong>T.A 2023/2024</strong></td>
                        <td>0</td> -->
                        <td style="color: green">M</td>
                          <td><button class="btn btn-primary btn-sm" href="#" data-bs-target="#liha">Lihat</button></td>
                    </tr>
                </tbody>
                <tbody class="align-middle">
                    <tr>
                        <td scope="row"  style=" text-align: middle;">3</td>
                        <td  style=" text-align: middle;">Pelaksanaan Pengabdian </td>
                        <td style=" text-align: middle;">Tidak Boleh Kosong</td>
                        <!-- <td style=" text-align: middle;"><strong>T.A 2022/2023</strong></td>
                        <td>0</td> -->
                        <td style="color: green">M</td>
                          <td><button class="btn btn-primary btn-sm" href="#" data-bs-target="#liha">Lihat</button></td>
                    </tr>
                </tbody>
                <tbody class="align-middle">
                    <tr>
                        <td scope="row"  style=" text-align: middle;">4</td>
                        <td  style=" text-align: middle;">Pelaksanaan Penunjang</td>
                        <td style=" text-align: middle;">Tidak Boleh Kosong</td>
                        <!-- <td style=" text-align: middle;"><strong>T.A 2022/2023</strong></td>
                        <td>0</td> -->
                        <td style="color: red">TM</td>
                          <td><button class="btn btn-primary btn-sm" href="#" data-bs-target="#liha">Lihat</button></td>
                    </tr>
    </table>
    </div>

    </div>

    
    </div>
        <div style="margin-top: 100px; border-bottom: 2px solid black; "></div>
        </div>

      <!-- Kembali button with back icon -->
    <div class="container">
    <div class="row">
        <div class="col-md-6">
            <button style="margin-top: 10px; font-size: 16px; font-weight: bold; background-color: gray; color: #fff;" >
                <i class="fas fa-arrow-left"></i> Kembali
            </button>
        </div>
        <div class="col-md-6 text-md-end">
            <!-- Simpan Permanen button with save icon -->
            <button style="margin-top: 10px; font-size: 16px; font-weight: bold; background-color: #005b96;  color: #fff;" >
                <i class="fas fa-save"></i> Simpan Permanen
            </button>
        </div>
    </div>
    </div>

    <div style="margin-top: 20px; "></div>
        </div>

    
      </div>
  </div>
</div>


@endsection
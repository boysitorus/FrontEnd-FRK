@extends('Template.simpulan')

@section('content-simpulan')

<div class="container d-flex justify-content-end mr-1 ">
    <button class="btn btn-danger">Download PDF</button>
</div>

<div id="simpulan" class="card border-primary shadow-sm mt-5 ml-1 mr-1 bg-card ">
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
                        <th scope="col" rowspan="2" class="align-middle fw-bold " style=" text-align: left;" >No.</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-3"  style=" text-align: left;" >Jenis Kinerja</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold" style=" text-align: left;" >Syarat</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-1">sks BKD</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-1">sks Lebih</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Status</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <tr>
                        <td scope="row"  style=" text-align: left;">1</td>
                        <td  style=" text-align: left;">Pelaksanaan Pendidikan </td>
                        <td style=" text-align: left;">Tidak Boleh Kosong</td>
                        <td style="color: green">12.5</td>
                        <td>3.5</td>
                        <td style="color: green">M</td>

                    </tr>
                </tbody>
                <tbody class="align-middle">
                    <tr>
                        <td scope="row" style=" text-align: left;">2</td>
                        <td style=" text-align: left;">Pelaksanaan Penelitian </td>
                        <td style=" text-align: left;">Tidak Boleh Kosong</td>
                        <td style="color: green">2.5</td>
                        <td>0</td>
                        <td style="color: green">M</td>

                    </tr>
                </tbody>
                <tbody class="align-middle">
                    <tr>
                        <td scope="row" style=" text-align: left;">3</td>
                        <td style=" text-align: left;" >Pelaksanaan Pengabdian </td>
                        <td style=" text-align: left;">Tidak Boleh Kosong</td>
                        <td style="color: green">0.5</td>
                        <td>0</td>
                        <td style="color: green">M</td>

                    </tr>
                </tbody>
                <tbody class="align-middle">
                    <tr>
                        <td scope="row" style=" text-align: left;">4</td>
                        <td style=" text-align: left;">Pelaksanaan Penunjang</td>
                        <td style=" text-align: left;">Tidak Boleh Kosong</td>
                        <td style="color: red">0</td>
                        <td>0</td>
                        <td style="color: red">TM</td>

                    </tr>
                </tbody>
</table>
<table class="table table-borderless">
<!-- <table class="table table-striped table-bordered mt-2 text-center table-bordered" style="border: 2px;"> -->
                <tbody class="align-middle">
                <tr>
                <td colspan="2" style="text-align: left;"><i><strong>Kriteria Pelaksanaan Pendidikan dan Pelaksanaan Penelitian</strong></i></td>
                        <td style=" text-align: left;"><i><strong>Minimal 9 sks</strong></i></td>
                        <td style="color: green"><i>15</i></td>
                        <td><i>3.5</i></td>
                        <td style="color: green"><i>M</i></td>

                    </tr>
                </tbody>

                <tbody class="align-middle" >
                <tr >
                <td colspan="2" style="text-align: left;"><i><strong>Kriteria Pelaksanaan Pendidikan dan Pelaksanaan Penelitian</i></strong></td>
                        <td style="text-align: left;"><i><strong>Minimal 9 sks</i></strong></td>
                        <td style="color: green"><i>0.5</i></td>
                        <td><i>0</i></td>
                        <td style="color: green"><i>M</i></td>

                    </tr>
                </tbody>
                <tbody class="align-middle" >
                <tr style="border-bottom: 1px solid black; border-left: 1px solid black; border-right: 1px solid black;">
                <td colspan="2" style="text-align: left; background-color: #DFF5FF;" ><strong>Total Kinerja</strong></td>
                        <td style=" text-align: left; background-color: #DFF5FF;">Minimal 12 sks dan maksimal 16 sks</td>
                        <td style="color: green; background-color: #DFF5FF;">15.5</td>
                        <td style="background-color: #DFF5FF; ">0</td>
                        <td style="color: red; background-color: #DFF5FF;">TM</td>

                    </tr>
                </tbody>
            </table>
            

            
            
            <!-- Add some distance from the table -->
            <div style="margin-top: 50px; border-bottom: 2px solid black;"></div>
        </div>

        <!-- Add a red-colored sentence -->
        <div style="margin-top: 25px; margin-bottom: 25px; text-align: center; color: red;">
        <strong>Tidak memenuhi ketentuan Perundang-undang beban kerja dosen, pelaksanaan kegiatan yang Tidak Memenuhi</strong>
        </div>

    </div>

    
</div>

<div style="margin-top: 100px;"> </div>


<!-- Add some distance from the table -->
<div style="margin-top: 50px; border-bottom: 2px solid black; " class="ml-1 mr-1"></div>
        </div>

        <div style="margin-top: 25px; text-align: center; color: grey;">
            <strong>Laporan BKD Diajukan Dosen</strong>
        </div>
        <!-- Add a red-colored sentence -->
        <div style="margin-top: 10px; text-align: center; color: blue;">
        <strong>Memenuhi ketentuan Perundan-undang beban kerja dosen mengenai Kewajiban Khusus Dosen.</strong>
        </div>

        <!-- Add some distance from the table -->
 <div style="margin-top: 50px; border-bottom: 2px solid black; " class="ml-1 mr-1"></div>
        </div>

        <!-- Add a red-colored sentence -->

        <div style="margin-top: 25px; text-align: center; color: grey;">
            <strong>Hasil Penilaian Laporan BKD.</strong>
        </div>
        <div style="margin-top: 10px; text-align: center; color: red;">
            <strong>Belum memenuhi ketentuan Perundan-undang beban kerja dosen mengenai Kewajiban Khusus Dosen.</strong>
        </div>
        <div style="margin-top: 150px; border-bottom: 2px solid black; " class="ml-1 mr-1"></div>
        </div>

      <!-- Kembali button with back icon -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <button style="margin-top: 10px; font-size: 16px; font-weight: bold; background-color: gray; color: #fff;" class = "ml-4">
                <i class="fas fa-arrow-left"></i> Kembali
            </button>
        </div>
        <div class="col-md-6 text-md-end">
            <!-- Simpan Permanen button with save icon -->
            <button style="margin-top: 10px; font-size: 16px; font-weight: bold; background-color: #063F78;  color: #fff;" class = "mr-4" >
                <i class="fas fa-save"></i> Simpan Permanen
            </button>
        </div>
    </div>
</div>

</div>

</div>



</div>

@endsection

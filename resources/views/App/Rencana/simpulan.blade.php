@extends('Template.simpulan')

@section('content-simpulan')

<div class="container d-flex justify-content-end mr-1 ">
    <button id="downloadPdfButton" class="btn btn-danger">Download PDF</button>
</div>

<div id="simpulan" class="card border-primary mt-5 ml-1 mr-1 mb-3">
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
                        <th scope="col" rowspan="2" class="align-middle fw-bold " style=" text-align: left;" >No.</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-3"  style=" text-align: left;" >Jenis Kinerja</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold" style=" text-align: left;" >Syarat</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-1">sks BKD</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Status</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <tr>
                        <td scope="row"  style=" text-align: left;">1</td>
                        <td  style=" text-align: left;">Pelaksanaan Pendidikan </td>
                        <td style=" text-align: left;">Tidak Boleh Kosong</td>
                        <td style="color: {{ $pendidikanSks == 0 ? 'red' : 'green' }}">{{  $pendidikanSks }}</td>
                        @if($pendidikanSks == 0)
                            <td style="color: red;text-align: center">TM</td>
                        @else
                            <td style="color: green;text-align: center">M</td>
                        @endif
                    </tr>
                    <tr>
                        <td scope="row" style=" text-align: left;">2</td>
                        <td style=" text-align: left;">Pelaksanaan Penelitian </td>
                        <td style=" text-align: left;">Tidak Boleh Kosong</td>
                        <td style="color: {{ $penelitianSks == 0 ? 'red' : 'green' }}">{{ $penelitianSks }}</td>
                        @if($penelitianSks == 0)
                            <td style="color: red;text-align: center">TM</td>
                        @else
                            <td style="color: green;text-align: center">M</td>
                        @endif
                    </tr>
                    <tr>
                        <td scope="row" style=" text-align: left;">3</td>
                        <td style=" text-align: left;" >Pelaksanaan Pengabdian </td>
                        <td style=" text-align: left;">Tidak Boleh Kosong</td>
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
                        <td style=" text-align: left  ;">Tidak Boleh Kosong</td>
                        <td style="color: {{ $penunjangSks == 0 ? 'red' : 'green' }}">{{ $penunjangSks }}</td>
                        @if($penunjangSks == 0)
                            <td style="color: red;text-align: center">TM</td>
                        @else
                            <td style="color: green;text-align: center">M</td>
                        @endif
                    </tr>
                    <tr>
                        <td colspan="5" class="pt-5"></td>
                    </tr>
                    <tr style="border-bottom: 2px solid black;">
                        <td colspan="2" style="text-align: center; background-color: #DFF5FF;" ><strong>Total Kinerja</strong></td>
                        <td style=" text-align: left ; background-color: #DFF5FF;">Minimal 12 sks dan maksimal 16 sks</td>
                        <td style="color: {{ $totalSks < 12 || $totalSks > 16 ? 'red' : 'green' }}; background-color: #DFF5FF; text-align: center">{{ $totalSks }}</td>
                        @if($totalSks < 12 || $totalSks > 16)
                            <td style="color: red;background-color: #DFF5FF;text-align: center">TM</td>
                        @else
                            <td style="color: green;background-color: #DFF5FF;text-align: center">M</td>
                        @endif
                    </tr>
                <tbody>
            </table>

            <table class="table table-striped mt-5 text-center">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle fw-bold " style=" text-align: left;" >Kriteria</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-3"  style=" text-align: left;" >Syarat</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold" style=" text-align: center;" >Status</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <tr>
                        <td scope="row" style=" text-align: left;">Kriteria Pelaksanaan Pendidikan dan Pelaksanaan Penelitian</td>
                        <td style=" text-align: left;">Minimal 9 SKS</td>
                        @if($pendidikanSks + $penelitianSks < 9)
                            <td style="color: red;text-align: center">TM</td>
                        @else
                            <td style="color: green;text-align: center">M</td>
                        @endif
                    </tr>

                    <tr>
                        <td scope="row" style=" text-align: left;">Kriteria Pelaksanaan Penggabdian dan pelaksanaan Penunjang</td>
                        <td style=" text-align: left;">Wajib 3 sks</td>
                        @if($penunjangSks > 3 || $pengabdianSks > 3)
                            <td style="color: red;text-align: center">TM</td>
                        @else
                            <td style="color: green;text-align: center">M</td>
                        @endif
                    </tr>

                    <tr>
                        <td colspan="2" style=" text-align: center; background-color: #DFF5FF;" class="fw-bold">Kesimpulan Akhir</td>
                        @if($pendidikanSks + $penelitianSks < 9 || $penunjangSks > 3 || $pengabdianSks > 3)
                            <td style="color: red;text-align: center; background-color: #DFF5FF;">TM</td>
                        @else
                            <td style="color: green;background-color: #DFF5FF;text-align: center">M</td>
                        @endif
                    </tr>

                </tbody>
            </table>
        </div>

        <!-- Add a red-colored sentence -->
        <div style="margin-top: 25px; text-align: center; color: grey;">
            <strong>Laporan BKD Diajukan Dosen</strong>
        </div>
        <div style="margin-top: 25px; margin-bottom: 25px; text-align: center;">
        @if($totalSks < 12 || $totalSks > 16 || $pendidikanSks + $penelitianSks < 9 || $penunjangSks > 3 || $pengabdianSks > 3)
            <strong style="color: red;">Tidak memenuhi ketentuan Perundang-undang beban kerja dosen, pelaksanaan kegiatan yang Tidak Memenuhi</strong>
        @else
            <strong style="color: blue;">Memenuhi ketentuan Perundang-undang beban kerja dosen mengenai Kewajiban Khusus Dosen.</strong>
        @endif
        </div>

        
        
    </div>

    <!-- Kembali button with back icon -->
        <div class="container d-flex justify-content-end mr-0 mb-2">
            <button class="btn btn-primary mt-3 justify-content-end mr-1" type="button" data-bs-toggle="modal" data-bs-target="#modalSubmitConfirm"><i class="fas fa-save"></i> Simpan Permanen</button>
        </div>

</div>

{{-- TEMPAT MODAL SUBMIT CONFIRM --}}
        <div class="modal fade" id="modalSubmitConfirm" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body text-center">
                        <h1><i class="bi bi-question-circle text-primary"></i></h1>
                        <h5>Yakin untuk menyimpan permanen kegiatan ini?</h5>
                        <p class="text-muted small">proses ini tidak dapat diurungkan bila anda sudah menekan tombol 'Yakin'
                        </p>
                    </div>

                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                        <button id="confirmDeleteBtn" type="button" class="btn btn-primary">Yakin</button>
                    </div>
                </div>
            </div>
        </div>

    <script>
        document.getElementById('downloadPdfButton').addEventListener('click', function() {
            var htmlContent = document.getElementById('simpulan').innerHTML;

            var xhr = new XMLHttpRequest();
            xhr.open('POST', '/generate-pdf-from-html', true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    window.open('/download-pdf/' + xhr.responseText, '_blank');
                }
            };
            xhr.send(JSON.stringify({ htmlContent: htmlContent }));
        });
    </script>

@endsection

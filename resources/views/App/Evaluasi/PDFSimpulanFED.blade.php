<style>
    @page {
        size: A4;
        margin: 7;
    }

    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }

    #simpulan {
        width: 100%;
        max-width: 100%;
        margin: 10mm auto;
        background-color: white;
        border: 1px solid black;
        border-radius: 5px;
        box-sizing: border-box;
    }

    #simpulan h6 {
        margin: 0;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }

    .card-body {
        padding: 10mm;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 5mm;
        border: 1px solid black;
    }

    .text-center {
        text-align: center;
    }

    .text-left {
        text-align: left;
    }

    .bg-danger {
        background-color: #dc3545 !important;
    }

    .bg-success {
        background-color: #28a745 !important;
    }

    .bg-primary {
        background-color: #007bff !important;
    }

    .text-white {
        color: #fff !important;
    }

    .text-muted {
        color: #6c757d !important;
    }

    .mt-3 {
        margin-top: 3mm !important;
    }

    .mr-1 {
        margin-right: 1mm !important;
    }

    .btn {
        padding: 5mm 10mm;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>

<div id="simpulan" style="border: 1px solid black; border-radius: 5px; margin-top: 5mm; margin-left: 0mm; margin-right: 0mm;">
    <div style="background-color: #007bff; color: white; padding: 5mm; border-top-left-radius: 5px; border-top-right-radius: 5px;">
        <h4 style="margin: 0;"><strong>Simpulan Evaluasi Diri</strong></h4>
    </div>
    <div style="padding: 5mm;">

        <div style="border: 1px solid black; padding: 5mm; background-color: #DFF5FF; color: #008DDA; margin-bottom: 10mm;">
            <p style="margin: 0;"><strong>Keterangan:</strong></p>
            <ul style="margin: 0; padding-left: 5mm;">
                <li><strong>TM:</strong> Tidak Memenuhi </li>
                <li><strong>M:</strong> Memenuhi Keterangan</li>
            </ul>
        </div>

        <div>
            <table id="simpulan" style="width: 100%; border-collapse: collapse; margin-top: 5mm; margin-bottom: 5mm;">
                <thead>
                    <tr>
                        <th style="text-align: left; width: 5%; padding: 5mm; border: 1px solid black;"><strong>No</strong></th>
                        <th style="text-align: left; width: 40%; padding: 5mm; border: 1px solid black;"><strong>Jenis Kinerja</strong></th>
                        <th style="text-align: left; width: 30%; padding: 5mm; border: 1px solid black;"><strong>Syarat</strong></th>
                        <th style="text-align: center; padding: 5mm; border: 1px solid black;"><strong>sks Terhitung</strong></th>
                        <th style="text-align: center; padding: 5mm; border: 1px solid black;"><strong>Status</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align: left; padding: 5mm; border: 1px solid black;">1</td>
                        <td style="text-align: left; padding: 5mm; border: 1px solid black;">Pelaksanaan Pendidikan</td>
                        <td style="text-align: left; padding: 5mm; border: 1px solid black;">Minimal 9 sks</td>
                        <td style="text-align: center; padding: 5mm; border: 1px solid black; color: {{ $pendidikanSks == 0 ? 'red' : 'green' }}">{{ $pendidikanSks }}</td>
                        <td style="text-align: center; padding: 5mm; border: 1px solid black; color: {{ $pendidikanSks == 0 ? 'red' : 'green' }}">{{ $pendidikanSks == 0 || $pendidikanSks < 9 ? 'TM' : 'M' }}</td>
                    </tr>

                    <tr>
                        <td style="text-align: left; padding: 5mm; border: 1px solid black;">2</td>
                        <td style="text-align: left; padding: 5mm; border: 1px solid black;">Pelaksanaan Penelitian</td>
                        <td style="text-align: left; padding: 5mm; border: 1px solid black;">Minimal 1 sks</td>
                        <td style="text-align: center; padding: 5mm; border: 1px solid black; color: {{ $penelitianSks == 0 ? 'red' : 'green' }}">{{ $penelitianSks }}</td>
                        <td style="text-align: center; padding: 5mm; border: 1px solid black; color: {{ $penelitianSks == 0 ? 'red' : 'green' }}">{{ $penelitianSks == 0  || $penelitianSks < 1 ? 'TM' : 'M' }}</td>
                    </tr>

                    <tr>
                        <td style="text-align: left; padding: 5mm; border: 1px solid black;">3</td>
                        <td style="text-align: left; padding: 5mm; border: 1px solid black;">Pelaksanaan Pengabdian</td>
                        <td style="text-align: left; padding: 5mm; border: 1px solid black;">Maksimal 3 sks</td>
                        <td style="text-align: center; padding: 5mm; border: 1px solid black; color: {{ $pengabdianSks == 0 ? 'red' : 'green' }}">{{ $pengabdianSks }}</td>
                        <td style="text-align: center; padding: 5mm; border: 1px solid black; color: {{ $pengabdianSks == 0 ? 'red' : 'green' }}">{{ $pengabdianSks == 0 || $pengabdianSks > 3 ? 'TM' : 'M' }}</td>
                    </tr>

                    <tr>
                        <td style="text-align: left; padding: 5mm; border: 1px solid black;">4</td>
                        <td style="text-align: left; padding: 5mm; border: 1px solid black;">Pelaksanaan Penunjang</td>
                        <td style="text-align: left; padding: 5mm; border: 1px solid black;">Maksimal 3 sks</td>
                        <td style="text-align: center; padding: 5mm; border: 1px solid black; color: {{ $penunjangSks == 0 ? 'red' : 'green' }}">{{ $penunjangSks }}</td>
                        <td style="text-align: center; padding: 5mm; border: 1px solid black; color: {{ $penunjangSks == 0 ? 'red' : 'green' }}">{{ $penunjangSks == 0 || $penunjangSks > 3? 'TM' : 'M' }}</td>
                    </tr>

                    <tr style="border-bottom: 2px solid black;">
                        <td colspan="2" style="text-align: center;padding: 5mm; background-color: #DFF5FF;"><strong>Total Kinerja</strong></td>
                        <td style=" text-align: left ;padding: 5mm; background-color: #DFF5FF;"></td>
                        <td style="text-align: center;padding: 5mm; background-color: #DFF5FF;"><span style="color: {{ $totalSks < 12 || $totalSks > 16 ? 'red' : 'green' }}">{{ $totalSks }}</span></td>
                        <td style="text-align: center;padding: 5mm; background-color: #DFF5FF;"><span style="color: {{ $totalSks < 12 || $totalSks > 16 ? 'red' : 'green' }}">{{ $totalSks < 12 || $totalSks > 16 ? 'TM' : 'M' }}</span></td>
                    </tr>

                    <tr>
                        <td colspan="5" style="padding-top: 5mm;"></td>
                    </tr>

                    <tr>
                        <td colspan="2" style="text-align: left; padding: 5mm;"><strong><i>Kriteria Pelaksanaan Pendidikan dan Pelaksanaan Penelitian</i></strong></td>
                        <td style="text-align: left; padding: 5mm;"><em>Minimal 9 sks</em></td>
                        <td style="text-align: center; padding: 5mm;"><span style="color: {{ $pendidikanSks + $penelitianSks < 9 ? 'red' : 'green' }}">{{ $pendidikanSks + $penelitianSks }}</span></td>
                        <td style="text-align: center; padding: 5mm;"><span style=" color: {{ $pendidikanSks + $penelitianSks < 9 ? 'red' : 'green' }}">{{ $pendidikanSks + $penelitianSks < 9 ? 'TM' : 'M' }}</span></td>
                    </tr>

                    <tr>
                        <td colspan="2" style="text-align: left; padding: 5mm;"><strong><i>Kriteria Pelaksanaan Pengabdian dan Pelaksanaan Penunjang</i></strong></td>
                        <td style="text-align: left; padding: 5mm;"><em>Wajib 3 sks</em></td>
                        <td style="text-align: center; padding: 5mm;"><span style="color: {{ $pengabdianSks + $penunjangSks > 3 ? 'red' : 'green' }}">{{ $penunjangSks + $pengabdianSks }}</span></td>
                        <td style="text-align: center; padding: 5mm;"><span style="color: {{ $pengabdianSks + $penunjangSks > 3 ? 'red' : 'green' }}">{{ $penunjangSks + $pengabdianSks > 3 ? 'TM' : 'M' }}</span></td>
                    </tr>

                    <tr style="border-bottom: 2px solid black;">
                        <td colspan="2" style="text-align: center; padding: 5mm; background-color: #DFF5FF;"><strong>Kesimpulan Akhir</strong></td>
                        <td style="text-align: left ; padding: 5mm; background-color: #DFF5FF;"></td>
                        <td style="text-align: center; padding: 5mm; background-color: #DFF5FF;"></td>
                        <td style="text-align: center; padding: 5mm; background-color: #DFF5FF;"><span class="{{ $pendidikanSks + $penelitianSks < 9 || $penunjangSks > 3 || $pengabdianSks > 3 ? 'red' : 'green' }}">{{ $pendidikanSks + $penelitianSks < 9 || $penunjangSks > 3 || $pengabdianSks > 3 ? 'TM' : 'M' }}</span></td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>

    <div style="margin:5mm; text-align: center; color: red;">
        <strong>Tidak memenuhi ketentuan Perundang-undang beban kerja dosen, pelaksanaan kegiatan yang Tidak Memenuhi</strong>
    </div>

</div>

<div style="margin-top: 5mm;"></div>

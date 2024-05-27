@extends('Template.generate')

@section('content-generate')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</head>
<body>
<form action="{{route('admin.generate_fed.post')}}" method="post">
    @csrf

    {{-- TOAST --}}
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="successToast" class="toast bg-success-subtle" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body">
                <i class="bi bi-check2-circle"></i>
                <ul id="success-toast-messages">
                </ul>
            </div>
        </div>
        <div id="errorToast" class="toast bg-danger-subtle" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body">
                <i class="bi bi-x-circle"></i>
                <ul id="error-toast-messages">
                </ul>
            </div>
        </div>
    </div>

    <div class="container mt-2 ml-0 mt-5 mb-4">
        <div class="row">
            <div class="col">
                <h6 style="font-weight: bold;">Semester yang dijalani</h6>
                <div class="input-group date">
                    <input type="text" class="form-control date-input" id="tahun-ajaran" name="tahun_ajaran"
                           placeholder="Semester Genap 2023/2024" required>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-2 ml-0 mt-5 mb-4">
        <div class="row">
            <div class="col mr-2">
                <h6 style="font-weight: bold;">Tanggal Awal Periode Pengisian Evaluasi Diri</h6>
                <div class="input-group date">
                    <input type="date" class="form-control date-input" id="tanggal-awal-rencana-kerja" name="tanggal_awal_rencana_kerja"
                           placeholder="dd/mm/yyyy" required>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary clear-date" type="button"
                                onclick="clearDate('tanggal-awal-rencana-kerja')"><i class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
            <div class="col">
                <h6 style="font-weight: bold;">Tanggal Akhir Periode Pengisian Evaluasi Diri</h6>
                <div class="input-group date">
                    <input type="date" class="form-control date-input" id="tanggal-akhir-rencana-kerja" name="tanggal_akhir_rencana_kerja"
                           placeholder="dd/mm/yyyy" required>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary clear-date" type="button"
                                onclick="clearDate('tanggal-akhir-rencana-kerja')"><i class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-2 ml-0 mt-5 mb-4">
        <div class="row">
            <div class="col mr-2">
                <h6 style="font-weight: bold;">Periode Awal Approval oleh Asesor I</h6>
                <div class="input-group date">
                    <input type="date" class="form-control date-input" id="periode-awal-asesor-i" name="periode_awal_asesor_i"
                           placeholder="dd/mm/yyyy" required>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary clear-date" type="button"
                                onclick="clearDate('periode-awal-asesor-i')"><i class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
            <div class="col">
                <h6 style="font-weight: bold;">Periode Akhir Approval oleh Asesor I </h6>
                <div class="input-group date">
                    <input type="date" class="form-control date-input" id="periode-akhir-asesor-i" name="periode_akhir_asesor_i"
                           placeholder="dd/mm/yyyy" required>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary clear-date" type="button"
                                onclick="clearDate('periode-akhir-asesor-i')"><i class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-2 ml-0 mt-5 mb-4">
        <div class="row">
            <div class="col mr-2">
                <h6 style="font-weight: bold;">Periode Awal Approval oleh Asesor II</h6>
                <div class="input-group date">
                    <input type="date" class="form-control date-input" id="periode-awal-asesor-ii" name="periode_awal_asesor_ii"
                           placeholder="dd/mm/yyyy" required>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary clear-date" type="button"
                                onclick="clearDate('periode-awal-asesor-ii')"><i class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
            <div class="col">
                <h6 style="font-weight: bold;">Periode Akhir Approval oleh Asesor II</h6>
                <div class="input-group date">
                    <input type="date" class="form-control date-input" id="periode-akhir-asesor-ii" name="periode_akhir_asesor_ii"
                           placeholder="dd/mm/yyyy" required>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary clear-date" type="button"
                                onclick="clearDate('periode-akhir-asesor-ii')"><i class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container ml-0 mt-5 mb-5">
        <button type="submit" class="btn btn-success mr-2 ml-0">Generate</button>
        <button class="btn btn-danger ">Cancel</button>
    </div>

    {{-- TOAST TAMBAH --}}
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="addToast" class="toast bg-success-subtle" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="toast-body">
                <i class="bi bi-check2-circle"></i>
                Berhasil Menambah Kegiatan
            </div>
        </div>
    </div>

    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

    <script>
        function clearDate(id) {
            document.getElementById(id).value = '';
        }
    </script>

    {{-- TEMPAT JAVASCRIPT --}}
    <script>
        function clearDate(id) {
            document.getElementById(id).value = '';
        }

        document.addEventListener('DOMContentLoaded', function () {
            var successToastElement = document.getElementById('successToast');
            var errorToastElement = document.getElementById('errorToast');
            var successToast = new bootstrap.Toast(successToastElement);
            var errorToast = new bootstrap.Toast(errorToastElement);

            @if ($errors->any())
                // Menampilkan pesan error
                var errorMessages = @json($errors->all());
                var errorToastMessagesContainer = document.getElementById('error-toast-messages');
                errorMessages.forEach(function(message) {
                    var li = document.createElement('li');
                    li.textContent = message;
                    li.style.listStyleType = 'none';
                    errorToastMessagesContainer.appendChild(li);
                });
                errorToast.show();
            @elseif (session('success'))
                // Menampilkan pesan sukses
                var successMessage = '{{ session('success') }}';
                var successToastMessagesContainer = document.getElementById('success-toast-messages');
                var li = document.createElement('li');
                li.textContent = successMessage;
                li.style.listStyleType = 'none';
                successToastMessagesContainer.appendChild(li);
                successToast.show();
            @endif

            // Menghapus kelas 'show' setelah beberapa detik (sesuaikan dengan durasi animasi toast)
            setTimeout(function() {
                successToastElement.classList.remove('show');
                errorToastElement.classList.remove('show');
            }, 15000); // 5000 milidetik (3 detik) disesuaikan dengan durasi animasi toast
        });
    </script>
</form>
</body>
</html>

@endsection

@extends('Template.semester')

@section('content-semester')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

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

{{-- Tabel Daftar Tahun Ajaran --}}
<div class="container mt-2 ml-0 mt-5 mb-4">
    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered mt-2 text-center border-secondary-subtle">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">Tahun Ajaran</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">Status</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    {{-- {{ dd($data, $tanggal_frk, $tanggal_fed) }} --}}
                    @if ($data != null)
                        @php
                            $counter = 0;
                        @endphp

                        @foreach ($data['data'] as $item)
                            @php
                                $counter++;
                            @endphp

                            <tr>
                                <td scope="row">{{ $counter }}</td>
                                <td>{{ $item['tahun_ajaran'] }} ({{ $item['tipe'] }}) => {{ $item['id'] }}</td>
                                {{-- pengecekan untuk status --}}
                                @if($item['tipe'] == 'FED')
                                    @if($tanggal_fed['data']['id'] == $item['id'])
                                    <div class="modal fade modal-lg" id="modalEditTahunAjaran-{{ $item['id'] }}"
                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">(FED) {{$counter}}. {{ $item['tahun_ajaran'] }} ({{ $item['semester'] }})</h6>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('admin.generate_fed.post') }}" method="POST">
                                                <div class="modal-body">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $item['id'] }}" />

                                                    <div class="mb-3">
                                                        <label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
                                                        <input placeholder="{{ $item['tahun_ajaran'] }}" type="text" class="form-control" id="nama"
                                                            name="tahun_ajaran">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="semester" class="form-label">Semester</label>
                                                        <select name="semester" class="form-select form-select-md mb-3" aria-label=".form-select-md example" required>
                                                            <option value="" disabled selected>Pilih Semester</option>
                                                            <option value="Ganjil">Ganjil</option>
                                                            <option value="Genap">Genap</option>
                                                        </select>
                                                    </div>

                                                </div>

                                                <div class="modal-footer">
                                                    {{-- <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#modalEditConfirm">Simpan Perubahan</button> --}}
                                                        <button type="submit" class="btn btn-primary">
                                                            Simpan Perubahan
                                                        </button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                                        <td>
                                            <span class="badge rounded-pill bg-success">Aktif</span>
                                        </td>

                                        <td>
                                            <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                                data-bs-target="#modalEditTahunAjaran-{{ $item['id'] }}"><i
                                                    class="bi bi-pencil-square"></i></button>
                                        </td>
                                    @else
                                        <td>
                                            <span class="badge rounded-pill bg-danger">Tidak Aktif</span>
                                        </td>

                                        <button type="button" class="btn btn-danger mr-1"><i
                                            class="bi bi-x-circle"></i></button>
                                    @endif
                                    
                                @elseif($item['tipe'] == 'FRK')
                                    @if($tanggal_frk['data']['id'] == $item['id'])
                                    <div class="modal fade modal-lg" id="modalEditTahunAjaran-{{ $item['id'] }}"
                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">(FRK) {{ $counter }}. {{ $item['tahun_ajaran'] }} ({{ $item['semester'] }})</h6>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('admin.generate_frk.post') }}" method="POST">
                                                <div class="modal-body">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $item['id'] }}" />

                                                    <div class="mb-3">
                                                        <label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
                                                        <input placeholder="{{ $item['tahun_ajaran'] }}" type="text" class="form-control" id="nama"
                                                            name="tahun_ajaran">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="semester" class="form-label">Semester</label>
                                                        <select name="semester" class="form-select form-select-md mb-3" aria-label=".form-select-md example" required>
                                                            <option value="" disabled selected>Pilih Semester</option>
                                                            <option value="Ganjil">Ganjil</option>
                                                            <option value="Genap">Genap</option>
                                                        </select>
                                                    </div>

                                                </div>

                                                <div class="modal-footer">
                                                    {{-- <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#modalEditConfirm">Simpan Perubahan</button> --}}
                                                        <button type="submit" class="btn btn-primary">
                                                            Simpan Perubahan
                                                        </button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                                        <td>
                                            <span class="badge rounded-pill bg-success">Aktif</span>
                                        </td>

                                        <td>
                                            <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                                data-bs-target="#modalEditTahunAjaran-{{ $item['id'] }}"><i
                                                    class="bi bi-pencil-square"></i></button>
                                        </td>
                                    @else
                                        <td>
                                            <span class="badge rounded-pill bg-danger">Tidak Aktif</span>
                                        </td>

                                        <td>
                                            <button type="button" class="disabled btn btn-secondary mr-1"><i
                                                    class="bi bi-pencil-square"></i></button>
                                        </td>
                                    @endif
                                @endif
                                
                            </tr>

                            {{-- MODAL EDIT DAFTAR TAHUN AJARAN --}}
                            
                        @endforeach
                    @endif

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var successToastElement = document.getElementById('successToast');
        var errorToastElement = document.getElementById('errorToast');
        var successToast = new bootstrap.Toast(successToastElement);
        var errorToast = new bootstrap.Toast(errorToastElement);

        @if ($errors->any())
            // Display error messages
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
            // Display success messages
            var successMessage = '{{ session('success') }}';
            var successToastMessagesContainer = document.getElementById('success-toast-messages');
            var li = document.createElement('li');
            li.textContent = successMessage;
            li.style.listStyleType = 'none';
            successToastMessagesContainer.appendChild(li);
            successToast.show();
        @endif

        // Remove 'show' class after a few seconds (adjust to match toast animation duration)
        setTimeout(function() {
            successToastElement.classList.remove('show');
            errorToastElement.classList.remove('show');
        }, 15000); // 15000 milliseconds (15 seconds)
    });
</script>

</body>
</html>

@endsection

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
                                        {{-- TOAST --}}
                                        <div class="toast-container position-fixed top-0 end-0 p-3">
                                            <div id="successToast" class="toast bg-success-subtle" role="alert"
                                                 aria-live="assertive" aria-atomic="true">
                                                <div class="toast-body">
                                                    <i class="bi bi-check2-circle"></i>
                                                    <ul id="success-toast-messages">
                                                    </ul>
                                                </div>
                                            </div>
                                            <div id="errorToast" class="toast bg-danger-subtle" role="alert"
                                                 aria-live="assertive" aria-atomic="true">
                                                <div class="toast-body">
                                                    <i class="bi bi-x-circle"></i>
                                                    <ul id="error-toast-messages">
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

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

                        <form>
                            @csrf
                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    var successToastElement = document.getElementById('successToast');
                                    var errorToastElement = document.getElementById('errorToast');
                                    var successToast = new bootstrap.Toast(successToastElement);
                                    var errorToast = new bootstrap.Toast(errorToastElement);

                                    @if ($errors->any())
                                    // Menampilkan pesan error
                                    var errorMessages = @json($errors->all());
                                    var errorToastMessagesContainer = document.getElementById('error-toast-messages');
                                    errorMessages.forEach(function (message) {
                                        var li = document.createElement('li');
                                        li.textContent = message;
                                        li.style.listStyleType = 'none';
                                        errorToastMessagesContainer.appendChild(li);
                                    });
                                    errorToast.show();
                                    @elseif (session('error'))
                                    // Menampilkan pesan error dari session
                                    var errorMessage = '{{ session('error') }}';
                                    var errorToastMessagesContainer = document.getElementById('error-toast-messages');
                                    var li = document.createElement('li');
                                    li.textContent = errorMessage;
                                    li.style.listStyleType = 'none';
                                    errorToastMessagesContainer.appendChild(li);
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
                                    setTimeout(function () {
                                        successToast.hide();
                                        errorToast.hide();
                                    }, 5000); // 5000 milidetik (5 detik)
                                });
                            </script>
                        </form>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@extends('Template.admin')


@section('content')

    <div class = "mt-5 flex-wrap ml-4 mr-4 ">
        <div class = "row">
            <div class = "col">
                <h3 class = "font-weight-bold">Rekap Kegiatan</h3>
                <p class = "breadcrumbs">Administrator</p>
            </div>
            <div class = "col-md-auto">
                <div class="alert alert-info alert-sm bg-alert-info" role="alert">
                    <p class = "mb-0 font-weight-bold"> Peran saat ini  : Administrator </p>
                </div>
            </div>
        </div>

        <div class = "bg-white mt-2" style="border-top: 1px solid black; border-bottom: 1px solid black; border-left: 1px solid black; border-right: 1px solid black;">
            <div class = "ml-1 mr-2 pt-4">
                <h4 class = "font-weight-bold">Rekap Kegiatan</h4>
            </div>
            <hr/>

            @yield('content-generate')
        </div>
    <div>



@endsection

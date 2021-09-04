@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Tambah Kontak</h3>
                <p class="text-muted m-b-30"></p>
                <a class="btn btn-danger" href="{{ url('/kontak') }}">Kembali</a>
                <hr>
                <form method="post" action="{{ url('kontak/') }}" enctype="multipart/form-data">
                    @csrf
                    @include('admin.kontak._form')
                </form>


            </div>
        </div>
    </div>
@endsection

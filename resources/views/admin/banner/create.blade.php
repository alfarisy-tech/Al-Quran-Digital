@extends('admin.layouts.master')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">Tambah Banner</h3>
            <p class="text-muted m-b-30"></p>
<a class="btn btn-danger" href="{{ url('/banner') }}">Kembali</a>
            <hr>
            <form method="post" action="{{ url('banner/') }}" enctype="multipart/form-data">
                @csrf
                @include('admin.banner._form')
            </form>


        </div>
    </div>
</div>
@endsection

@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title">Panel Admin | Aplikasi Quran Berbasis Web


                    {{-- {{ Auth::user()->name }} --}}
                </h3>
            </div>

        </div>

    </div>
    <div class="row colorbox-group-widget">
        <div class="col-md-3 col-sm-6 info-color-box">
            <div class="white-box">
                <div class="media bg-primary">
                    <div class="media-body">
                        <h3 class="info-count">{{ $user }}<span class="pull-right"><i
                                    class="fa fa-users"></i></span></h3>
                        <p class="info-text font-12">Pengguna Al-Quran</p>
                        <p class="info-ot font-15">Target<span class="label label-rounded">∞</span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 info-color-box">
            <div class="white-box">
                <div class="media bg-success">
                    <div class="media-body">
                        <h3 class="info-count">{{ $blog }}<span class="pull-right"><i
                                    class="mdi mdi-comment-text-outline"></i></span></h3>
                        <p class="info-text font-12">Blog Artikel</p>
                        <p class="info-ot font-15 ">Target<span class="label label-rounded">--</span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 info-color-box">
            <div class="white-box">
                <div class="media bg-danger">
                    <div class="media-body">
                        <h3 class="info-count">{{ $surahFav }}<span class="pull-right"><i
                                    class="fa fa-heart"></i></span></h3>
                        <p class="info-text font-12">Surah Difavoritkan</p>
                        <p class="info-ot font-15">Dari<span class="label label-rounded">{{ $user }}</span> Pembaca
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 info-color-box">
            <div class="white-box">
                <div class="media bg-warning">
                    <div class="media-body">
                        <h3 class="info-count">{{ $subs }}<span class="pull-right"><i class="fa fa-bell"></i></span>
                        </h3>
                        <p class="info-text font-12">Subscriber</p>
                        <p class="info-ot font-15">Dari<span class="label label-rounded">{{ $user }}</span> Pembaca
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

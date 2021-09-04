@extends('quran.layouts.master')
{{-- Banner --}}
@section('banner')
    <section>
        <div class="w-100 position-relative">

            <div class="feat-wrap v2 position-relative w-100">

                <div class="feat-caro">
                    @foreach ($banner as $banner)
                        <div class="feat-item v2">
                            <div class="feat-img position-absolute"
                                style="background-image: url({{ asset('images/' . $banner->url) }}"></div>
                            <div class="feat-cap-wrap position-absolute d-inline-block">
                                <div class="feat-cap left-icon d-inline-block">
                                    <i class="d-inline-block flaticon-rub-el-hizb thm-clr"></i>
                                    <h2 class="mb-0">{{ $banner->judul }}</h2>
                                    <p class="mb-0">{{ $banner->sub_judul }}.</p>
                                    <a class="thm-btn thm-bg" href="#" title="">Take A
                                        Quran<span></span><span></span><span></span><span></span></a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <!-- Featured Area Wrap -->


        </div>
    </section>
@endsection
{{-- ./Banner --}}
{{-- Waktu --}}
@section('waktu')
    <section>
        <div class="w-100 position-relative">
            <div class="time-wrap2 w-100">
                <div class="row align-items-center">
                    <div class="col-md-12 col-sm-12 col-lg-3">
                        <div class="time-title w-100">
                            <h4 class="mb-0">Go to Allah Before its to Late</h4>
                            <p class="mb-0 thm-clr">Today : {{ $today }}</p>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-lg-9">
                        <ul class="time-list2 d-flex flex-wrap w-100 mb-0 list-unstyled">
                            @foreach ($data as $waktu)
                                <li><span>{{ $waktu->nama_waktu }}</span>@php
                                    $dt = $waktu->jadwal;
                                    $db = date('H:i', strtotime($dt));
                                    echo $db;

                                @endphp WIB</li>
                            @endforeach
                            <li><span>JAM</span><b id="jam"></b>:<b id="menit"></b>:<b id="detik"></b> WIB</li>
                            <script>
                                window.setTimeout("waktu()", 1000);

                                function waktu() {
                                    var waktu = new Date();
                                    setTimeout("waktu()", 1000);
                                    document.getElementById("jam").innerHTML = waktu.getHours();
                                    document.getElementById("menit").innerHTML = waktu.getMinutes();
                                    document.getElementById("detik").innerHTML = waktu.getSeconds();
                                }
                            </script>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
{{-- ./Waktu --}}

@section('welcome')
    <section>
        <div class="w-100 pt-100 position-relative">
            <img class="img-fluid sec-top-mckp position-absolute" src="assets/images/sec-top-mckp.png" alt="Sec Top Mockup">
            <div class="container">
                <div class="about-wrap text-center position-relative w-100">
                    <div class="about-inner d-inline-block">
                        <img class="img-fluid" src="assets/images/bism-img1.png" alt="Bismillah Image">
                        <h2 class="mb-0">Welcome To The E-Quran</h2>
                    </div>
                </div><!-- About Wrap -->
            </div>
        </div>
    </section>
@endsection
{{-- Conten --}}
@section('content')
    <section>
        <div class="w-100 pt-50 pb-260 position-relative">
            <img class="img-fluid sec-top-mckp position-absolute" src="{{ asset('/assets/images/sec-top-mckp2.png') }}"
                alt="Sec Top Mockup 2">
            <img class="sec-botm-rgt-mckp img-fluid position-absolute"
                src="{{ asset('assets/images/sec-botm-mckp.png') }}" alt="Sec Bottom Mockup">
            <div class="container">

                <div class="text-center">
                    <div class="row text-center pb-20">
                        <div class="col-sm-12">
                            <h5 class="alert-info">Pastikan Huruf Awal Menggunakan Huruf Kapital. Ex (Al-Baqarah)</h5>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-lg-12">

                        <form method="GET" class="cont-form">
                            @csrf

                            <input value="" class="form-control" required name="cari"
                                placeholder="Cari urutan, nama, arti surah . . . ">

                            <button class="thm-btn thm-bg" type="submit">SEARCH
                                <span></span><span></span><span></span><span></span></button>
                        </form>
                    </div>

                </div>
                <br>
                <br>
                {{-- Pencarian --}}
                @if (isset($_GET['cari']))
                    {{--  --}}
                    @php

                        $cari = $_GET['cari'];
                        $text = $cari;

                        $keyword = $text;
                        $stop = 0;
                    @endphp
                    <div class="row">
                        <div class="col-sm-12">
                            <h3>Hasil Pencarian : {{ $cari }}</h3>
                        </div>
                    </div>
                    <hr>
                    @foreach ($tampil as $search)
                        @if ($search->number == $keyword || $search->name->transliteration->id == $keyword || $search->name->translation->id == $keyword)

                            <div class="about-wrap2 w-100">
                                <div class="row">
                                    <div class="col-md-8 col-sm-12 col-lg-5">
                                        <div class="about-title w-100">
                                            <h2 class="mb-0 text-capitalize">{{ $search->name->transliteration->id }}</h2>
                                            <p class="mb-0 thm-clr ">{{ $search->revelation->id }} :
                                                {{ $search->name->translation->en }}</p>

                                            <form action="{{ url('/surahfav') }}" method="POST">
                                                @csrf
                                                <input hidden type="" name="id_surah" value="{{ $search->number }}">
                                                <input hidden type="" name="id_user" value="{{ @Auth::user()->id }}">
                                                <button type="submit" class="btn"><i style="color: green"
                                                        class="fas fa-bookmark fa-2x"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-lg-7">
                                        <div class="about-inner2 w-100">
                                            <h2 class="mb-0 thm-clr ">{{ $search->name->long }}</h2>
                                            <p class="mb-0">{{ Str::substr($search->tafsir->id, 0, 200) . '...' }}</p>
                                            <br>

                                            <a class="thm-btn btn-sm bg-color1" href="{{ 'surah/' . $search->number }}"
                                                title="">Read
                                                More<span></span><span></span><span></span><span></span></a>

                                        </div>
                                    </div>
                                </div>
                            </div><!-- About Wrap 2 -->
                            <hr style="border: 1px solid green">




                        @endif

                    @endforeach

                @else
                    {{-- ./Pencarian --}}
                    {{-- Without Pencarian --}}
                    @foreach ($row as $item)
                        <div class="about-wrap2 w-100">
                            <div class="row">
                                <div class="col-md-8 col-sm-12 col-lg-5">
                                    <div class="about-title w-100">
                                        <h2 class="mb-0 text-capitalize"><span>({{ $item->number }})</span>
                                            {{ $item->name->transliteration->id }}
                                        </h2>
                                        <p class="mb-0 thm-clr ">{{ $item->revelation->id }} :
                                            {{ $item->name->translation->en }}</p>
                                        <form action="{{ url('/surahfav') }}" method="POST">
                                            @csrf
                                            <input hidden type="" name="id_surah" value="{{ $item->number }}">
                                            <input hidden type="" name="id_user" value="{{ @Auth::user()->id }}">
                                            <button type="submit" class="btn"><i style="color: green"
                                                    class="fas fa-bookmark fa-2x"></i></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-lg-7">
                                    <div class="about-inner2 w-100">
                                        <h2 class="mb-0 thm-clr ">{{ $item->name->long }}</h2>
                                        <p class="mb-0">{{ Str::substr($item->tafsir->id, 0, 200) . '...' }} </p>
                                        <br>
                                        <a class="thm-btn btn-sm bg-color1" href="{{ 'surah/' . $item->number }}"
                                            title="">Read
                                            More<span></span><span></span><span></span><span></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr style="border: 1px solid green">
                    @endforeach
                    <br>
                    <div class="pagination-wrap mt-20 d-flex flex-wrap justify-content-center text-center w-100">
                        {{-- Previous --}}
                        <ul class="pagination mb-0">
                            <li class="page-item prev"><a class="page-link" href="#"
                                    onclick="document.getElementById('{{ $prev }}-prev').submit();" title=""><i
                                        class="fas fa-long-arrow-alt-left"></i></a></li>
                            <form action="{{ url('/') }}" method="GET" id="{{ $prev }}-prev" class="d-none">
                                @csrf
                                <input hidden type="text" name="page" id="" value="{{ $prev }}">
                            </form>
                        </ul>
                        {{-- ./Previous --}}
                        {{-- Pagination --}}
                        @for ($i = 1; $i <= 7; $i++)
                            <ul class="pagination mb-0">
                                <li class="page-item">
                                    <a class="page-link" href="#"
                                        onclick="document.getElementById('{{ $i }}-page').submit();"
                                        title="">{{ $i }}
                                    </a>
                                </li>
                                <form action="{{ url('/') }}" method="GET" id="{{ $i }}-page"
                                    class="d-none">
                                    @csrf
                                    <input hidden type="text" name="page" id="" value="{{ $i }}">
                                </form>
                            </ul>
                        @endfor
                        {{-- ./Pagination --}}
                        {{-- Next --}}
                        <ul class="pagination mb-0">
                            <li class="page-item next"><a class="page-link" href="#"
                                    onclick="document.getElementById('{{ $next }}-next').submit();" title=""><i
                                        class="fas fa-long-arrow-alt-right"></i></a></li>
                            <form action="{{ url('/') }}" method="GET" id="{{ $next }}-next" class="d-none">
                                @csrf
                                <input hidden type="text" name="page" id="" value="{{ $next }}">
                            </form>
                        </ul>
                        {{-- ./Next --}}
                    </div>
                @endif
                {{-- ./Without Pencarian --}}
            </div>
        </div>
    </section>

@endsection

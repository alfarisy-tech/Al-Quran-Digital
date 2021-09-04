@extends('quran.layouts.master')

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
            </div><!-- Time Wrap -->
        </div>
    </section>
@endsection
@section('content')
    <section>
        <div class="w-100 pt-50 pb-260 position-relative">
            <img class="img-fluid sec-top-mckp position-absolute" src="{{ asset('/assets/images/sec-top-mckp2.png') }}"
                alt="Sec Top Mockup 2">
            <img class="sec-botm-rgt-mckp img-fluid position-absolute"
                src="{{ asset('assets/images/sec-botm-mckp.png') }}" alt="Sec Bottom Mockup">
            <div class="container">
                <div class="text-center">
                    <br>

                    <img class="img-fluid" src="{{ asset('/assets/images/bism-img2.png') }}" alt="Bismillah Image">

                </div>
                <br>
                <br>
                <br>
                @foreach ($datas as $key => $search)
                    @foreach ($tampil as $keys => $item)
                        @if (in_array($search->number, $tampil[$keys]))
                            {{-- @dd($search) --}}



                            <div class="about-wrap2 w-100">

                                <div class="row">
                                    <div class="col-md-8 col-sm-12 col-lg-5">
                                        <div class="about-title w-100">
                                            <h2 class="mb-0 text-capitalize">{{ $search->name->transliteration->id }}</h2>
                                            <p class="mb-0 thm-clr ">{{ $search->revelation->id }} :
                                                {{ $search->name->translation->en }}</p>

                                            <form action="{{ url('disFav/') }}" method="GET">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">

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
                @endforeach
            </div>
        </div>

    </section>
@endsection

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
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <form method="GET" class="cont-form">
                            @csrf
                            <input required class="form-control" type="text" name="ayat" placeholder="Cari Ayat ke- . . .">
                            <button class="thm-btn thm-bg" type="submit">Search
                                <span></span><span></span><span></span><span></span></button>
                        </form>
                    </div>
                    <br>
                    <br>
                    @if ($cek == null)

                    @else
                        <h1 class="pt-50">{{ $bis }}<sup class="text-success"
                                style="font-family:Traditional Arabic;font-size:15px;"></sup>
                        </h1>
                        <i>{{ $bis_ }}</i>
                        <p class="mb-0">Artinya :
                            <i class="text-danger"> "{{ $bis__ }}"</i>
                        </p>
                    @endif
                </div>
                <div class="prod-detail-wrap w-100 pt-50">
                    @if (isset($_GET['ayat']))
                        @php
                            $ayat = $_GET['ayat'];
                            $ayah = $_GET['ayat'];
                            // $keyword = $ayat;
                            $cari = [$ayah];
                        @endphp
                        @if ($cari != null || $cari != '')
                            @foreach ($row as $item)
                                @if (in_array($item->number->inSurah, $cari))
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <span>

                                                <h3>Hasil Pencarian : Ayat ke-{{ $ayah }} dari Surah
                                                    {{ $title }}
                                                </h3>
                                            </span>

                                        </div>
                                    </div>
                                    <hr>
                                    <div class="prod-detail-tabs position-relative mt-20 w-100">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item"><a class="nav-link active" data-toggle="tab"
                                                    href="#description{{ $item->number->inQuran }}{{ $item->number->inSurah }}">Ayat</a>
                                            </li>
                                            <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                    href="#comments{{ $item->number->inQuran }}{{ $item->number->inSurah }}">Detail</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content">
                                            <div class="tab-pane fade show active text-right"
                                                id="description{{ $item->number->inQuran }}{{ $item->number->inSurah }}">
                                                <h2 class="">{{ $item->text->arab }}<sup class="text-success"
                                                        style="font-family:Traditional Arabic;font-size:15px;">{
                                                        {{ $item->number->inSurah }}
                                                        }</sup>
                                                </h2>
                                                <i>{{ $item->text->transliteration->en }}</i>
                                                <p class="mb-0">({{ $item->number->inSurah }}) Artinya :
                                                    <i class="text-danger"> "{{ $item->translation->id }}"</i>
                                                </p>
                                                <br>
                                                <div>
                                                    <div class="plyr v2 w-100">

                                                        <audio controls>
                                                            <source src="{{ $item->audio->secondary[1] }}"
                                                                type="audio/mpeg">
                                                        </audio>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade"
                                                id="comments{{ $item->number->inQuran }}{{ $item->number->inSurah }}">
                                                <div class="comment-reply mt-0 w-100">
                                                    <h5 class="mb-0">Detail Ayat :</h5>
                                                    <div class="row mrg5">

                                                        <div class="col-md-6 col-sm-12 col-lg-4">
                                                            <ul class="adt-info-list mb-0 list-unstyled">
                                                                <li>Ke- {{ $item->number->inQuran }} dalam Al-Quran
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12 col-lg-4">
                                                            <ul class="adt-info-list mb-0 list-unstyled">
                                                                <li>Ke- {{ $item->number->inSurah }} dalam Surah
                                                                    {{ $title }}</li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12 col-lg-4">
                                                            <ul class="adt-info-list mb-0 list-unstyled">
                                                                <li>Juz ke-{{ $item->meta->juz }} Al-Quran</li>
                                                            </ul>
                                                        </div>


                                                    </div>
                                                    <br>

                                                    <h5 class="mb-0">Tafsir Ayat:</h5>
                                                    <form class="w-100">
                                                        <div class="row">

                                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                                <textarea
                                                                    readonly>{{ $item->tafsir->id->short }}</textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div><!-- Comment Reply -->
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif

                    @else
                        @foreach ($row as $item)
                            <div class="prod-detail-tabs position-relative mt-20 w-100">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a class="nav-link active" data-toggle="tab"
                                            href="#description{{ $item->number->inQuran }}{{ $item->number->inSurah }}">Ayat</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                            href="#comments{{ $item->number->inQuran }}{{ $item->number->inSurah }}">Detail</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active text-right"
                                        id="description{{ $item->number->inQuran }}{{ $item->number->inSurah }}">
                                        <h2 class="">{{ $item->text->arab }}<sup class="text-success"
                                                style="font-family:Traditional Arabic;font-size:15px;">{
                                                {{ $item->number->inSurah }}
                                                }</sup>
                                        </h2>
                                        <i>{{ $item->text->transliteration->en }}</i>
                                        <p class="mb-0">({{ $item->number->inSurah }}) Artinya :
                                            <i class="text-danger"> "{{ $item->translation->id }}"</i>
                                        </p>
                                        <br>
                                        <div>
                                            <div class="plyr v2 w-100">

                                                <audio controls>
                                                    <source src="{{ $item->audio->secondary[1] }}" type="audio/mpeg">
                                                </audio>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade"
                                        id="comments{{ $item->number->inQuran }}{{ $item->number->inSurah }}">
                                        <div class="comment-reply mt-0 w-100">
                                            <h5 class="mb-0">Detail Ayat :</h5>
                                            <div class="row mrg5">

                                                <div class="col-md-6 col-sm-12 col-lg-4">
                                                    <ul class="adt-info-list mb-0 list-unstyled">
                                                        <li>Ke- {{ $item->number->inQuran }} dalam Al-Quran
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-6 col-sm-12 col-lg-4">
                                                    <ul class="adt-info-list mb-0 list-unstyled">
                                                        <li>Ke- {{ $item->number->inSurah }} dalam Surah
                                                            {{ $title }}</li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-6 col-sm-12 col-lg-4">
                                                    <ul class="adt-info-list mb-0 list-unstyled">
                                                        <li>Juz ke-{{ $item->meta->juz }} Al-Quran</li>
                                                    </ul>
                                                </div>


                                            </div>
                                            <br>

                                            <h5 class="mb-0">Tafsir Ayat:</h5>
                                            <form class="w-100">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                                        <textarea readonly>{{ $item->tafsir->id->short }}</textarea>
                                                    </div>
                                                </div>
                                            </form>
                                        </div><!-- Comment Reply -->
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    @endif


                </div><!-- Product Detail Wrap -->

            </div>
        </div>
    </section>

@endsection

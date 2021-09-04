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
        <div class="w-100 pt-120 pb-260 position-relative">
            <img class="sec-botm-rgt-mckp img-fluid position-absolute"
                src="{{ asset('assets/images/sec-botm-mckp.png') }}" alt="Sec Bottom Mockup">
            <div class="container">
                <div class="post-detail-wrap w-100">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-9">
                            <div class="post-detail-inner w-100">
                                <div class="post-detail-img w-100">
                                    <img class="img-fluid w-100" src="{{ asset('images/' . $datas->url) }}"
                                        alt="Blog Detail Image 1">
                                </div>
                                <div class="post-detail-info position-relative w-100">
                                    <div class="post-info2-inner text-center">
                                        <div class="post-date2">
                                            @php
                                                $tanggal = $datas->tanggal;
                                                $pecah_tgl = explode('-', $tanggal);
                                                $tgl = $pecah_tgl[2];
                                                $hari = date('F Y', strtotime($tanggal));
                                            @endphp
                                            <span class="d-block">{{ $tgl }}</span>
                                            <i class="d-block thm-bg">{{ $hari }}</i>
                                        </div>

                                    </div>
                                    <ul class="post-meta2 d-inline-flex flex-wrap align-items-center mb-0 list-unstyled">
                                        <li class="thm-clr">Source : {{ $datas->nama_foto }}</li>
                                        <li class="thm-clr">By: <a href="javascript:void(0);"
                                                title="">{{ $datas->createdBy->name }}</a></li>
                                    </ul>
                                    <h2 class="mb-0">{{ $datas->judul }}</h2>
                                    <p class="mb-0 text-justify">
                                        {{ $datas->deskripsi }}
                                    </p>
                                </div>

                                <div class="share-tags-wrap d-flex flex-wrap w-100">
                                    <div class="share-links d-inline-flex">
                                        <span class="d-inline-block">Share This:</span>
                                        <div class="social-links4 v2 text-center d-inline-flex">
                                            <a href="https://www.tumblr.com/" title="Tumblr" target="_blank"><i
                                                    class="fab fa-tumblr"></i></a>
                                            <a href="https://www.facebook.com/" title="Facebook" target="_blank"><i
                                                    class="fab fa-facebook-f"></i></a>
                                            <a href="https://twitter.com/" title="Twitter" target="_blank"><i
                                                    class="fab fa-twitter"></i></a>
                                        </div>
                                    </div>

                                </div><!-- Share & Tags Wrap -->



                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-3">
                            <aside class="sidebar w-100">
                                <div class="widget2 w-100">
                                    <h3 class="widget-title2">RECENT POSTS</h3>
                                    <div class="mini-posts-wrap w-100">
                                        @foreach ($recent as $row)
                                            @php
                                                $hari = date('F d, Y', strtotime($row->tanggal));
                                            @endphp
                                            <div class="mini-post-box d-flex flex-wrap w-100">
                                                <a href="{{ url('blog-detail/' . $row->id) }}" title=""><img
                                                        class="img-fluid w-100" src="{{ asset('images/' . $row->url) }}"
                                                        alt="Mini Post Image 1"></a>
                                                <div class="mini-post-info">
                                                    <span class="d-block thm-clr">{{ $hari }}</span>
                                                    <h4 class="mb-0"><a href="blog-detail.html"
                                                            title="">{{ $row->judul }}</a></h4>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>

                                <div class="widget2 w-100">
                                    <h3 class="widget-title2">USEFUL LINKS</h3>
                                    <ul class="mb-0 list-unstyled w-100">
                                        <li><a href="{{ url('/') }}" title="">Home</a></li>
                                        @if (auth()->check() && Auth::user()->level == 'user')
                                            <li><a href="javascript:void(0);" title="">Surah Favorit</a></li>
                                        @endif
                                        <li><a href="{{ url('blog/') }}" title="">Blogs</a></li>
                                        <li><a href="{{ url('contact-us/') }}" title="">Contact Us</a></li>
                                        <li><a href="https://alfarisy-tech.my.id" title="">About Author</a></li>
                                    </ul>
                                </div>

                            </aside><!-- Sidebar -->
                        </div>
                    </div>
                </div><!-- Post Detail Wrap -->
            </div>
        </div>
    </section>
@endsection

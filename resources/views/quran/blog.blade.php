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
                                    <a class="thm-btn thm-bg" href="" title="">Take A
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
@section('content')

    <section>
        <div class="w-100 pt-120 pb-280 position-relative">
            <img class="sec-botm-rgt-mckp img-fluid position-absolute"
                src="{{ asset('assets') }}/images/sec-botm-mckp.png" alt="Sec Bottom Mockup">
            <div class="container">
                <div class="blog-wrap w-100">
                    <div class="row">
                        @foreach ($data_artikel as $blog)


                            <div class="col-md-6 col-sm-6 col-lg-4">
                                <div class="post-box w-100" style="">
                                    <div class="post-img overflow-hidden position-relative w-100">
                                        <a href="{{ url('blog-detail/' . $blog->id) }}" title=""><img
                                                class="img-fluid w-100" width="100%" height="700px"
                                                src="{{ asset('images/' . $blog->url) }}" alt="Blog Image 1"></a>
                                    </div>
                                    <div class="post-info position-relative w-100">
                                        <a class="thm-bg" href="{{ url('blog-detail/' . $blog->id) }}" title=""><i
                                                class="fas fa-link"></i></a>
                                        <span class="post-date thm-clr">{{ $blog->tanggal }}</span>
                                        <h3 class="mb-0"><a href="blog-detail.html" title="">{{ $blog->judul }}</a></h3>
                                        <ul class="post-meta d-flex flex-wrap mb-0 list-unstyled">
                                            <li><i class="fas fa-user-alt"></i>By: <a href="javascript:void(0);"
                                                    title="">{{ $blog->createdBy->name }}</a></li>
                                            <li><i class="fa fa-newspaper"></i>Source : {{ $blog->nama_foto }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="pagination-wrap mt-20 d-flex flex-wrap justify-content-center text-center w-100">
                            <p class="pagination">{{ $data_artikel->links() }}</p>

                            {{-- <ul class="pagination mb-0">
                            <li class="page-item prev"><a class="page-link" href="javascript:void(0);" title=""><i class="fas fa-long-arrow-alt-left"></i></a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);" title="">1</a></li>
                            <li class="page-item active"><a class="page-link" href="javascript:void(0);" title="">2</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);" title="">3</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);" title="">4</a></li>
                            <li class="page-item pg-rang">...........</li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);" title="">24</a></li>
                            <li class="page-item next"><a class="page-link" href="javascript:void(0);" title=""><i class="fas fa-long-arrow-alt-right"></i></a></li>
                        </ul> --}}
                        </div><!-- Pagination Wrap -->
                    </div>
                </div><!-- Blog Wrap -->

            </div>
        </div>
    </section>
@endsection

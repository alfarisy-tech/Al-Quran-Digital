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
        <div class="w-100 pt-90 thm-layer opc6 position-relative">
            <div class="fixed-bg patern-bg back-blend-multiply thm-bg"
                style="background-image: url(assets/images/pattern-bg.jpg);"></div>
            <div class="container">
                <div class="cont-info-wrap res-row overlap-115 w-100">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-lg-3">
                            <div class="cont-info-box-wrap w-100">
                                <div class="cont-info-box text-center position-relative w-100 pat-bg white-layer opc8 back-blend-multiply bg-white"
                                    style="background-image: url(assets/images/pattern-bg.jpg);">
                                    <span class="bg-color1"><i class="flaticon-call"></i></span>
                                    <h4 class="mb-0">Phone Number</h4>
                                    <p class="mb-0">+628 237 904 9190</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-3">
                            <div class="cont-info-box-wrap w-100">
                                <div class="cont-info-box text-center position-relative w-100 pat-bg white-layer opc8 back-blend-multiply bg-white"
                                    style="background-image: url(assets/images/pattern-bg.jpg);">
                                    <span class="bg-color1"><i class="flaticon-mail"></i></span>
                                    <h4 class="mb-0">Email Address</h4>
                                    <p class="mb-0"><a href="javascript:void(0);" title="">ariafsundoro@gmail.com</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-3">
                            <div class="cont-info-box-wrap w-100">
                                <div class="cont-info-box text-center position-relative w-100 pat-bg white-layer opc8 back-blend-multiply bg-white"
                                    style="background-image: url(assets/images/pattern-bg.jpg);">
                                    <span class="bg-color1"><i class="fa fa-globe"></i></span>
                                    <h4 class="mb-0">Website</h4>
                                    <p class="mb-0"><a href="https://alfarisy-tech.my.id"
                                            title="">https://alfarisy-tech.my.id</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-3">
                            <div class="cont-info-box-wrap w-100">
                                <div class="cont-info-box text-center position-relative w-100 pat-bg white-layer opc8 back-blend-multiply bg-white"
                                    style="background-image: url(assets/images/pattern-bg.jpg);">
                                    <span class="bg-color1"><i class="fas fa-map-marker-alt"></i></span>
                                    <h4 class="mb-0">Email Address</h4>
                                    <p class="mb-0"><a href="javascript:void(0);" title="">Jl Kemuning Cambai, Prabumulih,
                                            Sumsel</a></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- Contact Info Wrap -->
            </div>
        </div>
    </section>
    <section>
        <div class="w-100 pb-250 position-relative">
            <img class="sec-botm-rgt-mckp img-fluid position-absolute"
                src="{{ asset('assets/images/sec-botm-mckp.png') }}" alt="Sec Bottom Mockup">

            <div class="contact-map w-100"><iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6098.178654014345!2d104.26509932855629!3d-3.390943852919025!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3a34a1e114cb83%3A0x276be20531473b04!2zM8KwMjMnMTkuNyJTIDEwNMKwMTUnNDcuMiJF!5e0!3m2!1sid!2sid!4v1629276588842!5m2!1sid!2sid"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe></div>
            <div class="container">
                <div class="contact-wrap mt-100 w-100">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-lg-6">
                            <div class="cont-info-desc w-100">
                                <h3 class="mb-0">Don't be a stranger just say hello.</h3>
                                <p class="mb-0">"Hubungan dibangun bukan untuk meminta balas budi tapi untuk saling berbagi,
                                    memahami dan menomorduakan keinginan diri sendiri."</p>
                                <h6 class="mb-0">Follow us on social media</h6>
                                <div class="social-links2 v2 text-center d-inline-flex">
                                    <a class="facebook" href="https://www.facebook.com/arif.alfarisy.90" title="Facebook"
                                        target="_blank"><i class="fab fa-facebook-f"></i></a>
                                    <a class="instagram" href="https://instagram.com/arif_alfarisy17" title="instagram"
                                        target="_blank"><i class="fab fa-instagram"></i></a>
                                    {{-- <a class="google" href="https://www.google.com/ariafsundoro" title="Google Plus"
                                        target="_blank"><i class="fab fa-google-plus-g"></i></a> --}}
                                    <a class="linkedin" href="https://www.linkedin.com/in/arif-alfarisy-1185001ab"
                                        title="Linkedin" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-lg-6">
                            <form class="cont-form w-100" action="{{ route('subscribers.store') }}" method="post">
                                @csrf
                                <input type="text" placeholder="Complete Name">
                                <input type="email" placeholder="Email Address" name="email">
                                <input type="tel" placeholder="Phone No">
                                <textarea placeholder="Message"></textarea>
                                <button class="thm-btn thm-bg" type="submit">SEND
                                    MESSAGE<span></span><span></span><span></span><span></span></button>

                            </form>
                        </div>
                    </div>
                </div><!-- Contact Wrap -->
            </div>
        </div>
    </section>
@endsection

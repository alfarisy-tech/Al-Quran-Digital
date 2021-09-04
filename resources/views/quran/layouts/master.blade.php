<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="icon" href="{{ asset('/assets/images/favicon.png') }}" sizes="35x35" type="image/png">
    <title>{{ $title }}</title>

    <link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/color.css') }}" rel="stylesheet">

    <style>
        .desktop:hover {
            color: black;
        }

        .respon:hover {
            color: green;
        }

        .mobile:hover {
            color: green;
        }

    </style>
</head>

<body>
    <main>
        <div id="preloader">
            <div class="preloader-inner">
                <i class="preloader-icon thm-clr flaticon-quran" style="color: green;"></i>
            </div>
        </div><!-- Page Loader -->
        <header class="stick style2 w-100">

            {{-- TOPBAR --}}
            <div class="topbar bg-color1 d-flex flex-wrap justify-content-between w-100">
                <div class="topbar-left">
                    <ul class="topbar-info-list mb-0 list-unstyled d-inline-flex">
                        <li><i class="thm-clr far fa-envelope"></i><a href="javascript:void(0);"
                                title="">ariafsundoro@gmail.com</a></li>
                        <li><i class="thm-clr fas fa-phone-alt"></i>+628 237 904 9190</li>
                    </ul>
                </div>
                <div class="topbar-right d-inline-flex">
                    <ul class="topbar-info-list mb-0 list-unstyled d-inline-flex">
                        <li><i class="thm-clr flaticon-sun"></i>Sunrise At: <span class="thm-clr">5:05am</span></li>
                        <li><i class="thm-clr flaticon-moon"></i>Sunset At: <span class="thm-clr">7:14pm</span></li>
                    </ul>
                    <div class="social-links d-inline-flex">
                        @foreach ($kontak as $val)
                            <a href="{{ $val->link }}" title="{{ $val->nama }}" target="_blank"><i
                                    class="{{ $val->logo }}"></i></a>
                        @endforeach


                    </div>
                </div>
            </div>
            <!-- TOPBAR -->

            {{-- MENU DESKTOP --}}
            <div class="logo-menu-wrap v2 d-flex flex-wrap align-items-center justify-content-between w-100 pat-bg thm-layer opc65 back-blend-multiply thm-bg"
                style="background-image: url(assets/images/pattern-bg.jpg);">
                <div class="logo">
                    <h1 class="mb-0 text-white"><a class="desktop" href="{{ url('/') }}" title="Home"><i
                                style="color: white" class="thm-clr flaticon-quran-2"></i>
                            E-Quran
                        </a></h1>
                </div><!-- Logo -->
                <nav class="d-flex flex-wrap align-items-center justify-content-between">
                    <div class="header-left">
                        <ul class="mb-0 list-unstyled d-inline-flex">
                            <li class="{{ request()->is('/') ? 'active' : '' }}">
                                <a href="{{ url('/') }}" title="">Home</a>
                                @if (Auth::check() && Auth::user()->level == 'user')
                            <li class="{{ request()->is('surah-favorit') ? 'active' : '' }}">
                                <a href="{{ url('surah-favorit/') }}" title="">Surah Favorit</a>

                                @endif

                            </li>
                            <li class="{{ request()->is('blog-quran') ? 'active' : '' }}"><a
                                    href="{{ url('/blog-quran') }}" title="">Blog</a>

                            </li>
                            <li class="{{ request()->is('contact-us') ? 'active' : '' }}"><a
                                    href="{{ url('contact-us/') }}" title="">Contact Us</a>

                            </li>
                            @if (auth()->check() && Auth::user()->level == 'user')
                                <li class="menu-item-has-children"><a href="javascript:void(0);"
                                        title="">Assalamualaikum, {{ Auth::user()->name }}</a>
                                    <ul class="mb-0 list-unstyled">
                                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();"
                                                title="">Logout</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </li>

                                    </ul>
                                </li>

                            @else
                                <li class="menu-item-has-children"><a href="javascript:void(0);" title="">Account</a>
                                    <ul class="mb-0 list-unstyled">

                                        <li><a href="{{ url('/login') }}" title="">Login</a></li>
                                        <li><a href="{{ url('/register') }}" title="">Register</a></li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>

                </nav>
            </div>
            <!-- MENU DESTOP -->
        </header>
        <!-- Header -->

        {{-- MENU RESPON --}}
        <div class="sticky-menu">
            <div class="container">
                <div class="sticky-menu-inner d-flex flex-wrap align-items-center justify-content-between w-100">
                    <div class="logo">
                        <h1 class="mb-0"><a class="respon" href="{{ url('/') }}" title="Home"><i
                                    class="thm-clr flaticon-quran-2"></i>
                                E-Quran</a>
                        </h1>
                    </div><!-- Logo -->
                    <nav class="d-flex flex-wrap align-items-center justify-content-between">
                        <div class="header-left">
                            <ul class="mb-0 list-unstyled d-inline-flex">
                                <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ url('/') }}"
                                        title="">Home</a>

                                </li>
                                @if (Auth::check() && Auth::user()->level == 'user')
                                    <li class="{{ request()->is('surah-favorit') ? 'active' : '' }}">
                                        <a href="{{ url('surah-favorit/') }}" title="">Surah Favorit</a>

                                @endif

                                </li>
                                <li class="{{ request()->is('blog-quran') ? 'active' : '' }}"><a
                                        href="{{ url('/blog-quran') }}" title="">Blog</a>

                                </li>

                                <li class="{{ request()->is('contact-us') ? 'active' : '' }}"><a
                                        href="{{ url('contact-us/') }}" title="">Contact Us</a>

                                </li>
                                @if (auth()->check() && Auth::user()->level == 'user')
                                    <li class="menu-item-has-children"><a href="javascript:void(0);"
                                            title="">Assalamualaikum, {{ Auth::user()->name }}</a>
                                        <ul class="mb-0 list-unstyled">
                                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                              document.getElementById('logout-form').submit();"
                                                    title="">Logout</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                </form>
                                            </li>

                                        </ul>
                                    </li>

                                @else
                                    <li class="menu-item-has-children"><a href="javascript:void(0);"
                                            title="">Account</a>
                                        <ul class="mb-0 list-unstyled">

                                            <li><a href="{{ url('/login') }}" title="">Login</a></li>
                                            <li><a href="{{ url('/register') }}" title="">Register</a></li>
                                        </ul>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Sticky Menu -->
        {{-- MENU RESPON --}}

        {{-- MENU MOBILE --}}
        <div class="rspn-hdr">
            <div class="rspn-mdbr">
                <div class="rspn-scil">
                    <a href="https://twitter.com/" title="Twtiiter" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.facebook.com/" title="Facebook" target="_blank"><i
                            class="fab fa-facebook-f"></i></a>
                    <a href="https://www.youtube.com/" title="Youtube" target="_blank"><i
                            class="fab fa-youtube"></i></a>
                    <a href="https://www.linkedin.com/" title="Linkedin" target="_blank"><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
                @if (Auth::check() && Auth::user()->level == 'user')
                    <form class="rspn-srch">
                        <input readonly type="text" placeholder="Assalamualaikum, {{ Auth::user()->name }}">
                        <button type="submit"><i class="fa fa-info"></i></button>
                    </form>
                @else
                    <form class="rspn-srch">
                        <input readonly type="text" placeholder="Assalamualaikum, Selamat datang">
                        <button type="submit"><i class="fa fa-info"></i></button>
                    </form>
                @endif

            </div>
            <div class="lg-mn">
                <div class="logo">
                    <h2 class="mb-0"><a class="mobile" href="{{ url('/') }}" title="Home"><i
                                class="thm-clr flaticon-quran-2"></i>
                            E-Quran</a></h2>
                </div>
                <div class="rspn-cnt">
                    <span><i class="thm-clr far fa-envelope"></i><a href="javascript:void(0);"
                            title="">info@youremailid.com</a></span>
                    <span><i class="thm-clr fas fa-phone-alt"></i>+96 125 554 24 5</span>
                </div>
                <span class="rspn-mnu-btn"><i class="fa fa-list-ul"></i></span>
            </div>
            <div class="rsnp-mnu">
                <span class="rspn-mnu-cls"><i class="fa fa-times"></i></span>
                <ul class="mb-0 list-unstyled w-100">
                    <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ url('/') }}"
                            title="">Home</a>

                    </li>
                    @if (Auth::check() && Auth::user()->level == 'user')
                        <li class="{{ request()->is('surah-favorit') ? 'active' : '' }}"><a
                                href="{{ url('surah-favorit/') }}" title="">Surah Favorit</a>

                    @endif

                    </li>
                    <li class="{{ request()->is('blog-quran') ? 'active' : '' }}"><a
                            href="{{ url('/blog-quran') }}" title="">Blog</a>

                    </li>
                    <li class="{{ request()->is('contact-us') ? 'active' : '' }}"><a
                            href="{{ url('contact-us/') }}" title="">Contact Us</a>

                    </li>

                    @if (auth()->check() && Auth::user()->level == 'user')
                        <li class="menu-item-has-children"><a href="javascript:void(0);" title="">Assalamualaikum,
                                {{ Auth::user()->name }}</a>
                            <ul class="mb-0 list-unstyled">
                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                              document.getElementById('logout-form').submit();"
                                        title="">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </li>

                            </ul>
                        </li>

                    @else
                        <li class="menu-item-has-children"><a href="javascript:void(0);" title="">Account</a>
                            <ul class="mb-0 list-unstyled">

                                <li><a href="{{ url('/login') }}" title="">Login</a></li>
                                <li><a href="{{ url('/register') }}" title="">Register</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div><!-- Responsive Menu -->
        </div><!-- Responsive Header -->
        {{-- MENU MOBILE --}}
        <div class="text-center">
            @if (session('subscribed'))
                <div class="alert alert-success text-center">
                    {{ session('subscribed') }}
                </div>
            @endif
        </div>

        {{-- CONTENT --}}
        @yield('waktu')
        @yield('banner')
        @yield('welcome')
        @yield('content')
        {{-- CONTENT --}}

        {{-- FOOTER --}}
        <footer>
            <div class="w-100 pt-100 dark-layer pb-50 opc85 position-relative">
                <div class="fixed-bg patern-bg back-blend-multiply dark-bg"
                    style="background-image: url({{ asset('/assets/images/pattern-bg.jpg') }});"></div>
                <div class="container">
                    <div class="footer-data w-100">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-3">
                                <div class="widget w-100">
                                    <div class="logo">
                                        <h1 class="mb-0 text-white"><a class="desktop" href="{{ url('/') }}"
                                                title="Home"><i style="color: white"
                                                    class="thm-clr flaticon-quran-2"></i>
                                                E-Quran
                                            </a></h1>
                                    </div>
                                    <p class="mb-0">“Sebaik-baik manusia adalah yang paling bermanfaat bagi orang lain.”
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-9">
                                <div class="row justify-content-between">
                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="widget w-100">
                                                    <h4 class="widget-title">Feature</h4>
                                                    <ul class="mb-0 list-unstyled w-100">
                                                        <li><a href="{{ url('/') }}" title="">Home</a>
                                                        </li>
                                                        @if (Auth::check() && Auth::user()->level == 'user')
                                                            <li><a href="{{ url('surah-favorit/') }}" title="">Surah
                                                                    Favorit</a>
                                                            </li>
                                                        @endif

                                                        <li><a href="{{ url('blog/') }}" title="">Blogs</a></li>
                                                        <li><a href="{{ url('contact-us/') }}" title="">Contact
                                                                Us</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="widget w-100">
                                                    <h4 class="widget-title">Contact Info</h4>
                                                    <ul class="cont-info-list2 mb-0 list-unstyled w-100">
                                                        <li><i class="thm-clr">P:</i>+628 237 904 9190</li>
                                                        <li><i class="thm-clr">E:</i><a href="javascript:void(0);"
                                                                title="">ariafsundoro@gmail.com</a></li>
                                                        <li><i class="thm-clr">S:</i>Jl Kemuning Lrg Sei Rotan Cambai
                                                            Prabumulih, Sumatera Selatan</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-sm-6 col-lg-5">
                                        <h4 class="widget-title">My Account</h4>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="widget w-100">
                                                    <ul class="mb-0 list-unstyled w-100">

                                                        @if (Auth::check() && Auth::user()->level == 'user')
                                                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();"
                                                                    title="">Logout</a>
                                                                <form id="logout-form" action="{{ route('logout') }}"
                                                                    method="POST" class="d-none">
                                                                    @csrf
                                                                </form>
                                                            </li>
                                                        @else
                                                            <li><a href="{{ route('login') }}" title="">Login</a>
                                                            </li>
                                                            <li><a href="{{ route('register') }}"
                                                                    title="">Register</a></li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Footer Data -->
                </div>
            </div>
        </footer>
        <!-- Footer -->

        {{-- COPYRIGHT --}}
        <div class="bottom-bar dark-bg2 text-center w-100">
            <p class="mb-0"><a href="https://alfarisy-tech.my.id" title="Owner">Alfarisy-tech</a> - Copyright 2021.
                Design by <a href="https://themeforest.net/user/nauthemes/portfolio" title="Nauthemes"
                    target="_blank">Al-Maktab</a></p>
        </div><!-- Bottom Bar -->
        {{-- COPYRIGHT --}}

    </main>
    <!-- Main Wrapper -->

    <script src="{{ asset('/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('/assets/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('/assets/js/jquery.bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ asset('/assets/js/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('/assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('/assets/js/musicplayer-min.js') }}"></script>
    <script src="{{ asset('/assets/js/circle-progress.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="{{ asset('/assets/js/custom-scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @if (Session::has('pesanC'))
        <script>
            swal("Berhasil !", "{!! Session::get('pesanC') !!}", "success", {
                button: "Ok",
            });
        </script>
    @endif
    @if (Session::has('pesanU'))
        <script>
            swal("Maaf !", "{!! Session::get('pesanU') !!}", "error", {
                button: "Ok",
            });
        </script>
    @endif
    @if (Session::has('pesanD'))
        <script>
            swal("Cek Kembali !", "{!! Session::get('pesanD') !!}", "info", {
                button: "Ok",
            });
        </script>
    @endif
    @if (Session::has('pesanH'))
        <script>
            swal("Berhasil !", "{!! Session::get('pesanH') !!}", "info", {
                button: "Ok",
            });
        </script>
    @endif
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="icon" href="{{ asset('/assets/images/favicon.png') }}" sizes=" 35x35" type="image/png">
    <title>Login | E-Quran</title>

    <link rel="stylesheet" href="{{ asset('assets') }}/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/flaticon.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/jquery.bootstrap-touchspin.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/slick.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/responsive.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/color.css">
    <style>
        .link:hover {
            color: green;
        }

    </style>
</head>

<body>
    <main>
        <div id="preloader">
            <div class="preloader-inner">
                <i class="preloader-icon thm-clr flaticon-kaaba"></i>
            </div>
        </div><!-- Page Loader -->



        <section>
            <div class="w-100 pb-210  position-absolut">
                <img class="sec-botm-rgt-mckp img-fluid position-absolute"
                    src="{{ asset('assets') }}/images/sec-botm-mckp.png" alt="Sec Bottom Mockup">
                <div class="container">
                    <div class="contact-wrap pb-50 mb-50 mt-50 w-100">
                        <div class="logo text-center">
                            <h1 class="mb-0"><a class="link" href="{{ url('/') }}" title="Home"><i
                                        class="thm-clr flaticon-quran-2"></i>
                                    E-Quran</a>
                            </h1>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-lg-6">
                                <div class="cont-info-desc w-100">
                                    <h3 class="mb-0">Please Sign In</h3>
                                    <p class="mb-0">Rasulullah ﷺ bersabda: “Siapa saja membaca satu huruf dari Kitab
                                        Allah (Alquran), maka baginya satu kebaikan, dan satu kebaikan itu dibalas
                                        dengan sepuluh kali lipatnya.” (HR. At-Tirmidzi).</p>

                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-lg-6">
                                <div class="form-group row mb-0">
                                    <div class="col-md-12">
                                        <h6 class="mb-0">
                                            <p>Don't have an account yet ? <a class="link"
                                                    href="{{ route('register') }}">
                                                    Click Here
                                                </a>
                                            </p>
                                        </h6>
                                    </div>
                                </div>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="email"
                                            class="col-md-4 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password"
                                            class="col-md-4 col-form-label text-md-left">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button class="thm-btn thm-bg" type="submit">Login
                                                <span></span><span></span><span></span><span></span></button>

                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ url('/register') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div><!-- Contact Wrap -->
                </div>
            </div>
        </section>
        <footer>
            <div class="w-100 dark-layer pb-50 opc85 position-relative">
                <div class="fixed-bg patern-bg back-blend-multiply dark-bg"
                    style="background-image: url({{ asset('assets') }}/images/pattern-bg.jpg);"></div>

            </div>
        </footer><!-- Footer -->
        <div class="bottom-bar dark-bg2 text-center w-100">
            <p class="mb-0"><a href="https://alfarisy-tech.my.id" title="Owner">Alfarisy-tech</a> - Copyright 2021.
                Design by <a href="https://themeforest.net/user/nauthemes/portfolio" title="Nauthemes"
                    target="_blank">Al-Maktab</a></p>
        </div><!-- Bottom Bar -->
    </main><!-- Main Wrapper -->

    <script src="{{ asset('assets') }}/js/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/js/popper.min.js"></script>
    <script src="{{ asset('assets') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets') }}/js/wow.min.js"></script>
    <script src="{{ asset('assets') }}/js/counterup.min.js"></script>
    <script src="{{ asset('assets') }}/js/jquery.fancybox.min.js"></script>
    <script src="{{ asset('assets') }}/js/jquery.bootstrap-touchspin.min.js"></script>
    <script src="{{ asset('assets') }}/js/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('assets') }}/js/slick.min.js"></script>
    <script src="{{ asset('assets') }}/js/musicplayer-min.js"></script>
    <script src="{{ asset('assets') }}/js/google-map-int.js"></script>
    <script src="{{ asset('assets') }}/js/custom-scripts.js"></script>
</body>

</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Laboratorio de Innovación</title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="Around - Multipurpose Bootstrap Template">
    <meta name="keywords" content="bootstrap, business, consulting, coworking space, services, creative agency, dashboard, e-commerce, mobile app showcase, multipurpose, product landing, shop, software, ui kit, web studio, landing, html5, css3, javascript, gallery, slider, touch, creative">
    <meta name="author" content="Createx Studio">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('img/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('site.webmanifest')}}">
    <link rel="mask-icon" color="#5bbad5" href="{{asset('img/safari-pinned-tab.svg')}}">
    <meta name="msapplication-TileColor" content="#766df4">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/tiny-slider.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>
    <!-- Page loading styles-->
    <style>
        .cs-page-loading {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            -webkit-transition: all .4s .2s ease-in-out;
            transition: all .4s .2s ease-in-out;
            background-color: #fff;
            opacity: 0;
            visibility: hidden;
            z-index: 9999;
        }

        .cs-page-loading.active {
            opacity: 1;
            visibility: visible;
        }

        .cs-page-loading-inner {
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            text-align: center;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            -webkit-transition: opacity .2s ease-in-out;
            transition: opacity .2s ease-in-out;
            opacity: 0;
        }

        .cs-page-loading.active > .cs-page-loading-inner {
            opacity: 1;
        }

        .cs-page-loading-inner > span {
            display: block;
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            font-weight: normal;
            color: #380655;
        }

        .cs-page-spinner {
            display: inline-block;
            width: 2.75rem;
            height: 2.75rem;
            margin-bottom: .75rem;
            vertical-align: text-bottom;
            border: .15em solid #FF8527;
            border-right-color: transparent;
            border-radius: 50%;
            -webkit-animation: spinner .75s linear infinite;
            animation: spinner .75s linear infinite;
        }

        @-webkit-keyframes spinner {
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes spinner {
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

    </style>
    <!-- Page loading scripts-->
    <script>
        (function () {
            window.onload = function () {
                var preloader = document.querySelector('.cs-page-loading');
                preloader.classList.remove('active');
                setTimeout(function () {
                    preloader.remove();
                }, 2000);
            };
        })();

    </script>
    <!-- Vendor Styles-->
{{--<link rel="stylesheet" media="screen" href="vendor/simplebar/dist/simplebar.min.css"/>--}}
<!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="{{asset('css/theme.css')}}">
    @yield('header-css')
</head>
<!-- Body-->
<body class="cs-is-sidebar">
<!-- Page loading spinner-->
<div class="cs-page-loading active">
    <div class="cs-page-loading-inner">
        <div class="cs-page-spinner"></div>
        <span>Cargando...</span>
    </div>
</div>
<main class="cs-page-wrapper">
    <!-- Sign In Modal-->
    <div class="modal fade" id="modal-signin" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <div class="cs-view show" id="modal-signin-view">
                    <div class="modal-header border-0 bg-dark px-4">
                        <h4 class="modal-title text-light">Iniciar sesión</h4>
                        <button class="close text-light" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body px-4">
                        <p class="font-size-ms text-muted">
                            Inicie sesión en su cuenta, usando el correo electrónico y la contraseña que guardó durante su registro.
                        </p>
                        <form class="needs-validation" novalidate>
                            <div class="input-group-overlay form-group">
                                <div class="input-group-prepend-overlay">
                                    <span class="input-group-text">
                                        <i class="fe-mail"></i>
                                    </span>
                                </div>
                                <input class="form-control prepended-form-control" type="email" placeholder="Correo Electrónico"
                                       required>
                            </div>
                            <div class="input-group-overlay cs-password-toggle form-group">
                                <div class="input-group-prepend-overlay">
                                    <span class="input-group-text">
                                        <i class="fe-lock"></i>
                                    </span>
                                </div>
                                <input class="form-control prepended-form-control" type="password"
                                       placeholder="Contraseña" required>
                                <label class="cs-password-toggle-btn">
                                    <input class="custom-control-input" type="checkbox">
                                    <i class="fe-eye cs-password-toggle-indicator"></i>
                                    <span class="sr-only">Show password</span>
                                </label>
                            </div>
                            <div class="d-flex justify-content-between align-items-center form-group">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="keep-signed">
                                    <label class="custom-control-label" for="keep-signed">Mantener sesión iniciada</label>
                                </div>
                                <a class="nav-link-style font-size-ms" href="password-recovery.html">
                                    ¿Olvidó su contraseña?
                                </a>
                            </div>
                            <button class="btn btn-primary btn-block" type="submit">Entrar</button>
                            <p class="font-size-sm pt-3 mb-0">
                                ¿No tiene una cuenta? <a href='#' class='font-weight-medium' data-view='#modal-signup-view'>Registrese</a>
                            </p>
                        </form>
                    </div>
                </div>
                <div class="cs-view" id="modal-signup-view">
                    <div class="modal-header border-0 bg-dark px-4">
                        <h4 class="modal-title text-light">Registro de Usuario</h4>
                        <button class="close text-light" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body px-4">
                        <!--
                        <p class="font-size-ms text-muted">Registration takes less than a minute but gives you full control over your orders.</p>
                        -->
                        <form class="needs-validation" novalidate>
                            <div class="form-group">
                                <input class="form-control" name="nombre" type="text" placeholder="Nombre Completo" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="email" type="email" placeholder="Correo electrónico" required>
                            </div>
                            <div class="cs-password-toggle form-group">
                                <input class="form-control" name="clave" type="password" placeholder="Contraseña" required>
                                <label class="cs-password-toggle-btn">
                                    <input class="custom-control-input" type="checkbox">
                                    <i class="fe-eye cs-password-toggle-indicator"></i>
                                    <span class="sr-only">Mostrar contraseña</span>
                                </label>
                            </div>
                            <div class="cs-password-toggle form-group">
                                <input class="form-control" name="clave_confirm" type="password" placeholder="Confirme la contraseña" required>
                                <label class="cs-password-toggle-btn">
                                    <input class="custom-control-input" type="checkbox">
                                    <i class="fe-eye cs-password-toggle-indicator"></i>
                                    <span class="sr-only">Mostrar contraseña</span>
                                </label>
                            </div>
                            <button class="btn btn-primary btn-block" type="submit">Registrar</button>
                            <p class="font-size-sm pt-3 mb-0">¿Ya tiene una cuenta? <a href='#' class='font-weight-medium' data-view='#modal-signin-view'>Entrar</a></p>
                        </form>
                    </div>
                </div>
                <?php /*
                <div class="modal-body text-center px-4 pt-2 pb-4">
                    <hr>
                    <p class="font-size-sm font-weight-medium text-heading pt-4">Or sign in with</p>
                    <a class="social-btn sb-facebook sb-lg mx-1 mb-2" href="#"><i class="fe-facebook"></i></a>
                    <a class="social-btn sb-twitter sb-lg mx-1 mb-2" href="#"><i class="fe-twitter"></i></a>
                    <a class="social-btn sb-instagram sb-lg mx-1 mb-2" href="#"><i class="fe-instagram"></i></a>
                    <a class="social-btn sb-google sb-lg mx-1 mb-2" href="#"><i class="fe-google"></i></a>
                </div>
                */ ?>
            </div>
        </div>
    </div>
    <!-- Navbar Floating light for Index page only-->
    @include('layouts.backend.header')
    @include('includes.session-flash-status')
    <!-- Page content-->
    <div class="cs-sidebar-enabled">
        <div class="container">
            <div class="row">
                <div class="cs-sidebar col-lg-2 pt-lg-5">
                    @yield('sidebar-top')
                    @include('layouts.backend.menu')
                    @yield('sidebar-bottom')
                </div>
                <div class="col-lg-10 cs-content py-4 mb-2 mb-sm-0 pb-sm-5">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</main>
@include('layouts.backend.footer')

<!-- Vendor scrits: js libraries and plugins-->
{{--<script src="vendor/jquery/dist/jquery.slim.min.js"></script>--}}
{{--<script src="vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>--}}

{{--<script src="vendor/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>--}}
{{--<script src="vendor/simplebar/dist/simplebar.min.js"></script>--}}
{{--<script src="{{url('node_modules/smooth-scroll/dist/smooth-scroll.js') }}"></script>--}}
{{--<script src="vendor/parallax-js/dist/parallax.min.js"></script>--}}

<!-- Main theme script-->
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/helpers.js')}}"></script>
@yield('footer')
{{--<script type="text/javascript">--}}
{{--console.log(smoothScroll);--}}
{{--</script>--}}
{{--<script src="{{asset('js/theme.min.js')}}"></script>--}}
</body>
</html>

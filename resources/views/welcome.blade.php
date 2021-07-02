<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
        <title>Job Placement Center - Politeknik Negeri Banyuwangi</title>
        <link rel="icon" type="image/x-icon" href="https://www.poliwangi.ac.id/vendors/uploads/2019/11/kop-300x286.png"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('plugins/font-icons/fontawesome/css/all.min.css')}}" />
    </head>
    <body>
<!--  BEGIN NAVBAR  -->
    <header id="header">
        <nav class="navbar st-navbar fixed-top navbar-expand-md">
            <div class="container">

                <div class="navbar-brand">
                    <a href="http://www.nationalvirtualcareerfair.id/" target="_blank">
                        <img alt="Politeknik Negeri Banyuwangi" data-retina="https://jpc.poliwangi.ac.id/template/jpcthemebaru/img/poliwangi/logo/logo.png" data-src="https://jpc.poliwangi.ac.id/template/jpcthemebaru/img/poliwangi/logo/flag_lowongan.png" class="navimg" src="https://jpc.poliwangi.ac.id/template/jpcthemebaru/img/poliwangi/logo/flag_lowongan.png" >
                    </a>
                    <a href="">
                        <img alt="Politeknik Negeri Banyuwangi" data-retina="https://jpc.poliwangi.ac.id/template/jpcthemebaru/img/poliwangi/logo/logo.png" data-src="https://jpc.poliwangi.ac.id/template/jpcthemebaru/img/poliwangi/logo/logo.png" class="navimg m-0" src="https://jpc.poliwangi.ac.id/template/jpcthemebaru/img/poliwangi/logo/logo.png" >
                    </a>
                </div>

                <button type="button" class="navbar-toggler navbar-toggler-right" data-toggle="collapse"
                        data-target="#st-navbar-collapse"><span class="sr-only">Toggle navigation</span>
                    &#x2630;
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="st-navbar-collapse">

                    <ul class="nav navbar-nav ml-auto smooth-scroll">
                        <li class="nav-item dropdown active">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-display="static" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26"
                                            height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-user">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('formlogin') }}">
                                    Masuk</a>
                                <a class="dropdown-item" href="{{ route('formregister') }}">
                                    Daftar</a>
                            </div>
                        </li>
                    </ul>

                </div><!-- navbar-collapse -->
                
            </div><!-- container -->
        </nav>
    </header>
<!--  END NAVBAR  -->

    <script src="{{asset('assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    </body>
</html>
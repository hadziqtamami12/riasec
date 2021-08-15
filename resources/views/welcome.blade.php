@extends('layouts.appuser')
@section('page_title')
    {{"MBTI"}}
@endsection

@section('nav_header')
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
                        @auth
                        <li class="nav-item {{ (request()->segment(1) == 'home') ? 'active' : '' }}">
                            <a href="{{route('roleUser')}}" class="nav-link {{ (request()->segment(1) == 'home') ? 'active' : '' }}">Home</a>
                        </li>
                        @endauth
                        <li class="nav-item">
                            <a href="{{ route('formregister') }}" class="nav-link" style="font-size: 14px">Daftar</a>
                        </li>
                            @if (Route::has('formregister'))                                
                            <li class="nav-item">
                                <a href="{{ route('formlogin') }}" class="nav-link" style="font-size: 14px">Login</a>
                            </li>
                            @endif
                    </ul>


                </div><!-- navbar-collapse -->
                
            </div><!-- container -->
        </nav>
    </header>
<!--  END NAVBAR  -->
@endsection

@section('content')

<div class="layout-px-spacing">

    <section id="landing">
        <div class="landingContent">
            <div class="landingText" data-aos="fade-right" data-aos-duration="2000">
                <h1>Pentingkah Mengetahui <br> <span> Tipe Kepribadian</span> Diri?</h1>
                <h3>Cari Tau Apa Tipe Kepribadianmu <br> Disini</h3>
                <div class="btnmulai">
                <a href="{{ route('formlogin') }}" class="btn btn-send">Mulai Tes</a>
                </div>
            </div>
            <div class="landingImage" data-aos="fade-down" data-aos-duration="2000">
                <img src="assets/images/bg/bg.png" alt="landing-image">
            </div>
        </div> <!-- landing-content -->
    </section> {{-- Landing --}}

    <div class="faq container">
        <div class="faq-layouting layout-spacing">

            <div class="rules-wrapper" data-aos="zoom-in-up" data-aos-duration="1000">
                <div class="row">
                <div class="col-md-12">
                    <h3>Beberapa aturan dalam mengikuti Tes :</h3>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="">
                            <li class="list-unstyled">
                                <div class="icon-svg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                </div>
                                Tidak ada jawaban yang benar untuk semua pertanyaan ini.
                            </li>
                            <li class="list-unstyled">
                                <div class="icon-svg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                </div>
                                Jawab pertanyaan dengan cepat, jangan terlalu menganalisisnya. Beberapa tampak terselubung
                            </li>
                            <li class="list-unstyled">
                                <div class="icon-svg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                </div>
                                Jawab pertanyaan sebagai "apa adanya", bukan "dengan cara yang Anda inginkan"
                            </li>
                            <li class="list-unstyled">
                                <div class="icon-svg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                </div>
                                Hasil penilaian Tes akan tampil setelah Anda menyelesaikan semua pertanyaan yang diberikan.
                            </li>
                            </ul>
                            <small class="text-right">Harley Friedman, MD. <cite title="Source Title">MBTI Personality Type Test</cite></small>
                        </div>
                    </div>

                </div>
                </div>
            </div> {{-- Rules-Wrapper --}}

        </div> <!-- Faq-Layouting -->

    </div> {{--Faq Container  --}} 

</div> {{-- layout-px-spacing --}}

@endsection

{{-- @section('footer')
    @include('layouts.footer.foouser')
@endsection --}}
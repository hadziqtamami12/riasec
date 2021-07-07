@extends('layouts.appuser')
@section('page_title')
   {{"16 Tipe Kepribadian"}}
@endsection

@section('nav_header')
   @include('layouts.navbar.navuser')
@endsection

@section('content')
   <div class="layout-px-spacing">

      <section id="landing">
         <div class="landingContent2">
            <div class="landingText" data-aos="fade-right" data-aos-duration="2000">
               <h1>Mengenal 16 <span> Tipe  Kepribadian</span> Manusia</h1>
               <h3>Beberapa Tipe Kepribadian Mungkin terlihat sama<br> Disini</h3>
            </div>
         </div> <!-- landing-content -->
      </section>

      <div class="faq container">
         <div class="faq-layouting layout-spacing">

            <div class="personality-section">
               <div class="infoHeader" data-aos="fade-up" data-aos-duration="1000">
                  <h2><span style="color:rgb(248, 164, 55)">Myers-Briggs Type Indicator</span></h2>
                  <h5>16 Tipe Kepribadian</h5>
               </div>
               <div class="row">
                  {{-- Total 16, dibagi 4 warna. Awal dari 1. 1/4 => 0,25. Dengan fungsi ceil, 0,25 diconvert jadi 1. --}}
                  @foreach ($tipes as $key => $tipe)
                     <div class="col-lg-3 col-md-6 tipekep">
                        <div class="card" data-aos="fade-up" data-aos-duration="1000">
                           {{-- Change Image Later --}}
                           <img src="../assets/images/mbti/img5.png" class="card-img-top cardImg" alt="{{ $tipe->namatipe }}">
                           <div class="cardbg{{ ceil((1 + $key) / 4) }}">
                              <h2 class="cardTitle">{{ $tipe->namatipe }}</h2>
                           </div>
                           <div class="card-body">
                                 <p class="card-text">
                                    {{ $tipe->deskripsi_tipe}}
                                 </p>
                                 <a href="{{ route('artikel', ['tipe' => $tipe->id]) }}" class="btn btn-outline-dark btn-sm">
                                    Lebih lanjut <i class="fas fa-angle-double-right"></i>
                                 </a>
                           </div>
                        </div>
                     </div>
                  @endforeach
               </div>
            </div>

         </div> <!-- /Faq-layouting -->

      </div> <!-- /Faq Container --> 

   </div> <!-- layout-px-spacing -->
@endsection
@section('footer')
   @include('layouts.footer.foouser')
@endsection
@extends('layouts.appuser')
@section('page_title')
   {{"MBTI"}}
@endsection

@section('nav_header')
   @include('layouts.navbar.navuser')
@endsection

@section('content')

<div class="layout-px-spacing">

   <section id="landing">
      <div class="landingContent">
         <div class="landingText" data-aos="fade-right" data-aos-duration="2000">
            <h1>Pentingkah Mengetahui <br> <span> Tipe Kepribadian</span> Diri?</h1>
            <h3>Cari Tau Apa Tipe Kepribadianmu <br> Disini</h3>
            <div class="btnmulai">
               <a href="{{route('startTest')}}" class="btn btn-send">Mulai Tes</a>
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

         <div class="personality-section">
            <h2>16 Tipe Kepribadian</h2>
            <div class="row">

               <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
                  <div class="card" data-aos="fade-up" data-aos-duration="1000">
                     <img src="assets/images/mbti/img1.png" class="card-img-top cardImg" alt="ENTP">
                     <div class="cardbgtwo"><h2 class="cardTitle">ENTP</h2></div>
                     <div class="card-body">
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo repellendus voluptas accusantium fugiat harum libero, minima incidunt adipisci, vero obcaecati, perspiciatis alias suscipit iste quae.</p>
                        <a href="#" class="btn btn-outline-dark btn-sm">Lebih lanjut <i class="fas fa-angle-double-right"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
                  <div class="card" data-aos="fade-up" data-aos-duration="1300">
                     <img src="assets/images/mbti/img6.png" class="card-img-top cardImg" alt="INTJ">
                     <div class="cardbgtwo"><h2 class="cardTitle">INTJ</h2></div>
                     <div class="card-body">
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo repellendus voluptas accusantium fugiat harum libero, minima incidunt adipisci, vero obcaecati, perspiciatis alias suscipit iste quae.</p>
                        <a href="#" class="btn btn-outline-dark btn-sm">Lebih lanjut <i class="fas fa-angle-double-right"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 mb-md-0 mb-4">
                  <div class="card" data-aos="fade-up" data-aos-duration="1600">
                     <img src="assets/images/mbti/img7.png" class="card-img-top cardImg" alt="ENTJ">
                     <div class="cardbgtwo"><h2 class="cardTitle">ENTJ</h2></div>
                     <div class="card-body">
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo repellendus voluptas accusantium fugiat harum libero, minima incidunt adipisci, vero obcaecati, perspiciatis alias suscipit iste quae.</p>
                        <a href="#" class="btn btn-outline-dark btn-sm">Lebih lanjut <i class="fas fa-angle-double-right"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 mb-md-0 mb-4">
                  <div class="card" data-aos="fade-up" data-aos-duration="1900">
                     <img src="assets/images/mbti/img8.png" class="card-img-top cardImg" alt="INTP">
                     <div class="cardbgtwo"><h2 class="cardTitle">INTP</h2></div>
                     <div class="card-body">
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo repellendus voluptas accusantium fugiat harum libero, minima incidunt adipisci, vero obcaecati, perspiciatis alias suscipit iste quae.</p>
                        <a href="#" class="btn btn-outline-dark btn-sm">Lebih lanjut <i class="fas fa-angle-double-right"></i></a>
                     </div>
                  </div>
               </div>

            </div>
         </div> {{-- Personality --}} 

      </div> <!-- Faq-Layouting -->

   </div> {{--Faq Container  --}} 
   
</div> {{-- layout-px-spacing --}}

@endsection

@section('footer')
   @include('layouts.footer.foouser')
@endsection
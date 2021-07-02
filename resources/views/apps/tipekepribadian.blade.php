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
               <h1>Mengenal 16 <span> Tipe <br>  Kepribadian</span> Manusia</h1>
               <h3>Beberapa Tipe Kepribadian Mungkin terlihat sama<br> Disini</h3>
            </div>
         </div> <!-- landing-content -->
      </section>

      <div class="faq container">
         <div class="faq-layouting layout-spacing">

            <div class="personality-section">
               <div class="infoHeader" data-aos="fade-up" data-aos-duration="1000">
                  <h2><span style="color:rgb(38, 104, 0)">Diplomat</span></h2>
                  <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, asperiores distinctio.</h5>
               </div>
               <div class="row">
                  {{-- Total 16, dibagi 4 warna. Awal dari 1. 1/4 => 0,25. Dengan fungsi ceil, 0,25 diconvert jadi 1. --}}
                  {{-- @foreach ($blah as $key => $item)
                     <div class="cardbg{{ ceil((1 + $key) / 4) }}"></div>
                  @endforeach --}}
                  <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
                     <div class="card" data-aos="fade-up" data-aos-duration="1000">
                        <img src="../assets/images/mbti/img5.png" class="card-img-top cardImg" alt="INFP">
                        <div class="cardbgone"><h2 class="cardTitle">INFP</h2></div>
                        <div class="card-body">
                              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo repellendus voluptas accusantium fugiat harum libero, minima incidunt adipisci, vero obcaecati, perspiciatis alias suscipit iste quae.</p>
                              <a href="artikel.html" class="btn btn-outline-dark btn-sm">Lebih lanjut <i class="fas fa-angle-double-right"></i></a>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
                     <div class="card" data-aos="fade-up" data-aos-duration="1300">
                        <img src="../assets/images/mbti/img2.png" class="card-img-top cardImg" alt="ENFJ">
                        <div class="cardbgone"><h2 class="cardTitle">ENFJ</h2></div>
                        <div class="card-body">
                              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo repellendus voluptas accusantium fugiat harum libero, minima incidunt adipisci, vero obcaecati, perspiciatis alias suscipit iste quae.</p>
                              <a href="#" class="btn btn-outline-dark btn-sm">Lebih lanjut <i class="fas fa-angle-double-right"></i></a>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-6 mb-md-0 mb-4">
                     <div class="card" data-aos="fade-up" data-aos-duration="1600">
                        <img src="../assets/images/mbti/img3.png" class="card-img-top cardImg" alt="INFJ">
                        <div class="cardbgone"><h2 class="cardTitle">INFJ</h2></div>
                        <div class="card-body">
                              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo repellendus voluptas accusantium fugiat harum libero, minima incidunt adipisci, vero obcaecati, perspiciatis alias suscipit iste quae.</p>
                              <a href="#" class="btn btn-outline-dark btn-sm">Lebih lanjut <i class="fas fa-angle-double-right"></i></a>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-6 mb-md-0 mb-4">
                     <div class="card" data-aos="fade-up" data-aos-duration="1900">
                        <img src="../assets/images/mbti/img4.png" class="card-img-top cardImg" alt="ENFP">
                        <div class="cardbgone"><h2 class="cardTitle">ENFP</h2></div>
                        <div class="card-body">
                              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo repellendus voluptas accusantium fugiat harum libero, minima incidunt adipisci, vero obcaecati, perspiciatis alias suscipit iste quae.</p>
                              <a href="#" class="btn btn-outline-dark btn-sm">Lebih lanjut <i class="fas fa-angle-double-right"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <div class="personality-section">
               <div class="infoHeader" data-aos="fade-up" data-aos-duration="1000">
                  <h2><span style="color:rgb(61, 3, 95)">Analis</span></h2>
                  <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, asperiores distinctio.</h5>
               </div>
               <div class="row">
                  <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
                     <div class="card" data-aos="fade-up" data-aos-duration="1000">
                        <img src="../assets/images/mbti/img1.png" class="card-img-top cardImg" alt="ENTP">
                        <div class="cardbgtwo"><h2 class="cardTitle">ENTP</h2></div>
                        <div class="card-body">
                              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo repellendus voluptas accusantium fugiat harum libero, minima incidunt adipisci, vero obcaecati, perspiciatis alias suscipit iste quae.</p>
                              <a href="#" class="btn btn-outline-dark btn-sm">Lebih lanjut <i class="fas fa-angle-double-right"></i></a>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
                     <div class="card" data-aos="fade-up" data-aos-duration="1300">
                        <img src="../assets/images/mbti/img6.png" class="card-img-top cardImg" alt="INTJ">
                        <div class="cardbgtwo"><h2 class="cardTitle">INTJ</h2></div>
                        <div class="card-body">
                              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo repellendus voluptas accusantium fugiat harum libero, minima incidunt adipisci, vero obcaecati, perspiciatis alias suscipit iste quae.</p>
                              <a href="#" class="btn btn-outline-dark btn-sm">Lebih lanjut <i class="fas fa-angle-double-right"></i></a>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-6 mb-md-0 mb-4">
                     <div class="card" data-aos="fade-up" data-aos-duration="1600">
                        <img src="../assets/images/mbti/img7.png" class="card-img-top cardImg" alt="ENTJ">
                        <div class="cardbgtwo"><h2 class="cardTitle">ENTJ</h2></div>
                        <div class="card-body">
                              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo repellendus voluptas accusantium fugiat harum libero, minima incidunt adipisci, vero obcaecati, perspiciatis alias suscipit iste quae.</p>
                              <a href="#" class="btn btn-outline-dark btn-sm">Lebih lanjut <i class="fas fa-angle-double-right"></i></a>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-6 mb-md-0 mb-4">
                     <div class="card" data-aos="fade-up" data-aos-duration="1900">
                        <img src="../assets/images/mbti/img8.png" class="card-img-top cardImg" alt="INTP">
                        <div class="cardbgtwo"><h2 class="cardTitle">INTP</h2></div>
                        <div class="card-body">
                              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo repellendus voluptas accusantium fugiat harum libero, minima incidunt adipisci, vero obcaecati, perspiciatis alias suscipit iste quae.</p>
                              <a href="#" class="btn btn-outline-dark btn-sm">Lebih lanjut <i class="fas fa-angle-double-right"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <div class="personality-section">
               <div class="infoHeader" data-aos="fade-up" data-aos-duration="1000">
                  <h2><span style="color:rgb(248, 164, 55)">Penjelajah</span></h2>
                  <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, asperiores distinctio.</h5>
               </div>
               <div class="row">
                  <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
                     <div class="card" data-aos="fade-up" data-aos-duration="1000">
                        <img src="../assets/images/mbti/img5.png" class="card-img-top cardImg" alt="ISFP">
                        <div class="cardbgthree"><h2 class="cardTitle">ISFP</h2></div>
                        <div class="card-body">
                              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo repellendus voluptas accusantium fugiat harum libero, minima incidunt adipisci, vero obcaecati, perspiciatis alias suscipit iste quae.</p>
                              <a href="#" class="btn btn-outline-dark btn-sm">Lebih lanjut <i class="fas fa-angle-double-right"></i></a>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
                     <div class="card" data-aos="fade-up" data-aos-duration="1300">
                        <img src="../assets/images/mbti/img2.png" class="card-img-top cardImg" alt="ESTP">
                        <div class="cardbgthree"><h2 class="cardTitle">ESTP</h2></div>
                        <div class="card-body">
                              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo repellendus voluptas accusantium fugiat harum libero, minima incidunt adipisci, vero obcaecati, perspiciatis alias suscipit iste quae.</p>
                              <a href="#" class="btn btn-outline-dark btn-sm">Lebih lanjut <i class="fas fa-angle-double-right"></i></a>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-6 mb-md-0 mb-4">
                     <div class="card" data-aos="fade-up" data-aos-duration="1600">
                        <img src="../assets/images/mbti/img3.png" class="card-img-top cardImg" alt="ISTP">
                        <div class="cardbgthree"><h2 class="cardTitle">ISTP</h2></div>
                        <div class="card-body">
                              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo repellendus voluptas accusantium fugiat harum libero, minima incidunt adipisci, vero obcaecati, perspiciatis alias suscipit iste quae.</p>
                              <a href="#" class="btn btn-outline-dark btn-sm">Lebih lanjut <i class="fas fa-angle-double-right"></i></a>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-6 mb-md-0 mb-4">
                     <div class="card" data-aos="fade-up" data-aos-duration="1900">
                        <img src="../assets/images/mbti/img4.png" class="card-img-top cardImg" alt="ESFP">
                        <div class="cardbgthree"><h2 class="cardTitle">ESFP</h2></div>
                        <div class="card-body">
                              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo repellendus voluptas accusantium fugiat harum libero, minima incidunt adipisci, vero obcaecati, perspiciatis alias suscipit iste quae.</p>
                              <a href="#" class="btn btn-outline-dark btn-sm">Lebih lanjut <i class="fas fa-angle-double-right"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <div class="personality-section">
               <div class="infoHeader" data-aos="fade-up" data-aos-duration="1000">
                  <h2><span style="color:rgb(74, 155, 247)">Pengawal</span></h2>
                  <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, asperiores distinctio.</h5>
               </div>
               <div class="row">
                  <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
                     <div class="card" data-aos="fade-up" data-aos-duration="1000">
                           <img src="../assets/images/mbti/img1.png" class="card-img-top cardImg" alt="ESFJ">
                           <div class="cardbgfour"><h2 class="cardTitle">ESFJ</h2></div>
                           <div class="card-body">
                              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo repellendus voluptas accusantium fugiat harum libero, minima incidunt adipisci, vero obcaecati, perspiciatis alias suscipit iste quae.</p>
                              <a href="#" class="btn btn-outline-dark btn-sm">Lebih lanjut <i class="fas fa-angle-double-right"></i></a>
                           </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
                     <div class="card" data-aos="fade-up" data-aos-duration="1300">
                           <img src="../assets/images/mbti/img6.png" class="card-img-top cardImg" alt="ISTJ">
                           <div class="cardbgfour"><h2 class="cardTitle">ISTJ</h2></div>
                           <div class="card-body">
                              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo repellendus voluptas accusantium fugiat harum libero, minima incidunt adipisci, vero obcaecati, perspiciatis alias suscipit iste quae.</p>
                              <a href="#" class="btn btn-outline-dark btn-sm">Lebih lanjut <i class="fas fa-angle-double-right"></i></a>
                           </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-6 mb-md-0 mb-4">
                     <div class="card" data-aos="fade-up" data-aos-duration="1600">
                           <img src="../assets/images/mbti/img7.png" class="card-img-top cardImg" alt="ESTJ">
                           <div class="cardbgfour"><h2 class="cardTitle">ESTJ</h2></div>
                           <div class="card-body">
                              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo repellendus voluptas accusantium fugiat harum libero, minima incidunt adipisci, vero obcaecati, perspiciatis alias suscipit iste quae.</p>
                              <a href="#" class="btn btn-outline-dark btn-sm">Lebih lanjut <i class="fas fa-angle-double-right"></i></a>
                           </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-6 mb-md-0 mb-4">
                     <div class="card" data-aos="fade-up" data-aos-duration="1900">
                           <img src="../assets/images/mbti/img8.png" class="card-img-top cardImg" alt="ISFJ">
                           <div class="cardbgfour"><h2 class="cardTitle">ISFJ</h2></div>
                           <div class="card-body">
                              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo repellendus voluptas accusantium fugiat harum libero, minima incidunt adipisci, vero obcaecati, perspiciatis alias suscipit iste quae.</p>
                              <a href="#" class="btn btn-outline-dark btn-sm">Lebih lanjut <i class="fas fa-angle-double-right"></i></a>
                           </div>
                     </div>
                  </div>
               </div>
            </div>

         </div> <!-- /Faq-layouting -->

      </div> <!-- /Faq Container --> 

   </div> <!-- layout-px-spacing -->
@endsection

{{-- @section('footer')
   @include('layouts.footer.foouser')
@endsection

@section('scroll')
   @include('layouts.scroll.up')
@endsection --}}
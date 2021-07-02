@extends('layouts.appuser')
@section('page_title')
   {{'Hasil Test| ' . Auth::user()->slug}}
@endsection

@section('nav_header')
   @include('layouts.navbar.navuser')
@endsection

@section('content')
<div class="container">
   <div class="container">
      <!-- sidenav -->
      <div id="navSection" data-spy="affix" class="nav sidenav">
         <div class="sidenav-content">
               <!-- <a href="#artikelTop" class=" nav-link">Tipe Kepribadian</a> -->
               <a href="#artikelTipe" class="active nav-link">Tentang</a>
               <a href="#artikelCiriTipe" class="nav-link">Ciri Kepribadian</a>
               <a href="#artikelKelebihan" class="nav-link">Kelebihan &amp; Kekurangan</a>
               <a href="#artikelPartner" class="nav-link">Partner</a>
               <a href="#artikelPekerjaan" class="nav-link">Saran Profesi</a>
               <a href="#artikelLain1" class="nav-link">Arti Kesuksesan</a>
               <a href="#artikelSaran" class="nav-link">Saran Pengembangan</a>
               <a href="#artikelLain2" class="nav-link">Hidup Bahagia</a>
         </div>
      </div> <!-- sidenav -->

      <!-- content -->
      <div class="row">

         <section id="artikelTop" class="col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
               <div class="landingContent">
                  <div class="landingImage">
                     <img src="../assets/images/mbti/img2.png" alt="landing-image">
                  </div>
                  <div class="landingText">
                     <h1>{{ $hasil->tipe->namatipe }}</h1>
                     <h3>&#40; {{ $hasil->tipe->keterangan_tipe }} &#41;</h3>
                     <h2>{{ $hasil->tipe->julukan_tipe }}</h2>
                  </div>
               </div> <!-- landing-content -->
         </section>
         {{-- progress-bar --}}

         <section id="artikelPresent" class="col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="artikel-tipe presentase" data-aos="zoom-in-up" data-aos-duration="1000">
               <div class="row">
                  <div class="col-md-12">
                     <h3>Beberapa Kecenderungan Sifat Pada Tipe Kepribadian</span></h3>
                     <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                           <div class="present-content">
                              @foreach($dimensis as $dimensi)

                              @php
                              $a = $hasil->presentases->firstWhere('dimensi_id', $dimensi->dimensiA);
                              $b = $hasil->presentases->firstWhere('dimensi_id', $dimensi->dimensiB);
                              @endphp

                              <div class="summary-list">
                                 <div class="w-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                                 </div>
                                 <div class="w-summary-details mr-2">
                                    <div class="w-summary-info">
                                          <h6>({{ $dimensi->dimA->code }}) {{ $dimensi->dimA->keterangan }}</h6>
                                          <p class="summary-count">({{ $dimensi->dimB->code }}) {{ $dimensi->dimB->keterangan }}</p>
                                    </div>
                                    <div class="w-summary-stats">
                                       <div class="progress">
                                          <div class="{{ $a->totalpresent > $b->totalpresent ? 'progress-bar bg-gradient-'.$dimensi->color : '' }}" role="progressbar" style="width: {{ $a->totalpresent }}%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                          <div class="{{ $b->totalpresent >= $a->totalpresent ? 'progress-bar bg-gradient-'.$dimensi->color : '' }}" role="progressbar" style="width: {{ $b->totalpresent }}%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
                                    </div>
                                    <div class="w-summary-info">
                                          <h6>{{ $a->totalpresent }} &percnt;</h6> <!-- Dimensi A -->
                                          <p class="summary-count">{{ $b->totalpresent }} &percnt;</p> <!-- Dimensi B -->
                                    </div>
                                 </div>
                                 <div class="w-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                                 </div>
                              </div>
                              @endforeach

                           </div> <!-- /present-content -->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         {{-- progress-bar --}}

         <section id="artikelTipe" class="col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
               <div class="artikel-tipe" data-aos="zoom-in-up" data-aos-duration="1000">
                  <div class="row">
                     <div class="col-md-12">
                           <h3>Tipe Kepribadian&nbsp;<span>{{ $hasil->tipe->namatipe }}</span></h3>
                           <div class="row">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                 <p>{{ $hasil->tipe->deskripsi_tipe }}</p>
                              </div>
                           </div>
                     </div>
                  </div>
               </div>
         </section>

         <section id="artikelCiriTipe" class="col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
               <div class="artikel-tipe" data-aos="zoom-in-up" data-aos-duration="1000">
                  <div class="row">
                     <div class="col-md-12">
                           <h3>Ciri Kepribadian&nbsp;<span>{{ $hasil->tipe->namatipe }}</span></h3>
                           <div class="row">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                 <ul class="">
                                    @foreach($hasil->tipe->ciriTipekeps as $ciri)
                                    <li class="list-unstyled">
                                       <div class="icon-svg">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                       </div>
                                       {{ $ciri->ciri_kepribadian }}
                                    </li>
                                    @endforeach
                                 </ul>
                              </div>
                           </div>
                     </div>
                  </div>
               </div>
         </section>

         <section id="artikelKelebihan" class="col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
               <div class="artikel-tipe" data-aos="zoom-in-up" data-aos-duration="1000">
                  <div class="row">
                     <div class="col-md-6">
                           <h3>Kelebihan :</h3>
                           <div class="row">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                 <ul class="">
                                    @foreach($hasil->tipe->kelebihanTipekeps as $kelebihan)
                                    <li class="list-unstyled">
                                       <div class="icon-svg">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                       </div>
                                       {{ $kelebihan->kelebihan_tipe }}
                                    </li>
                                    @endforeach
                                 </ul>
                              </div>
                           </div>
                     </div>
                     <div class="col-md-6">
                           <h3>Kekurangan :</h3>
                           <div class="row">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                 <ul class="">
                                    @foreach($hasil->tipe->kekuranganTipekeps as $kekurangan)
                                    <li class="list-unstyled">
                                       <div class="icon-svg">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                       </div>
                                       {{ $kekurangan->kekurangan_tipe }}
                                    </li>
                                    @endforeach
                                 </ul>
                              </div>
                           </div>
                     </div>
                  </div>
               </div>
         </section>

         <section id="artikelPartner" class="col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="artikel-tipe partner" data-aos="fade-right" data-aos-duration="1200">
               <div class="row">
                  <div class="col-md-12">
                        <h3>Partner Alami&nbsp;:</h3>
                        <div class="row">
                           <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                              <h1>ENTJ &amp; ISTJ</h1>
                           </div>
                        </div>
                  </div>
               </div>
            </div>
         </section>

         <section id="artikelPekerjaan" class="col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="artikel-tipe" data-aos="zoom-in-up" data-aos-duration="1000">
               <div class="row">
                  <div class="col-md-12">
                        <h3>Saran Profesi <span>{{ $hasil->tipe->namatipe }}</span></h3>
                        <div class="row">
                           <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                              <ul class="">
                                 @foreach($hasil->tipe->profesiTipekeps as $profesi)
                                 <li class="list-unstyled">
                                    <div class="icon-svg">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                    {{ $profesi->profesi_tipe }}
                                 </li>
                                 @endforeach
                              </ul>
                           </div>
                           <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                              <ul class="">
                                    <li class="list-unstyled">
                                       <div class="icon-svg">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                       </div>
                                       Tidak ada .
                                    </li>
                                    <li class="list-unstyled">
                                       <div class="icon-svg">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                       </div>
                                       Jawab pertanyaan
                                    </li>
                                    <li class="list-unstyled">
                                       <div class="icon-svg">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                       </div>
                                       Jawab pertanyaan
                                    </li>
                                    <li class="list-unstyled">
                                       <div class="icon-svg">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                       </div>
                                       Hasil penilaian
                                    </li>
                                    <li class="list-unstyled">
                                       <div class="icon-svg">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                       </div>
                                       Hasil penilaian
                                    </li>
                                    <li class="list-unstyled">
                                       <div class="icon-svg">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                       </div>
                                       Hasil penilaian
                                    </li>
                              </ul>
                           </div>
                        </div>
                  </div>
               </div>
            </div>
         </section>

         <section id="artikelLain1" class="col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="artikel-tipe" data-aos="zoom-in-up" data-aos-duration="1000">
               <div class="row">
                  <div class="col-md-12">
                     <h3>Apa arti Sukses bagi <span>{{ $hasil->tipe->namatipe }}</span> &#63;</h3>
                     <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                           <p>{{ $hasil->tipe->arti_sukses }}</p>                 
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>

         <section id="artikelSaran" class="col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="artikel-tipe">
               <div class="row">
                  <div class="col-md-12">
                        <h3>Saran Pengembangan untuk&nbsp;<span>{{ $hasil->tipe->namatipe }}</span></h3>
                        <div class="row">
                           <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                              <p>{{ $hasil->tipe->saran_pengembangan }}</p>
                           </div>
                        </div>
                  </div>
               </div>
            </div>
         </section>

         <section id="artikelLain2" class="col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="artikel-tipe" >
               <div class="row">
                  <div class="col-md-12">
                     <h3>Hidup Bahagia di Dunia kita sebagai&nbsp;<span>{{ $hasil->tipe->namatipe }}</span></h3>
                     <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                           <p>{{ $hasil->tipe->kebahagiaan_tipe }}</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>

      </div>
      <!-- end content -->

   </div> <!-- container 2 -->
</div> <!-- container 1 -->
@endsection
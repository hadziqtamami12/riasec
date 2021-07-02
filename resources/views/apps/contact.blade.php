@extends('layouts.appuser')
@section('page_title')
   {{"Kontak"}}
@endsection

@section('nav_header')
   @include('layouts.navbar.navuser')
@endsection

@section('content')
   <div class="layout-px-spacing">

      <section id="contact">
         <div class="contact container">
            <h3 class="contact-heading">kontak kami</h3>
            <div class="row contact-info">
               <div class="icon-container col-md-4 col-sm-12">
                     <div class="contact-address">
                        <i class="icon" data-feather="map-pin"></i>
                        <h3>Address</h3>
                        <p>JL. Raya Jember - Banyuwangi KM 13</p>
                     </div>
               </div>

               <div class="icon-container col-md-4 col-sm-12">
                     <div class="contact-phone">
                        <i class="icon" data-feather="phone-call"></i>
                        <h3>Phone Number</h3>
                        <p><a href="tel:+ 62 (0333) 636780">+ 62 (0333) 636780</a></p>
                     </div>
               </div>

               <div class="icon-container col-md-4 col-sm-12">
                     <div class="contact-email">
                        <i class="icon" data-feather="mail"></i>
                        <h3>Email</h3>
                        <p><a href="mailto:jpc@poliwangi.ac.id">jpc@poliwangi.ac.id</a></p>
                     </div>
               </div>
            </div> <!-- /contact-info -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3948.0857138783326!2d114.30481971387758!3d-8.294268785716543!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd156d7d86bef9b%3A0x4cb09a70b9109740!2sPoliteknik%20Negeri%20Banyuwangi!5e0!3m2!1sid!2sid!4v1580310238203!5m2!1sid!2sid" style="border:0" allowfullscreen="" width="100%" height="300" frameborder="0"></iframe>
         </div>
      </section> <!-- CONTACT -->

   </div> <!-- /layout-px-spasing -->
@endsection

{{-- @section('footer')
   @include('layouts.footer.foouser')
@endsection

@section('scroll')
   @include('layouts.scroll.up')
@endsection --}}
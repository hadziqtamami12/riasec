@extends('layouts.appuser')
@section('page_title')
   {{""}}
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
               <div class="landingContent ">
                     <div class="landingImage">
                        <img src="../assets/images/mbti/img2.png" alt="landing-image">
                     </div>
                     <div class="landingText">
                        <h1>INTJ</h1>
                        <h3>&#40; INTROVERT INTUITION THINKING JUDGING &#41;</h3>
                        <h2>The Caregiver</h2>
                     </div>
               </div> <!-- landing-content -->
            </section>

            <section id="artikelTipe" class="col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
               <div class="artikel-tipe" data-aos="zoom-in-up" data-aos-duration="1000">
                     <div class="row">
                        <div class="col-md-12">
                           <h3>Tipe Kepribadian&nbsp;<span>INTJ</span></h3>
                           <div class="row">
                                 <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <p>INTJ hidup di dunia ide dan perencanaan strategis. Mereka menghargai kecerdasan, pengetahuan, dan kompetensi, dan biasanya memiliki standar yang tinggi dalam hal ini, yang mereka terus berusaha untuk memenuhi. Pada tingkat yang lebih rendah, mereka memiliki kemiripan harapan orang lain. Dengan Intuisi Introvert yang mendominasi kepribadian mereka, INTJ memfokuskan energi mereka mengamati dunia, dan menghasilkan ide dan kemungkinan. Pikiran mereka terus berkumpul informasi dan membuat asosiasi tentang itu. Mereka sangat berwawasan dan biasanya sangat cepat memahami ide-ide baru. Namun, minat utama mereka tidak memahami konsep, tetapi menerapkan konsep itu dengan cara yang bermanfaat. tidak seperti INTP, mereka tidak mengikuti ide sejauh mungkin, hanya berusaha untuk memahaminya sepenuhnya.</p>
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
                           <h3>Ciri Kepribadian&nbsp;<span>INTJ</span></h3>
                           <div class="row">
                                 <div class="col-lg-12 col-md-12 col-sm-12 col-12">
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
                                             Jawab pertanyaan sebagai "apa adanya", bukan "dengan cara yang Anda inginkan
                                       </li>
                                       <li class="list-unstyled">
                                             <div class="icon-svg">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                             </div>
                                             Hasil penilaian Tes akan tampil setelah Anda menyelesaikan semua pertanyaan yang diberikan.
                                       </li>
                                       <li class="list-unstyled">
                                             <div class="icon-svg">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                             </div>
                                             Hasil penilaian Tes akan tampil setelah Anda menyelesaikan semua pertanyaan yang diberikan.
                                       </li>
                                       <li class="list-unstyled">
                                             <div class="icon-svg">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                             </div>
                                             Hasil penilaian Tes akan tampil setelah Anda menyelesaikan semua pertanyaan yang diberikan.
                                       </li>
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
                                             Jawab pertanyaan sebagai "apa adanya", bukan "dengan cara yang Anda inginkan
                                       </li>
                                       <li class="list-unstyled">
                                             <div class="icon-svg">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                             </div>
                                             Hasil penilaian Tes akan tampil setelah Anda menyelesaikan semua pertanyaan yang diberikan.
                                       </li>
                                       <li class="list-unstyled">
                                             <div class="icon-svg">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                             </div>
                                             Hasil penilaian Tes akan tampil setelah Anda menyelesaikan semua pertanyaan yang diberikan.
                                       </li>
                                       <li class="list-unstyled">
                                             <div class="icon-svg">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                             </div>
                                             Hasil penilaian Tes akan tampil setelah Anda menyelesaikan semua pertanyaan yang diberikan.
                                       </li>
                                    </ul>
                                 </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <h3>Kekurangan :</h3>
                           <div class="row">
                                 <div class="col-lg-12 col-md-12 col-sm-12 col-12">
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
                                             Jawab pertanyaan sebagai "apa adanya", bukan "dengan cara yang Anda inginkan
                                       </li>
                                       <li class="list-unstyled">
                                             <div class="icon-svg">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                             </div>
                                             Hasil penilaian Tes akan tampil setelah Anda menyelesaikan semua pertanyaan yang diberikan.
                                       </li>
                                       <li class="list-unstyled">
                                             <div class="icon-svg">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                             </div>
                                             Hasil penilaian Tes akan tampil setelah Anda menyelesaikan semua pertanyaan yang diberikan.
                                       </li>                                    
                                       <li class="list-unstyled">
                                             <div class="icon-svg">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                             </div>
                                             Hasil penilaian Tes akan tampil setelah Anda menyelesaikan semua pertanyaan yang diberikan.
                                       </li>
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
                           <h3>Saran Profesi <span>INTJ</span></h3>
                           <div class="row">
                                 <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <ul class="">
                                       <li class="list-unstyled">
                                             <div class="icon-svg">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                             </div>
                                             Tidak ada jawaban
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
                        <h3>Apa arti Sukses bagi <span>ESFP</span> &#63;</h3>
                        <div class="row">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                 <p>Orang dengan tipe kepribadian INTJ serius, analitis, dan sering perfeksionis. Mereka melihat masalah atau ide dari berbagai perspektif dan secara sistematis menganalisisnya dengan logika objektif, membuang hal-hal yang ternyata bermasalah, dan mengembangkan pemahaman mereka sendiri tentang sesuatu ketika informasi baru ternyata berguna. Tidak ada tipe kepribadian lain yang melakukan ini secara alami seperti INTJ. Mereka adalah ilmuwan alam dan matematikawan. Setelah diberi ide, mereka terdorong untuk memahaminya selengkap mungkin. Mereka biasanya memiliki standar yang sangat tinggi untuk pemahaman dan pencapaian mereka sendiri, dan umumnya hanya akan menghargai dan mempertimbangkan individu lain yang telah menunjukkan bahwa mereka memenuhi atau melampaui pemahaman INTJ sendiri tentang masalah tertentu. INTJ menghargai kejelasan dan keringkasan, dan kurang menghargai perilaku dan sikap yang murni sosial. "Kebaikan" sosial sering kali tampak tidak perlu dan bahkan mungkin tidak asli bagi INTJ, yang selalu berusaha meningkatkan pemahaman substantif mereka. Interaksi sosial INTJ yang sangat bernilai yang berpusat di sekitar pertukaran ide yang bermakna, tetapi mereka biasanya mengabaikan pentingnya bersikap ramah atau disukai dalam konteks sosial lainnya, dan mereka cenderung tidak nyaman dengan interaksi yang terutama bersifat emosional, daripada logis. Struktur nilai, keteraturan, pengetahuan, kompetensi, dan logika INTJ. Di atas segalanya, mereka menghargai ide dan intuisi mereka sendiri tentang dunia. Perasaan sukses seorang INTJ terutama tergantung pada tingkat pemahaman dan pencapaian mereka sendiri, tetapi juga tergantung pada tingkat struktur dalam kehidupan mereka, dan kemampuan mereka untuk menghormati kecerdasan dan kompetensi orang-orang yang berbagi kehidupan mereka.</p>
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
                           <h3>Saran Pengembangan untuk&nbsp;<span>INTJ</span></h3>
                           <div class="row">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                 <p>Untuk tumbuh sebagai individu, INTJ perlu fokus untuk menerapkan penilaian mereka pada berbagai hal hanya setelah mereka melalui intuisi. Dengan kata lain, INTJ perlu secara sadar mencoba untuk tidak menggunakan penilaian mereka untuk mengabaikan ide secara prematur. Sebaliknya, mereka harus menggunakan penilaian mereka terhadap ide-ide mereka sendiri. INTJ perlu fokus menggunakan penilaian mereka bukan untuk mengabaikan ide, melainkan untuk mendukung kerangka kerja intuitif mereka.</p>
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
                        <h3>Hidup Bahagia di Dunia kita sebagai&nbsp;<span>ESFP</span></h3>
                        <div class="row">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                 <p>Orang dengan tipe kepribadian ISTJ adalah orang yang serius, metodis, analitis, dan pekerja keras. Mereka menyimpan pengetahuan yang diperoleh dari pengalaman mereka, dan menggunakan pengetahuan ini untuk mengatasi masalah dan ide baru. Mereka akan mengerjakan suatu masalah sampai pada kesimpulan yang teridentifikasi. Mereka bekerja menuju tujuan yang ditentukan; objektivitas analitis mereka memberi mereka kecenderungan untuk membuat keputusan yang berorientasi pada tujuan yang tidak terhalang oleh kepentingan individu. Mereka tidak nyaman dengan ide-ide yang benar-benar baru bagi mereka, atau yang benar-benar teoretis. Karena mereka tidak memiliki pengalaman langsung dengan konsep baru, mereka tidak memiliki alat untuk mengetahui bagaimana menghadapinya atau apa yang harus dipikirkan tentangnya. Mereka perlu mendapatkan kerangka kerja untuk sebuah konsep baru sebelum mereka mampu menghadapinya. ISTJ yang berpengalaman biasanya adalah orang yang sangat cakap, dan menjadi manajer yang sangat baik. ISTJ memiliki nilai yang besar untuk pendekatan "mencoba dan benar", dan enggan untuk mengadopsi sistem baru sampai pengalaman langsung membuktikan validitas sistem baru. Mereka menginternalisasi dan menghargai aturan dan struktur masyarakat tempat mereka tinggal, dan tidak menyetujui perilaku yang bertentangan dengan aturan ini. ISTJ sangat menghargai institusi landasan masyarakat seperti Keluarga, Pekerjaan, dan Gereja. Sifat mereka yang pekerja keras dan berdedikasi sangat cocok untuk menopang institusi semacam itu. Perasaan sukses seorang ISTJ tergantung pada kemampuannya untuk menggunakan pengalaman mereka untuk kepentingan institusi, dan juga pada tingkat struktur dan kurangnya kekacauan dalam hidup mereka, dan pada kesehatan dan kesejahteraan keluarga mereka atau struktur sosial lainnya.</p>
                              </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>

         </div> <!-- End Content -->
         
      </div> <!-- container 2 -->
   </div> <!-- container 1 -->
@endsection

{{-- @section('footer')
   @include('layouts.footer.foouser')
@endsection

@section('scroll')
   @include('layouts.scroll.up')
@endsection --}}
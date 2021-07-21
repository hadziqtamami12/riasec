@extends('layouts.appuser')
@section('page_title')
   {{"Tes Kepribadian MBTI"}}
@endsection

@section('nav_header')
   @include('layouts.navbar.navuser')
@endsection

@section('content')
   <div class="layout-px-spacing">

      <section id="quiz">
         <div class="quiz-layouting">
            <div class="quiz-tab-section">
      
               <div class="row ">
                  <div class="col-md-12 text-center">

                     <div class="title-section">
                        <h3>Tes Kepribadian MBTI</h3>
                        <h5>Jumlah pernyataan pada tes terdiri dari 70 soal</h5>
                     </div>
                     <!-- {{-- Progres --}} -->
                     <div class="progress br-30">
                        <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0&percnt;</div>
                     </div>
                     <!-- {{-- Soal --}} -->
                     @foreach ($tests['pernyataan'] as $key => $test ) 
                     <div class="data-soal" data-id="{{$key}}" style="display: none"> {{-- data index ada pada class data-soal --}}
                        <h1 class="soal">{{ $test->soal }}</h1> {{-- Soal --}}
                        <div class="row"> {{-- Pernyataan --}}
                           <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                              <div class="card">
                                 <label class="selected-label">
                                    <input class="selectJawaban" type="radio" name="soal{{ $test->id }}" value="{{$test->jawabA->dimensi_id }}">
                                    <div class="selected-content">
                                       <h4 id="jwb1" class="jawaban">{{ $test->jawabA->pernyataan ?? null}}</h4>
                                    </div>
                                 </label>
                              </div>
                           </div>
                           <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                              <div class="card">
                                 <label class="selected-label">
                                    <input class="selectJawaban" type="radio" name="soal{{ $test->id }}" value="{{ $test->jawabB->dimensi_id }}">
                                    <div class="selected-content">
                                       <h4 id="jwb2" class="jawaban">{{ $test->jawabB->pernyataan ?? null}}</h4>
                                    </div>
                                 </label>
                              </div>
                           </div>
                        </div> <!-- /row -->
                     </div> {{-- div kosong --}}
                     @endforeach


                  </div> 
               </div> <!-- /row --> 
            
            </div> <!-- /quiz-tab-section -->
         </div> <!-- /quiz-layouting -->
      </section> <!-- /quiz -->

   </div> <!-- layout-px-spacing -->
@endsection

@section('trigger')

<script>

   let selectedSoal = 0; // soal pertama
   const max = {{ $tests['pernyataan']->count() }} // Menunjukkan jumlah maksimum soal yang dapat dijawab
   
   // let jabawan menampung jawaban yang telah dipilih untuk dikirimkan
   let jawabans = {!! $dimensis !!}

   // Tampilkan soal saat ini
   $(`.data-soal[data-id="${selectedSoal}"]`).show()

   $('input.selectJawaban').click(function() {

      let ans = $(this).val(), // Mengambil jawaban
         index = jawabans.findIndex((item, i) => {
            return item.id == ans // Mencari index dimensi
         })

      // Simpan jawaban dalam dimensi
      jawabans[index].value++
      ++selectedSoal // Melanjutkan ke soal berikutnya

      // menampilkan progres bar pada test
      let width = (selectedSoal/max*100)
      $('.progress-bar').css('width', width+'%').html(Math.round(width)+'%')

      // Keluarkan soal dari layar pengguna
      $('.data-soal').fadeOut()

      /** Apabila panjang progress bar tidak mencapai 100 persen, maka tampilkan soal berikutnya.
      Jika sudah selesai, maka kirimkan ke server */
      if(width < 100){
         setTimeout(() => {
            $(`.data-soal[data-id="${selectedSoal}"]`).fadeIn()
         }, 500)
      } else {
         
         axios.post("{{ route('finishTest', ['id' => $tests['id']]) }}",{
            present : jawabans
         }).then(() => {
            // Redirect ke halaman hasil
            window.location.href = "{{ route('hasil', ['id' => $tests['id']]) }}"
         });

      }
      
   })
</script>
@endsection
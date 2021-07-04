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
                     {{-- @if (is_array($tests) || is_object($tests)) --}}
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
                     {{-- @endif --}}
                     {{-- <div class="btnhasil">
                        <a href="hasil.html" class="btn btn-send">Lihat Hasil</a>
                     </div> --}}

               </div> 
            </div> <!-- /row --> 
         
         </div> <!-- /quiz-tab-section -->
      </div> <!-- /quiz-layouting -->
   </section> <!-- /quiz -->

</div> <!-- layout-px-spacing -->
@endsection

{{-- @section('footer')
   @include('layouts.footer.foouser')
@endsection

@section('scroll')
   @include('layouts.scroll.up')
@endsection --}}

@section('trigger')

<script>
   const containerSoal = document.getElementsByClassName("data-soal")
   let selectedSoal = 0; // soal pertama
   let jawabanSoal = []
   let max = {{ $tests['pernyataan']->count() }}

   let jawabans = {!! $dimensis !!}
   $('.data-soal[data-id="'+ selectedSoal +'"]').show()

   $('input.selectJawaban').click(function() {
      let ans = $(this).val(),
      index = jawabans.findIndex((item, i) => {
         return item.id == ans
      })
      // Simpan dimensi
      jawabans[index].value++
      ++selectedSoal

      let width = (selectedSoal/max*100)

      $('.progress-bar').css('width', width+'%').html(Math.round(width)+'%')
      $('.data-soal').fadeOut()
      if(width != 100){
         $('.data-soal[data-id="'+ selectedSoal +'"]').fadeIn()
      } else {
         
         axios.post("{{route('finishTest', ['id' => $tests['id']])}}",{
            present : jawabans
         }).then(() => {
            window.location.href = "{{ route('hasil', ['id' => $tests['id']]) }}"
         });

         console.log(jawabans)
      }
      
   })
</script>
@endsection
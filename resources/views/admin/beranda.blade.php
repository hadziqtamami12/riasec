@extends('layouts.appadmin')

@section('page_title')
   {{"Beranda Admin"}}
@endsection

@section('nav_header')
   @include('layouts.navbar.navadmin')
@endsection

@section('content')
   <div class="row layout-top-spacing">

      <div class="col-12 layout-spacing">
         <div class="widget widget-chart-one">
            <div class="widget-heading">
               <h5 class="">Recap Hasil Keseluruhan</h5>
            </div>

            <div class="widget-content">
               <div class="tabs tab-content">
                  <canvas id="tipeChart" ></canvas>
               </div>
            </div>
         </div>
      </div>

      @foreach($prodi as $key)
      <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col-12 layout-spacing">
         <div class="widget widget-chart-two">
            <div class="widget-heading">
               <h5 class="">{{ $key->program_studi }}</h5>
            </div>
            <div class="widget-content">
               <canvas id="chart{{ $key->id }}" style="padding: 30px;"></canvas>
            </div>
         </div>
      </div>
      @endforeach
      
   </div> {{-- layout-top-spacing --}}
@endsection

@section('footer')
<div class="footer-wrapper">
   <div class="footer-section f-section-1">
      <p class="">Hak Cipta © 2021 <a target="_blank" href="https://jpc.poliwangi.ac.id">Job Placement Center </a>- Politeknik Negeri Banyuwangi.</p>
   </div>
</div>  {{-- footer-wrapper --}}
@endsection

@section('trigger')
   <script src="{{asset('chart.js/chart.js')}}"></script>
   {{-- <script src="{{asset('assets/js/chart.js')}}"></script> --}}

   <script>
      // all tipe kerpribadian
      new Chart(document.getElementById('tipeChart').getContext('2d'), {
         type: 'bar',
         data: {
            labels: {!! $tipe !!},
            datasets: [{
               label:'Tipe Kepribadian Dominan',
               data: {!! $dominasi !!},
               backgroundColor: 'rgba(255, 99, 132, 0.2)',
               borderColor: 'rgba(255, 159, 64, 1)',
               borderWidth: 2
            }]
         }
      })
      // chart setiap jurusan

      @foreach($prodi as $key)
      new Chart(document.getElementById("chart{{ $key->id }}"), {
         type: 'radar',
         data: {
         labels: {!! $dimensi !!},
         datasets: [
            {
               label: "Dimensi Dominan",
               fill: true,
               backgroundColor: "{{ $key->backgroundColor }}",
               borderColor: "{{ $key->borderColor }}",
               pointBorderColor: "{{ $key->pointBorderColor }}",
               pointBackgroundColor: "rgba(179,181,198,1)",
               data: [60,65,70,60,85,65,25,40]
            },
         ]
         },
         options: {
         title: {
            display: true,
            text: 'Recap Tes Kepribadian Teknik Sipil',
            // fontSize = "value|initial|inherit"
         }
         }
      }) 
      @endforeach
   </script>
@endsection
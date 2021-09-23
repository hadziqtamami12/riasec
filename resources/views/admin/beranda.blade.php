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
      {{-- Statistik jumlah uji --}}
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
         <div class="widget widget-chart-two">
            <div class="widget-heading">
               <h5>Data Berdasarkan Tahun Angkatan</h5><br> 
               <select class="form-control prodi" name="angkatan">
                  <option value="">Tahun Angkatan</option>
                  @foreach($selected as $key => $val)
                  <option value="{{ $key }}">{{ $val }}</option>
                  @endforeach
               </select>
            </div>
            <div class="widget-content">
            </div>
         </div>
      </div>

      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
         <div class="widget widget-chart-two">
            <div class="widget-heading" >
               <h5>Total Pengujian</h5><br> 
               <h4 style="color: #f8538d; font-size: 20px; letter-spacing: 1px; margin-bottom: 0;font-weight: 700;">{{($totalPengujian) }}</h4>
               <span style="font-weight: 600">Tes</span>
            </div>
            <div class="widget-content">
            </div>
         </div>
      </div>

      @foreach ($prodi as $item)
         <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col-12 layout-spacing">
            <div class="widget widget-chart-two">
               <div class="widget-heading">
                  <h5 class="">{{ $item->program_studi }}</h5>
               </div>
               <div class="widget-content">
                  <canvas id="chart{{ $item->id }}" style="padding: 30px;"></canvas>
               </div>
               <p id="test{{ $item->id }}" class="align-items-center" style="font-weight: 700; text-align: center; padding-bottom: 15px">Jumlah tes : 0</p>
            </div>
         </div>
      @endforeach
   </div> {{-- layout-top-spacing --}}

   {{-- Statistik Program Studi --}}
   {{-- <div id="statistics" class="row layout-top-spacing"></div> --}}
@endsection

@section('footer')
<div class="footer-wrapper">
   <div class="footer-section f-section-1">
      <p class="">Hak Cipta © 2021 <a target="_blank" href="https://jpc.poliwangi.ac.id">Job Placement Center </a>- Politeknik Negeri Banyuwangi.</p>
   </div>
</div>  {{-- footer-wrapper --}}
@endsection

@section('trigger')

   {{-- select tahun angkatan --}}
   <script src="{{asset('plugins/select2/select2.min.js')}}"></script>
   
   {{-- diagram chart --}}
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

      grafik = []
   </script>
   {{-- // chart setiap jurusan --}}
   @foreach($prodi as $key => $item)
   <script>
      grafik.push(new Chart(document.getElementById(`chart{{ $item->id }}`), {
         type: 'radar',
         data: {
            labels: {!! $dimensi !!},
            datasets: [
               {
                  label: "Dimensi Dominan",
                  fill: true,
                  backgroundColor: "{{ $item->backgroundColor }}",
                  borderColor: "{{ $item->borderColor }}",
                  pointBorderColor: "{{ $item->pointBorderColor }}",
                  pointBackgroundColor: "rgba(179,181,198,1)",
                  data: [0,0,0,0,0,0,0,0]
               },
            ]
         },
         options: {
            title: {
               display: true,
               text: `Recap Tes Kepribadian {{ $item->program_studi }}`,
               
               // fontSize = "value|initial|inherit"
            }
         }
      }))
   </script>
   @endforeach

   <script>
      // per angkatan
      $('select[name="angkatan"]').select2().change(function(){
         axios.get(`{{ route('tipeprodi') }}/${$(this).val()}`)
         .then(response => {
            $('#statistics').empty()

            // Reset Chart
            for(let i = 0; i < 7; i++){
               grafik[i].data.datasets.forEach(dataset => {
                  dataset.data = [0,0,0,0,0,0,0,0]
               })
               grafik[i].update()
               $(`#test${i + 1}`).html(`Jumlah tes : 0`)
            }

            response.data.prodi.forEach((item, key) => {
               // Cara update e
               console.log(item.statistics)
               console.log("data chart yang ubah: ", key + 1)
               grafik[key].data.datasets.forEach(dataset => {
                  /*
                  menjalankan kondisi ketika statistik kosong
                  maka chart di set default 0
                  sebaliknya, jika ada maka tampilkan data
                  */
                  if(item.statistics.length > 0) {
                     dataset.data = item.statistics
                  } else {
                     dataset.data = [0,0,0,0,0,0,0,0]
                  }
               })

               grafik[key].update()

               $(`#test${item.id}`).html(`Jumlah tes : ${item.jumlah_tes}`)
            })
         })
      })

   </script>
@endsection
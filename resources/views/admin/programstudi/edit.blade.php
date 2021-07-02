@extends('layouts.appadmin')

@section('page_title')
   {{"Edit Program Studi"}}
@endsection

@section('nav_header')
   @include('layouts.navbar.navadmin')
@endsection

@section('content')

<div class="account-settings-container layout-top-spacing">

   <div class="account-content">
      <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
         
         <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
            @include('layouts.alert.alert')
               <form method="POST" action="{{ route('programstudi.update', $data) }}" class="section contact">
                  @method('PUT')
                  @csrf

                  <div class="info">
                     <h5 class="">{{$pageName}}</h5>
                     <div class="row">
                        <div class="col-md-11 mx-auto">
                           <div class="row">
                              <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                       <label for="program_studi">Nama Program Studi</label>
                                       <input type="teks" class="form-control @error('program_studi') is-invalid @enderror" name="program_studi" value="{{old('program_studi', $data->program_studi)}}">
                                       @error('program_studi') <div class="invalid-feedback">{{$message}}</div>@enderror
                                    </div>
                              </div>
                              <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                       <label for="backgroundColor">BackgroundColor <span>&#40; Warna background untuk Recap Chart &#41;</span></label>
                                       <input type="teks" class="form-control @error('backgroundColor') is-invalid @enderror" name="backgroundColor" value="{{old('backgroundColor', $data->backgroundColor)}}" placeholder="rgba(205, 161, 66, 0.3)">
                                       @error('backgroundColor') <div class="invalid-feedback">{{$message}}</div>@enderror
                                    </div>
                              </div>
                              <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                       <label for="borderColor">BorderColor <span>&#40; Warna garis untuk Recap Chart &#41;</span></label>
                                       <input type="teks" class="form-control @error('borderColor') is-invalid @enderror" name="borderColor" value="{{old('borderColor', $data->borderColor)}}" placeholder="rgba(102, 62, 5, 1)">
                                       @error('borderColor') <div class="invalid-feedback">{{$message}}</div>@enderror
                                    </div>
                              </div>
                              <div class="col-md-12 mb-5">
                                    <div class="form-group">
                                       <label for="pointBorderColor">PointBorderColor <span>&#40; Warna titik pembatas untuk Recap Chart &#41;</span></label>
                                       <input type="teks" class="form-control @error('pointBorderColor') is-invalid @enderror" name="pointBorderColor" value="{{old('pointBorderColor', $data->pointBorderColor)}}" placeholder="rgba(235, 141, 7, 1)">
                                       @error('pointBorderColor') <div class="invalid-feedback">{{$message}}</div>@enderror
                                    </div>
                              </div>
                           </div> {{-- row --}}
                        </div>
                     </div> {{-- row --}}
                  </div> {{-- info --}}
                  <div class="account-settings-footer">
                     <div class="as-footer-container">
                        <a href="{{ route('programstudi.index') }}" class="btn btn-dark" >Kembali</a>
                        <button id="multiple-messages" type="submit" class="btn btn-primary">Simpan</button>
                     </div>
                  </div>  {{-- account-settings-footer --}}

               </form>
            </div>
         </div> {{-- row --}}
      </div> {{-- scrollspy-example--}}
   </div> {{-- account-content --}}
</div> {{-- account-settings-container --}}

@endsection

@section('trigger')
   {{-- <script>
   $('#saveprodi').click(() => {
      $.post("{{ route('programstudi.store') }}", {
         programstudi      : $('input[name="programstudi"]').val(),
         slug              : $('input[name="programstudi"]').val(),
         backgroundColor   : $('input[name="backgroundColor"]').val(),
         borderColor       : $('input[name="borderColor "]').val(),
         pointBorderColor  : $('input[name="pointBorderColor"]').val(),
      },
         function (data, textStatus, jqXHR) {
               console.log("success")
         },
         "json"
      );
   })
   </script> --}}
@endsection
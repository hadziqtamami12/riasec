@extends('layouts.appadmin')

@section('page_title')
   {{"Tambah Soal"}}
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
               <form class="section contact">
                  @csrf

                  <div class="info">
                     <h5 class="">{{$pageName}}</h5>
                     <div class="row">
                        <div class="col-md-11 mx-auto">
                           <div class="row">
                              <div class="col-md-12">
                                    <div class="form-group">
                                       <label for="dimensi">Pilih Pasangan Dimensi</label>
                                       <select id="dimensi" name="dimensi" class="form-control">
                                             @foreach($dimensi as $key)
                                             <option
                                                value="{{ $key->id }}"
                                                data-dimenA="{{ '('.$key->dimA->code.') '.$key->dimA->keterangan }}"
                                                data-dimenB="{{ '('.$key->dimB->code.') '.$key->dimB->keterangan }}"
                                             >
                                                {{ '('.$key->dimA->code.') '.$key->dimA->keterangan }} 
                                                {{ '('.$key->dimB->code.') '.$key->dimB->keterangan }}
                                             </option>
                                             @endforeach
                                       </select>
                                    </div>
                              </div>
                              <div class="col-md-12">
                                    <div class="form-group">
                                       <label for="soal">Soal</label>
                                       <input type="text" style="height: 65px" class="form-control @error('soal') is-invalid @enderror" name="soal">
                                       @error('soal') <div class="invalid-feedback">{{$message}}</div>@enderror
                                    </div>
                              </div>
                              <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="#">Pernyataan A</label>
                                       <input type="text" class="form-control @error('a') is-invalid @enderror" name="a" placeholder="Pernyataan A">
                                       @error('a') <div class="invalid-feedback">{{$message}}</div>@enderror
                                    </div>
                              </div>
                              <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="#">Pernyataan B</label>
                                       <input type="text" class="form-control @error('b') is-invalid @enderror" name="b" placeholder="Pernyataan B">
                                       @error('b') <div class="invalid-feedback">{{$message}}</div>@enderror
                                    </div>
                              </div>

                              <div class="col-md-6 mb-5">
                                 <div class="form-group">
                                    <label for="#">Dimensi A :</label>
                                    <span class="form-control" id="dimensiA"></span>
                                 </div>
                              </div>

                              <div class="col-md-6 mb-5">
                                 <div class="form-group">
                                    <label for="#">Dimensi B :</label>
                                    <span class="form-control" id="dimensiB"></span>
                                 </div>
                              </div>
                              
                           </div> {{-- row --}}
                        </div>
                     </div> {{-- row --}}
                  </div> {{-- info --}}
                  <div class="account-settings-footer">
                     <div class="as-footer-container">
                        <a href="{{ route('soal.index') }}" class="btn btn-dark" >Kembali</a>
                        <button id="savesoal" type="submit" class="btn btn-primary success">Simpan</button>
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
<script src="{{asset('plugins/select2/select2.min.js')}}"></script>
<script>
   $('select[name="dimensi"]').select2({
      placeholder: "Pilih dimensi yang digunakan"
   }).val(null).trigger('change')
   
   $('select[name="dimensi"]').change(function() {
   
      let selected = $(this).find(':selected')
   
      $('#dimensiA').html(selected.data('dimena'))
      $('#dimensiB').html(selected.data('dimenb'))
   })
   
   $('#savesoal').click(() => {
      $.post("{{ route('soal.store') }}", {
         dimensi: $('select[name="dimensi"]').val(),
         a     : $('input[name="a"]').val(),
         b     : $('input[name="b"]').val(),
         soal  : $('input[name="soal"]').val()
      },
         function (data, textStatus, jqXHR) {
               console.log("success")
         },
         "json"
      );
      swal({
         title: 'Good job!',
         text: "You clicked the!",
         type: 'success',
         padding: '2em'
      })
   })
</script>
{{-- <script>
   $('.as-footer-container .success').on('click', function () {

   });
</script> --}}
@endsection
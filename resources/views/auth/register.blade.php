@extends('auth.auth')
@section('page_title')
   {{"Register"}}
@endsection

@section('content')
   
<div class="form-content">
   <div class="maintanence-hero-img">
      <a href="{{url('/')}}">
         <img alt="Politeknik Negeri Banyuwangi" data-retina="{{asset('assets/images/logo/icon_poliwangi.png')}}" data-src="{{asset('assets/images/logo/icon_poliwangi.png')}}" class="m-0" src="{{asset('assets/images/logo/icon_poliwangi.png')}}" >
      </a>
   </div>
   <h1 class="">Register</h1>
   <p class="signup-link register">Sudah memiliki akun? <a href="{{Route('formlogin')}}">Masuk</a></p>
   <form action="{{ route('auth.create') }}" method="post" class="text-left">
      @csrf
      <div class="form">

         <div id="username-field" class="field-wrapper input">
            <label for="username">NAMA</label>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            <input type="teks" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" placeholder="username">
               @error('name') <div class="invalid-feedback">{{$message}}</div>@enderror 
         </div>

         <div id="nim-field" class="field-wrapper input">
            <label for="nim">NIM</label>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            <input type="teks" class="form-control  @error('nim') is-invalid @enderror" name="nim" value="{{old('nim')}}" placeholder="nim">
               @error('name') <div class="invalid-feedback">{{$message}}</div>@enderror
         </div>

         <div id="program studi" class="field-wrapper input select-prodi">
            <label for="nim">PROGRAM STUDI</label>
            <select class="form-control prodi" name="programstudi_id" style="margin-bottom: 0;">
               <option selected disabled>pilih jurusan anda</option>
               @foreach ($programstudi as $studi)
                  <option value="{{$studi->id}}">
                     {{ $studi->program_studi }}
                  </option>
               @endforeach
            </select>
         </div>

         <div id="email-field" class="field-wrapper input">
            <label for="email">EMAIL</label>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign register"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
            <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" placeholder="Email">
               @error('email') <div class="invalid-feedback">{{$message}}</div>@enderror
         </div>

         <div id="password-field" class="field-wrapper input">
            <div class="d-flex justify-content-between">
                  <label for="password">PASSWORD</label>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
            <input id="password" name="password" type="password" class="form-control" placeholder="kata sandi">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
         </div>

         <div id="password-confirm" class="field-wrapper input mb-2">
            <div class="d-flex justify-content-between">
                  <label for="password">CONFIRM PASSWORD</label>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
            <input id="password-confirm" name="password_confirmation" type="password" class="form-control" placeholder="kata sandi">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
         </div>

         <div class="field-wrapper terms_condition">
            <div class="n-chk">
                  <label class="new-control new-checkbox checkbox-primary">
                  <input type="checkbox" class="new-control-input">
                  <span class="new-control-indicator"></span><span>saya menyetujui <a href="javascript:void(0);">syarat dan ketentuan </a></span>
                  </label>
            </div>
         </div>

         <div class="d-sm-flex justify-content-between">
            <div class="field-wrapper">
                  <button type="submit" class="btn btn-primary" value="">Daftar</button>
            </div>
         </div>

      </div>
   </form>

</div>  
@endsection
@section('trigger')
<script src="{{asset('plugins/select2/select2.min.js')}}"></script>
<script>
   $('select[name="programstudi_id"]').select2()
</script>
@endsection
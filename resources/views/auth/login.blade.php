@extends('auth.auth')
@section('page_title')
   {{"Sign In"}}
@endsection

@section('content')
   
   <div class="form-content">
      
      @include('layouts.alert.alert')

      <h1 class="">Sign In</h1>
      <p class="">Masuk ke akun Anda untuk melanjutkan.</p>
      
      <form action="login" method="post" class="text-left">
         @csrf
         <div class="form">

            <div id="username-field" class="field-wrapper input">
               <label for="username">EMAIL</label>
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign register"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
               <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" placeholder="Email">
                  @error('email') <div class="invalid-feedback">{{$message}}</div>@enderror
            </div>

            <div id="password-field" class="field-wrapper input mb-2">
               <div class="d-flex justify-content-between">
                     <label for="password">PASSWORD</label>
                     <a href="auth_pass_recovery_boxed.html" class="forgot-pass-link">Lupa Password?</a>
               </div>
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
               <input id="password" name="password" type="password" class="form-control" placeholder="Kata Sandi">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
            </div>
            <div class="d-sm-flex justify-content-between">
               <div class="field-wrapper">
                     <button type="submit" class="btn btn-primary" value="">Masuk</button>
               </div>
            </div>

            <p class="signup-link">Kamu Belum Punya Akun ? <a href="{{Route('formregister')}}">Buat Akun</a></p>

         </div>
      </form>

   </div>

@endsection
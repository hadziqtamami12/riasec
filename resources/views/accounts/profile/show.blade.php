@extends('layouts.appuser')

@section('page_title')
   {{"MBTI"}}
@endsection

@section('nav_header')
   <!--  BEGIN NAVBAR  -->
   <div class="header-container fixed-top">
      <header class="header navbar navbar-expand-sm">
         <div class="container">
               <ul class="navbar-item theme-brand flex-row  text-center">
                  <li class="nav-item theme-logo">
                     <a href="http://www.nationalvirtualcareerfair.id/" target="_blank" class="navbar-brand">
                           <img alt="Politeknik Negeri Banyuwangi" data-retina="https://jpc.poliwangi.ac.id/template/jpcthemebaru/img/poliwangi/logo/logo.png" data-src="https://jpc.poliwangi.ac.id/template/jpcthemebaru/img/poliwangi/logo/flag_lowongan.png" class="navimg" src="https://jpc.poliwangi.ac.id/template/jpcthemebaru/img/poliwangi/logo/flag_lowongan.png" >
                     </a>
                  </li>
                  <li class="nav-item theme-logo">
                     <img alt="Politeknik Negeri Banyuwangi" data-retina="https://jpc.poliwangi.ac.id/template/jpcthemebaru/img/poliwangi/logo/logo.png" data-src="https://jpc.poliwangi.ac.id/template/jpcthemebaru/img/poliwangi/logo/logo.png" class="navimg m-0" src="https://jpc.poliwangi.ac.id/template/jpcthemebaru/img/poliwangi/logo/logo.png" >
                  </li>
               </ul>

               <ul class="navbar-item flex-row ml-md-auto">
                  <li class="nav-item dropdown user-profile-dropdown">
                     <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <img src="{{asset('assets/images/90x90.jpg')}}" alt="avatar">
                     </a>
                  </li>
               </ul>
         </div>
      </header>
   </div>
   <!--  END NAVBAR  -->
   <div class="sub-header-container">
      <header class="header navbar navbar-expand-sm">
         <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></a>

         <ul class="navbar-nav flex-row">
               <li>
                  <div class="page-header">

                     <nav class="breadcrumb-one" aria-label="breadcrumb">
                           <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="javascript:void(0);">Test Kepribadian MBTI</a></li>
                              <li class="breadcrumb-item active" aria-current="page"><span>Profile</span></li>
                           </ol>
                     </nav>

                  </div>
               </li>
         </ul>
      </header>
   </div>
@endsection

@section('content')
<div class="layout-px-spacing">

   <form method="POST" action="{{ route('profile.update', Auth::user()->id) }}" role="form" enctype="multipart/form-data" id="general-info" class="">
      @csrf
      <div class="row layout-spacing">
         @if ($errors->any())
            <div class="alert alert-danger">
               <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
               </ul>
            </div><br/>
         @endif
         @if ($message = Session::get('success'))
            <div class="alert alert-success mb-1" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
               {{$message}}
            </div>
         @endif
         <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

            <div class="user-profile layout-spacing">
               <div class="widget-content widget-content-area">
                  <h3 class="">Profile</h3>
                  <div class="text-center user-info">
                     <input id="profile_image" type="file" class="dropify" @error('profile_image') is-invalid @enderror name="profile_image" data-default-file="{{ asset(auth()->user()->image) }}" alt="..."/>
                     @if (auth()->user()->image)
                        <code>{{ auth()->user()->image }}</code>
                     @endif
                     @error('profile_image') <div class="invalid-feedback">{{$message}}</div>@enderror
                        <p class="">{{ Auth::user()->name }}</p>
                  </div>
                  <div class="user-info-list">
                     <div class="">
                        <ul class="contacts-block list-unstyled">
                           <li class="contacts-block__item">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-coffee">
                                    <path d="M18 8h1a4 4 0 0 1 0 8h-1"></path>
                                    <path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path>
                                    <line x1="6" y1="1" x2="6" y2="4"></line>
                                    <line x1="10" y1="1" x2="10" y2="4"></line>
                                    <line x1="14" y1="1" x2="14" y2="4"></line>
                                 </svg>
                           </li>

                           <li class="contacts-block__item">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-calendar">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                 </svg>{{ Auth::user()->nim }}
                           </li>

                           <li class="contacts-block__item">
                              <a href="mailto:example@mail.com"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-mail">
                                    <path
                                          d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                    </path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                 </svg>{{ Auth::user()->email }}</a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div> {{-- user-profile layout-spacing --}}

         </div> {{-- col-xl-4 --}}

         <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">

            <div class="skills layout-spacing ">
               <div class="widget-content widget-content-area">
                  <h3 class="">Ubah Profile</h3>
                  <div class="form-row mb-2">

                     <div class="form-group col-md-8">
                        <label for="inputEmail4">Email</label>
                        <input type="text" class="form-control"
                        @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" autofocus="1" readonly="1" />
                        @error('email') <div class="invalid-feedback">{{$message}}</div>@enderror
                     </div>

                     <div class="form-group col-md-4">
                        <label for="inputPassword4">Password</label><br>
                        <a href="#" id="inputPassword4" class="btn btn-info"><i data-feather="unlock"></i>&nbsp;Ganti Password</a>
                     </div>
                  </div>

                  <div class="form-group mb-4">
                     <label for="inputAddress">Nama</label>
                     <input type="text" class="form-control"
                     @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" />
                     @error('name') <div class="invalid-feedback">{{$message}}</div>@enderror
                  </div>

                  <div class="form-row mb-4">
                     <div class="form-group col-md-7">
                        <label>NIM</label>
                        <input type="text" class="form-control"
                        @error('nim') is-invalid @enderror" name="nim" value="{{ Auth::user()->nim }}" />
                        @error('nim') <div class="invalid-feedback">{{$message}}</div>@enderror
                     </div>

                     <div class="form-group col-md-5">
                        <label for="programstudi_id">Program Studi</label>
                        <select id="programstudi_id" class="form-control">
                           <option value="{{ Auth::user()->programstudi_id }}" selected> {{ $prodi_select->programstudi }}</option>
                           @foreach ($programstudi as $prodi)
                              <option value="{{$prodi->id}}">
                                 {{ $prodi->programstudi }}
                              </option>
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <a href="{{ route('roleUser') }}" class="btn btn-dark" >Kembali</a>&nbsp;&nbsp;
                  <button type="submit" class="btn btn-primary">Simpan</button>

               </div>
            </div> {{-- skills layout-spacing --}}

         </div> {{-- col-xl-8 --}}
      </div> {{-- row layout-spacing --}}

   </form> {{-- form --}} 

</div>
@endsection
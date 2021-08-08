@extends('layouts.appuser')

@section('page_title','Profile | ' . Auth::user()->slug)

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
                        <img src="{{asset(auth()->user()->image)}}" alt="avatar" style="width: auto; height: 30px; border-radius: 6px;">
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
                              <li class="breadcrumb-item"><a href="javascript:void(0);">Profile</a></li>
                              <li class="breadcrumb-item active" aria-current="page"><span>{{ Auth::user()->name }}</span></li>
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
   <div class="account-settings-container layout-top-spacing">

      <div class="account-content">
         <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
            
            <div class="row">
               <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                  
                  @include('layouts.alert.alert')

                  <form method="POST" action="{{ route('profile.update', Auth::user()->id) }}" role="form" enctype="multipart/form-data" id="general-info" class="section general-info" >
                     @csrf
                     {{-- @method('PATCH') --}}
                     <div class="info">
                        <h6 class="">General Information</h6>
                        <div class="row">
                              <div class="col-lg-11 mx-auto">
                                 <div class="row">
                                    <div class="col-xl-2 col-lg-12 col-md-4">
                                       <div class="upload mt-4 pr-md-4">
                                          <input id="profile_image" type="file" class="dropify" @error('profile_image') is-invalid @enderror name="profile_image" data-default-file="{{ asset(auth()->user()->image) }}"/>
                                          @error('profile_image') <div class="invalid-feedback">{{$message}}</div>@enderror
                                          <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i>Upload Foto, Max : 2MB</p>
                                       </div> 
                                    </div>
                                    <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                          <div class="form mb-5">

                                             <div class="form-row mb-2">
                                                <div class="form-group col-md-9">
                                                   <label for="email">Email</label>
                                                   <input type="text" class="form-control"
                                                   @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" autofocus="1" readonly="1" />
                                                   @error('email') <div class="invalid-feedback">{{$message}}</div>@enderror
                                                </div>
                           
                                                <div class="form-group col-md-3">
                                                   <label for="password">Password</label><br>
                                                   <a href="{{route('password.edit')}}" class="btn btn-info"><i data-feather="unlock"></i>&nbsp;Ganti Password</a>
                                                </div>
                                             </div>

                                             <div class="form-group">
                                                <label for="profession">Nama</label>
                                                <input type="text" class="form-control mb-4"
                                                @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" />
                                                @error('name') <div class="invalid-feedback">{{$message}}</div>@enderror
                                             </div>

                                             <div class="form-group">
                                                <label for="profession">NIM</label>
                                                <input type="text" class="form-control mb-4"
                                                @error('nim') is-invalid @enderror" name="nim" value="{{ Auth::user()->nim }}" />
                                                @error('nim') <div class="invalid-feedback">{{$message}}</div>@enderror
                                             </div>

                                             <div class="form-group">
                                                <label for="profession">Program Studi</label>
                                                <select class="form-control prodi" name="programstudi_id">
                                                   <option value="{{ Auth::user()->programstudi_id }}" selected> {{ Auth::user()->programstudi->program_studi }}</option>
                                                   @foreach ($programstudi as $prodi)
                                                      <option value="{{$prodi->id}}">
                                                         {{ $prodi->program_studi }}
                                                      </option>
                                                   @endforeach
                                                </select>
                                             </div>

                                          </div>
                                    </div>
                                 </div>
                              </div>
                        </div>
                     </div> {{-- info --}}
                     
                     <div class="account-settings-footer">
                        <div class="as-footer-container">
                           \App\Models\Role::where('user_id', Auth::id())->where('role_id', 1)->first() ? route('roleAdmin') : route('roleUser') 
                           <a href="{{Auth::user()->roles()->first()->name}}" class="btn btn-dark" >Kembali</a>
                           <button class="mr-2 btn btn-primary success">Simpan</button>
                        </div>
                     </div>  {{-- account-settings-footer --}}
                  </form>
               </div> {{-- col-12 --}}
            </div> {{-- row --}}
         </div> {{-- scrollspy-example--}}
      </div> {{-- account-content --}}

   </div> {{-- account-settings-container --}}
</div>
@endsection
@section('trigger')
<script src="{{asset('plugins/select2/select2.min.js')}}"></script>
<script>
   $('select[name="programstudi_id"]').select2()
</script>
<script>
   $('.as-footer-container .success').on('click', function () {
   swal({
         title: 'Good job!',
         text: "You clicked the!",
         type: 'success',
         padding: '2em'
      })
   });
</script>
@endsection
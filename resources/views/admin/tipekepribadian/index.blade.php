@extends('layouts.appadmin')

@section('page_title')
   {{"Daftar Tipe Kepribadian"}}
@endsection

@section('nav_header')
   @include('layouts.navbar.navadmin')
@endsection

@section('content')

<div class="row layout-top-spacing layout-spacing" id="cancel-row">
   <div class="col-lg-12">
      <div class="widget-content searchable-container list">

         <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 filtered-list-search layout-spacing align-self-center">
                  <form class="form-inline my-2 my-lg-0">
                     <div class="">
                        <h4 class="col-10"><b>{{$pageName}}</b></h4>
                     </div>
                  </form>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 text-sm-right text-center layout-spacing align-self-center">
                  <div class="d-flex justify-content-sm-start justify-content-center">
                     {{-- Button Pop-Up --}}
                     <a href="{{ route('tipekep.create') }}" class="btn btn-primary mb-2" ><i data-feather="file-plus"></i>&nbsp;<b>{{$pageActive}}</b></a>
                  </div>
            </div>
         </div>

         <div class="searchable-items list">
            <div class="widget-content widget-content-area">
               <div class="table-responsive">
                  <table id="style-2" class="table style-2  table-hover">
                     <thead>
                        <tr>
                           <th>No.</th>
                           <th>Nama</th>
                           <th>Avatar</th>
                           <th>Keterangan</th>
                           <th>Julukan</th>
                           <th>Deskripsi</th>
                           <th>ArtiSukses</th>
                           <th>Pengembangan</th>
                           <th class="text-center">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($tipekepribadian  as $tipe)
                        <tr>
                           <td scope="row">{{$loop->iteration}}</td>
                           <td>{{$tipe->namatipe}}</td>
                           <td class="text-center">
                              <span><img src="{{asset($tipe->image)}}" class="profile-img"onerror="this.src='{{asset('assets/images/90x90.jpg')}}'"></span>
                           </td>
                           <td>{{$tipe->keterangan_tipe}}</td>
                           <td>{{$tipe->julukan_tipe}}</td>
                           <td>{{Str::limit($tipe->deskripsi_tipe, 50, '...')}}</td>
                           <td>{{Str::limit($tipe->arti_sukses, 50, '...')}}</td>
                           <td>{{Str::limit($tipe->saran_pengembangan, 50, '...')}}</td>
                           <td class="text-center">
                              <form action="{{ route('tipekep.destroy', $tipe->id) }}" method="post" class="dropdown custom-dropdown">
                                 <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                 </a>
                                 <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                    {{-- <a class="dropdown-item btn btn-sm" style="padding-left: 22px;" href="{{route('showTipe', $tipe->id)}}">View</a> --}}
                                    <a class="dropdown-item btn btn-sm text-warning" style="padding-left: 22px;" href="{{ route('tipekep.edit', $tipe->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item btn btn-sm text-danger" style="padding-left: 22px;" onclick="return confirm('yakin ingin dihapus?');">Delete</button>
                                 </div>
                              </form>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                     <tfoot>
                        <tr>
                           <th>No.</th>
                           <th>Nama</th>
                           <th>Avatar</th>
                           <th>Keterangan</th>
                           <th>Julukan</th>
                           <th>Deskripsi</th>
                           <th>ArtiSukses</th>
                           <th>Pengembangan</th>
                           <th class="text-center">Action</th>
                        </tr>
                     </tfoot>
                  </table>
               </div>
            </div>
         </div>

      </div>
   </div>
</div> {{-- row layout-spacing --}}

@endsection

@section('footer')
<div class="footer-wrapper">
   <div class="footer-section f-section-1">
      <p class="">Hak Cipta © 2021 <a target="_blank" href="https://jpc.poliwangi.ac.id">Job Placement Center </a>- Politeknik Negeri Banyuwangi.</p>
   </div>
</div>  {{-- footer-wrapper --}}
@endsection
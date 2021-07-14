@extends('layouts.appadmin')

@section('page_title')
   {{"Daftar Tipe Kepribadian"}}
@endsection

@section('nav_header')
   @include('layouts.navbar.navadmin')
@endsection

@section('content')

<div class="row layout-top-spacing layout-spacing">
   <div class="col-12">

      <div class="widget-content widget-content-area">
         <div class="widget-header">

            @include('layouts.alert.alert')

            <form class="form-inline mt-4 mb-1">
               <h4 class="col-10"><b>{{$pageName}}</b></h4>
                  <div class="col-auto">
                     <a href="{{ route('tipekep.create') }}" class="btn btn-primary mb-2"><i data-feather="plus"></i>{{$pageActive}}</a>
                  </div>
            </form>
         </div> {{-- widget-header --}}
         <div class="table-responsive mb-4 style-1">
            <table id="style-1" class="table style-1 table-hover non-hover">
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
                     <th>Action</th>
                  </tr> 
               </thead>
               <tbody>
                  @foreach ($tipekepribadian  as $tipe)
                  <tr>
                     <td scope="row">{{$loop->iteration}}</td>
                     <td>{{$tipe->namatipe}}</td>
                     <td>
                        <span><img src="{{asset($tipe->image)}}" class="rounded-circle profile-img" alt="avatar" style="width: auto; height: 70px;"></span>
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
                     <th>Action</th>
                  </tr>
               </tfoot>
            </table>
         </div> {{-- table-responsive --}}
      </div> {{-- widget-content-area --}}
      
   </div> {{-- col-12 --}}
</div> {{-- row layout-spacing --}}

@endsection

@section('footer')
<div class="footer-wrapper">
   <div class="footer-section f-section-1">
      <p class="">Hak Cipta © 2021 <a target="_blank" href="https://jpc.poliwangi.ac.id">Job Placement Center </a>- Politeknik Negeri Banyuwangi.</p>
   </div>
</div>  {{-- footer-wrapper --}}
@endsection
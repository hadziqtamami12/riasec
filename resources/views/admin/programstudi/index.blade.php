@extends('layouts.appadmin')

@section('page_title')
   {{"Daftar Program Studi"}}
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
                     <a href="{{ route('programstudi.create') }}" class="btn btn-primary mb-2"><i data-feather="plus"></i>{{$pageActive}}</a>
                  </div>
            </form>
         </div> {{-- widget-header --}}
         <div class="table-responsive mb-4 style-2">
            <table id="style-2" class="table style-2 table-hover non-hover">
               <thead>
                  <tr>
                     <th>No.</th>
                     <th>Program Studi</th>
                     <th class="text-center">Action</th>
                  </tr> 
               </thead>
               <tbody>
                  @foreach ($data as $prodi)
                  <tr>
                     <td scope="row">{{$loop->iteration}}</td>
                     <td>{{$prodi->program_studi}}</td>
                     <td class="text-center">
                        <ul class="table-controls">
                           <form action="{{ route('programstudi.destroy', $prodi->id) }}" method="POST">
                              <a href="{{ route('programstudi.edit', $prodi->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
                              @csrf
                              @method('DELETE')
                              <button class="btn warning confirm" onclick="return confirm('Yakin Ingin Dihapus?');"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger warning confirm"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>
                           </form>
                        </ul>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
               <tfoot>
                  <tr>
                     <th>No.</th>
                     <th>Program Studi</th>
                     <th class="text-center">Action</th>
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
@section('trigger')
   <script>
      $('.dropdown-menu .warning.confirm').on('click', function () {
      swal({
            title: 'Apa kamu yakin?',
            text: "Anda tidak akan dapat mengembalikan ini!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            padding: '2em'
         }).then(function(result) {
            if (result.value) {
            swal(
               'Deleted!',
               'File Anda telah dihapus.',
               'success'
            )
            }
         })
      })
   </script>
@endsection
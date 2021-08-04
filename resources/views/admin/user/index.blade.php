@extends('layouts.appadmin')

@section('page_title')
   {{"Daftar Pengguna"}}
@endsection

@section('nav_header')
   @include('layouts.navbar.navadmin')
@endsection

@section('content')
<div class="row layout-spacing layout-top-spacing" id="cancel-row">
   <div class="col-lg-12">
      <div class="widget-content searchable-container list">

         <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 filtered-list-search layout-spacing align-self-center">
                  <form class="form-inline my-2 my-lg-0">
                     <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                        <input type="text" class="form-control product-search" id="input-search" placeholder="Search...">
                     </div>
                  </form>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 text-sm-right text-center layout-spacing align-self-center">
                  <div class="d-flex justify-content-sm-start justify-content-center" style="text-align: left">
                     {{-- Button Pop-Up --}}
                     <svg id="btn-add-contact" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                  </div>
                  {{-- Pop-UP button --}}
                  <div class="modal fade" id="addContactModal" tabindex="-1" role="dialog" aria-labelledby="addContactModalTitle" aria-hidden="true">
                     <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                           <div class="modal-body">
                              <i class="flaticon-cancel-12 close" data-dismiss="modal"></i>
                              <div class="add-contact-box">
                                    <div class="add-contact-content">
                                       <form id="addContactModalTitle">
                                          <div class="row justify-content-center">
                                             <div class="col-10">
                                                <a href="{{ route('account.createAdmin') }}" class="btn btn-secondary btn-lg">Tambah Admin&nbsp;<i class="fas fa-user-shield"></i></a> &nbsp;
                                                <a href="{{ route('account.createUser') }}" class="btn btn-info btn-lg"><i class="fas fa-user-graduate"></i>&nbsp;Tambah User</a>
                                             </div>
                                          </div>
                                       </form>
                                    </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
            </div>
         </div>

         <div class="searchable-items list">
            <div class="widget-content widget-content-area">
               <div class="table-responsive">
                  <table id="style-3" class="table style-3  table-hover">
                     <thead>
                        <tr>
                           <th>ID</th>
                           <th class="text-center">Foto</th>
                           <th>Nama</th>
                           <th>Email</th>
                           <th>NIM</th>
                           <th>Program Studi</th>
                           {{-- <th class="text-center">Status</th> --}}
                           <th class="text-center" style="">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($dataUser as $item)
                        <tr>
                           <td scope="row">{{$loop->iteration}}</td>
                           <td class="text-center">
                              <span><img src="{{asset($item->image)}}" class="profile-img"onerror="this.src='{{asset('assets/images/90x90.jpg')}}'"></span>
                           </td>
                           <td>{{$item->name}} <br>
                              <span class="text-info" style="font-size: 10px">{{$item->roles}}</span>
                           </td>
                           <td>{{Str::limit($item->email, 15, '..')}}</td>
                           <td>{{$item->nim}}</td>
                           <td>{{$item->programstudi->program_studi}}</td>
                           {{-- <td><span class="shadow-none badge badge-primary" style="font-size: 10px">{{$item->roles}}</span></td> --}}
                           <td class="text-center">
                              <ul class="table-controls">
                                 <form action="{{ route('account.destroy', $item->id) }}" method="POST">
                                    <a href="{{ route('account.edit', $item->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn" onclick="return confirm('Yakin Ingin Dihapus?');"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-minus text-danger"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="23" y1="11" x2="17" y2="11"></line></svg></button>
                                 </form>
                              </ul>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                     <tfoot>
                        <tr>
                           <th>ID</th>
                           <th class="text-center">Foto</th>
                           <th>Nama</th>
                           <th>Email</th>
                           <th>NIM</th>
                           <th>Program Studi</th>
                           {{-- <th class="text-center">Status</th> --}}
                           <th class="text-center">Action</th>
                        </tr>
                     </tfoot>
                  </table>
               </div>
            </div>
         </div>

      </div>
   </div>
</div>
@endsection

@section('footer')
<div class="footer-wrapper">
   <div class="footer-section f-section-1">
      <p class="">Hak Cipta © 2021 <a target="_blank" href="https://jpc.poliwangi.ac.id">Job Placement Center </a>- Politeknik Negeri Banyuwangi.</p>
   </div>
</div>  {{-- footer-wrapper --}}
@endsection
@section('trigger')
<script src="{{asset('plugins/select2/select2.min.js')}}"></script>
<script>
   $('select[name="programstudi_id"]').select2()
</script>
<script>

   $(document).ready(function() {
      oTable = $('#style-3').dataTable({
         "sDom": '<"H"lr>t<"F"ip>',
         "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
         },
         "stripeClasses": [],
         "lengthMenu": [10,20,50],
         "pageLength": 10,
      });

      $('#input-search').on( 'keyup', function () {
         oTable.fnFilter( $(this).val() );
      } );
       // $('#input-search').keypress(function(){
       //     oTable.fnFilter( $(this).val() );
       //     return oTable;
       // });
   });
</script>
@endsection
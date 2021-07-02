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
            <div class="col-xl-4 col-lg-5 col-md-5 col-sm-7 filtered-list-search layout-spacing align-self-center">
                  <form class="form-inline my-2 my-lg-0">
                     <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                        <input type="text" class="form-control product-search" id="input-search" placeholder="Search...">
                     </div>
                  </form>
            </div>

            <div class="col-xl-8 col-lg-7 col-md-7 col-sm-5 text-sm-right text-center layout-spacing align-self-center">
                  <div class="d-flex justify-content-sm-end justify-content-center">
                     {{-- Button Pop-Up --}}
                     <svg id="btn-add-contact" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>

                     <div class="switch align-self-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list view-list active-view"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid view-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                     </div>
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
            <div class="items items-header-section">
                  <div class="item-content">
                     <div class="">
                        <h4>Name</h4>
                     </div>

                     <div class="user-email">
                        <h4>Email</h4>
                     </div>

                     <div class="user-location">
                        <h4 style="margin-left: 0;">NIM</h4>
                     </div>

                     <div class="user-phone">
                        <h4 style="margin-left: 3px;">Program Studi</h4>
                     </div>

                     <div class="action-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2  delete-multiple"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                     </div>
                  </div>
            </div>

            @foreach ($dataUser as $item)
               <div class="items">
                  <div class="item-content">
                     <div class="user-profile">
                        <img src="{{asset($item->image)}}" alt="avatar">
                        <div class="user-meta-info">
                              <p class="user-name" data-name="Alan Green">{{$item->name}}</p>
                              <p class="user-work" data-occupation="Web Developer"></p>
                              {{-- {{$item->roles}} --}}
                        </div>
                     </div>

                     <div class="user-email">
                        <p class="info-title">Email: </p>
                        <p class="usr-email-addr" data-email="alan@mail.com">{{$item->email}}</p>
                     </div>

                     <div class="user-location">
                        <p class="info-title">NIM: </p>
                        <p class="usr-location" data-location="Boston, USA">{{$item->nim}}</p>
                     </div>

                     <div class="user-phone">
                        <p class="info-title">Prodi: </p>
                        <p class="usr-ph-no" data-phone="+1 (070) 123-4567">{{$item->programstudi->program_studi}}</p>
                     </div>

                     <div class="action-btn">
                        <form action="{{ route('account.destroy', $item->id) }}" method="POST">
                           <a href="{{ route('account.edit', $item->id) }}" class="btn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
                           @csrf
                           @method('DELETE')
                           <button class="btn" onclick="return confirm('Yakin Ingin Dihapus?');"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-minus text-danger"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="23" y1="11" x2="17" y2="11"></line></svg></button>
                        </form>
                     </div>
                  </div>
               </div>
            @endforeach

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
   $('select[name="programstudi_id"]').select2({
      placeholder: "Pilih dimensi yang digunakan"
   })
</script>
@endsection
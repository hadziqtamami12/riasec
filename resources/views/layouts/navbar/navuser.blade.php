   <!-- BEGIN HEADER -->
<header id="header">
   <nav class="navbar st-navbar fixed-top navbar-expand-md">
      <div class="container">

         <div class="navbar-brand">
            <a href="http://www.nationalvirtualcareerfair.id/" target="_blank">
                  <img alt="Politeknik Negeri Banyuwangi" data-retina="https://jpc.poliwangi.ac.id/template/jpcthemebaru/img/poliwangi/logo/logo.png" data-src="https://jpc.poliwangi.ac.id/template/jpcthemebaru/img/poliwangi/logo/flag_lowongan.png" class="navimg" src="https://jpc.poliwangi.ac.id/template/jpcthemebaru/img/poliwangi/logo/flag_lowongan.png" >
            </a>
            <a href="">
                  <img alt="Politeknik Negeri Banyuwangi" data-retina="https://jpc.poliwangi.ac.id/template/jpcthemebaru/img/poliwangi/logo/logo.png" data-src="https://jpc.poliwangi.ac.id/template/jpcthemebaru/img/poliwangi/logo/logo.png" class="navimg m-0" src="https://jpc.poliwangi.ac.id/template/jpcthemebaru/img/poliwangi/logo/logo.png" >
            </a>
         </div>

         <button type="button" class="navbar-toggler navbar-toggler-right" data-toggle="collapse"
                  data-target="#st-navbar-collapse"><span class="sr-only">Toggle navigation</span>
            &#x2630;
         </button>

         <div class="collapse navbar-collapse justify-content-end" id="st-navbar-collapse">
            <ul class="nav navbar-nav ml-auto smooth-scroll">
               <li class="nav-item {{ (request()->segment(1) == 'home') ? 'active' : '' }}">
                  <a href="{{route('roleUser')}}" class="nav-link {{ (request()->segment(1) == 'home') ? 'active' : '' }}">Home</a>
               </li>
               <li class="nav-item {{ (request()->segment(1) == 'tipekepribadian') ? 'active' : '' }}">
                  <a href="{{route('tipekepribadian')}}" class="nav-link {{ (request()->segment(1) == 'tipekepribadian') ? 'active' : '' }}">Tipe Kepribadian</a>
               </li>
               <li class="nav-item {{ (request()->segment(1) == 'contact') ? 'active' : '' }}">
                  <a href="{{route('contact')}}" class="nav-link {{ (request()->segment(1) == 'contact') ? 'active' : '' }}">Hubungi</a>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-display="static" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     <img src="{{ asset(auth()->user()->image) }}" alt="avatar" style="width: auto; height: 35px; border-radius: 6px;">
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            
                     <a href="{{ route('profile.show')}}" class="dropdown-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                     &nbsp;&nbsp;Profile</a>

                     <a class="dropdown-item" href="#" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                           height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                           stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                           class="feather feather-log-out">
                           <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                           <polyline points="16 17 21 12 16 7"></polyline>
                           <line x1="21" y1="12" x2="9" y2="12"></line>
                        </svg>&nbsp;&nbsp;Sign Out</a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                           @csrf
                     </form>

                  </div>
               </li>
            </ul>
         </div><!-- navbar-collapse -->
         
      </div><!-- container -->
   </nav>
</header>
<!-- END HEADER -->
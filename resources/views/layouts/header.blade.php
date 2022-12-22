<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box" style="margin-top: 30px">
                <a href="#" class="logo" >
                    <span class="logo-sm" >
                        <img src="{{ asset('assets/images/logo-puskesmas.png') }}" alt="logo-sm" height="40">
                    </span>
                    <span class="logo-lg" style="margin-bottom: 5px" >
                        <img src="{{ asset('assets/images/log2.png') }}" alt="logo" height="150">
                    </span>
                </a>

              
            </div>
        
            <div  style="margin-top: 50px;margin-bottom: 25px;">
                <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                    <i class="ri-menu-2-line align-middle"></i>
                </button>
    
            </div>
      
        </div>
        

        @php
        $user = DB::table('users')
            ->where('id', Auth::user()->id)
            ->first();
    @endphp
        <div class="d-flex">
         <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{-- <img class="rounded-circle header-profile-user" src="{{ asset('assets/images/users/avatar-1.jpg') }}"
                        alt="Header Avatar"> --}}
                    <span class="d-none d-xl-inline-block ms-1">{{ Auth::user()->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    {{-- <a class="dropdown-item" href="#"><i class="ri-user-line align-middle me-1"></i> Profile</a> --}}
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{ route('admin.logout') }}"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
                </div>
            </div>

          

        </div>
    </div>
</header>

<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title">Menu</li>
        
        <li>
            <a href="{{ route('home') }}" class="waves-effect">
                <i class="ri-home-7-fill"></i>
                <span>Teras</span>
            </a>
        </li>
        @if (auth()->user()->hak_akses == 2)
       

        <li>
            <a href="#" class="has-arrow waves-effect">
                <i class="ri-settings-2-line"></i>
                <span>Manajemen</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('alamat.index') }}">Alamat</a></li>
                <li><a href="{{ route('statskk.index') }}">Status Di Keluarga</a></li>
                <li><a href="{{ route('diagnosa.index') }}">Diagnosa</a></li>
                <li><a href="{{ route('user.index') }}">User</a></li>
            </ul>
        </li>
{{-- 
        <li>
            <a href="#" class="has-arrow waves-effect">
                <i class="ri-wheelchair-line"></i>
                <span>Rawat Jalan</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('pendaftaran.index') }}">Pendaftaran</a></li>
                <li><a href="{{ route('farmasi.index') }}">Farmasi</a></li>
                <li>
                   
                        <a href="#" class="has-arrow waves-effect">
                            <span>Rekam Medis</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('rmplay.index') }}">Entry</a></li>
                            <li><a href="{{ route('rmaster.index') }}">Data pasien</a></li>
                        </ul>
                    </li>
            </ul>
        </li> --}}
       
        {{-- <li>
            <a href="#" class="has-arrow waves-effect">
                <i class="ri-hotel-bed-line"></i>
                <span>Rawat Inap</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('watnap.index') }}">Pendaftaran</a></li>
                <li><a href="{{ route('watnap.list') }}">Daftar Menginap</a></li>
                <li><a href="{{ route('watnap.data') }}">Data Pasien</a></li>
            </ul>
        </li>
       --}}


       
        
        <li>
            <a href="{{ route('input.manual') }}" class="waves-effect">
                <i class="ri-edit-line"></i>
                <span>Input Manual Pasien</span>
            </a>
        </li>
        
        @endif

       @include('layouts.menucustom')

    </ul>
</div>
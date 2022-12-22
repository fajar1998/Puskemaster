@if (auth()->user()->hak_akses == 4)
<li>
    <a href="{{ route('pendaftaran.index') }}" class="waves-effect">
        <i class="ri-home-7-fill"></i>
        <span>Pendaftaran</span>
    </a>
</li>
@endif
@if (auth()->user()->hak_akses == 5)
<li><a href="{{ route('rmplay.index') }}"><i class="ri-user-add-line"></i>Entry</a></li>
<li><a href="{{ route('rmaster.index') }}"><i class="ri-contacts-line"></i>Data pasien</a></li>
@endif
@if (auth()->user()->hak_akses == 3)
<li>
   
    
        <li><a href="{{ route('watnap.index') }}"><i class="ri-user-add-line"></i>Pendaftaran Pasien</a></li>
        <li><a href="{{ route('watnap.list') }}"><i class="ri-hotel-bed-line"></i>Daftar Menginap</a></li>
        <li><a href="{{ route('watnap.data') }}"><i class="ri-contacts-line"></i>Data Pasien</a></li>
    
</li>
@endif

@if (auth()->user()->hak_akses == 6)
<li><a href="{{ route('farmasi.index') }}"> <i class="ri-hotel-bed-line"></i>Farmasi</a></li>
<li>
    <a href="#" class="has-arrow waves-effect">
        <i class="ri-archive-line"></i>
        <span>Stock Opname</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="{{ route('gudang.index') }}">Gudang</a></li>
        <li><a href="{{ route('sap.index') }}">Farmasi</a></li>
        <li><a href="{{ route('sed.index') }}">Kadaluarsa</a></li>
    </ul>
</li>

<li class="menu-title">Laporan</li>

<li>
    <a href="#" class="has-arrow waves-effect">
        <i class="ri-building-3-fill"></i>
        <span>So Gudang</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="{{ route('sin.index') }}">Penerimaan</a></li>
        <li><a href="{{ route('sout.index') }}">Pengeluaran</a></li>
    </ul>
</li>


<li>
    <a href="#" class="has-arrow waves-effect">
        <i class="ri-git-repository-line"></i>
        <span>So Farmasi</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="{{ route('lsofar.index') }}">Penerimaan</a></li>
        <li><a href="{{ route('lap.sot') }}">Pengeluaran</a></li>
    </ul>
</li>
@endif

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fa-solid fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SPP Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    

    

    @if (Auth::guard('admin')->user())
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>
        <li class="nav-item 
        @if(request()->is('kelas'))
        {{ request()->is('kelas') ? 'active' : '' }}
        @elseif(request()->is('kelas/tambah'))
        {{ request()->is('kelas/tambah') ? 'active' : '' }}
        @elseif(request()->is('kelas/*'))
        {{ request()->is('kelas/*') ? 'active' : '' }}
        @endif
    ">
        <a class="nav-link" href="{{ url('/kelas') }}">
            <i class="fa-solid fa-graduation-cap"></i>
            <span>Kelas</span></a>
    </li>

    {{-- petugas --}}
    <li class="nav-item 
        @if(request()->is('petugas'))
        {{ request()->is('petugas') ? 'active' : '' }}
        @elseif(request()->is('petugas/tambah'))
        {{ request()->is('petugas/tambah') ? 'active' : '' }}
        @elseif(request()->is('petugas/*'))
        {{ request()->is('petugas/*') ? 'active' : '' }}
        @endif
    ">
        <a class="nav-link" href="{{ url('/petugas') }}">
            <i class="fa-solid fa-chalkboard-user"></i>
            <span>Petugas</span></a>
    </li>

    {{-- siswa --}}
    <li class="nav-item 
        @if(request()->is('siswa'))
        {{ request()->is('siswa') ? 'active' : '' }}
        @elseif(request()->is('siswa/tambah'))
        {{ request()->is('siswa/tambah') ? 'active' : '' }}
        @elseif(request()->is('siswa/*'))
        {{ request()->is('siswa/*') ? 'active' : '' }}
        @endif
    ">
        <a class="nav-link" href="{{ url('/siswa') }}">
            <i class="fa-solid fa-users-between-lines"></i>
            <span>Siswa</span></a>
    </li>

    {{-- spp --}}
    <li class="nav-item 
        @if(request()->is('spp'))
        {{ request()->is('spp') ? 'active' : '' }}
        @elseif(request()->is('spp/tambah'))
        {{ request()->is('spp/tambah') ? 'active' : '' }}
        @elseif(request()->is('spp/*'))
        {{ request()->is('spp/*') ? 'active' : '' }}
        @endif
    ">
        <a class="nav-link" href="{{ url('/spp') }}">
            <i class="fa-solid fa-receipt"></i>
            <span>SPP</span></a>
    </li>

    {{-- laporan --}}
    <li class="nav-item 
        @if(request()->is('laporan'))
        {{ request()->is('laporan') ? 'active' : '' }}
        @elseif(request()->is('laporan/tambah'))
        {{ request()->is('laporan/tambah') ? 'active' : '' }}
        @elseif(request()->is('laporan/*'))
        {{ request()->is('laporan/*') ? 'active' : '' }}
        @endif
    ">
        <a class="nav-link" href="{{ url('/laporan') }}">
            <i class="fa-solid fa-circle-exclamation"></i>
            <span>Laporan</span></a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <!-- Nav Item - Utilities Collapse Menu -->
    <div class="sidebar-heading">
        Pembayaran
    </div>

    <li class="nav-item 
        @if(request()->is('pembayaran'))
        {{ request()->is('pembayaran') ? 'active' : '' }}
        @elseif(request()->is('pembayaran/tambah'))
        {{ request()->is('pembayaran/tambah') ? 'active' : '' }}
        @elseif(request()->is('pembayaran/*'))
        {{ request()->is('pembayaran/*') ? 'active' : '' }}
        @endif
    ">
        <a class="nav-link " href="{{ url('/pembayaran') }}">
            <span class="btn btn-info text-white ">
                + Entri Transaksi
            </span>
        </a>
    </li>
    @endif
    {{-- <!-- Kelas --> --}}
    
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  

</ul>
<!-- End of Sidebar -->
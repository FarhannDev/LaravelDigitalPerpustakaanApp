<ul class="navbar-nav bg-danger sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-start justify-content-center" href="">
        <div class="sidebar-brand-text mx-3">Digital Perpustakaan</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-2">

    @if(Auth::user()->roles === 'adminstrator')
    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Route::is('dashboard.index') ? 'active': '' }}">
        <a class="nav-link" href="{{ route('dashboard.index') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Management Data
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ Route::is('dashboard.books') ? 'active': '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-book"></i>
            <span>Kelola Data Buku</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('dashboard.book.index') }}">Daftar Buku</a>
                <a class="collapse-item" href="{{ route('dashboard.book.category.index') }}">Kategori Buku</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-users"></i>
            <span>Kelola Data Pengguna</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('dashboard.user.operator') }}">Petugas</a>
                <a class="collapse-item" href="{{ route('dashboard.user.index') }}">Anggota</a>
            </div>
        </div>
    </li>


    @else
    <li class="nav-item {{ Route::is('user.dashboard') ? 'active': '' }}">
        <a class="nav-link" href="{{ route('user.dashboard') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Beranda</span></a>
    </li>

    <li class="nav-item {{ Route::is('user.book.list') ? 'active': '' }}">
        <a class="nav-link" href="{{ route('user.book.list') }}">
            <i class="fas fa-fw fa-book"></i>
            <span>Daftar Buku</span></a>
    </li>


    @endif


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2"
            aria-expanded="true" aria-controls="collapseUtilities2">
            <i class="fas fa-fw fa-user-edit"></i>
            <span>Kelola Data Profile</span>
        </a>
        <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('profile.index') }}">Profile Saya</a>
                <a class="collapse-item" href="{{ route('profile.edit') }}">Ubah Profile Saya</a>
                <!-- <a class="collapse-item" href="{{ route('dashboard.user.index') }}">Ubah Password</a> -->
            </div>
        </div>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class=" fas fa-fw fa-sign-out-alt"></i>
            <span>{{ __('Logout') }}</span></a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
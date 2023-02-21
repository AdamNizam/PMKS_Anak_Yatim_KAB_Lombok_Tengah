<header class="main-nav">
    <nav class="mt-3">
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link link-nav menu-title {{routeActive('superadmin')}}" href="{{route('superadmin')}}"><i data-feather="home"></i><span>Dashboard</span></a>

                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Data Master</h6>
                        </div>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title link-nav {{ prefixActive('anak_all') }}" href="{{ route('anak_all') }}"><i data-feather="users"></i><span>Anak</span></a></li>
                    <li class="dropdown"><a class="nav-link menu-title link-nav {{routeActive('pekerjaan.index')}}" href="{{ route('pekerjaan.index') }}"><i data-feather="box"></i><span>Pekerjaan</span></a></li>
                    <li class="dropdown">
                        <a class="nav-link menu-title {{ prefixActive('/pendidikan') }}" href="javascript:void(0)"><i data-feather="book"></i><span>Pendidikan</span></a>
                        <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('/pendidikan') }};">
                            <li><a class="submenu {{routeActive('pendidikan.index')}}" href="{{ route('pendidikan.index') }}">Pendidikan</a></li>
                            <li><a class="submenu {{routeActive('kelas.index')}}" href="{{ route('kelas.index') }}">Kelas Pendidikan</a></li>
                        </ul>
                    </li>
                    <!-- <li class="dropdown"><a class="nav-link menu-title {{ prefixActive('/prestasi') }}" href="javascript:void(0)"><i data-feather="award"></i><span>Prestasi</span></a>
                        <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('/prestasi') }};">
                            <li><a class="submenu {{routeActive('formal.index')}}" href="{{ route('formal.index') }}">Formal</a></li>
                            <li><a class="submenu {{routeActive('non_formal.index')}}" href="{{ route('non_formal.index') }}">Non Formal</a></li>
                        </ul>
                    </li> -->
                    <li class="dropdown"><a class="nav-link menu-title {{routeActive('alamat')}} " href="javascript:void(0)"><i data-feather="map-pin"></i><span>Data Alamat</span></a>
                        <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('/alamat') }};">
                            <li><a class="submenu {{routeActive('kecamatan')}}" href="{{ route('kecamatan.index') }}">Kecamatan</a></li>
                            <li><a class="submenu {{routeActive('desa.index')}}" href="{{ route('desa.index') }}">Desa</a></li>
                            <li><a class="submenu {{routeActive('dusun')}}" href="{{ route('dusun.index') }}">Dusun</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title {{ prefixActive('/pengguna') }}" href="javascript:void(0)"><i data-feather="user-plus"></i><span>Pengguna</span></a>
                        <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('/pengguna') }};">
                            <li><a class="submenu {{routeActive('all_pendata')}}" href="{{ route('all_pendata') }}">Pendata</a></li>
                            <li><a class="submenu {{routeActive('all_verifikator')}}" href="{{ route('all_verifikator') }}">Verifikator</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title {{ prefixActive('/user') }}" href="javascript:void(0)"><i data-feather="user-check"></i><span>Manajemen User</span></a>
                        <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('/user') }};">
                            <li><a class="submenu {{routeActive('user.userlog')}}" href="{{ route('userlog.index') }}">Userlog</a></li>
                            <li><a class="submenu {{routeActive('role')}}" href="{{ route('role.index') }}">Role</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
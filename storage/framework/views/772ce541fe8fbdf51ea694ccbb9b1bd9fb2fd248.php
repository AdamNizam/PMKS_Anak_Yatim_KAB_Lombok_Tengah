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
                        <a class="nav-link link-nav menu-title <?php echo e(routeActive('index')); ?>" href="<?php echo e(route('index')); ?>"><i data-feather="home"></i><span>Dashboard</span></a>

                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Data Master</h6>
                        </div>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title link-nav" href=""><i data-feather="users"></i><span>Anak</span></a></li>
                    <li class="dropdown"><a class="nav-link menu-title link-nav <?php echo e(routeActive('pekerjaan')); ?>" href="<?php echo e(route('pekerjaan.index')); ?>"><i data-feather="box"></i><span>Pekerjaan</span></a></li>
                    <li class="dropdown">
                        <a class="nav-link menu-title <?php echo e(prefixActive('/pendidikan')); ?>" href="javascript:void(0)"><i data-feather="book"></i><span>Pendidikan</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a class="submenu <?php echo e(routeActive('pendidikan')); ?>" href="<?php echo e(route('pendidikan.index')); ?>">Pendidikan</a></li>
                            <li><a class="submenu <?php echo e(routeActive('kelas.index')); ?>" href="<?php echo e(route('kelas.index')); ?>">Kelas Pendidikan</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title <?php echo e(prefixActive('/prestasi')); ?>" href="javascript:void(0)"><i data-feather="award"></i><span>Prestasi</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a class="submenu <?php echo e(routeActive('formal')); ?>" href="<?php echo e(route('formal.index')); ?>">Formal</a></li>
                            <li><a class="submenu <?php echo e(routeActive('non_formal')); ?>" href="<?php echo e(route('non_formal.index')); ?>">Non Formal</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="map-pin"></i><span>Data Alamat</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a class="submenu <?php echo e(routeActive('kecamatan')); ?>" href="<?php echo e(route('kecamatan.index')); ?>">Kecamatan</a></li>
                            <li><a class="submenu <?php echo e(routeActive('desa.index')); ?>" href="<?php echo e(route('desa.index')); ?>">Desa</a></li>
                            <li><a class="submenu <?php echo e(routeActive('dusun')); ?>" href="<?php echo e(route('dusun.index')); ?>">Dusun</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title link-nav <?php echo e(routeActive('pengguna')); ?>" href="<?php echo e(route('pengguna')); ?>"><i data-feather="user"></i><span>Pengguna</span></a></li>
                    <li class="dropdown"><a class="nav-link menu-title <?php echo e(prefixActive('/user')); ?>" href="javascript:void(0)"><i data-feather="user-check"></i><span>Manajemen User</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a class="submenu <?php echo e(routeActive('userlog.index')); ?>" href="<?php echo e(route('userlog.index')); ?>">Userlog</a></li>
                            <li><a class="submenu <?php echo e(routeActive('role.index')); ?>" href="<?php echo e(route('role.index')); ?>">Role</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header><?php /**PATH D:\APPLaravel\pmks-yatim\resources\views/layouts/admin/partials/sidebar.blade.php ENDPATH**/ ?>
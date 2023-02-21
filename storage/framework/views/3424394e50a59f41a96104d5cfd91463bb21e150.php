<header class="main-nav">
    <div class="sidebar-user text-center">
        <a href="user-profile.html">
            <h6 class="mt-3 f-14 f-w-600"><?php echo e(Session::get('nama')); ?></h6>
        </a>
        <p class="mb-0 font-roboto"><?php echo e(Session::get('role')); ?></p>

    </div>
    <nav class="mt-3">
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">

                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link link-nav menu-title <?php echo e(routeActive('survior')); ?>" href="<?php echo e(route('survior.index')); ?>"><i data-feather="home"></i><span>Dashboard</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title <?php echo e(prefixActive('/pendidikan')); ?>" href="javascript:void(0)"><i data-feather="users"></i><span>Anak</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a class="submenu <?php echo e(routeActive('anak')); ?>" href="<?php echo e(route('anak.index')); ?>">Data Anak</a></li>
                            <li><a class="submenu <?php echo e(routeActive('anak.create')); ?>" href="<?php echo e(route('anak.create')); ?>">Form Anak</a></li>
                            <li><a class="submenu <?php echo e(routeActive('import')); ?>" href="<?php echo e(route('importview')); ?>">Import Anak</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title <?php echo e(prefixActive('/pendidikan')); ?>" href="javascript:void(0)"><i data-feather="book"></i><span>Rekapan</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a class="submenu <?php echo e(routeActive('pendidikan')); ?>" href="<?php echo e(route('rekap_hari_ini')); ?>">Hari Ini </a></li>
                            <li><a class="submenu <?php echo e(routeActive('kelas.index')); ?>" href="<?php echo e(route('anak.index')); ?>">Rekapan</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link link-nav menu-title <?php echo e(routeActive('index')); ?>" href="<?php echo e(route('kontak')); ?>"><i data-feather="phone-call"></i><span>Kontak</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link link-nav menu-title <?php echo e(routeActive('profile')); ?>" href="<?php echo e(route('profile')); ?>"><i data-feather="user"></i><span>Profile</span></a>
                    </li>


                </ul>

            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header><?php /**PATH D:\APPLaravel\pmks-yatim\resources\views/layouts/survior/partials/sidebar.blade.php ENDPATH**/ ?>
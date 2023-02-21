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
                        <a class="nav-link link-nav menu-title <?php echo e(routeActive('pimpinan.index')); ?>" href="<?php echo e(route('pimpinan.index')); ?>"><i data-feather="home"></i><span>Dashboard</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link link-nav menu-title <?php echo e(routeActive('data_anak')); ?>" href="<?php echo e(route('data_anak')); ?>"><i data-feather="user"></i><span>Data Anak</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link link-nav menu-title <?php echo e(routeActive('minggu_ini')); ?>" href="<?php echo e(route('minggu_ini')); ?>"><i data-feather="x-circle"></i><span>Belum Verifikasi</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link link-nav menu-title <?php echo e(routeActive('hari_ini')); ?>" href="<?php echo e(route('hari_ini')); ?>"><i data-feather="check-square"></i><span>Sudah Verifikasi</span></a>
                    </li>
                    <!-- <li class="dropdown">
                        <a class="nav-link menu-title <?php echo e(prefixActive('/pimpinan')); ?>" href="javascript:void(0)"><i data-feather="check-square"></i><span>Rekapan</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a class="submenu <?php echo e(routeActive('hari_ini')); ?>" href="<?php echo e(route('hari_ini')); ?>">Hari Ini</a></li>
                            <li><a class="submenu <?php echo e(routeActive('minggu_ini')); ?>" href="<?php echo e(route('minggu_ini')); ?>">Minggu Ini</a></li>
                            <li><a class="submenu <?php echo e(routeActive('bulan_ini')); ?>" href="<?php echo e(route('bulan_ini')); ?>">Bulan Ini</a></li>
                            <li><a class="submenu <?php echo e(routeActive('tahun_ini')); ?>" href="<?php echo e(route('tahun_ini')); ?>">Tahun Ini</a></li>
                        </ul>
                    </li> -->

                </ul>

            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header><?php /**PATH D:\APPLaravel\pmks-anak-yatim\resources\views/layouts/pimpinan/partials/sidebar.blade.php ENDPATH**/ ?>
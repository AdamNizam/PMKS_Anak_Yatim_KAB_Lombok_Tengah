

<?php $__env->startSection('title'); ?>Edit Profile
<?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<h3>Detail Anak</h3>

<div class="container-fluid">
    <div class="edit-profile">

        <div class="row">
            <div class="col-xl-4">
                <div class="card profile-greeting">
                    <img src="<?php echo e(asset('assets/images/foto/').'/'.$anak->foto_anak); ?>" class="card-img-top" alt="...">
                </div>
                <div class="card ">
                    <a href="<?php echo e(route('proses_verifikasi', $anak->id_anak)); ?>" class="btn btn-primary">Verifikasi</a>
                </div>
            </div>
            <div class="col-xl-8">
                <form class="card">
                    <div class="card-header pb-0">
                        <h4 class="card-title mb-0">Profile</h4>
                        <div class="card-options">
                            <a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3 row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-9">

                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo e($anak->nama_anak); ?>">

                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Nomor KK</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo e($anak->nomor_kk); ?>">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Nomor NIK</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo e($anak->nomor_nik); ?>">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo e($anak->alamat); ?>">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-9">
                                        <p><input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo e($anak->tempat_lahir); ?>"></p>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo e($anak->tgl_lahir); ?>">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Usia</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo e($anak->usia); ?>">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Nama Wali</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo e($anak->nama_wali); ?>">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Alamat Sekolah</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo e($anak->alamat_sekolah); ?>">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Alamat Sekolah</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value='<?php if($anak->status_anak == 1): ?>
                                        Yatim
                                        <?php elseif($anak->status_anak == 2): ?>
                                        Piatu
                                        <?php elseif($anak->status_anak == 3): ?>
                                        Yatim Piatu
                                        <?php endif; ?>'>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<?php $__env->startPush('scripts'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.verifikator.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\APPLaravel\pmks-yatim\resources\views/verifikator/anak/detail_anak.blade.php ENDPATH**/ ?>
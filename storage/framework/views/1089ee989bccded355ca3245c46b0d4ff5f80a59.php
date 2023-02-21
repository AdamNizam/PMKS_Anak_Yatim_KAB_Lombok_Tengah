

<?php $__env->startSection('title'); ?>Anak <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/datatables.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 project-list">
            <?php if(session('success')): ?>
            <div class="alert alert-primary outline-2x" role="alert">
                <p><?php echo e(session('success')); ?></p>
            </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
            <div class="alert alert-danger outline-2x " role="alert">
                <?php echo e(session('error')); ?>

            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="caontainer-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="dt-ext table-responsive">
                        <table class="display nowrap" id="basic-1">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama Lengkap</th>
                                    <th>Nomor KK</th>
                                    <th>Nomor NIK</th>
                                    <th>Alamat</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Aksi</th>

                                </tr>

                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                <?php $__empty_1 = true; $__currentLoopData = $anak; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anak): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?php echo e($anak->nama_anak); ?></td>
                                    <td><?php echo e($anak->nomor_kk); ?></td>
                                    <td><?php echo e($anak->nomor_nik); ?></td>
                                    <td><?php echo e($anak->alamat); ?></td>
                                    <td><?php if($anak->jenis_kelamin == 1): ?>
                                        Laki Laki
                                        <?php else: ?>
                                        Perempuan
                                        <?php endif; ?></td>

                                    <td>
                                        <a href="<?php echo e(route('detail_anak', $anak->id_anak )); ?>" class="btn btn-sm btn-warning btn-square " type="button"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>

<script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatables/datatable.custom.js')); ?>"></script>


<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.verifikator.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\APPLaravel\pmks-anak-yatim\resources\views/verifikator/anak/index.blade.php ENDPATH**/ ?>
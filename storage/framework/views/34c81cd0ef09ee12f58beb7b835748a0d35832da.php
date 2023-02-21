

<?php $__env->startSection('title'); ?>Anak <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/datatables.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>

<div class="caontainer-fluid">
    <div class="row">
        <div class="col-md-9">
            <div class="card">

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
                <div class="card-header">
                    <h5>Kontak</h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('kontak_s')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="" class="form-label">Email </label>
                            <input type="email" class="form-control" name="email" id="email" value="<?php echo e(Session::get('email')); ?>" readonly placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Subject </label>
                            <input type="email" class="form-control" name="subject" id="subject">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Pesan</label>
                            <textarea class="form-control" id="" rows="5"></textarea>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-primary" type="submit">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.survior.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\APPLaravel\pmks-yatim\resources\views/survior/kontak.blade.php ENDPATH**/ ?>
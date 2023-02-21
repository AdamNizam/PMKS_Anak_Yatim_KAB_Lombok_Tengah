

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
                    <h5>Form Import Data Anak</h5>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate="" action="<?php echo e(route('import')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">

                            <div class="mb-3 row">
                                <label for="" class="col-sm-3 col-form-label">File Anak</label>
                                <div class="col-sm-9">
                                    <input class=" form-control" id="file_anak" type="file" name="file_anak" autocomplete="off">
                                    <?php $__errorArgs = ['file_anak'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="help-block"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-primary" type="submit">Simpan</button>
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
<?php echo $__env->make('layouts.survior.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\APPLaravel\pmks-yatim\resources\views/survior/anak/import.blade.php ENDPATH**/ ?>
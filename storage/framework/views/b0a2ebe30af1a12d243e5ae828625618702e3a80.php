

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
                    <h5>Form Tambah Anak</h5>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate="" action="<?php echo e(route('anak.update', $anak->id_anak)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="row">
                            <div class="mb-3 row">

                                <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-9">
                                    <input class="form-control <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nama" type="text" name="nama" autocomplete="off" value="<?php echo e(old('nama', $anak->nama_anak)); ?>">
                                    <?php $__errorArgs = ['nama'];
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
                            <div class="mb-3 row">
                                <label for="" class="col-sm-3 col-form-label">Nomor KK</label>
                                <div class="col-sm-9">
                                    <input class=" form-control" id="kk" type="number" name="kk" placeholder="" autocomplete="off" value="<?php echo e(old('kk', $anak->nomor_kk)); ?>">
                                    <?php $__errorArgs = ['kk'];
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
                            <div class="mb-3 row">
                                <label for="" class="col-sm-3 col-form-label">Nomor NIK</label>
                                <div class="col-sm-9">
                                    <input class=" form-control" id="nik" type="number" name="nik" placeholder="" autocomplete="off" value="<?php echo e(old('nik', $anak->nomor_nik)); ?>">
                                    <?php $__errorArgs = ['nik'];
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
                            <div class="mb-3 row">
                                <label for="" class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <input class=" form-control" id="alamat" type="text" name="alamat" placeholder="" autocomplete="off" value="<?php echo e(old('alamat', $anak->alamat)); ?>">
                                    <?php $__errorArgs = ['alamat'];
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
                            <div class="mb-3 row">
                                <label for="" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                    <select name="jk" id="jk" class="form-control">
                                        <option value="">--Pilih Jenis Kelamin--</option>
                                        <option value="1" <?php if($anak->jenis_kelamin=='1'): ?> selected='selected' <?php endif; ?>>Laki Laki</option>
                                        <option value="0" <?php if($anak->jenis_kelamin=='0'): ?> selected='selected' <?php endif; ?>>Perempuan</option>
                                    </select>
                                    <?php $__errorArgs = ['jk'];
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
                            <div class="mb-3 row">
                                <label for="" class="col-sm-3 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-9">
                                    <input class=" form-control" id="tempat_lahir" type="text" name="tempat_lahir" required autocomplete="off" value="<?php echo e(old('tempat_lahir', $anak->tempat_lahir)); ?>">
                                    <?php $__errorArgs = ['tempat_lahir'];
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
                            <div class="mb-3 row">
                                <label for="" class="col-sm-3 col-form-label">Tanggal Lahir </label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="tgl_lahir" type="date" name="tgl_lahir" autocomplete="off" value="<?php echo e($anak->tgl_lahir); ?>">
                                    <?php $__errorArgs = ['tgl_lahir'];
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
                            <div class="mb-3 row">
                                <label for="" class="col-sm-3 col-form-label">Nama Wali </label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="nama_wali" type="text" name="nama_wali" autocomplete="off" value="<?php echo e(old('nama_wali', $anak->nama_wali)); ?>">
                                    <?php $__errorArgs = ['nama_wali'];
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
                            <div class="mb-3 row">
                                <label for="" class="col-sm-3 col-form-label">Alamat Sekolah </label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="alamat_sekolah" type="text" name="alamat_sekolah" autocomplete="off" value="<?php echo e(old('alamat_sekolah', $anak->alamat_sekolah)); ?>">
                                    <?php $__errorArgs = ['alamat_sekolah'];
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
                            <div class="mb-3 row">
                                <label for="" class="col-sm-3 col-form-label">Status Anak</label>
                                <div class="col-sm-9">
                                    <select name="status_anak" id="status_anak" class="form-control">
                                        <option value="">--Pilih Status Anak--</option>
                                        <option value="1" <?php if($anak->status_anak=='1'): ?> selected='selected' <?php endif; ?>>Yatim</option>
                                        <option value="2" <?php if($anak->status_anak=='2'): ?> selected='selected' <?php endif; ?>>Piatu</option>
                                        <option value="3" <?php if($anak->status_anak=='3'): ?> selected='selected' <?php endif; ?>>Yatim Piatu</option>
                                    </select>
                                    <?php $__errorArgs = ['jk'];
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
                            <div class="mb-3 row">
                                <label for="" class="col-sm-3 col-form-label">Pekerjaa Wali</label>
                                <div class="col-sm-9">
                                    <select name="pekerjaan" id="pekerjaan" class="form-control">
                                        <option value="">--Pilih pekerjaan--</option>
                                        <?php $__empty_1 = true; $__currentLoopData = $pekerjaan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kerja): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                        <option value="<?php echo e($kerja->id_pekerjaan); ?>" <?php if($anak->id_pekerjaan_wali==$kerja->id_pekerjaan): ?> selected='selected' <?php endif; ?>><?php echo e($kerja->pekerjaan); ?></option>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <?php endif; ?>
                                        <?php $__errorArgs = ['pekerjaan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="help-block"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-sm-3 col-form-label">Pendidikan</label>
                                <div class="col-sm-9">
                                    <select name="pendidikan" id="pendidikan" class="form-control">
                                        <option>--Pilih Pendidikan--</option>
                                        <?php $__empty_1 = true; $__currentLoopData = $pendidikan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pendidik): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                        <option value="<?php echo e($pendidik->id_pendidikan); ?>" <?php if($anak->id_pendidikan==$pendidik->id_pendidikan): ?> selected='selected' <?php endif; ?>><?php echo e($pendidik->pendidikan); ?></option>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <?php endif; ?>
                                        <?php $__errorArgs = ['pendidikan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="help-block"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-sm-3 col-form-label">Kelas Pendidikan</label>
                                <div class="col-sm-9">
                                    <select name="kelas" id="kelas" class="form-control">
                                        <option value="">--Pilih Kelas Pendidikan--</option>
                                        <?php $__empty_1 = true; $__currentLoopData = $kelas_pendidikan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                        <option value="<?php echo e($kelas->id_kelas_pendidikan); ?>" <?php if($anak->id_kelas_pendidikan==$kelas->id_kelas_pendidikan): ?> selected='selected' <?php endif; ?>><?php echo e($kelas->kelas_pendidikan); ?></option>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <?php endif; ?>
                                        <?php $__errorArgs = ['kelas'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="help-block"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </select>
                                </div>
                            </div>


                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-primary" type="submit">Simpan Ubah</button>
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
<?php echo $__env->make('layouts.survior.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\APPLaravel\pmks-anak-yatim\resources\views/survior/anak/formedit.blade.php ENDPATH**/ ?>
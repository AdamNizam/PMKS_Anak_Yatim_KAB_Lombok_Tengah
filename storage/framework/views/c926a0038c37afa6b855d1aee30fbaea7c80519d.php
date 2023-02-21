

<?php $__env->startSection('title'); ?>Detail
<?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/datatables.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<h3>Detail Anak</h3>

<div class="container-fluid">
    <div class="edit-profile">

        <div class="row">
            <div class="col-xl-4">
                <div class="card" style="max-height: 300px; overflow:hidden">
                    <?php if($anak->foto_anak != '-'): ?>
                    <img src="<?php echo e(asset('storage/'.$anak->foto_anak)); ?>" class="card-img-top" alt="..." style="height: 400px;">
                    <?php else: ?>
                    <img src="<?php echo e(asset('assets/images/default.png')); ?>" class="card-img-top" alt="..." style="height: 400px;">
                    <?php endif; ?>
                </div>
                <form action="<?php echo e(route('upload_gambar')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" id="id" value="<?php echo e($anak->id_anak); ?>">
                    <input type="file" name="foto" id="foto" class="form-control mb-2 <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" accept="image/*">
                    <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="help-block text-danger"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <button type="submit" class="btn btn-sm btn-primary">Upload Foto</button>
                </form>

            </div>
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs border-tab nav-primary" id="info-tab" role="tablist">
                            <li class="nav-item"><a class="nav-link active" id="info-home-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="info-home" aria-selected="true"><i class="icofont icofont-man-in-glasses"></i>Profile</a></li>
                            <li class="nav-item"><a class="nav-link" id="profile-info-tab" data-bs-toggle="tab" href="#formal" role="tab" aria-controls="info-profile" aria-selected="false"> <i class="icofont icofont-ui-home"></i>Prestasi Formal</a></li>
                            <li class="nav-item"><a class="nav-link" id="contact-info-tab" data-bs-toggle="tab" href="#nonformal" role="tab" aria-controls="info-contact" aria-selected="false"><i class="icofont icofont-contacts"></i>Prestasi Non Formal</a></li>
                        </ul>
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
                        <div class="tab-content" id="info-tabContent">
                            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="info-home-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3 row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">Nama Lengkap </label>
                                            <div class="col-sm-9">
                                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo e($anak->nama_anak); ?>">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">Nama Lengkap </label>
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
                                            <label for="staticEmail" class="col-sm-3 col-form-label">Pendidikan</label>
                                            <div class="col-sm-9">
                                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo e($anak->pendidikan); ?>">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">Kelas Pendidikan</label>
                                            <div class="col-sm-9">
                                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo e($anak->kelas_pendidikan); ?>">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">Alamat Sekolah</label>
                                            <div class="col-sm-9">
                                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo e($anak->alamat_sekolah); ?>">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">Status Anak</label>
                                            <div class="col-sm-9">
                                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value='<?php if($anak->status_anak == 1): ?>Yatim
                                                <?php elseif($anak->status_anak == 2): ?>Piatu
                                                <?php elseif($anak->status_anak == 3): ?>Yatim Piatu
                                                <?php endif; ?>'>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">Status Verifikaksi</label>
                                            <div class="col-sm-9">
                                                <?php if($anak->status_verifikasi == 0): ?>
                                                <div class="span badge rounded-pill pill-badge-danger">Belum Verifikasi</div>
                                                <?php else: ?>
                                                <div class="span badge rounded-pill pill-badge-primary"> Sudah Verifikasi</div>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="formal" role="tabpanel" aria-labelledby="profile-info-tab">
                                <button class="btn btn-primary mb-2 btn-sm" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">Add New</button>

                                <div class="dt-ext table-responsive">
                                    <table class="display nowrap " id="basic-1">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Prestasi</th>
                                                <th>Tahun</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1 ?>
                                            <?php $__empty_1 = true; $__currentLoopData = $formal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?php echo e($formal->prestasi_formal); ?></td>
                                                <td><?php echo e($formal->tahun); ?></td>
                                                <td class="text-center">
                                                    <button class="btn btn-sm btn-warning btn-square tombol-ubah" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#modalubah" data-id="<?php echo e($formal->id_prestasi_formal); ?>"><i class="fa fa-edit"></i></button>
                                                    <form onsubmit="return confirm('Are You Sure ?');" action="/prestasi/formal/<?php echo e($formal->id_prestasi_formal); ?>" method="POST" class="d-inline ">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit" class="btn btn-sm btn-danger btn-square "><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <?php endif; ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nonformal" role="tabpanel" aria-labelledby="contact-info-tab">
                                <button class="btn btn-primary mb-2 btn-sm" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#tambahnonformal">Add New</button>
                                <div class="dt-ext table-responsive">
                                    <table class="display nowrap " id="basic-2">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Prestasi</th>
                                                <th>Tahun</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1 ?>
                                            <?php $__empty_1 = true; $__currentLoopData = $nonformal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nonformal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?php echo e($nonformal->prestasi_non_formal); ?></td>
                                                <td><?php echo e($nonformal->tahun); ?></td>
                                                <td class="text-center">
                                                    <button class="btn btn-sm btn-warning btn-square tombol-ubahnonformal" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#modalubahnonformal" data-id="<?php echo e($nonformal->id_prestasi_non_formal); ?>"><i class="fa fa-edit"></i></button>
                                                    <form onsubmit="return confirm('Are You Sure ?');" action="/prestasi/non_formal/<?php echo e($nonformal->id_prestasi_non_formal); ?>" method="POST" class="d-inline ">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit" class="btn btn-sm btn-danger btn-square "><i class="fa fa-trash"></i></button>
                                                    </form>
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
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?php echo e(route('formal.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Prestasi Formal</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 draggable">
                        <input type="hidden" name="id_anak" id="id_anak" value="<?php echo e($anak->id_anak); ?>">
                        <label for="input-text-1">Prestasi Formal</label>
                        <input class="form-control btn-square <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nama" name="nama" type="text" placeholder="Prestasi Formal " autocomplete="off">
                        <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="help-block text-danger"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-3 draggable">
                        <label for="input-text-1">Tahun</label>
                        <input class="form-control btn-square <?php $__errorArgs = ['tahun'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="tahun" name="tahun" type="text" placeholder="Tahun Mendapat Prestasi" autocomplete="off">
                        <?php $__errorArgs = ['tahun'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="help-block text-danger"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-secondary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modalubah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog form-ubah" role="document">
        <div class="modal-content">
            <form action="" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Ubah Prestasi Formal</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 draggable">
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="id_anak_ubah" id="id_anak_ubah" value="<?php echo e($anak->id_anak); ?>">
                        <label for="input-text-1">Prestasi Formal</label>
                        <input class="form-control btn-square <?php $__errorArgs = ['nama_ubah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nama_ubah" name="nama_ubah" type="text" placeholder="Prestasi Formal " autocomplete="off">
                        <?php $__errorArgs = ['nama_ubah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="help-block text-danger"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-3 draggable">
                        <label for="input-text-1">Tahun</label>
                        <input class="form-control btn-square <?php $__errorArgs = ['tahun_ubah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="tahun_ubah" name="tahun_ubah" type="number" placeholder="Tahun Mendapat Prestasi" autocomplete="off">
                        <?php $__errorArgs = ['tahun_ubah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="help-block text-danger"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-secondary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="tambahnonformal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?php echo e(route('non_formal.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Prestasi Non Formal</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 draggable">
                        <input type="hidden" name="id_anak_non_formal" id="id_anak_non_formal" value="<?php echo e($anak->id_anak); ?>">
                        <label for="input-text-1">Prestasi Non Formal</label>
                        <input class="form-control btn-square <?php $__errorArgs = ['nama_non_formal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nama_non_formal" name="nama_non_formal" type="text" placeholder="Prestasi Non Formal " autocomplete="off">
                        <?php $__errorArgs = ['nama_non_formal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="help-block text-danger"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-3 draggable">
                        <label for="input-text-1">Tahun</label>
                        <input class="form-control btn-square <?php $__errorArgs = ['tahun_non_formal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="tahun_non_formal" name="tahun_non_formal" type="text" placeholder="Tahun Mendapat Prestasi" autocomplete="off">
                        <?php $__errorArgs = ['tahun_non_formal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="help-block text-danger"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-secondary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modalubahnonformal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog form-ubah" role="document">
        <div class="modal-content">
            <form action="" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Ubah Prestasi Non Formal</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 draggable">
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="id_anak_ubah_non_formal" id="id_anak_ubah_non_formal" value="<?php echo e($anak->id_anak); ?>">
                        <label for="input-text-1">Prestasi Formal</label>
                        <input class="form-control btn-square <?php $__errorArgs = ['nama_ubah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nama_ubah_non_formal" name="nama_ubah_non_formal" type="text" placeholder="Prestasi Formal " autocomplete="off">
                        <?php $__errorArgs = ['nama_ubah_non_formal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="help-block text-danger"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-3 draggable">
                        <label for="input-text-1">Tahun</label>
                        <input class="form-control btn-square <?php $__errorArgs = ['tahun_ubah_non_formal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="tahun_ubah_non_formal" name="tahun_ubah_non_formal" type="number" placeholder="Tahun Mendapat Prestasi" autocomplete="off">
                        <?php $__errorArgs = ['tahun_ubah_non_formal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="help-block text-danger"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-secondary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatables/datatable.custom.js')); ?>"></script>
<script>
    $(function() {

        $('.tombol-ubah').on('click', function() {
            const id = $(this).data('id')
            $('.form-ubah form').attr('action', '/prestasi/formal/' + id)
            // console.log(id);

            $.ajax({
                url: `/prestasi/formal/` + id + `/edit`,
                method: 'get',
                dataType: 'json',
                success: function(data) {
                    console.log(data)
                    $('#id_ubah').val(data.id_prestasi_formal)
                    $('#nama_ubah').val(data.prestasi_formal)
                    $('#tahun_ubah').val(data.tahun)

                }
            })
        })
        $('.tombol-ubahnonformal').on('click', function() {
            const id = $(this).data('id')
            $('.form-ubah form').attr('action', '/prestasi/non_formal/' + id)
            // console.log(id);

            $.ajax({
                url: `/prestasi/non_formal/` + id + `/edit`,
                method: 'get',
                dataType: 'json',
                success: function(data) {
                    // console.log(data)
                    $('#id_ubah_non_formal').val(data.id_prestasi_non_formal)
                    $('#nama_ubah_non_formal').val(data.prestasi_non_formal)
                    $('#tahun_ubah_non_formal').val(data.tahun)

                }
            })
        })
    })
</script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.survior.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\APPLaravel\pmks-anak-yatim\resources\views/survior/anak/detail.blade.php ENDPATH**/ ?>
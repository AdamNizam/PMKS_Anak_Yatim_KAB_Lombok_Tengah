

<?php $__env->startSection('title'); ?>Anak <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/datatables.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>



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
                                    <th>NIK</th>
                                    <th>Alamat</th>
                                    <th>Jenis Kelamin</th>
                                </tr>
                            </thead>
                            <tbody id="data_anak">

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

<script>
    $(document).ready(function() {

        $.ajax({
            url: '/all',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                const all_anak = data['anak']
                // console.log(all_anak)
                $('#data_anak').empty()
                let no = 1
                for (let i = 0; i < all_anak.length; i++) {
                    if (all_anak[i].jenis_kelamin == 1) {
                        var jenis_kel = 'Laki Laki'
                    } else {
                        var jenis_kel = 'Perempuan'
                    }
                    $('#data_anak').append(`
                        <tr>
                            <td>` + (no++) + `</td>
                            <td>` + all_anak[i].nama_anak + `</td>
                            <td>` + all_anak[i].nomor_kk + `</td>
                            <td>` + all_anak[i].nomor_nik + `</td>
                            <td>` + all_anak[i].alamat + `</td>
                            <td>` + jenis_kel + `</td>
                        </tr>
                        `)
                }
            }
        })
    })
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\APPLaravel\pmks-anak-yatim\resources\views/superadmin/anak.blade.php ENDPATH**/ ?>
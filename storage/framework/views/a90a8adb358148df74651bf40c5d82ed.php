<?php $__env->startSection('title', 'Data Pengembalian'); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('modules/datatables/dataTables.min.css')); ?>">
    <style>
        .table {
            white-space: nowrap !important;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('main'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo $__env->yieldContent('title'); ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo e(url('/dashboard')); ?>">Dashboard</a></div>
                    <div class="breadcrumb-item"><?php echo $__env->yieldContent('title'); ?></div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table-striped table" id="table-returns">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No.</th>
                                            <th>Kode Peminjaman</th>
                                            <th>Nama Peminjam</th>
                                            <th>Tanggal Pengembalian</th>
                                            <th>Kondisi Pengembalian</th>
                                            <th>Catatan</th>
                                            <th>Denda</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $returns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $return): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="text-center"><?php echo e($loop->iteration); ?></td>
                                                <td class="text-center"><?php echo e($return->loan->kode_peminjaman ?? '-'); ?></td>
                                                <td><?php echo e($return->loan->user->username ?? '-'); ?></td>
                                                <td class="text-center"><?php echo e($return->tanggal_pengembalian); ?></td>
                                                <td><?php echo e($return->kondisi_pengembalian ?? '-'); ?></td>
                                                <td><?php echo e($return->catatan ?? '-'); ?></td>
                                                <td class="text-right"><?php echo e(number_format($return->denda, 0, ',', '.')); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <?php echo e($returns->links()); ?> 
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('modules/datatables/dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/page/modules-datatables.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/user/Documents/Laravel-9.1/e-loan/resources/views/return/index.blade.php ENDPATH**/ ?>
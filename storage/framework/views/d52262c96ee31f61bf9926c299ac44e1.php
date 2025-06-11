<?php $__env->startSection('title', 'Data Item'); ?>

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
                                <?php if(Auth::user()->role !== 'peminjam'): ?>
                                    <div class=" d-flex justify-content-between align-items-center mb-4">
                                        <a href="<?php echo e(url('/items/create')); ?>"
                                            class="btn btn-primary ml-auto">Tambah</a>
                                    </div>
                                <?php endif; ?>

                            <div class="table-responsive">
                                <table class="table-striped table" id="table-1">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No.</th>
                                            <th>Nama Barang</th>
                                            <th>Kode</th>
                                            <?php if(Auth::user()->role ==  'admin'): ?>
                                            <th>Aksi</th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ctr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="text-right"><?php echo e($loop->iteration); ?></td>
                                                <td class="text-right"><?php echo e($ctr->nama_barang); ?></td>
                                                <td class="text-right"><?php echo e($ctr->kode_barang); ?></td>
                                                <td>
                                                    <div class="d-flex justify-content-center" style="gap: .5rem">
                                                        
                                                        <?php if(Auth::user()->role ==  'admin'): ?>
                                                            <a href="<?php echo e(url("/items/{$ctr->id}/edit")); ?>"
                                                                class="btn btn-primary" data-toggle="tooltip"
                                                                title="Ubah">
                                                                <i class="fas fa-pencil"></i>
                                                            </a>
                                                            <form action="<?php echo e(url("/items/{$ctr->id}")); ?>"
                                                                method="POST" id="delete-form-<?php echo e($ctr->id); ?>"
                                                                class="d-inline">
                                                                <?php echo method_field('delete'); ?>
                                                                <?php echo csrf_field(); ?>
                                                                <button type="submit" class="btn btn-danger btn-delete"
                                                                    data-toggle="tooltip" title="Hapus">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
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

    <?php if(Auth::user()->officer_id !== null): ?>
        <?php if(Auth::user()->officers->position !== 'Lurah' && Auth::user()->officers->position !== 'Kepala Lingkungan'): ?>
            <script>
                $(document).ready(function() {
                    // Gunakan delegasi untuk tombol hapus
                    $(document).on('click', '.btn-delete', function(e) {
                        e.preventDefault();

                        const formId = $(this).closest('form').attr('id');

                        swal({
                            title: 'Hapus Data',
                            text: 'Apakah Anda yakin ingin menghapus data ini?',
                            icon: 'warning',
                            buttons: {
                                cancel: 'Batal',
                                confirm: {
                                    text: 'Ya, Hapus!',
                                    value: true,
                                    className: 'btn-danger',
                                }
                            },
                            dangerMode: true,
                        }).then((willDelete) => {
                            if (willDelete) {
                                $('#' + formId).submit();
                            }
                        });
                    });
                });
            </script>
        <?php endif; ?>
    <?php endif; ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/user/Documents/Laravel-9.1/e-loan/resources/views/items/index.blade.php ENDPATH**/ ?>
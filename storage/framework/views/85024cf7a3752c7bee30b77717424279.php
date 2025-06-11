<?php $__env->startSection('title', 'Data Peminjaman'); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('modules/datatables/dataTables.min.css')); ?>">
    <style>
        .table {
            white-space: nowrap !important;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('main'); ?>fa-circle-xmark
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
                                
                                    <div class=" d-flex justify-content-between align-items-center mb-4">
                                        <a href="<?php echo e(url('/loans/create')); ?>"
                                            class="btn btn-primary ml-auto">Tambah</a>
                                    </div>
                                

                                <div class="table-responsive">
                                    <table class="table-striped table" id="table-1">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No.</th>
                                                <th>Kode Peminjaman</th>
                                                <th>Nama Peminjam</th>
                                                <th>Tanggal Peminjaman</th>
                                                <th>Tanggal Pengembalian</th>
                                                <th>Status</th>
                                                <th>Keterangan</th>
                                                
                                                <th>Aksi</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $loans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td class="text-center"><?php echo e($loop->iteration); ?></td>
                                                    <td class="text-center"><?php echo e($loan->kode_peminjaman); ?></td>
                                                    <td><?php echo e($loan->user->username ?? '-'); ?></td>
                                                    <td class="text-center"><?php echo e($loan->tanggal_peminjaman); ?></td>
                                                    <td class="text-center">
                                                        <?php echo e($loan->tanggal_pengembalian ? \Carbon\Carbon::parse($loan->tanggal_peminjaman)->format('Y-m-d') : '-'); ?>

                                                    </td>
                                                    <td class="text-center">
                                                        <span class="badge 
                                                            <?php if($loan->status == 'pending'): ?> badge-warning
                                                            <?php elseif($loan->status == 'approved'): ?> badge-primary
                                                            <?php elseif($loan->status == 'returned'): ?> badge-success
                                                            <?php elseif($loan->status == 'late'): ?> badge-danger
                                                            <?php else: ?> badge-secondary
                                                            <?php endif; ?>">
                                                            <?php echo e(ucfirst($loan->status)); ?>

                                                        </span>
                                                    </td>
                                                    <td><?php echo e($loan->keterangan ?? '-'); ?></td>
                                                    <td>
                                                        <div class="d-flex justify-content-center" style="gap: .5rem">
                                                            
                                                            <?php if(Auth::user()->role == 'peminjam'): ?>

                                                            <?php if($loan->status !== 'returned'): ?>
                                                                <a href="<?php echo e(route('return.create', $loan->id)); ?>" class="btn btn-primary" title="Pengembalian">
                                                                    <i class="fas fa-undo"></i>
                                                                </a>
                                                            <?php endif; ?>
                                                            <?php endif; ?>

                                                            <?php if(Auth::user()->role !== 'peminjam'): ?>
                                                                <a href="<?php echo e(route('loans.edit', $loan->id)); ?>" class="btn btn-secondary" title="Ubah">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                            <?php if($loan->status !== 'returned'): ?>
                                                                <a href="<?php echo e(route('return.create', $loan->id)); ?>" class="btn btn-primary" title="Pengembalian">
                                                                    <i class="fas fa-undo"></i>
                                                                </a>
                                                            <?php endif; ?>
                                                            <?php if($loan->status == 'pending'): ?>
                                                            <form action="<?php echo e(route('loans.approval', $loan->id)); ?>" method="POST" class="d-inline"
                                                                onsubmit="return confirm('Yakin ingin mengapproval peminjaman ini?');">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo method_field('PUT'); ?>
                                                                <button type="submit" class="btn btn-success" title="approval">
                                                                    <i class="fas fa-check"></i>
                                                                </button>
                                                            </form>
                                                            <?php endif; ?>
                                                            <?php if($loan->status == 'Return Approval'): ?>
                                                            <form action="<?php echo e(route('loans.approval_return', $loan->id)); ?>" method="POST" class="d-inline"
                                                                onsubmit="return confirm('Yakin ingin mengapproval pengembalian ini?');">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo method_field('PUT'); ?>
                                                                <button type="submit" class="btn btn-success" title="approval">
                                                                    <i class="fas fa-check"></i>
                                                                </button>
                                                            </form>
                                                            <?php endif; ?>
                                                                <form action="<?php echo e(route('loans.destroy', $loan->id)); ?>" method="POST" class="d-inline"
                                                                    onsubmit="return confirm('Yakin ingin menghapus peminjaman ini?');">
                                                                    <?php echo csrf_field(); ?>
                                                                    <?php echo method_field('DELETE'); ?>
                                                                    <button type="submit" class="btn btn-danger" title="Hapus">
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
                                    <?php echo e($loans->links()); ?> 
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

<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Kulyeah\SEMESTER 4\PWEB\Tubes\laravel_paw\resources\views/loans/index.blade.php ENDPATH**/ ?>
<?php if(Auth::user()->role == 'peminjam'): ?>

<?php $__env->startSection('title', 'Form Pengembalian Barang'); ?>
<?php else: ?>
<?php $__env->startSection('title', 'Form  Pengajuan Pengembalian Barang'); ?>

<?php endif; ?>
<?php $__env->startSection('main'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
        <?php if(Auth::user()->role !== 'peminjam'): ?>
            
            <h1><?php echo $__env->yieldContent('title'); ?></h1>
        <?php else: ?>
            <h1> Pengajuan Pengembalian Barang</h1>

        <?php endif; ?>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="<?php echo e(route('returns.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    
                    <div class="mb-3">
                        <label class="form-label"><strong>Kode Peminjaman:</strong></label>
                        <input type="text" class="form-control" value="<?php echo e($loan->kode_peminjaman); ?>" disabled>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><strong>Nama Peminjam:</strong></label>
                        <input type="text" class="form-control" value="<?php echo e($loan->user->username); ?>" disabled>
                    </div>

                    
                    <input type="hidden" name="loan_id" value="<?php echo e($loan->id); ?>">

                    <?php if(Auth::user()->role !== 'peminjam'): ?>
                    <div class="mb-3">
                        <label for="tanggal_pengembalian" class="form-label">Tanggal Pengembalian</label>
                        <input type="date" name="tanggal_pengembalian" class="form-control" required>
                    </div>
                    <?php else: ?>
                    
                    <div class="mb-3">
                        <label for="tanggal_pengembalian" class="form-label">Tanggal Pengembalian</label>
                        <input type="date" name="tanggal_pengembalian" class="form-control" value="<?php echo e(date('Y-m-d')); ?>" readonly>
                    </div>

                  
                    <?php endif; ?>


                    
                    <div class="mb-3">
                        <label for="kondisi_pengembalian" class="form-label">Kondisi Pengembalian</label>
                        <input type="text" name="kondisi_pengembalian" class="form-control" placeholder="Contoh: Baik, Rusak, dll">
                    </div>

                    
                    <div class="mb-3">
                        <label for="catatan" class="form-label">Catatan</label>
                        <textarea name="catatan" class="form-control" rows="3"></textarea>
                    </div>

                    
                    <?php if(Auth::user()->role !== 'peminjam'): ?>

                    <div class="mb-3">
                        <label for="denda" class="form-label">Denda (jika ada)</label>
                        <input type="number" step="0.01" name="denda" class="form-control" value="0">
                    </div>

                    <?php endif; ?>

                    
                    <button type="submit" class="btn btn-success">Simpan Pengembalian</button>
                    <a href="<?php echo e(route('loans.index')); ?>" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/user/Documents/Laravel-9.1/e-loan/resources/views/return/create.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', 'Edit Peminjaman'); ?>

<?php $__env->startPush('styles'); ?>
  <link rel="stylesheet" href="<?php echo e(asset('modules/select2/dist/css/select2.min.css')); ?>">
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
              <form action="<?php echo e(route('loans.update', $loan->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="row g-4">

                  
                  <div class="form-group col-md-6">
                    <label for="user_id">Peminjam <span class="text-danger">*</span></label>
                    <select id="user_id" name="user_id" class="form-control <?php $__errorArgs = ['user_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                      <option value="">-- Pilih Peminjam --</option>
                      <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($user->id); ?>" <?php echo e((old('user_id', $loan->user_id) == $user->id) ? 'selected' : ''); ?>>
                          <?php echo e($user->username); ?>

                        </option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['user_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>

                  
                  <div class="form-group col-md-6">
                    <label for="kode_peminjaman">Kode Peminjaman <span class="text-danger">*</span></label>
                    <input id="kode_peminjaman" type="text" name="kode_peminjaman"
                      class="form-control <?php $__errorArgs = ['kode_peminjaman'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                      value="<?php echo e(old('kode_peminjaman', $loan->kode_peminjaman)); ?>" required>
                    <?php $__errorArgs = ['kode_peminjaman'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>

                  
                  <div class="form-group col-md-6">
                    <label for="tanggal_peminjaman">Tanggal Peminjaman <span class="text-danger">*</span></label>
                    <input id="tanggal_peminjaman" type="date" name="tanggal_peminjaman"
                      class="form-control <?php $__errorArgs = ['tanggal_peminjaman'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                      value="<?php echo e(old('tanggal_peminjaman', \Carbon\Carbon::parse($loan->tanggal_peminjaman)->format('Y-m-d'))); ?>" required>
                      
                    <?php $__errorArgs = ['tanggal_peminjaman'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>

                  
                  <div class="form-group col-md-6">
                    <label for="tanggal_pengembalian">Perkiraan Tanggal Pengembalian</label>
                    <input id="tanggal_pengembalian" type="date" name="tanggal_pengembalian"
                      class="form-control <?php $__errorArgs = ['tanggal_pengembalian'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                      value="<?php echo e(old('tanggal_pengembalian', \Carbon\Carbon::parse($loan->tanggal_pengembalian)->format('Y-m-d'))); ?>"
                    }}">
                    <?php $__errorArgs = ['tanggal_pengembalian'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>

                  
                  <div class="form-group col-md-12">
                    <label for="keterangan">Keterangan</label>
                    <textarea id="keterangan" name="keterangan"
                      class="form-control <?php $__errorArgs = ['keterangan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                      rows="3"><?php echo e(old('keterangan', $loan->keterangan)); ?></textarea>
                    <?php $__errorArgs = ['keterangan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>

                  
                  <div class="form-group col-md-12">
                    <label>Daftar Barang yang Dipinjam <span class="text-danger">*</span></label>
                    <table class="table table-bordered" id="loan-items-table">
                      <thead>
                        <tr>
                          <th>Barang</th>
                          <th>Jumlah</th>
                          <th>Kondisi Saat Dipinjam</th>
                          <th><button type="button" id="add-item" class="btn btn-success btn-sm">Tambah</button></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = old('items', $loan->loanItems); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                            <td>
                              <select name="items[<?php echo e($index); ?>][item_id]" class="form-control" required>
                                <option value="">-- Pilih Barang --</option>
                                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $it): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($it->id); ?>"
                                    <?php echo e((is_array($item) ? $item['item_id'] : $item->item_id) == $it->id ? 'selected' : ''); ?>>
                                    <?php echo e($it->nama_barang); ?>

                                  </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                            </td>
                            <td><input type="number" name="items[<?php echo e($index); ?>][jumlah]" class="form-control" min="1"
                                value="<?php echo e(is_array($item) ? $item['jumlah'] : $item->jumlah); ?>" required></td>
                            <td><input type="text" name="items[<?php echo e($index); ?>][kondisi_saat_dipinjam]" class="form-control"
                                value="<?php echo e(is_array($item) ? $item['kondisi_saat_dipinjam'] : $item->kondisi_saat_dipinjam); ?>"></td>
                            <td><button type="button" class="btn btn-danger btn-sm remove-item">Hapus</button></td>
                          </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>
                    <?php $__errorArgs = ['items'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <div class="text-danger"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>

                  <div class="col-12">
                    <div class="d-flex justify-content-center justify-content-md-end align-items-center" style="gap: .5rem">
                      <a href="<?php echo e(url('/loans')); ?>" class="btn btn-secondary">Kembali</a>
                      <button type="submit" class="btn btn-primary">Perbarui</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
  $(document).ready(function () {
    let index = <?php echo e(count(old('items', $loan->loanItems))); ?>;

    $('#add-item').on('click', function () {
      const newRow = `
        <tr>
          <td>
            <select name="items[${index}][item_id]" class="form-control" required>
              <option value="">-- Pilih Barang --</option>
              <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($item->id); ?>"><?php echo e($item->nama_barang); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </td>
          <td><input type="number" name="items[${index}][jumlah]" class="form-control" min="1" value="1" required></td>
          <td><input type="text" name="items[${index}][kondisi_saat_dipinjam]" class="form-control"></td>
          <td><button type="button" class="btn btn-danger btn-sm remove-item">Hapus</button></td>
        </tr>
      `;
      $('#loan-items-table tbody').append(newRow);
      index++;
    });

    // Hapus baris
    $('#loan-items-table').on('click', '.remove-item', function () {
      if ($('#loan-items-table tbody tr').length > 1) {
        $(this).closest('tr').remove();
      } else {
        alert('Minimal harus ada 1 barang yang dipinjam.');
      }
    });
  });
</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/user/Documents/Laravel-9.1/e-loan/resources/views/loans/edit.blade.php ENDPATH**/ ?>
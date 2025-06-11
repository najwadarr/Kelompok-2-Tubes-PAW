<?php $__env->startSection('title', 'Tambah Peminjaman'); ?>

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
                      <form action="<?php echo e(url('/loans')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="row g-4">
              
                          
                          <div class="form-group col-md-6">
                            <label for="user_id">Peminjam <span class="text-danger">*</span></label>
                            
                                
                                <?php if(Auth::user()->role !== 'peminjam'): ?>
                                <label for="user_id">Pilih Peminjam</label>
                                <select name="user_id" id="user_id" class="form-control">
                                  <option value="">-- Pilih Peminjam --</option>
                                  <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($user->id); ?>" <?php echo e(old('user_id') == $user->id ? 'selected' : ''); ?>>
                                      <?php echo e($user->username); ?>

                                    </option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                              <?php else: ?>
                                
                                <input type="text" class="form-control" value="<?php echo e(Auth::user()->username); ?>" readonly>
                                <input type="hidden" name="user_id" value="<?php echo e(Auth::id()); ?>">
                              <?php endif; ?>


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
                                   value="<?php echo e(old('kode_peminjaman')); ?>" place`holder="Masukkan kode peminjaman" required>
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
                                   value="<?php echo e(old('tanggal_peminjaman') ?? date('Y-m-d')); ?>" required>
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
                                   value="<?php echo e(old('tanggal_pengembalian')); ?>">
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
                                      rows="3"><?php echo e(old('keterangan')); ?></textarea>
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
                                <?php if(old('items')): ?>
                                  <?php $__currentLoopData = old('items'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                      <td>
                                        <select name="items[<?php echo e($index); ?>][item_id]" class="form-control" required>
                                          <option value="">-- Pilih Barang --</option>
                                          <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $it): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($it->id); ?>" <?php echo e($item['item_id'] == $it->id ? 'selected' : ''); ?>><?php echo e($it->nama_barang); ?></option>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                      </td>
                                      <td><input type="number" name="items[<?php echo e($index); ?>][jumlah]" class="form-control" min="1" value="<?php echo e($item['jumlah']); ?>" required></td>
                                      <td><input type="text" name="items[<?php echo e($index); ?>][kondisi_saat_dipinjam]" class="form-control" value="<?php echo e($item['kondisi_saat_dipinjam']); ?>"></td>
                                      <td><button type="button" class="btn btn-danger btn-sm remove-item">Hapus</button></td>
                                    </tr>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                  <tr>
                                    <td>
                                      <select name="items[0][item_id]" class="form-control" required>
                                        <option value="">-- Pilih Barang --</option>
                                        <?php if(!empty($items) && count($items) > 0): ?>
                                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->nama_barang); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <option disabled selected>Tidak ada data barang</option>
                                        <?php endif; ?>
                                      </select>
                                    </td>
                                    <td><input type="number" name="items[0][jumlah]" class="form-control" min="1" value="1" required></td>
                                    <td><input type="text" name="items[0][kondisi_saat_dipinjam]" class="form-control"></td>
                                    <td><button type="button" class="btn btn-danger btn-sm remove-item">Hapus</button></td>
                                  </tr>
                                <?php endif; ?>
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
                              <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                          </div>
              
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              
        </section>
    </div>
<?php $__env->stopSection(); ?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
      let index = <?php echo e(old('items') ? count(old('items')) : 1); ?>;
      const tableBody = document.querySelector('#loan-items-table tbody');
      const addItemBtn = document.getElementById('add-item');
  
      addItemBtn.addEventListener('click', function () {
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
          <td>
            <select name="items[${index}][item_id]" class="form-control" required>
              <option value="">-- Pilih Barang --</option>
              <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </td>
          <td><input type="number" name="items[${index}][jumlah]" class="form-control" min="1" value="1" required></td>
          <td><input type="text" name="items[${index}][kondisi_saat_dipinjam]" class="form-control"></td>
          <td><button type="button" class="btn btn-danger btn-sm remove-item">Hapus</button></td>
        `;
        tableBody.appendChild(newRow);
        index++;
      });
  
      tableBody.addEventListener('click', function(e) {
        if(e.target && e.target.classList.contains('remove-item')) {
          const row = e.target.closest('tr');
          if(tableBody.rows.length > 1) {
            row.remove();
          } else {
            alert('Minimal harus ada 1 barang yang dipinjam.');
          }
        }
      });
    });
  </script>

<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Kulyeah\SEMESTER 4\PWEB\Tubes\laravel_paw\resources\views/loans/create.blade.php ENDPATH**/ ?>
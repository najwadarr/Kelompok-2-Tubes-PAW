<?php $__env->startSection('title', 'Ubah Item'); ?>

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
                            <form action="<?php echo e(url('/items/' . $item->id)); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <div class="row g-4">
            
                                    
                                    <div class="form-group col-md-6">
                                        <label for="nama_barang">Nama Barang <span class="text-danger">*</span></label>
                                        <input id="nama_barang" type="text" name="nama_barang"
                                            class="form-control <?php $__errorArgs = ['nama_barang'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            value="<?php echo e(old('nama_barang', $item->nama_barang)); ?>" required>
                                        <?php $__errorArgs = ['nama_barang'];
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
                                        <label for="kode_barang">Kode Barang <span class="text-danger">*</span></label>
                                        <input id="kode_barang" type="text" name="kode_barang"
                                            class="form-control <?php $__errorArgs = ['kode_barang'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            value="<?php echo e(old('kode_barang', $item->kode_barang)); ?>" required>
                                        <?php $__errorArgs = ['kode_barang'];
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
                                        <label for="kategori_id">Kategori <span class="text-danger">*</span></label>
                                        <select id="kategori_id" name="kategori_id"
                                            class="form-control <?php $__errorArgs = ['kategori_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                            <option value="">-- Pilih Kategori --</option>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($kategori->id); ?>"
                                                    <?php echo e(old('kategori_id', $item->kategori_id) == $kategori->id ? 'selected' : ''); ?>>
                                                    <?php echo e($kategori->nama_kategori); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php $__errorArgs = ['kategori_id'];
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
            
                                    
                                    <div class="form-group col-md-3">
                                        <label for="jumlah">Jumlah <span class="text-danger">*</span></label>
                                        <input id="jumlah" type="number" name="jumlah"
                                            class="form-control <?php $__errorArgs = ['jumlah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            value="<?php echo e(old('jumlah', $item->jumlah)); ?>" required>
                                        <?php $__errorArgs = ['jumlah'];
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
            
                                    
                                    <div class="form-group col-md-3">
                                        <label for="satuan">Satuan <span class="text-danger">*</span></label>
                                        <input id="satuan" type="text" name="satuan"
                                            class="form-control <?php $__errorArgs = ['satuan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            value="<?php echo e(old('satuan', $item->satuan)); ?>" required>
                                        <?php $__errorArgs = ['satuan'];
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
                                        <label for="lokasi">Lokasi</label>
                                        <input id="lokasi" type="text" name="lokasi"
                                            class="form-control <?php $__errorArgs = ['lokasi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            value="<?php echo e(old('lokasi', $item->lokasi)); ?>">
                                        <?php $__errorArgs = ['lokasi'];
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
                                        <label for="kondisi">Kondisi <span class="text-danger">*</span></label>
                                        <select id="kondisi" name="kondisi"
                                            class="form-control <?php $__errorArgs = ['kondisi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                            <?php $__currentLoopData = ['baik', 'rusak ringan', 'rusak berat']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kondisi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($kondisi); ?>"
                                                    <?php echo e(old('kondisi', $item->kondisi) == $kondisi ? 'selected' : ''); ?>>
                                                    <?php echo e(ucfirst($kondisi)); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php $__errorArgs = ['kondisi'];
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
                                        <label for="status">Status <span class="text-danger">*</span></label>
                                        <select id="status" name="status"
                                            class="form-control <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                            <option value="tersedia" <?php echo e(old('status', $item->status) == 'tersedia' ? 'selected' : ''); ?>>Tersedia</option>
                                            <option value="dipinjam" <?php echo e(old('status', $item->status) == 'dipinjam' ? 'selected' : ''); ?>>Dipinjam</option>
                                        </select>
                                        <?php $__errorArgs = ['status'];
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
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea id="deskripsi" name="deskripsi"
                                            class="form-control <?php $__errorArgs = ['deskripsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            rows="3"><?php echo e(old('deskripsi', $item->deskripsi)); ?></textarea>
                                        <?php $__errorArgs = ['deskripsi'];
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
                                        <label for="foto">Ganti Foto (opsional)</label>
                                        <input id="foto" type="file" name="foto"
                                            class="form-control <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            accept="image/*">
                                        <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            
                                        <?php if($item->foto): ?>
                                            <div class="mt-2">
                                                <img src="<?php echo e(asset('storage/' . $item->foto)); ?>" alt="Foto Barang" width="150">
                                            </div>
                                        <?php endif; ?>
                                    </div>
            
                                    
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center justify-content-md-end align-items-center gap-2">
                                            <a href="<?php echo e(url('/items')); ?>" class="btn btn-secondary">Batal</a>
                                            &nbsp;
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
    <script src="<?php echo e(asset('modules/select2/dist/js/select2.full.min.js')); ?>"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Validasi NIK
            var nikInput = document.getElementById('nik');
            var nikError = document.getElementById('nik-error');
            nikInput.addEventListener('input', function() {
                // Validasi panjang NIK
                if (this.value.trim().length !== 16) {
                    nikInput.classList.add('is-invalid');
                    nikError.textContent = "NIK harus memiliki 16 karakter.";
                } else {
                    nikInput.classList.remove('is-invalid');
                    nikError.textContent = ""; // Hapus pesan error jika valid
                }
            });
        });

        $(document).ready(function() {
            $('#city, #subdistrict, #village, #hamlet, #address').prop('disabled', true);

            const getProvincies = "<?php echo e(url('/get-provinces')); ?>";
            const getCities = "<?php echo e(url('/get-cities')); ?>";
            const getDistricts = "<?php echo e(url('/get-districts')); ?>";
            const getVillages = "<?php echo e(url('/get-villages')); ?>";

            const oldProvince = $('#province').data('old');
            const oldCity = $('#city').data('old');
            const oldSubdistrict = $('#subdistrict').data('old');
            const oldVillage = $('#village').data('old');

            // Ambil nilai lama dari atribut data-old
            const oldHamlet = $('#hamlet').data('old');
            const oldAddress = $('#address').data('old');

            // Jika ada nilai lama untuk hamlet, set value dan enable field
            if (oldHamlet) {
                $('#hamlet').val(oldHamlet).prop('disabled', false);
            }

            // Jika ada nilai lama untuk address, set value dan enable field
            if (oldAddress) {
                $('#address').val(oldAddress).prop('disabled', false);
            }

            // Load Provinsi
            $('#province').html('<option>Memuat...</option>');
            $.get(getProvincies)
                .done(function(data) {
                    $('#province').html('<option value="">-- Pilih Provinsi --</option>');
                    data.forEach(p => {
                        const selected = (p.id == oldProvince) ? 'selected' : '';
                        $('#province').append(`<option value="${p.id}" ${selected}>${p.name}</option>`);
                    });

                    if (oldProvince) {
                        loadCities(oldProvince);
                    }
                })
                .fail(() => {
                    $('#province').html('<option value="">Gagal memuat provinsi</option>');
                });

            // Change event
            $('#province').on('change', function() {
                const val = $(this).val();
                resetDropdowns(['#city', '#subdistrict', '#village']);
                disableInputs(['#city', '#subdistrict', '#village']);
                if (val) loadCities(val);
            });

            $('#city').on('change', function() {
                const val = $(this).val();
                resetDropdowns(['#subdistrict', '#village']);
                disableInputs(['#subdistrict', '#village']);
                if (val) loadDistricts(val);
            });

            $('#subdistrict').on('change', function() {
                const val = $(this).val();
                resetDropdowns(['#village']);
                disableInputs(['#village']);
                if (val) loadVillages(val);
            });

            $('#village').on('change', function() {
                const val = $(this).val();
                if (val) {
                    $('#hamlet').prop('disabled', false);
                } else {
                    $('#hamlet').prop('disabled', true).val('');
                    $('#address').prop('disabled', true).val('');
                }
            });

            $('#hamlet').on('input', function() {
                const val = $(this).val();
                if (val.trim() !== '') {
                    $('#address').prop('disabled', false);
                } else {
                    $('#address').prop('disabled', true).val('');
                }
            });

            // Load cities
            function loadCities(provinceId) {
                $('#city').html('<option>Memuat...</option>');
                $.get(getCities + '/' + provinceId)
                    .done(function(data) {
                        $('#city').html('<option value="">-- Pilih Kota/Kabupaten --</option>');
                        data.forEach(c => {
                            const selected = (c.id == oldCity) ? 'selected' : '';
                            $('#city').append(`<option value="${c.id}" ${selected}>${c.name}</option>`);
                        });
                        $('#city').prop('disabled', false);

                        if (oldCity) {
                            loadDistricts(oldCity);
                        }
                    })
                    .fail(() => {
                        $('#city').html('<option value="">Gagal memuat kota</option>');
                    });
            }

            function loadDistricts(cityId) {
                $('#subdistrict').html('<option>Memuat...</option>');
                $.get(getDistricts + '/' + cityId)
                    .done(function(data) {
                        $('#subdistrict').html('<option value="">-- Pilih Kecamatan --</option>');
                        data.forEach(d => {
                            const selected = (d.id == oldSubdistrict) ? 'selected' : '';
                            $('#subdistrict').append(
                                `<option value="${d.id}" ${selected}>${d.name}</option>`);
                        });
                        $('#subdistrict').prop('disabled', false);

                        if (oldSubdistrict) {
                            loadVillages(oldSubdistrict);
                        }
                    })
                    .fail(() => {
                        $('#subdistrict').html('<option value="">Gagal memuat kecamatan</option>');
                    });
            }

            function loadVillages(districtId) {
                $('#village').html('<option>Memuat...</option>');
                $.get(getVillages + '/' + districtId)
                    .done(function(data) {
                        $('#village').html('<option value="">-- Pilih Kelurahan/Desa --</option>');
                        data.forEach(v => {
                            const selected = (v.id == oldVillage) ? 'selected' : '';
                            $('#village').append(
                                `<option value="${v.id}" ${selected}>${v.name}</option>`);
                        });
                        $('#village').prop('disabled', false);
                    })
                    .fail(() => {
                        $('#village').html('<option value="">Gagal memuat kelurahan</option>');
                    });
            }

            function resetDropdowns(ids) {
                ids.forEach(id => {
                    $(id).html('<option value="">-- Pilih --</option>');
                });
            }

            function disableInputs(ids) {
                ids.forEach(id => {
                    $(id).prop('disabled', true).val('');
                });
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/user/Documents/Laravel-9.1/e-loan/resources/views/items/edit.blade.php ENDPATH**/ ?>
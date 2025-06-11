<?php $__env->startSection('title', 'Registrasi'); ?>

<?php $__env->startPush('styles'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('main'); ?>
    <form method="POST" action="<?php echo e(route('auth-register')); ?>">
        <?php echo csrf_field(); ?>


        <div class="form-group">
            <label for="fullname" class="form-label">Nama Lengkap<span class="text-danger">*</span></label>
            <input id="fullname" type="text" class="form-control <?php $__errorArgs = ['fullname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                name="fullname" value="<?php echo e(old('fullname')); ?>" placeholder="Jane Doe">
            <?php $__errorArgs = ['fullname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-feedback">
                    <?php echo e($message); ?>

                </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group">
            <label for="phone_number">Nomor HP/WA (AKTIF) <span class="text-danger">*</span></label>
            <input id="phone_number" type="tel" class="form-control <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                name="phone_number" value="<?php echo e(old('phone_number')); ?>" placeholder="+628xxxxxxxxxx">
            <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-feedback">
                    <?php echo e($message); ?>

                </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group">
            <label for="username" class="form-label">Nama Pengguna <span class="text-danger">*</span></label>
            <input id="username" type="text" class="form-control <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                name="username" value="<?php echo e(old('username')); ?>" placeholder="jane_doe">
            <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-feedback">
                    <?php echo e($message); ?>

                </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Kata Sandi <span class="text-danger">*</span></label>
            <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                name="password">
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-feedback">
                    <?php echo e($message); ?>

                </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <div class="invalid-feedback" id="password-error"></div>
        </div>

        <div class="form-group">
            <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi <span
                    class="text-danger">*</span></label>
            <input id="password_confirmation" type="password"
                class="form-control <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password_confirmation">
            <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-feedback">
                    <?php echo e($message); ?>

                </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <div class="invalid-feedback" id="password-confirmation-error"></div>
        </div>

        <button type="submit" class="btn btn-primary btn-lg w-100 mb-4">Registrasi</button>

        <div class="text-center">Sudah punya akun? <a href="<?php echo e(route('login')); ?>">Masuk</a></div>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Validasi NIK
            var nikInput = document.getElementById('nik');
            var nikError = document.getElementById('nik-error');
            nikInput.addEventListener('input', function() {
                if (this.value.trim().length !== 16) {
                    nikInput.classList.add('is-invalid');
                    nikError.textContent = "NIK harus memiliki 16 karakter.";
                } else {
                    nikInput.classList.remove('is-invalid');
                    nikError.textContent = ""; // Hapus pesan error jika valid
                }
            });

            // Validasi Password
            var passwordInput = document.getElementById('password');
            var passwordError = document.getElementById('password-error');
            passwordInput.addEventListener('input', function() {
                if (this.value.length < 8) {
                    passwordInput.classList.add('is-invalid');
                    passwordError.textContent = "Kata sandi minimal 8 karakter.";
                } else {
                    passwordInput.classList.remove('is-invalid');
                    passwordError.textContent = ""; // Hapus pesan error
                }
            });

            // Validasi Konfirmasi Password
            var passwordConfirmationInput = document.getElementById('password_confirmation');
            var passwordConfirmationError = document.getElementById('password-confirmation-error');

            if (passwordConfirmationInput && passwordConfirmationError) {
                passwordConfirmationInput.addEventListener('input', function() {
                    if (this.value !== passwordInput.value) {
                        passwordConfirmationInput.classList.add('is-invalid');
                        passwordConfirmationError.textContent = "Konfirmasi kata sandi tidak sesuai.";
                    } else {
                        passwordConfirmationInput.classList.remove('is-invalid');
                        passwordConfirmationError.textContent = ""; // Hapus pesan error
                    }
                });
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.auth', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/user/Documents/Laravel-9.1/e-loan/resources/views/auth/register.blade.php ENDPATH**/ ?>
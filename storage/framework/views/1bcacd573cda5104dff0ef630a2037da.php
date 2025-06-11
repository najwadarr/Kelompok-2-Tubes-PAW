<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Peminjaman | <?php echo $__env->yieldContent('title'); ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo e(asset('img/logo.png')); ?>" type="image/png">
    <link rel="apple-touch-icon" href="<?php echo e(asset('img/logo.png')); ?>">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?php echo e(asset('modules/bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('modules/fontawesome/css/all.min.css')); ?>">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/components.css')); ?>">
    <style>
        .dropdown-toggle-custom:after {
            display: none !important;
        }

        .text-wrap-overflow {
            white-space: normal;
            word-wrap: break-word;
            overflow-wrap: break-word;
            width: 100%;
            min-width: 200px;
            max-width: 400px;
            max-height: 100px;
            overflow-y: auto;
            box-sizing: border-box;
        }
    </style>

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            <!-- Navbar -->
            <?php echo $__env->make('components.dashboard-navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

            <!-- Sidebar -->
            <?php echo $__env->make('components.dashboard-sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

            <!-- Main Content -->
            <?php echo $__env->yieldContent('main'); ?>

            <!-- Footer -->
            <?php echo $__env->make('components.dashboard-footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>

        <?php echo $__env->make('components.help-center-modal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>

    <!-- General JS Scripts -->
    <script src="<?php echo e(asset('modules/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('modules/popper.js')); ?>"></script>
    <script src="<?php echo e(asset('modules/tooltip.js')); ?>"></script>
    <script src="<?php echo e(asset('modules/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('modules/nicescroll/jquery.nicescroll.min.js')); ?>"></script>
    <script src="<?php echo e(asset('modules/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/stisla.js')); ?>"></script>

    <!-- JS Libraies -->
    <script src="<?php echo e(asset('modules/sweetalert/sweetalert.min.js')); ?>"></script>

    <!-- Template JS File -->
    <script src="<?php echo e(asset('js/scripts.js')); ?>"></script>
    <script src="<?php echo e(asset('js/custom.js')); ?>"></script>

    <?php echo $__env->yieldPushContent('scripts'); ?>

    <script>
        // Handle logout
        function handleLogout(event) {
            event.preventDefault();

            swal({
                title: 'Konfirmasi Keluar',
                text: 'Apakah Anda ingin mengakhiri sesi ini?',
                icon: 'warning',
                buttons: {
                    cancel: 'Batal',
                    confirm: {
                        text: 'Ya, keluar!',
                        value: true,
                    }
                }
            }).then((result) => {
                if (result) {
                    document.getElementById('logout-form').submit();
                }
            });
        }

        // Handle messages
        document.addEventListener('DOMContentLoaded', function() {
            let title = '';
            let htmlContent = '';
            let icon = '';

            <?php if(session('success')): ?>
                title = 'Berhasil!';
                htmlContent = `<?php echo session('success'); ?>`;
                icon = 'success';
            <?php elseif(session('error')): ?>
                title = 'Gagal!';
                htmlContent = `<?php echo session('error'); ?>`;
                icon = 'error';
            <?php elseif(session('warning')): ?>
                title = 'Peringatan!';
                htmlContent = `<?php echo session('warning'); ?>`;
                icon = 'warning';
            <?php endif; ?>

            if (title && htmlContent && icon) {
                const content = document.createElement('div');
                content.innerHTML = htmlContent;

                swal({
                    title: title,
                    content: content,
                    icon: icon,
                    button: "OK",
                    timer: 5000
                });
            }
        });
    </script>

    <?php if(Auth::user() && Auth::user()->role === 'admin'): ?>
        <script>
            let pollingInterval;

            function updateNotifUI(response) {
                let total = response.count;
                let displayCount = total > 3 ? '3+' : total;

                $('#notif-count').text(displayCount);

                let html = '';
                if (total === 0) {
                    $('.notification-toggle').removeClass('beep');
                    html += `
                    <div class="dropdown-item text-center text-muted">
                        Tidak ada notifikasi.
                    </div>`;
                } else {
                    $('.notification-toggle').addClass('beep');
                    response.data.forEach(function(item) {
                        html += `
                        <a href="<?php echo e(url('/parent-data?status=not-active')); ?>" class="dropdown-item">
                            <div class="dropdown-item-icon bg-warning text-white">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <div class="dropdown-item-desc">
                                ${item.name}
                                <div class="time">${item.time} <span class="bullet"></span> Belum Diverifikasi</div>
                            </div>
                        </a>`;
                    });
                }

                $('#notif-list').html(html);
            }


            function startPolling() {
                pollingInterval = setInterval(() => {
                    if (!document.hidden) {
                        // getNotification();
                    }
                }, 60000); // 60 detik
            }

            document.addEventListener('visibilitychange', function() {
                if (document.hidden) {
                    clearInterval(pollingInterval); // Hentikan polling saat tab tidak aktif
                } else {
                    startPolling(); // Mulai ulang polling saat tab aktif
                }
            });

            $(document).ready(function() {
                // getNotification(); // Panggil pertama kali saat halaman dimuat
                startPolling(); // Mulai polling jika tab aktif
            });
        </script>
    <?php endif; ?>
</body>

</html>
<?php /**PATH /Users/user/Documents/Laravel-9.1/e-loan/resources/views/layouts/dashboard.blade.php ENDPATH**/ ?>
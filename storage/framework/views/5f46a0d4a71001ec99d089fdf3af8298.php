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
    <link rel="stylesheet" href="<?php echo e(asset('css/style.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/components.css')); ?>">
    <style>
        .auth-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 50vw;
        }

        @media screen and (max-width: 992px) {
            .auth-wrapper {
                width: 100%;
            }
        }

        .min-vh-100 {
            min-height: 100vh;
        }

        .background-walk-y {
            background-repeat: no-repeat;
            background-position: 0 0%;
            -webkit-animation-name: backgroundWalkY;
            animation-name: backgroundWalkY;
            -webkit-animation-duration: 70s;
            animation-duration: 70s;
            -webkit-animation-iteration-count: infinite;
            animation-iteration-count: infinite;
            -webkit-animation-direction: alternate;
            animation-direction: alternate;
            -webkit-animation-fill-mode: forwards;
            animation-fill-mode: forwards;
            -webkit-animation-timing-function: linear;
            animation-timing-function: linear;
            background-size: 100%;
            width: 100% !important;
        }

        @-webkit-keyframes backgroundWalkY {
            0% {
                background-position: 0 0%;
            }

            100% {
                background-position: 0 100%;
            }
        }

        @keyframes backgroundWalkY {
            0% {
                background-position: 0 0%;
            }

            100% {
                background-position: 0 100%;
            }
        }

        .overlay-gradient-bottom:after {
            content: " ";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: false;
            background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0) 65%, rgba(0, 0, 0, 0.65) 100%);
            z-index: 1;
        }

        .overlay-gradient-top:after {
            content: " ";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: false;
            background-image: linear-gradient(to top, rgba(0, 0, 0, 0) 65%, rgba(0, 0, 0, 0.65) 100%);
            z-index: 1;
        }

        .absolute-bottom-left {
            position: absolute;
            left: 0;
            bottom: 0;
            z-index: 2 !important;
        }
    </style>

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="d-flex align-items-stretch">
                <div class="auth-wrapper min-vh-100 bg-white">
                    <div class="row g-4 p-5 m-0">
                        <div class="col-12 mb-4">
                            <div class="d-flex justify-content-center align-items-center mt-3 mb-2" style="gap: .5rem">
                                <img src="<?php echo e(asset('img/logo.png')); ?>" alt="Logo" class="rounded" height="24">
                                <h5 class="font-weight-bold mb-0" style="color: #6777ef;">Peminjaman</h5>
                            </div>

                            <h2 class="text-center text-dark">
                                <?php echo e(Request::is('register') ? 'Registrasi' : 'Masuk'); ?>

                            </h2>
                        </div>
                        <div class="col-12 mb-4">
                            <?php if(session()->has('success')): ?>
                                <div class="alert alert-success alert-dismissible fade show text-center mb-4"
                                    role="alert">
                                    <i class='fa-solid fa-circle-check mr-1'></i> <?php echo e(session('success')); ?>

                                </div>
                            <?php endif; ?>

                            <?php if(session()->has('error')): ?>
                                <div class="alert alert-danger alert-dismissible fade show text-center mb-4"
                                    role="alert">
                                    <i class='fa-solid fa-circle-xmark mr-1'></i> <?php echo e(session('error')); ?>

                                </div>
                            <?php endif; ?>

                            <!-- Content -->
                            <?php echo $__env->yieldContent('main'); ?>
                            <!-- End content -->
                        </div>
                        <div class="col-12">
                            <div class="d-flex flex-wrap justify-content-center text-center text-small mt-4"
                                style="gap: .25rem">
                                <span>&copy; <?php echo e(date('Y')); ?> Peminjaman</span>
                                <span class="bullet"></span>
                                <span><?php echo e($site->village_name); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="min-vh-100 background-walk-y overlay-gradient-bottom d-none d-lg-inline position-relative"
                    data-background="<?php echo e(asset('img/pwt.png')); ?>">
                    <div class="absolute-bottom-left" style="left: 1rem; bottom: 1rem">
                        
                    </div>
                </div>
            </div>
        </div>

        <!-- Help center modal button -->
        <div class="position-fixed" style="bottom: 1rem; right: 1rem; z-index: 99999;" data-toggle="tooltip"
            title="Pusat Bantuan">
            <button type="button" class="btn btn-lg btn-success p-2 shadow-sm" data-toggle="modal"
                data-target="#helpCenterModal">
                <i class="fa-solid fa-comments" style="font-size: 24px"></i>
            </button>
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

    <!-- Template JS File -->
    <script src="<?php echo e(asset('js/scripts.js')); ?>"></script>
    <script src="<?php echo e(asset('js/custom.js')); ?>"></script>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html>
<?php /**PATH C:\Kulyeah\SEMESTER 4\PWEB\Tubes\laravel_paw\resources\views/layouts/auth.blade.php ENDPATH**/ ?>
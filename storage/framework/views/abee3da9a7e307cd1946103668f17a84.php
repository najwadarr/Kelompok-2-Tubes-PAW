<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?php echo e(url('/dashboard')); ?>" style="color: #6777ef;">Peminjaman</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?php echo e(url('/dashboard')); ?>">
                <img src="<?php echo e(asset('img/logo.png')); ?>" alt="Logo" class="rounded" height="32">
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Umum</li>
            <li class="<?php echo e(Request::is('dashboard') ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(url('/dashboard')); ?>"><i class="fas fa-fire"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <?php if(auth()->check()): ?>
                <?php
                    $role = auth()->user()->role;
                    $isAdminOrVillageHead = in_array($role, ['admin', 'village_head']);
                    $isAdminOrMidwifeOrVillageHead = in_array($role, ['admin', 'midwife', 'village_head']);
                    $isAdminOrOfficerOrVillageHead = in_array($role, ['admin', 'officer', 'village_head']);
                ?>

                <li class="menu-header">Master</li>

                <?php if($role !== 'peminjam'): ?>
                    <li class="<?php echo e(Request::is('categories*') ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(url('/categories')); ?>">
                            <i class="fas fa-tags"></i>
                            <span>Master Kategori</span>
                        </a>
                    </li>
                <?php endif; ?>
                
                <?php if($role !== 'peminjam'): ?>
                    <li class="<?php echo e(Request::is('items*') ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(url('/items')); ?>">
                            <i class="fas fa-box"></i>
                            <span>Master Barang</span>
                        </a>
                    </li>
                <?php endif; ?>

                <li class="<?php echo e(Request::is('loans*') ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(url('/loans')); ?>">
                        <i class="fas fa-hand-holding"></i>
                        <span>Peminjaman</span>
                    </a>
                </li>

                <li class="<?php echo e(Request::is('return*') ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(url('/returns')); ?>">
                        <i class="fas fas fa-undo"></i>
                        <span>Pengembalian</span>
                    </a>
                </li>

                
            <?php endif; ?>

          
        </ul>

        <div class="my-4 px-3 hide-sidebar-mini">
            <!-- Help center modal button -->
            
        </div>
    </aside>
</div>
<?php /**PATH C:\Kulyeah\SEMESTER 4\PWEB\Tubes\laravel_paw\resources\views/components/dashboard-sidebar.blade.php ENDPATH**/ ?>
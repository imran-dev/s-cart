<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo e(route('admin.home')); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><?php echo sc_config('ADMIN_LOGO_MINI', sc_config('ADMIN_NAME')); ?></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><?php echo sc_config('ADMIN_LOGO', sc_config('ADMIN_NAME')); ?></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <?php echo $__env->make('admin.component.language', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li><a target="_new" title="Home" href="<?php echo e(route('home')); ?>"><i class="fa fa-home fa-1x" aria-hidden="true"></i></a></li>
          <?php echo $__env->make('admin.component.notice', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src=" <?php echo e(asset(Admin::user()->avatar)); ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo e(Admin::user()->name); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo e(asset(Admin::user()->avatar)); ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo e(Admin::user()->name); ?>

                  <small><?php echo e(trans('user.member_since')); ?>  <?php echo e(Admin::user()->created_at); ?></small>
                </p>
              </li>
              <!-- Menu Footer-->
                <li class="user-footer">
                    <div class="pull-left">
                        <a href="<?php echo e(route('admin.setting')); ?>" class="btn btn-default btn-flat"><?php echo e(trans('admin.setting')); ?></a>
                    </div>
                    <div class="pull-right">
                        <a href="<?php echo e(route('admin.logout')); ?>" class="btn btn-default btn-flat"><?php echo e(trans('admin.logout')); ?></a>
                    </div>
                </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
<?php /**PATH E:\laragon\www\s-cart\resources\views/admin/header.blade.php ENDPATH**/ ?>
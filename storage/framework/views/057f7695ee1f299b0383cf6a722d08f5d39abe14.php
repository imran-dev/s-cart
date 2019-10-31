<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo e(sc_config('ADMIN_TITLE')); ?> | <?php echo e($title??''); ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo e(asset('admin/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css')); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(asset('admin/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css')); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo e(asset('admin/AdminLTE/bower_components/Ionicons/css/ionicons.min.css')); ?>">

<?php if(!Admin::isLoginPage() && !Admin::isLogoutPage()): ?>
  <link rel="stylesheet" href="<?php echo e(asset('admin/AdminLTE/dist/css/skins/_all-skins.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('admin/AdminLTE/bower_components/morris.js/morris.css')); ?>">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo e(asset('admin/AdminLTE/bower_components/jvectormap/jquery-jvectormap.css')); ?>">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo e(asset('admin/AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')); ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo e(asset('admin/AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.css')); ?>">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo e(asset('admin/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('admin/css/css.css')); ?>">

<?php endif; ?>



  <?php echo $__env->yieldPushContent('styles'); ?>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('admin/AdminLTE/dist/css/AdminLTE.min.css')); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo e(asset('admin/AdminLTE/plugins/iCheck/square/blue.css')); ?>">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<?php
  $mode = (sc_config('APP_DEBUG') === 'on')?'red':'blue';
?>
<body class="hold-transition <?php echo e((Admin::isLoginPage() || Admin::isLogoutPage())?'login-page':'skin-'.$mode.' sidebar-mini'); ?>">
  <div class="wrapper">
  <?php if((Admin::isLoginPage() || Admin::isLogoutPage())): ?>
    <?php echo $__env->yieldContent('main'); ?>
  <?php else: ?>
    <?php echo $__env->make('admin.component.exception', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="content-wrapper">
      <div id="app">
        <section class="content-header">
           <h1>
              <i class="<?php echo e($icon??''); ?>" aria-hidden="true"></i> <?php echo $title??''; ?>

              <small><?php echo $sub_title??''; ?></small>
           </h1>
           <div class="more_info"><?php echo $more_info??''; ?></div>
           <!-- breadcrumb start -->
           <ol class="breadcrumb">
              <li><a href="<?php echo e(route('admin.home')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('admin.home')); ?></a></li>
              <li><?php echo $title??''; ?></li>
           </ol>
           <!-- breadcrumb end -->
        </section>
        <section class="content">
             <?php echo $__env->yieldContent('main'); ?>
         </section>
        </div>
      </div>

    <?php echo $__env->make('admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div id="loading">
          <div id="overlay" class="overlay"><i class="fa fa-spinner fa-pulse fa-5x fa-fw "></i></div>
   </div>

  <?php endif; ?>
  </div>

<?php $__env->startSection('version-jquery'); ?>
<!-- jQuery 3 -->
<script src="<?php echo e(asset('admin/AdminLTE/bower_components/jquery/dist/jquery.min.js')); ?>"></script>
<?php echo $__env->yieldSection(); ?>

<script src="<?php echo e(asset('admin/AdminLTE/bower_components/jquery-ui/jquery-ui.min.js')); ?>"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo e(asset('admin/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
<!-- iCheck -->
<script src="<?php echo e(asset('admin/AdminLTE/plugins/iCheck/icheck.min.js')); ?>"></script>

<?php if(!Admin::isLoginPage() && !Admin::isLogoutPage()): ?>
<script src="<?php echo e(asset('admin/AdminLTE/bower_components/raphael/raphael.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/AdminLTE/bower_components/morris.js/morris.min.js')); ?>"></script>
<!-- Sparkline -->
<script src="<?php echo e(asset('admin/AdminLTE/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')); ?>"></script>
<!-- jvectormap -->
<script src="<?php echo e(asset('admin/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')); ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo e(asset('admin/AdminLTE/bower_components/jquery-knob/dist/jquery.knob.min.js')); ?>"></script>
<!-- daterangepicker -->
<script src="<?php echo e(asset('admin/AdminLTE/bower_components/moment/min/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
<!-- datepicker -->
<script src="<?php echo e(asset('admin/AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo e(asset('admin/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')); ?>"></script>
<!-- Slimscroll -->
<script src="<?php echo e(asset('admin/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')); ?>"></script>
<!-- FastClick -->
<script src="<?php echo e(asset('admin/AdminLTE/bower_components/fastclick/lib/fastclick.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('admin/AdminLTE/dist/js/adminlte.min.js')); ?>"></script>

<script src="<?php echo e(asset('admin/plugin/sweetalert2.all.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/plugin/promise-polyfill.js')); ?>"></script>
<?php endif; ?>

<?php echo $__env->yieldPushContent('scripts'); ?>
<?php echo $__env->make('admin.component.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.component.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html>
<?php /**PATH E:\laragon\www\s-cart\resources\views/admin/layout.blade.php ENDPATH**/ ?>
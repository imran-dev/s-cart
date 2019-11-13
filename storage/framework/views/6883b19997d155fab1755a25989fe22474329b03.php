<?php $__env->startSection('main'); ?>
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo e(route('admin.home')); ?>"><b><?php echo e(sc_config('ADMIN_NAME')); ?></b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
   <p class="login-box-msg"><?php echo e(trans('admin.login')); ?></p>

    <form action="<?php echo e(route('admin.login')); ?>" method="post">
      <div class="form-group has-feedback <?php echo !$errors->has('username') ?: 'has-error'; ?>">

        <?php if($errors->has('username')): ?>
          <?php $__currentLoopData = $errors->get('username'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i><?php echo e($message); ?></label><br>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

        <input type="text" class="form-control" placeholder="<?php echo e(trans('admin.username')); ?>" name="username" value="<?php echo e(old('username')); ?>">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback <?php echo !$errors->has('password') ?: 'has-error'; ?>">

        <?php if($errors->has('password')): ?>
          <?php $__currentLoopData = $errors->get('password'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i><?php echo e($message); ?></label><br>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

        <input type="password" class="form-control" placeholder="<?php echo e(trans('admin.password')); ?>" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember" value="1" <?php echo e((!old('username') || old('remember')) ? 'checked' : ''); ?>>
              <?php echo e(trans('admin.remember_me')); ?>

            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
          <button type="submit" class="btn btn-primary btn-block btn-flat"><?php echo e(trans('admin.login')); ?></button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('styles'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\anytimebazar\resources\views/admin/auth/login.blade.php ENDPATH**/ ?>
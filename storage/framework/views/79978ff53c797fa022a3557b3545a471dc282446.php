<?php $__env->startSection('main'); ?>
   <div class="row">
      <div class="col-md-12">
         <div class="box">
                <div class="box-header with-border">
                    <h2 class="box-title"><?php echo e($title_description??''); ?></h2>

                    <div class="box-tools">
                        <div class="btn-group pull-right" style="margin-right: 5px">
                            <a href="<?php echo e(route('admin_discount.index')); ?>" class="btn  btn-flat btn-default" title="List"><i class="fa fa-list"></i><span class="hidden-xs"> <?php echo e(trans('admin.back_list')); ?></span></a>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="<?php echo e($url_action); ?>" method="post" accept-charset="UTF-8" class="form-horizontal" id="form-main"  enctype="multipart/form-data">


                    <div class="box-body">
                        <div class="fields-group">


                    <div class="box-body">
                        <div class="fields-group">

                            <div class="form-group   <?php echo e($errors->has('code') ? ' has-error' : ''); ?>">
                                <label for="code" class="col-sm-2  control-label"><?php echo e(trans('Extensions\Total\Discount.code')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-ticket fa-fw"></i></span>
                                        <input type="text" id="code" name="code" value="<?php echo e(old()?old('code'):$discount['code']??''); ?>" class="form-control" placeholder="" />
                                    </div>
                                        <?php if($errors->has('code')): ?>
                                            <span class="help-block">
                                                <i class="fa fa-info-circle"></i>  <?php echo e($errors->first('code')); ?>

                                            </span>
                                        <?php else: ?>
                                            <span class="help-block">
                                                <i class="fa fa-info-circle"></i>  <?php echo e(trans('Extensions\Total\Discount.admin.code_helper')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group   <?php echo e($errors->has('reward') ? ' has-error' : ''); ?>">
                                <label for="reward" class="col-sm-2  control-label"><?php echo e(trans('Extensions\Total\Discount.reward')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-file-text-o fa-fw"></i></span>
                                        <input type="text" id="reward" name="reward" value="<?php echo e(old()?old('reward'):$discount['reward']??''); ?>" class="form-control" placeholder="" />
                                    </div>
                                        <?php if($errors->has('reward')): ?>
                                            <span class="help-block">
                                                <?php echo e($errors->first('reward')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>


                            <div class="form-group   <?php echo e($errors->has('type') ? ' has-error' : ''); ?>">
                                <label for="type" class="col-sm-2  control-label"><?php echo e(trans('Extensions\Total\Discount.type')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                    <label class="radio-inline"><input type="radio" name="type" value="point" <?php echo e((old('type',$discount['type']??'') == 'point')?'checked':''); ?>> Point</label>
                                    <label class="radio-inline"><input type="radio" name="type" value="percent" <?php echo e((old('type',$discount['type']??'') == 'percent')?'checked':''); ?>> Percent (%)</label>
                                    </div>
                                        <?php if($errors->has('type')): ?>
                                            <span class="help-block">
                                                <?php echo e($errors->first('type')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>


                            <div class="form-group   <?php echo e($errors->has('data') ? ' has-error' : ''); ?>">
                                <label for="data" class="col-sm-2  control-label"><?php echo e(trans('Extensions\Total\Discount.data')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                        <input type="text" id="data" name="data" value="<?php echo e(old()?old('data'):$discount['data']??''); ?>" class="form-control" placeholder="" />
                                    </div>
                                        <?php if($errors->has('data')): ?>
                                            <span class="help-block">
                                                <?php echo e($errors->first('data')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>



                            <div class="form-group   <?php echo e($errors->has('limit') ? ' has-error' : ''); ?>">
                                <label for="limit" class="col-sm-2  control-label"><?php echo e(trans('Extensions\Total\Discount.limit')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                        <input type="number" id="limit" name="limit" value="<?php echo e(old()?old('limit'):$discount['limit']??'1'); ?>" class="form-control" placeholder="" />
                                    </div>
                                        <?php if($errors->has('limit')): ?>
                                            <span class="help-block">
                                                <?php echo e($errors->first('limit')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>



                            <div class="form-group   <?php echo e($errors->has('login') ? ' has-error' : ''); ?>">
                                <label for="login" class="col-sm-2  control-label"><?php echo e(trans('Extensions\Total\Discount.login')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <input type="checkbox"  id="login" name="login" <?php echo e(old('login',(empty($discount['login'])?0:1))?'checked':''); ?>  placeholder="" class="check-form" />
                                    </div>
                                        <?php if($errors->has('login')): ?>
                                            <span class="help-block">
                                                <?php echo e($errors->first('login')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group   <?php echo e($errors->has('expires_at') ? ' has-error' : ''); ?>">
                                <label for="expires_at" class="col-sm-2  control-label"><?php echo e(trans('Extensions\Total\Discount.expires_at')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                        <input type="text" id="expires_at" name="expires_at" value="<?php echo e(old()?old('expires_at'):$discount['expires_at']??''); ?>" class="form-control date_time" style="width: 100px;" placeholder="" />
                                    </div>
                                        <?php if($errors->has('expires_at')): ?>
                                            <span class="help-block">
                                                <?php echo e($errors->first('expires_at')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group  ">
                                <label for="status" class="col-sm-2  control-label"><?php echo e(trans('Extensions\Total\Discount.status')); ?></label>
                                <div class="col-sm-8">
                                   <input type="checkbox" name="status"  <?php echo e(old('status',(empty($discount['status'])?0:1))?'checked':''); ?>>
                                </div>
                            </div>

                        </div>
                    </div>


                    <!-- /.box-body -->

                    <div class="box-footer">
                            <?php echo csrf_field(); ?>
                        <div class="col-md-2">
                        </div>

                        <div class="col-md-8">
                            <div class="btn-group pull-right">
                                <button type="submit" class="btn btn-primary"><?php echo e(trans('admin.submit')); ?></button>
                            </div>

                            <div class="btn-group pull-left">
                                <button type="reset" class="btn btn-warning"><?php echo e(trans('admin.reset')); ?></button>
                            </div>
                        </div>
                    </div>

                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<!-- Select2 -->
<link rel="stylesheet" href="<?php echo e(asset('admin/AdminLTE/bower_components/select2/dist/css/select2.min.css')); ?>">


<link rel="stylesheet" href="<?php echo e(asset('admin/plugin/bootstrap-switch.min.css')); ?>">

<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<!-- Select2 -->
<script src="<?php echo e(asset('admin/AdminLTE/bower_components/select2/dist/js/select2.full.min.js')); ?>"></script>


<script src="<?php echo e(asset('admin/plugin/bootstrap-switch.min.js')); ?>"></script>

<script type="text/javascript">
    $("[name='top'],[name='status']").bootstrapSwitch();
</script>

<script type="text/javascript">

$(document).ready(function() {
    $('.select2').select2()
});

//Date picker
$('.date_time').datepicker({
  autoclose: true,
  format: 'yyyy-mm-dd'
})
</script>
<script>
  $(function () {
    $('input.check-form').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\anytimebazar\resources\views/admin/screen/discount.blade.php ENDPATH**/ ?>
<?php $__env->startSection('main'); ?>
   <div class="row">
      <div class="col-md-12">
         <div class="box">
                <div class="box-header with-border">
                    <h2 class="box-title"><?php echo e($title_description??''); ?></h2>

                    <div class="box-tools">
                        <div class="btn-group pull-right" style="margin-right: 5px">
                            <a href="<?php echo e(route('admin_attribute_group.index')); ?>" class="btn  btn-flat btn-default" title="List"><i class="fa fa-list"></i><span class="hidden-xs"> <?php echo e(trans('admin.back_list')); ?></span></a>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="<?php echo e($url_action); ?>" method="post" accept-charset="UTF-8" class="form-horizontal" id="form-main">
                    <div class="box-body">
                        <div class="fields-group">

                            <div class="form-group   <?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                <label for="name" class="col-sm-2  control-label"><?php echo e(trans('attribute_group.name')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                        <input type="text" id="name" name="name" value="<?php echo old('name',($obj['name']??'')); ?>" class="form-control name" placeholder="" />
                                    </div>
                                        <?php if($errors->has('name')): ?>
                                            <span class="help-block">
                                                <?php echo e($errors->first('name')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group  <?php echo e($errors->has('type') ? ' has-error' : ''); ?>">
                                <label for="type" class="col-sm-2 control-label"><?php echo e(trans('attribute_group.type')); ?></label>
                                <div class="col-sm-8">
                                    <label class="radio-inline"><input type="radio" name="type" value="radio" <?php echo e((old('type',($obj['type']??'')) =='radio')?'checked':''); ?>>Radio</label>
                                    <label class="radio-inline"><input type="radio" name="type" value="select" <?php echo e((old('type',($obj['type']??'')) =='select')?'checked':''); ?>>Select</label>
                                        <?php if($errors->has('type')): ?>
                                            <span class="help-block">
                                                <?php echo e($errors->first('type')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>

                            <hr>

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
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\anytimebazar\resources\views/admin/screen/attribute_group.blade.php ENDPATH**/ ?>
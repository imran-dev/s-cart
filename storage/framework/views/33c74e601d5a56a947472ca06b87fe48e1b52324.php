<?php $__env->startSection('main'); ?>
   <div class="row">
      <div class="col-md-12">
         <div class="box">
                <div class="box-header with-border">
                    <h2 class="box-title"><?php echo e($title_description??''); ?></h2>

                    <div class="box-tools">
                        <div class="btn-group pull-right" style="margin-right: 5px">
                            <a href="<?php echo e(route('admin_link.index')); ?>" class="btn  btn-flat btn-default" title="List"><i class="fa fa-list"></i><span class="hidden-xs"> <?php echo e(trans('admin.back_list')); ?></span></a>
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

                            <div class="form-group   <?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                <label for="name" class="col-sm-2  control-label"><?php echo e(trans('link.name')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                        <input type="text" id="name" name="name" value="<?php echo old()?old('name'):$link['name']??''; ?>" class="form-control" placeholder="" />
                                    </div>
                                        <?php if($errors->has('name')): ?>
                                            <span class="help-block">
                                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('name')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group   <?php echo e($errors->has('url') ? ' has-error' : ''); ?>">
                                <label for="url" class="col-sm-2  control-label"><?php echo e(trans('link.url')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                        <input type="text" id="url" name="url" value="<?php echo old()?old('url'):$link['url']??''; ?>" class="form-control" placeholder="" />
                                    </div>
                                        <?php if($errors->has('url')): ?>
                                            <span class="help-block">
                                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('url')); ?>

                                            </span>
                                        <?php else: ?>
                                            <span class="help-block">
                                                <i class="fa fa-info-circle"></i> <?php echo e(trans('link.admin.helper_url')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>


                            <div class="form-group  <?php echo e($errors->has('target') ? ' has-error' : ''); ?>">
                                <label for="target" class="col-sm-2 control-label"><?php echo e(trans('link.admin.select_target')); ?></label>
                                <div class="col-sm-8">
                                    <select class="form-control target select2" style="width: 100%;" name="target" >
                                        <option value=""></option>
                                        <?php $__currentLoopData = $arrTarget; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($k); ?>" <?php echo e((old('target',$link['target']??'') ==$k) ? 'selected':''); ?>><?php echo e($v); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                        <?php if($errors->has('target')): ?>
                                            <span class="help-block">
                                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('target')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group  <?php echo e($errors->has('group') ? ' has-error' : ''); ?>">
                                <label for="group" class="col-sm-2 control-label"><?php echo e(trans('link.admin.select_group')); ?></label>
                                <div class="col-sm-8">
                                    <select class="form-control group select2" style="width: 100%;" name="group" >
                                        <option value=""></option>
                                        <?php $__currentLoopData = $arrGroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($k); ?>" <?php echo e((old('group',$link['group']??'') ==$k) ? 'selected':''); ?>><?php echo e($v); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                        <?php if($errors->has('group')): ?>
                                            <span class="help-block">
                                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('group')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>



                            <div class="form-group   <?php echo e($errors->has('sort') ? ' has-error' : ''); ?>">
                                <label for="sort" class="col-sm-2  control-label"><?php echo e(trans('link.sort')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                        <input type="number" style="width: 100px;" min = 0 id="sort" name="sort" value="<?php echo old()?old('sort'):$link['sort']??0; ?>" class="form-control sort" placeholder="" />
                                    </div>
                                        <?php if($errors->has('sort')): ?>
                                            <span class="help-block">
                                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('sort')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group  ">
                                <label for="status" class="col-sm-2  control-label"><?php echo e(trans('layout.status')); ?></label>
                                <div class="col-sm-8">
                                <input type="checkbox" name="status"  <?php echo e(old('status',(empty($layout['status'])?0:1))?'checked':''); ?>>

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

</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\anytimebazar\resources\views/admin/screen/link.blade.php ENDPATH**/ ?>
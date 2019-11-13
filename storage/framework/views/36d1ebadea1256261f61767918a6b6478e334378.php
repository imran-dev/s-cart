<?php $__env->startSection('main'); ?>
   <div class="row">
      <div class="col-md-12">
         <div class="box">
                <div class="box-header with-border">
                    <h2 class="box-title"><?php echo e($title_description??''); ?></h2>

                    <div class="box-tools">
                        <div class="btn-group pull-right" style="margin-right: 5px">
                            <a href="<?php echo e(route('admin_role.index')); ?>" class="btn  btn-flat btn-default" title="List"><i class="fa fa-list"></i><span class="hidden-xs"> <?php echo e(trans('admin.back_list')); ?></span></a>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="<?php echo e($url_action); ?>" method="post" accept-charset="UTF-8" class="form-horizontal" id="form-main"  enctype="multipart/form-data">


                    <div class="box-body">
                        <div class="fields-group">

                            <div class="form-group   <?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                <label for="name" class="col-sm-2  control-label"><?php echo e(trans('role.name')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                        <input type="text"   id="name" name="name" value="<?php echo e(old('name',$role['name']??'')); ?>" class="form-control name" placeholder="" />
                                    </div>
                                        <?php if($errors->has('name')): ?>
                                            <span class="help-block">
                                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('name')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group   <?php echo e($errors->has('slug') ? ' has-error' : ''); ?>">
                                <label for="slug" class="col-sm-2  control-label"><?php echo e(trans('role.slug')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                        <input type="text"   id="slug" name="slug" value="<?php echo e(old('slug',$role['slug']??'')); ?>" class="form-control slug" placeholder="" />
                                    </div>
                                        <?php if($errors->has('slug')): ?>
                                            <span class="help-block">
                                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('slug')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>


                            <div class="form-group  <?php echo e($errors->has('permission') ? ' has-error' : ''); ?>">
        <?php
        $listPermission = [];
        $old_permission = old('permission',($role?$role->permissions->pluck('id')->toArray():''));
            if(is_array($old_permission)){
                foreach($old_permission as $value){
                    $listPermission[] = (int)$value;
                }
            }
        ?>
                                <label for="permission" class="col-sm-2  control-label"><?php echo e(trans('role.admin.select_permission')); ?></label>
                                <div class="col-sm-8">
                                    <select class="form-control input-sm permission select2"  multiple="multiple" data-placeholder="<?php echo e(trans('role.admin.select_permission')); ?>" style="width: 100%;" name="permission[]" >
                                        <option value=""></option>
                                        <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($k); ?>"  <?php echo e((count($listPermission) && in_array($k, $listPermission))?'selected':''); ?>><?php echo e($v); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                        <?php if($errors->has('permission')): ?>
                                            <span class="help-block">
                                                <?php echo e($errors->first('permission')); ?>

                                            </span>
                                        <?php endif; ?>
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

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\anytimebazar\resources\views/admin/auth/role.blade.php ENDPATH**/ ?>
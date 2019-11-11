<?php $__env->startSection('main'); ?>
   <div class="row">
      <div class="col-md-12">
         <div class="box">
                <div class="box-header with-border">
                    <h2 class="box-title"><?php echo e($title_description??''); ?></h2>

                    <div class="box-tools">
                        <div class="btn-group pull-right" style="margin-right: 5px">
                            <a href="<?php echo e(route('admin_user.index')); ?>" class="btn  btn-flat btn-default" title="List"><i class="fa fa-list"></i><span class="hidden-xs"> <?php echo e(trans('admin.back_list')); ?></span></a>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="<?php echo e($url_action); ?>" method="post" accept-charset="UTF-8" class="form-horizontal" id="form-main"  enctype="multipart/form-data">


                    <div class="box-body">
                        <div class="fields-group">

                            <div class="form-group   <?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                <label for="name" class="col-sm-2  control-label"><?php echo e(trans('user.name')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                        <input type="text"   id="name" name="name" value="<?php echo e(old('name',$user['name']??'')); ?>" class="form-control name" placeholder="" />
                                    </div>
                                        <?php if($errors->has('name')): ?>
                                            <span class="help-block">
                                                <?php echo e($errors->first('name')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group   <?php echo e($errors->has('username') ? ' has-error' : ''); ?>">
                                <label for="username" class="col-sm-2  control-label"><?php echo e(trans('user.user_name')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                        <input type="text"   id="username" name="username" value="<?php echo e(old('username',$user['username']??'')); ?>" class="form-control username" placeholder="" />
                                    </div>
                                        <?php if($errors->has('username')): ?>
                                            <span class="help-block">
                                                <?php echo e($errors->first('username')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group   <?php echo e($errors->has('avatar') ? ' has-error' : ''); ?>">
                                <label for="avatar" class="col-sm-2  control-label"><?php echo e(trans('user.avatar')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <input type="text" id="avatar" name="avatar" value="<?php echo e(old('avatar',$user['avatar']??'')); ?>" class="form-control input-sm avatar" placeholder=""  />
                                       <span class="input-group-btn">
                                         <a data-input="avatar" data-preview="preview_avatar" data-type="avatar" class="btn btn-sm btn-primary lfm">
                                           <i class="fa fa-picture-o"></i> <?php echo e(trans('product.admin.choose_image')); ?>

                                         </a>
                                       </span>
                                    </div>
                                        <?php if($errors->has('avatar')): ?>
                                            <span class="help-block">
                                                <?php echo e($errors->first('avatar')); ?>

                                            </span>
                                        <?php endif; ?>
                                    <div id="preview_avatar" class="img_holder"><img src="<?php echo e(old('avatar',$user['avatar']??'')); ?>"></div>
                                </div>
                            </div>

                            <div class="form-group   <?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                <label for="password" class="col-sm-2  control-label"><?php echo e(trans('user.password')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                        <input type="password"   id="password" name="password" value="<?php echo e(old('password')??''); ?>" class="form-control password" placeholder="" />
                                    </div>
                                        <?php if($errors->has('password')): ?>
                                            <span class="help-block">
                                                <?php echo e($errors->first('password')); ?>

                                            </span>
                                        <?php else: ?>
                                            <?php if($user): ?>
                                                <span class="help-block">
                                                     <?php echo e(trans('user.admin.keep_password')); ?>

                                                 </span>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group   <?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
                                <label for="password" class="col-sm-2  control-label"><?php echo e(trans('user.password_confirmation')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                        <input type="password"   id="password_confirmation" name="password_confirmation" value="<?php echo e(old('password_confirmation')??''); ?>" class="form-control password_confirmation" placeholder="" />
                                    </div>
                                        <?php if($errors->has('password_confirmation')): ?>
                                            <span class="help-block">
                                                <?php echo e($errors->first('password_confirmation')); ?>

                                            </span>
                                        <?php else: ?>
                                            <?php if($user): ?>
                                                <span class="help-block">
                                                     <?php echo e(trans('user.admin.keep_password')); ?>

                                                 </span>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                </div>
                            </div>


                            <div class="form-group  <?php echo e($errors->has('roles') ? ' has-error' : ''); ?>">
        <?php
        $listRoles = [];
            $old_roles = old('roles',($user)?$user->roles->pluck('id')->toArray():'');
            if(is_array($old_roles)){
                foreach($old_roles as $value){
                    $listRoles[] = (int)$value;
                }
            }
        ?>
                                <label for="roles" class="col-sm-2  control-label"><?php echo e(trans('user.admin.select_roles')); ?></label>
                                <div class="col-sm-8">
                                    <select class="form-control input-sm roles select2"  multiple="multiple" data-placeholder="<?php echo e(trans('user.admin.select_roles')); ?>" style="width: 100%;" name="roles[]" >
                                        <option value=""></option>
                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($k); ?>"  <?php echo e((count($listRoles) && in_array($k, $listRoles))?'selected':''); ?>><?php echo e($v); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                        <?php if($errors->has('roles')): ?>
                                            <span class="help-block">
                                                <?php echo e($errors->first('roles')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>



                            <div class="form-group  <?php echo e($errors->has('permission') ? ' has-error' : ''); ?>">
        <?php
        $listPermission = [];
        $old_permission = old('permission',($user?$user->permissions->pluck('id')->toArray():''));
            if(is_array($old_permission)){
                foreach($old_permission as $value){
                    $listPermission[] = (int)$value;
                }
            }
        ?>
                                <label for="permission" class="col-sm-2  control-label"><?php echo e(trans('user.admin.select_permission')); ?></label>
                                <div class="col-sm-8">
                                    <select class="form-control input-sm permission select2"  multiple="multiple" data-placeholder="<?php echo e(trans('user.admin.select_permission')); ?>" style="width: 100%;" name="permission[]" >
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

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\s-cart\resources\views/admin/user/edit.blade.php ENDPATH**/ ?>
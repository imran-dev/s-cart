<?php $__env->startSection('main'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h2 class="box-title"><?php echo e($title_description??''); ?></h2>

                    <div class="box-tools">
                        <div class="btn-group pull-right" style="margin-right: 5px">
                            <a href="<?php echo e(route('admin_category.index')); ?>" class="btn  btn-flat btn-default"
                               title="List"><i class="fa fa-list"></i><span
                                        class="hidden-xs"> <?php echo e(trans('admin.back_list')); ?></span></a>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="<?php echo e($url_action); ?>" method="post" accept-charset="UTF-8" class="form-horizontal"
                      id="form-main" enctype="multipart/form-data">

                    <div class="box-body">
                        <div class="fields-group">
                            <?php
                                $descriptions = $category?$category->descriptions->keyBy('lang')->toArray():[];
                            ?>

                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="form-group">
                                    <label class="col-sm-2  control-label"></label>
                                    <div class="col-sm-8">
                                        <b><?php echo e($language->name); ?></b>
                                        <?php echo sc_image_render($language->icon,'20px','20px'); ?>

                                    </div>
                                </div>

                                <div class="form-group   <?php echo e($errors->has('descriptions.'.$code.'.name') ? ' has-error' : ''); ?>">
                                    <label for="<?php echo e($code); ?>__name"
                                           class="col-sm-2  control-label"><?php echo e(trans('category.name')); ?></label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                            <input type="text" id="<?php echo e($code); ?>__name"
                                                   name="descriptions[<?php echo e($code); ?>][name]"
                                                   value="<?php echo old()? old('descriptions.'.$code.'.name'):($descriptions[$code]['name']??''); ?>"
                                                   class="form-control <?php echo e($code.'__name'); ?>" placeholder=""/>
                                        </div>
                                        <?php if($errors->has('descriptions.'.$code.'.name')): ?>
                                            <span class="help-block">
                                                <?php echo e($errors->first('descriptions.'.$code.'.name')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group   <?php echo e($errors->has('descriptions.'.$code.'.keyword') ? ' has-error' : ''); ?>">
                                    <label for="<?php echo e($code); ?>__keyword"
                                           class="col-sm-2  control-label"><?php echo e(trans('category.keyword')); ?></label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                            <input type="text" id="<?php echo e($code); ?>__keyword"
                                                   name="descriptions[<?php echo e($code); ?>][keyword]"
                                                   value="<?php echo old()?old('descriptions.'.$code.'.keyword'):($descriptions[$code]['keyword']??''); ?>"
                                                   class="form-control <?php echo e($code.'__keyword'); ?>" placeholder=""/>
                                        </div>
                                        <?php if($errors->has('descriptions.'.$code.'.keyword')): ?>
                                            <span class="help-block">
                                                <?php echo e($errors->first('descriptions.'.$code.'.keyword')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group   <?php echo e($errors->has('descriptions.'.$code.'.description') ? ' has-error' : ''); ?>">
                                    <label for="<?php echo e($code); ?>__description"
                                           class="col-sm-2  control-label"><?php echo e(trans('category.description')); ?></label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                            <input type="text" id="<?php echo e($code); ?>__description"
                                                   name="descriptions[<?php echo e($code); ?>][description]"
                                                   value="<?php echo old()?old('descriptions.'.$code.'.description'):($descriptions[$code]['description']??''); ?>"
                                                   class="form-control <?php echo e($code.'__description'); ?>" placeholder=""/>
                                        </div>
                                        <?php if($errors->has('descriptions.'.$code.'.description')): ?>
                                            <span class="help-block">
                                                <?php echo e($errors->first('descriptions.'.$code.'.description')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <hr>

                            <div class="form-group  <?php echo e($errors->has('parent') ? ' has-error' : ''); ?>">
                                <label for="parent"
                                       class="col-sm-2 asterisk control-label"><?php echo e(trans('category.admin.select_category')); ?></label>
                                <div class="col-sm-8">
                                    <select class="form-control parent select2" style="width: 100%;" name="parent">
                                        <option value=""></option>
                                        <?php
                                            $categories = [0=>'==ROOT==']+ $categories;
                                        ?>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($k); ?>" <?php echo e((old('parent',$category['parent']??'') ==$k) ? 'selected':''); ?>><?php echo e($v); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('parent')): ?>
                                        <span class="help-block">
                                                <?php echo e($errors->first('parent')); ?>

                                            </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group   <?php echo e($errors->has('image') ? ' has-error' : ''); ?>">
                                <label for="image" class="col-sm-2  control-label"><?php echo e(trans('category.image')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <input type="text" id="image" name="image"
                                               value="<?php echo old('image',$category['image']??''); ?>"
                                               class="form-control input-sm image" placeholder=""/>
                                        <span class="input-group-btn">
                                         <a data-input="image" data-preview="preview_image" data-type="category"
                                            class="btn btn-sm btn-primary lfm">
                                           <i class="fa fa-picture-o"></i> <?php echo e(trans('product.admin.choose_image')); ?>

                                         </a>
                                       </span>
                                    </div>
                                    <?php if($errors->has('image')): ?>
                                        <span class="help-block">
                                                <?php echo e($errors->first('image')); ?>

                                            </span>
                                    <?php endif; ?>
                                    <div id="preview_image" class="img_holder"><img
                                                src="<?php echo e(old('image',$category['image']??'')); ?>"></div>
                                </div>
                            </div>

                            <div class="form-group   <?php echo e($errors->has('sort') ? ' has-error' : ''); ?>">
                                <label for="sort" class="col-sm-2  control-label"><?php echo e(trans('category.sort')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                        <input type="number" style="width: 100px;" id="sort" name="sort"
                                               value="<?php echo old()?old('sort'):$category['sort']??0; ?>"
                                               class="form-control sort" placeholder=""/>
                                    </div>
                                    <?php if($errors->has('sort')): ?>
                                        <span class="help-block">
                                                <?php echo e($errors->first('sort')); ?>

                                            </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group  ">
                                <label for="top" class="col-sm-2  control-label"><?php echo e(trans('category.top')); ?></label>
                                <div class="col-sm-8">
                                    <input type="checkbox"
                                           name="top" <?php echo e(old('top',(empty($category['top'])?0:1))?'checked':''); ?>>
                                </div>
                            </div>

                            <div class="form-group  ">
                                <label for="status"
                                       class="col-sm-2  control-label"><?php echo e(trans('category.status')); ?></label>
                                <div class="col-sm-8">
                                    <input type="checkbox"
                                           name="status" <?php echo e(old('status',(empty($category['status'])?0:1))?'checked':''); ?>>

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

        $(document).ready(function () {
            $('.select2').select2()
        });


    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\anytimebazar\resources\views/admin/screen/category.blade.php ENDPATH**/ ?>
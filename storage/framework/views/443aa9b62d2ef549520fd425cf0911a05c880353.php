<?php $__env->startSection('main'); ?>
   <div class="row">
      <div class="col-md-12">
         <div class="box">
                <div class="box-header with-border">
                    <h2 class="box-title"><?php echo e($title_description??''); ?></h2>

                    <div class="box-tools">
                        <div class="btn-group pull-right" style="margin-right: 5px">
                            <a href="<?php echo e(route('admin_currency.index')); ?>" class="btn  btn-flat btn-default" title="List"><i class="fa fa-list"></i><span class="hidden-xs"> <?php echo e(trans('admin.back_list')); ?></span></a>
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
                                <label for="name" class="col-sm-2  control-label"><?php echo e(trans('currency.name')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                        <input type="text" id="name" name="name" value="<?php echo old()?old('name'):$currency['name']??''; ?>" class="form-control" placeholder="" />
                                    </div>
                                        <?php if($errors->has('name')): ?>
                                            <span class="help-block">
                                                <?php echo e($errors->first('name')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group   <?php echo e($errors->has('code') ? ' has-error' : ''); ?>">
                                <label for="code" class="col-sm-2  control-label"><?php echo e(trans('currency.code')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                        <?php if(!empty($currency['code']) && in_array($currency['code'], ['VND','USD'])): ?>
                                        <input type="hidden" id="code" name="code" value="<?php echo $currency['code']; ?>" placeholder="" />
                                        <input type="text" disabled="disabled" value="<?php echo $currency['code']; ?>" class="form-control" placeholder="" />
                                        <?php else: ?>
                                        <input type="text" id="code" name="code" value="<?php echo old()?old('code'):$currency['code']??''; ?>" class="form-control" placeholder="" />
                                        <?php endif; ?>

                                    </div>
                                        <?php if($errors->has('code')): ?>
                                            <span class="help-block">
                                                <?php echo e($errors->first('code')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>



                            <div class="form-group   <?php echo e($errors->has('symbol') ? ' has-error' : ''); ?>">
                                <label for="symbol" class="col-sm-2  control-label"><?php echo e(trans('currency.symbol')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                        <input type="text" id="symbol" name="symbol" value="<?php echo old()?old('symbol'):$currency['symbol']??''; ?>" class="form-control" placeholder="" />
                                    </div>
                                        <?php if($errors->has('symbol')): ?>
                                            <span class="help-block">
                                                <?php echo e($errors->first('symbol')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group   <?php echo e($errors->has('exchange_rate') ? ' has-error' : ''); ?>">
                                <label for="exchange_rate" class="col-sm-2  control-label"><?php echo e(trans('currency.exchange_rate')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                        <input type="number" step="0.01" id="exchange_rate" name="exchange_rate" value="<?php echo old()?old('exchange_rate'):$currency['exchange_rate']??1; ?>" class="form-control" placeholder="" />
                                    </div>
                                        <?php if($errors->has('exchange_rate')): ?>
                                            <span class="help-block">
                                                <?php echo e($errors->first('exchange_rate')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group   <?php echo e($errors->has('precision') ? ' has-error' : ''); ?>">
                                <label for="precision" class="col-sm-2  control-label"><?php echo e(trans('currency.precision')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                        <input type="number" id="precision" name="precision" type="" value="<?php echo old()?old('precision'):$currency['precision']??0; ?>" class="form-control" placeholder="" min = 0 />
                                    </div>
                                        <?php if($errors->has('precision')): ?>
                                            <span class="help-block">
                                                <?php echo e($errors->first('precision')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group  <?php echo e($errors->has('symbol_first') ? ' has-error' : ''); ?>">
                                <label for="symbol_first" class="col-sm-2 control-label"><?php echo e(trans('currency.symbol_first')); ?></label>
                                <div class="col-sm-8">
                                    <label class="radio-inline"><input type="radio" name="symbol_first" value="1" <?php echo (old('symbol_first',$currency['symbol_first']??1) =='1')?'checked':''; ?>>Yes</label>
                                    <label class="radio-inline"><input type="radio" name="symbol_first" value="0" <?php echo (old('symbol_first',$currency['symbol_first']??0) =='0')?'checked':''; ?>>No</label>
                                        <?php if($errors->has('symbol_first')): ?>
                                            <span class="help-block">
                                                <?php echo e($errors->first('symbol_first')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>


                            <div class="form-group   <?php echo e($errors->has('thousands') ? ' has-error' : ''); ?>">
                                <label for="thousands" class="col-sm-2  control-label"><?php echo e(trans('currency.thousands')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                        <input type="text" id="thousands" name="thousands" type="text" value="<?php echo old('thousands',$currency['thousands']??','); ?>" class="form-control" placeholder="" />
                                    </div>
                                        <?php if($errors->has('thousands')): ?>
                                            <span class="help-block">
                                                <?php echo e($errors->first('thousands')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group   <?php echo e($errors->has('sort') ? ' has-error' : ''); ?>">
                                <label for="sort" class="col-sm-2  control-label"><?php echo e(trans('currency.sort')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                        <input type="number" style="width: 100px;" min = 0 id="sort" name="sort" value="<?php echo old('sort',$currency['sort']??0); ?>" class="form-control sort" placeholder="" />
                                    </div>
                                        <?php if($errors->has('sort')): ?>
                                            <span class="help-block">
                                                <?php echo e($errors->first('sort')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>


                            <div class="form-group  ">
                                <label for="status" class="col-sm-2  control-label"><?php echo e(trans('currency.status')); ?></label>
                                <div class="col-sm-8">
                                    <input type="checkbox" name="status"  <?php echo old('status',(empty($currency['status'])?0:1))?'checked':''; ?>>

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

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\s-cart\resources\views/admin/screen/currency.blade.php ENDPATH**/ ?>
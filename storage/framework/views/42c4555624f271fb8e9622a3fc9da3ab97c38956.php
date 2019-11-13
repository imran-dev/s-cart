<?php $__env->startSection('main'); ?>
          <div class="box-header with-border">
              <h2 class="box-title"><?php echo e($title_description??''); ?></h2>

              <div class="box-tools">
                  <div class="btn-group pull-right" style="margin-right: 5px">
                      <a href="<?php echo e(route('admin_extension',['extensionGroup'=>'Shipping'])); ?>" class="btn  btn-flat btn-default" title="List"><i class="fa fa-list"></i><span class="hidden-xs"> <?php echo e(trans('admin.back_list')); ?></span></a>
                  </div>
              </div>
          </div>
            <!-- /.box-header -->
            <div class="box-body">
             <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="40%"><?php echo e(trans('Extensions/Shipping/ShippingStandard.fee')); ?></th>
                  <th width="40%"><?php echo e(trans('Extensions/Shipping/ShippingStandard.shipping_free')); ?></th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                      <td><a href="#" class="updateData_num" data-name="fee" data-type="text" data-pk="<?php echo e($data['id']); ?>" data-url="<?php echo e(route('admin_extension.process',['group'=>'shipping','key'=>'ShippingStandard'])); ?>" data-title="<?php echo e(trans('Extensions/Shipping/ShippingStandard.fee')); ?>"><?php echo e($data['fee']); ?></a></td>
                      <td><a href="#" class="updateData_num" data-name="shipping_free" data-type="text" data-pk="<?php echo e($data['id']); ?>" data-url="<?php echo e(route('admin_extension.process',['group'=>$group,'key'=>$key])); ?>" data-title="<?php echo e(trans('Extensions/Shipping/ShippingStandard.shipping_free')); ?>"><?php echo e($data['shipping_free']); ?></a></td>
                    </tr>
                </tbody>
                <tfoot>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<!-- Ediable -->
<link rel="stylesheet" href="<?php echo e(asset('admin/plugin/bootstrap-editable.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<!-- Ediable -->
<script src="<?php echo e(asset('admin/plugin/bootstrap-editable.min.js')); ?>"></script>
<script type="text/javascript">
$(document).ready(function() {

    $.fn.editable.defaults.params = function (params) {
      params._token = "<?php echo e(csrf_token()); ?>";
      return params;
    };

    $('.updateData_num').editable({
    ajaxOptions: {
    type: 'put',
    dataType: 'json'
    },
    validate: function(value) {
        if (value == '') {
            return '<?php echo e(trans('admin.not_empty')); ?>';
        }
        if (!$.isNumeric(value)) {
            return '<?php echo e(trans('admin.only_numeric')); ?>';
        }
    }
    });

    $('.updateData').editable({
    ajaxOptions: {
    type: 'put',
    dataType: 'json'
    },
    validate: function(value) {
        if (value == '') {
            return '<?php echo e(trans('admin.not_empty')); ?>';
        }
    }
    });

    $('.updateData_can_empty').editable({
    ajaxOptions: {
    type: 'put',
    dataType: 'json'
    }
    });
});

</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\anytimebazar\app\Extensions/Shipping/Views/ShippingStandard.blade.php ENDPATH**/ ?>
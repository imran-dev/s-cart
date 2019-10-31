<?php $__env->startSection('main'); ?>

<div class="row">

  <div class="col-md-6">

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo e(trans('store_info.admin.config_mode')); ?></h3>
      </div>

      <div class="box-body table-responsive no-padding box-primary">
       <table class="table table-hover table-bordered">
         <thead>
           <tr>
             <th><?php echo e(trans('store_info.admin.field')); ?></th>
             <th><?php echo e(trans('store_info.admin.value')); ?></th>
           </tr>
         </thead>
         <tbody>


      <tr>
        <td><?php echo e(trans('store_info.logo')); ?>

               <span class="input-group-btn">
                 <a data-input="image" data-preview="preview_image" data-type="logo" class="btn btn-sm btn-flat btn-primary lfm">
                   <i class="fa fa-picture-o"></i> <?php echo e(trans('product.admin.choose_image')); ?>

                 </a>
               </span>

        </td>
        <td>
            <div class="input-group">
                <input type="hidden" id="image" name="logo" value="<?php echo e($infos->logo); ?>" class="form-control input-sm image" placeholder=""  />
            </div>
              <?php if($errors->has('image')): ?>
                  <span class="help-block">
                      <?php echo e($errors->first('image')); ?>

                  </span>
              <?php endif; ?>
            <div id="preview_image" class="img_holder"><?php echo sc_image_render($infos->logo,'100px'); ?></div>

        </td>
      </tr>

      <tr>
        <td><?php echo e(trans('store_info.phone')); ?></td>
        <td><a href="#" class="fied-required editable editable-click" data-name="phone" data-type="number" data-pk="" data-source="" data-url="<?php echo e(route('admin_store_info.update')); ?>" data-title="<?php echo e(trans('store_info.phone')); ?>" data-value="<?php echo e($infos->phone); ?>" data-original-title="" title=""><?php echo e($infos->phone); ?></a></td>
      </tr>

      <tr>
        <td><?php echo e(trans('store_info.long_phone')); ?></td>
        <td><a href="#" class="fied-required editable editable-click" data-name="long_phone" data-type="text" data-pk="" data-source="" data-url="<?php echo e(route('admin_store_info.update')); ?>" data-title="<?php echo e(trans('store_info.long_phone')); ?>" data-value="<?php echo e($infos->long_phone); ?>" data-original-title="" title=""><?php echo e($infos->long_phone); ?></a></td>
      </tr>

      <tr>
        <td><?php echo e(trans('store_info.time_active')); ?></td>
        <td><a href="#" class="fied-required editable editable-click" data-name="time_active" data-type="text" data-pk="" data-source="" data-url="<?php echo e(route('admin_store_info.update')); ?>" data-title="<?php echo e(trans('store_info.time_active')); ?>" data-value="<?php echo e($infos->time_active); ?>" data-original-title="" title=""><?php echo e($infos->time_active); ?></a></td>
      </tr>

      <tr>
        <td><?php echo e(trans('store_info.address')); ?></td>
        <td><a href="#" class="fied-required editable editable-click" data-name="address" data-type="text" data-pk="" data-source="" data-url="<?php echo e(route('admin_store_info.update')); ?>" data-title="<?php echo e(trans('store_info.address')); ?>" data-value="<?php echo e($infos->address); ?>" data-original-title="" title=""><?php echo e($infos->address); ?></a></td>
      </tr>

      <tr>
        <td><?php echo e(trans('store_info.email')); ?></td>
        <td><a href="#" class="fied-required editable editable-click" data-name="email" data-type="text" data-pk="" data-source="" data-url="<?php echo e(route('admin_store_info.update')); ?>" data-title="<?php echo e(trans('store_info.email')); ?>" data-value="<?php echo e($infos->email); ?>" data-original-title="" title=""><?php echo e($infos->email); ?></a></td>
      </tr>

    </td>
  </tr>

<?php $__currentLoopData = $infosDescription; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $obj => $infoDescription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <?php if($obj !='maintain_content'): ?>
  <tr>
    <td><?php echo e(trans('store_info.'.$obj)); ?></td>
    <td>
      <?php $__currentLoopData = $infoDescription; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $codeLanguage => $des): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($languages[$codeLanguage]); ?>:<br>
        <i><a href="#" class="fied-required editable editable-click" data-name="<?php echo e($obj.'__'.$codeLanguage); ?>" data-type="text" data-pk="" data-source="" data-url="<?php echo e(route('admin_store_info.update')); ?>" data-title="<?php echo e(trans('store_info.'.$obj)); ?>" data-value="<?php echo e($des); ?>" data-original-title="" title=""><?php echo e($des); ?></a></i><br>
        <br>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </td>
  </tr>
  <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>
       </table>
      </div>
    </div>
  </div>


  <div class="col-md-6">
    <div class="box box-primary">
        <?php $__currentLoopData = $infosDescription; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $obj => $infoDescription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($obj =='maintain_content'): ?>
            <?php $__currentLoopData = $infoDescription; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $codeLanguage => $des): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo e(trans('store_info.maintain_content')); ?> <?php echo e($languages[$codeLanguage]); ?></h3>
              </div>
              <div class="box-body table-responsive no-padding box-primary">
                    <a href="#" class="fied-required editable editable-click" data-name="<?php echo e($obj.'__'.$codeLanguage); ?>" data-type="textarea" data-pk="" data-source="" data-url="<?php echo e(route('admin_store_info.update')); ?>" data-title="<?php echo e(trans('store_info.'.$obj)); ?>" data-value="<?php echo e($des); ?>" data-original-title="" title=""><?php echo $des; ?></a>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>



</div>


<?php $__env->stopSection(); ?>


<?php $__env->startPush('styles'); ?>
<!-- Ediable -->
<link rel="stylesheet" href="<?php echo e(asset('admin/plugin/bootstrap-editable.css')); ?>">
<style type="text/css">
  #maintain_content img{
    max-width: 100%;
  }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<!-- Ediable -->
<script src="<?php echo e(asset('admin/plugin/bootstrap-editable.min.js')); ?>"></script>

<script type="text/javascript">
  // Editable
$(document).ready(function() {

       $.fn.editable.defaults.mode = 'inline';
      $.fn.editable.defaults.params = function (params) {
        params._token = "<?php echo e(csrf_token()); ?>";
        return params;
      };
        $('.fied-required').editable({
        validate: function(value) {
            if (value == '') {
                return '<?php echo e(trans('admin.not_empty')); ?>';
            }
        },
        success: function(data) {
          if(data.stt == 1){
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            });

            Toast.fire({
              type: 'success',
              title: '<?php echo e(trans('admin.msg_change_success')); ?>'
            })
          }
      }
    });
});
</script>


  <script type="text/javascript">

    <?php echo $script_sort??''; ?>


  </script>

<script type="text/javascript">

var selectedRows = function () {
    var selected = [];
    $('.grid-row-checkbox:checked').each(function(){
        selected.push($(this).data('id'));
    });

    return selected;
}

</script>
<script>
  // Update store_info

//Logo
  $('[name="logo"]').change(function(event) {
          $.ajax({
        url: '<?php echo e(route('admin_store_info.update')); ?>',
        type: 'POST',
        dataType: 'JSON',
        data: {"name": 'logo',"value":$(this).val(),"_token": "<?php echo e(csrf_token()); ?>",},
      })
      .done(function(data) {
        if(data.stt == 1){
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });

          Toast.fire({
            type: 'success',
            title: '<?php echo e(trans('admin.msg_change_success')); ?>'
          })
        }
      });
  });
//End logo


  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    }).on('ifChanged', function(e) {
    var isChecked = e.currentTarget.checked;
    isChecked = (isChecked == false)?0:1;
    var name = $(this).attr('name');
      $.ajax({
        url: '<?php echo e(route('admin_store_info.update')); ?>',
        type: 'POST',
        dataType: 'JSON',
        data: {"name": name,"value":isChecked,"_token": "<?php echo e(csrf_token()); ?>",},
      })
      .done(function(data) {
        if(data.stt == 1){
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });

          Toast.fire({
            type: 'success',
            title: '<?php echo e(trans('admin.msg_change_success')); ?>'
          })
        }
      });

      });

  });
  //End update store_info
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\s-cart\resources\views/admin/screen/store_info.blade.php ENDPATH**/ ?>
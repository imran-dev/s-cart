<?php $__env->startSection('main'); ?>
   <div class="row">
      <div class="col-md-12">
         <div class="box">
            <!-- /.box-header -->
            <div class="box-body" id="pjax-container">
             <table id="main-table" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th></th>
                  <th><?php echo e(trans('template.name')); ?></th>
                  <th><?php echo e(trans('template.auth')); ?></th>
                  <th><?php echo e(trans('template.email')); ?></th>
                  <th><?php echo e(trans('template.website')); ?></th>
                  <th><?php echo e(trans('template.version')); ?></th>
                  <th><?php echo e(trans('template.status')); ?></th>
                </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                     <td><?php echo sc_image_render($template['config']['image']??'','50px'); ?></td>
                     <td><?php echo e($template['config']['name']??''); ?></td>
                     <td><?php echo e($template['config']['auth']??''); ?></td>
                     <td><?php echo e($template['config']['email']??''); ?></td>
                     <td><?php echo e($template['config']['website']??''); ?> <a href="<?php echo e($template['config']['website']??''); ?>" target=_new><i class="fa fa-share" aria-hidden="true"></i></a></td>
                     <td><?php echo e($template['config']['version']??''); ?></td>
                      <td><?php echo ($templateCurrent == $key)?'<button title="'.trans('template.activated').'"  class="btn btn-flat action-teplate">'.trans('template.activated').'</button >':'<button  onClick="enableTemplate($(this),\''.$key.'\');" title="'.trans('template.inactive').'" data-loading-text="'.trans('template.installing').'" class="btn btn-flat btn-primary action-teplate">'.trans('template.inactive').'</button >'; ?></td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>
      <!-- /.row -->
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('styles'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
  function enableTemplate(obj,key) {
    $('#loading').show()
      obj.button('loading');
      $.ajax({
        type: 'POST',
        dataType:'json',
        url: '<?php echo e(route('admin_template.changeTemplate')); ?>',
        data: {
          "_token": "<?php echo e(csrf_token()); ?>",
          "key":key,
        },
        success: function (response) {
          console.log(response);
          if(parseInt(response.error) ==0){
              $.pjax.reload({container:'#pjax-container'});
                Swal.fire(
                'Success!',
                '',
                'success'
                )
          }else{
            Swal.fire(
              response.msg,
              'You clicked the button!',
              'error'
              )
          }
          $('#loading').hide();
          obj.button('reset');
        }
      });

  }
</script>


    
   <script src="<?php echo e(asset('admin/plugin/jquery.pjax.js')); ?>"></script>

  <script type="text/javascript">
    $(document).ready(function(){
    // does current browser support PJAX
      if ($.support.pjax) {
        $.pjax.defaults.timeout = 2000; // time in milliseconds
      }
    });
  </script>
    

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\anytimebazar\resources\views/admin/screen/template.blade.php ENDPATH**/ ?>
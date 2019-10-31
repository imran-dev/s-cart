<?php $__env->startSection('main'); ?>
   <div class="row">
      <div class="col-md-12">
         <div class="box">
            <div class="box-header with-border">
                <h2 class="box-title"></h2>
                <div class="box-tools">
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body"   id="pjax-container">
             <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th><?php echo e(trans('Extensions/language.image')); ?></th>
                  <th><?php echo e(trans('Extensions/language.code')); ?></th>
                  <th><?php echo e(trans('Extensions/language.name')); ?></th>
                  <th><?php echo e(trans('Extensions/language.version')); ?></th>
                  <th><?php echo e(trans('Extensions/language.auth')); ?></th>
                  <th><?php echo e(trans('Extensions/language.link')); ?></th>
                  <th><?php echo e(trans('Extensions/language.sort')); ?></th>
                  <th><?php echo e(trans('Extensions/language.status')); ?></th>
                  <th><?php echo e(trans('Extensions/language.action')); ?></th>
                </tr>
                </thead>
                <tbody>
                  <?php if(!$extensions): ?>
                    <tr>
                      <td colspan="5" style="text-align: center;color: red;"><?php echo e(trans('Extensions/language.empty')); ?></td>
                    </tr>
                  <?php else: ?>
                  <?php $__currentLoopData = $extensions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $extension): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                    $extensionClassName = $namespace.'\\'.$extension;
                    $extensionClass = new $extensionClassName;
                    if(!array_key_exists($extension, $extensionsInstalled->toArray())){
                      $extensionStatusTitle = trans('Extensions/language.not_install');
                      $extensionAction = '<span onClick="installExtension($(this),\''.$extension.'\');" title="'.trans('Extensions/language.install').'" type="button" class="btn btn-flat btn-success"><i class="fa fa-plus-circle"></i></span>';
                    }else{
                      if($extensionsInstalled[$extension]['value']){
                        $extensionStatusTitle = trans('Extensions/language.actived');
                        $extensionAction ='<span onClick="disableExtension($(this),\''.$extension.'\');" title="'.trans('Extensions/language.disable').'" type="button" class="btn btn-flat btn-warning btn-flat"><i class="fa fa-power-off"></i></span>&nbsp;';
                          if($extensionClass->config()){
                            $extensionAction .='<a href="'.url()->current().'?action=config&extensionKey='.$extension.'"><span title="'.trans('Extensions/language.config').'" class="btn btn-flat btn-primary"><i class="fa fa-gears"></i></span>&nbsp;</a>';
                          }
                              $extensionAction .='<span onClick="uninstallExtension($(this),\''.$extension.'\');" title="'.trans('Extensions/language.remove').'" class="btn btn-flat btn-danger"><i class="fa fa-trash"></i></span>';
                      }else{
                        $extensionStatusTitle = trans('Extensions/language.disabled');
                        $extensionAction = '<span onClick="enableExtension($(this),\''.$extension.'\');" title="'.trans('Extensions/language.enable').'" type="button" class="btn btn-flat btn-primary"><i class="fa fa-paper-plane"></i></span>&nbsp;';
                          if($extensionClass->config()){
                            $extensionAction .='<a href="'.url()->current().'?action=config&extensionKey='.$extension.'"><span title="'.trans('Extensions/language.config').'" class="btn btn-flat btn-primary"><i class="fa fa-gears"></i></span>&nbsp;</a>';
                          }
                              $extensionAction .='
                              <span onClick="uninstallExtension($(this),\''.$extension.'\');" title="'.trans('Extensions/language.remove').'" class="btn btn-flat btn-danger"><i class="fa fa-trash"></i></span>';
                      }
                    }
                  ?>
                    <tr>
                      <td><?php echo sc_image_render($extensionClass->image,'50px'); ?></td>
                      <td><?php echo e($extension); ?></td>
                      <td><?php echo e($extensionClass->title); ?></td>
                      <td><?php echo e($extensionClass->version??''); ?></td>
                      <td><?php echo e($extensionClass->auth??''); ?></td>
                      <td><?php echo e($extensionClass->link??''); ?></td>
                      <td><?php echo e($extensionsInstalled[$extension]['sort']??''); ?></td>
                      <td><?php echo e($extensionStatusTitle); ?></td>
                      <td><?php echo $extensionAction; ?></td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>

<script src="<?php echo e(asset('admin/plugin/jquery.pjax.js')); ?>"></script>


<script type="text/javascript">
  function enableExtension(obj,key) {
      $('#loading').show()
      obj.button('loading');
      $.ajax({
        type: 'POST',
        dataType:'json',
        url: '<?php echo e(route('admin_extension.enable')); ?>',
        data: {
          "_token": "<?php echo e(csrf_token()); ?>",
          "key":key,
          "group":"<?php echo e($group); ?>"
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
  function disableExtension(obj,key) {
      $('#loading').show()
      obj.button('loading');
      $.ajax({
        type: 'POST',
        dataType:'json',
        url: '<?php echo e(route('admin_extension.disable')); ?>',
        data: {
          "_token": "<?php echo e(csrf_token()); ?>",
          "key":key,
          "group":"<?php echo e($group); ?>"
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
  function installExtension(obj,key) {
      $('#loading').show()
      obj.button('loading');
      $.ajax({
        type: 'POST',
        dataType:'json',
        url: '<?php echo e(route('admin_extension.install')); ?>',
        data: {
          "_token": "<?php echo e(csrf_token()); ?>",
          "key":key,
          "group":"<?php echo e($group); ?>"
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
  function uninstallExtension(obj,key) {

      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, do it!'
      }).then((result) => {
        if (result.value) {
            $('#loading').show()
            obj.button('loading');
            $.ajax({
              type: 'POST',
              dataType:'json',
              url: '<?php echo e(route('admin_extension.uninstall')); ?>',
              data: {
                "_token": "<?php echo e(csrf_token()); ?>",
                "key":key,
                "group":"<?php echo e($group); ?>"
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
      })
  }

    $(document).ready(function(){
    // does current browser support PJAX
      if ($.support.pjax) {
        $.pjax.defaults.timeout = 2000; // time in milliseconds
      }
    });

</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\s-cart\resources\views/admin/screen/extension.blade.php ENDPATH**/ ?>
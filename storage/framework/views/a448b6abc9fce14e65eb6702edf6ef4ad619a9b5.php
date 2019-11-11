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
                  <th><?php echo e(trans('Modules/language.image')); ?></th>
                  <th><?php echo e(trans('Modules/language.code')); ?></th>
                  <th><?php echo e(trans('Modules/language.name')); ?></th>
                  <th><?php echo e(trans('Modules/language.version')); ?></th>
                  <th><?php echo e(trans('Modules/language.auth')); ?></th>
                  <th><?php echo e(trans('Modules/language.link')); ?></th>
                  <th><?php echo e(trans('Modules/language.sort')); ?></th>
                  <th><?php echo e(trans('Modules/language.status')); ?></th>
                  <th><?php echo e(trans('Modules/language.action')); ?></th>
                </tr>
                </thead>
                <tbody>
                  <?php if(!$modules): ?>
                    <tr>
                      <td colspan="5" style="text-align: center;color: red;"><?php echo e(trans('Modules/language.empty')); ?></td>
                    </tr>
                  <?php else: ?>
                  <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                    $moduleClassName = $namespace.'\\'.$module;
                    $moduleClass = new $moduleClassName;
                    if(!array_key_exists($module, $modulesInstalled->toArray())){
                      $moduleStatusTitle = trans('Modules/language.not_install');
                      $moduleAction = '<span onClick="installModule($(this),\''.$module.'\');" title="'.trans('Modules/language.install').'" type="button" class="btn btn-flat btn-success"><i class="fa fa-plus-circle"></i></span>';
                    }else{
                      if($modulesInstalled[$module]['value']){
                        $moduleStatusTitle = trans('Modules/language.actived');
                        $moduleAction ='<span onClick="disableModule($(this),\''.$module.'\');" title="'.trans('Modules/language.disable').'" type="button" class="btn btn-flat btn-warning btn-flat"><i class="fa fa-power-off"></i></span>&nbsp;';
                          if($moduleClass->config()){
                            $moduleAction .='<a href="'.url()->current().'?action=config&moduleKey='.$module.'"><span title="'.trans('Modules/language.config').'" class="btn btn-flat btn-primary"><i class="fa fa-gears"></i></span>&nbsp;</a>';
                          }
                              $moduleAction .='<span onClick="uninstallModule($(this),\''.$module.'\');" title="'.trans('Modules/language.remove').'" class="btn btn-flat btn-danger"><i class="fa fa-trash"></i></span>';
                      }else{
                        $moduleStatusTitle = trans('Modules/language.disabled');
                        $moduleAction = '<span onClick="enableModule($(this),\''.$module.'\');" title="'.trans('Modules/language.enable').'" type="button" class="btn btn-flat btn-primary"><i class="fa fa-paper-plane"></i></span>&nbsp;';
                          if($moduleClass->config()){
                            $moduleAction .='<a href="'.url()->current().'?action=config&moduleKey='.$module.'"><span title="'.trans('Modules/language.config').'" class="btn btn-flat btn-primary"><i class="fa fa-gears"></i></span>&nbsp;</a>';
                          }
                              $moduleAction .='
                              <span onClick="uninstallModule($(this),\''.$module.'\');" title="'.trans('Modules/language.remove').'" class="btn btn-flat btn-danger"><i class="fa fa-trash"></i></span>';
                      }
                    }
                  ?>
                    <tr>
                      <td><?php echo sc_image_render($moduleClass->image,'50px'); ?></td>
                      <td><?php echo e($module); ?></td>
                      <td><?php echo e($moduleClass->title); ?></td>
                      <td><?php echo e($moduleClass->version??''); ?></td>
                      <td><?php echo e($moduleClass->auth??''); ?></td>
                      <td><?php echo e($moduleClass->link??''); ?></td>
                      <td><?php echo e($modulesInstalled[$module]['sort']??''); ?></td>
                      <td><?php echo e($moduleStatusTitle); ?></td>
                      <td><?php echo $moduleAction; ?></td>
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
  function enableModule(obj,key) {
      $('#loading').show()
      obj.button('loading');
      $.ajax({
        type: 'POST',
        dataType:'json',
        url: '<?php echo e(route('admin_module.enable')); ?>',
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
  function disableModule(obj,key) {
      $('#loading').show()
      obj.button('loading');
      $.ajax({
        type: 'POST',
        dataType:'json',
        url: '<?php echo e(route('admin_module.disable')); ?>',
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
  function installModule(obj,key) {
      $('#loading').show()
      obj.button('loading');
      $.ajax({
        type: 'POST',
        dataType:'json',
        url: '<?php echo e(route('admin_module.install')); ?>',
        data: {
          "_token": "<?php echo e(csrf_token()); ?>",
          "key":key,
          "group":"<?php echo e($group); ?>"
        },
        success: function (response) {
          console.log(response);
              if(parseInt(response.error) ==0){
              location.reload();
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
  function uninstallModule(obj,key) {

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
              url: '<?php echo e(route('admin_module.uninstall')); ?>',
              data: {
                "_token": "<?php echo e(csrf_token()); ?>",
                "key":key,
                "group":"<?php echo e($group); ?>"
              },
              success: function (response) {
                console.log(response);
              if(parseInt(response.error) ==0){
              location.reload();
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

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\s-cart\resources\views/admin/screen/module.blade.php ENDPATH**/ ?>
<?php $__env->startSection('main'); ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo e($title); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body"  id="pjax-container">
              <div><button id="generate" onClick="generateBackup($(this));" class="btn btn-success btn-flat" data-loading-text="<?php echo e(trans('backup.processing')); ?>"><span class="glyphicon glyphicon-plus"></span><?php echo e(trans('backup.generate_now')); ?></button></div>
             <table id="main-table" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th><?php echo e(trans('backup.sort')); ?></th>
                  <th><?php echo e(trans('backup.date')); ?></th>
                  <th><?php echo e(trans('backup.name')); ?></th>
                  <th><?php echo e(trans('backup.size')); ?></th>
                  <th><?php echo e(trans('backup.download')); ?></th>
                  <th><?php echo e(trans('backup.remove')); ?></th>
                  <th><?php echo e(trans('backup.restore')); ?></th>
                </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $arrFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                     <td><?php echo e((count($arrFiles) - $key)); ?></td>
                     <td><?php echo e($file['time']); ?></td>
                     <td><?php echo e($file['name']); ?></td>
                     <td><?php echo e($file['size']); ?></td>
                      <td><?php echo '<a href="?download='.$file['name'].'"><button title="'.trans('backup.download').'" data-loading-text="'.trans('backup.processing').'" class="btn btn-flat btn-primary"><span class="glyphicon glyphicon-save"></span> '.trans('backup.download').'</button ></a>'; ?></td>
                      <td><?php echo '<button  onClick="processBackup($(this),\''.$file['name'].'\',\'remove\');" title="'.trans('backup.remove').'" data-loading-text="'.trans('backup.processing').'" class="btn btn-flat btn-danger"><span class="glyphicon glyphicon-trash"></span> '.trans('backup.remove').'</button >'; ?></td>
                      <td><?php echo '<button  onClick="processBackup($(this),\''.$file['name'].'\',\'restore\');" title="'.trans('backup.restore').'" data-loading-text="'.trans('backup.processing').'" class="btn btn-flat btn-warning"><span class="glyphicon glyphicon-retweet"></span> '.trans('backup.restore').'</button >'; ?></td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    <div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>


<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>

<script src="<?php echo e(asset('admin/plugin/jquery.pjax.js')); ?>"></script>

<script type="text/javascript">
  function processBackup(obj,file,action) {
      // var checkstr =  confirm('are you sure you want to do this?');
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
            url: '<?php echo e(route('admin.backup.process')); ?>',
            data: {
              "_token": "<?php echo e(csrf_token()); ?>",
              "file":file,
              "action":action,
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

  function generateBackup(obj) {
      $('#loading').show()
      obj.button('loading');
      $.ajax({
        type: 'POST',
        dataType:'json',
        url: '<?php echo e(route('admin.backup.generate')); ?>',
        data: {
          "_token": "<?php echo e(csrf_token()); ?>",
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

    $(document).ready(function(){
    // does current browser support PJAX
      if ($.support.pjax) {
        $.pjax.defaults.timeout = 2000; // time in milliseconds
      }
    });

</script>


<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\s-cart\resources\views/admin/screen/backup.blade.php ENDPATH**/ ?>
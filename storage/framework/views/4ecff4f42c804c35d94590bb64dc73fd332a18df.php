<?php $__env->startSection('main'); ?>

<div class="row">

  <div class="col-md-6">

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo e(trans('email.admin.config_mode')); ?></h3>
      </div>

      <div class="box-body table-responsive no-padding box-primary">
         <table class="table table-hover">
           <thead>
             <tr>
               <th><?php echo e(trans('email.admin.field')); ?></th>
               <th><?php echo e(trans('email.admin.value')); ?></th>
             </tr>
           </thead>
           <tbody>
             <?php $__currentLoopData = $configs['email_action']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $config): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <tr>
                 <td><?php echo e(sc_language_render($config->detail)); ?></td>
                 <td><input type="checkbox" name="<?php echo e($config->key); ?>"  <?php echo e($config->value?"checked":""); ?>></td>
               </tr>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           </tbody>
         </table>
      </div>
    </div>
  </div>


  <div class="col-md-6 config_smtp" <?php echo sc_config('email_action_smtp_mode')?'':'style="display:none"'; ?>>

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo e(trans('email.admin.config_smtp')); ?></h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>

      <div class="box-body table-responsive no-padding box-primary">
         <table class="table table-hover">
         <thead>
           <tr>
             <th width="40%"><?php echo e(trans('email.admin.field')); ?></th>
             <th><?php echo e(trans('email.admin.value')); ?></th>
           </tr>
         </thead>
         <tbody>
           <?php $__currentLoopData = $configs['smtp']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $config): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <?php if($config->key == 'smtp_security'): ?>
              <tr>
                <td><?php echo e(sc_language_render($config->detail)); ?></td>
                <td><a href="#" class="no-required editable editable-click" data-name="<?php echo e($config->key); ?>" data-type="select" data-pk="" data-source="<?php echo e(json_encode($smtp_method)); ?>" data-url="<?php echo e(route('admin_email.update')); ?>" data-title="<?php echo e(sc_language_render($config->detail)); ?>" data-value="<?php echo $config->value; ?>" data-original-title="" title=""></a></td>
              </tr>
           <?php elseif($config->key == 'smtp_port'): ?>
             <tr>
               <td><?php echo e(sc_language_render($config->detail)); ?></td>
               <td align="left"><a href="#" class="fied-required editable editable-click" data-name="<?php echo e($config->key); ?>" data-type="number" data-pk="<?php echo e($config->key); ?>" data-source="" data-url="<?php echo e(route('admin_store_value.update')); ?>" data-title="<?php echo e(sc_language_render($config->detail)); ?>" data-value="<?php echo $config->value; ?>" data-original-title="" title=""><?php echo $config->value; ?></a></td>
             </tr>
           <?php elseif($config->key == 'smtp_password'): ?>
             <tr>
               <td><?php echo e(sc_language_render($config->detail)); ?></td>
               <td align="left"><a href="#" class="fied-required editable editable-click" data-name="<?php echo e($config->key); ?>" data-type="text" data-pk="<?php echo e($config->key); ?>" data-source="" data-url="<?php echo e(route('admin_store_value.update')); ?>" data-title="<?php echo e(sc_language_render($config->detail)); ?>" data-value="<?php echo $config->value; ?>" data-original-title="" title="">****</a></td>
             </tr>

          <?php else: ?>
             <tr>
               <td><?php echo e(sc_language_render($config->detail)); ?></td>
               <td align="left"><a href="#" class="fied-required editable editable-click" data-name="<?php echo e($config->key); ?>" data-type="text" data-pk="<?php echo e($config->key); ?>" data-source="" data-url="<?php echo e(route('admin_store_value.update')); ?>" data-title="<?php echo e(sc_language_render($config->detail)); ?>" data-value="<?php echo $config->value; ?>" data-original-title="" title=""><?php echo $config->value; ?></a></td>
             </tr>
           <?php endif; ?>


           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </tbody>
         </table>
      </div>
    </div>
  </div>

</div>


<?php $__env->stopSection(); ?>


<?php $__env->startPush('styles'); ?>
<!-- Ediable -->
<link rel="stylesheet" href="<?php echo e(asset('admin/plugin/bootstrap-editable.css')); ?>">
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
       $('.no-required').editable({});
        $('.fied-required').editable({
        validate: function(value) {
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

    
   <script src="<?php echo e(asset('admin/plugin/jquery.pjax.js')); ?>"></script>

  <script type="text/javascript">

    $('.grid-refresh').click(function(){
      $.pjax.reload({container:'#pjax-container'});
    });

    $(document).on('pjax:send', function() {
      $('#loading').show()
    })
    $(document).on('pjax:complete', function() {
      $('#loading').hide()
    })
    $(document).ready(function(){
    // does current browser support PJAX
      if ($.support.pjax) {
        $.pjax.defaults.timeout = 2000; // time in milliseconds
      }
    });

    <?php echo $script_sort??''; ?>


    $(document).on('ready pjax:end', function(event) {
      $('.table-list input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
      });
    })

  </script>
    


<script type="text/javascript">

var selectedRows = function () {
    var selected = [];
    $('.grid-row-checkbox:checked').each(function(){
        selected.push($(this).data('id'));
    });

    return selected;
}

$('.grid-trash').on('click', function() {
  var ids = selectedRows().join();
  deleteItem(ids);
});

  function deleteItem(ids){
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success',
      cancelButton: 'btn btn-danger'
    },
    buttonsStyling: true,
  })

  swalWithBootstrapButtons.fire({
    title: 'Are you sure to delete this item ?',
    text: "",
    type: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, delete it!',
    confirmButtonColor: "#DD6B55",
    cancelButtonText: 'No, cancel!',
    reverseButtons: true,

    preConfirm: function() {
        return new Promise(function(resolve) {
            $.ajax({
                method: 'post',
                url: '<?php echo e($url_delete_item); ?>',
                data: {
                  ids:ids,
                    _token: '<?php echo e(csrf_token()); ?>',
                },
                success: function (data) {
                    $.pjax.reload('#pjax-container');
                    resolve(data);
                }
            });
        });
    }

  }).then((result) => {
    if (result.value) {
      swalWithBootstrapButtons.fire(
        'Deleted!',
        'Item has been deleted.',
        'success'
      )
    } else if (
      // Read more about handling dismissals
      result.dismiss === Swal.DismissReason.cancel
    ) {
      // swalWithBootstrapButtons.fire(
      //   'Cancelled',
      //   'Your imaginary file is safe :)',
      //   'error'
      // )
    }
  })
}


</script>
<script>

  // Update config
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
        url: '<?php echo e(route('admin_store_value.update')); ?>',
        type: 'POST',
        dataType: 'JSON',
        data: {"name": name,"value":isChecked,"_token": "<?php echo e(csrf_token()); ?>",},
      })
      .done(function(data) {
        if(data.stt == 1){
          if(isChecked == 1 && name == 'email_action_smtp_mode'){
            $('.config_smtp').show();
          }else if(isChecked == 0 && name == 'email_action_smtp_mode'){
            $('.config_smtp').hide();
          }
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
  //End update config
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\s-cart\resources\views/admin/screen/email_config.blade.php ENDPATH**/ ?>
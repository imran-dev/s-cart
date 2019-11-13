
<!--message-->
    <?php if(session()->has('success')): ?>

    <script type="text/javascript">
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

      Toast.fire({
        type: 'success',
        title: '<?php echo session()->get('success'); ?>'
      })
    </script>
    <?php endif; ?>

    <?php if(session()->has('error')): ?>
    <script type="text/javascript">
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

      Toast.fire({
        type: 'error',
        title: '<?php echo session()->get('error'); ?>'
      })
    </script>
    <?php endif; ?>

    <?php if(session()->has('warning')): ?>
    <script type="text/javascript">
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

      Toast.fire({
        type: 'warning',
        title: '<?php echo session()->get('warning'); ?>'
      })
    </script>
    <?php endif; ?>
<?php /**PATH E:\laragon\www\anytimebazar\resources\views/admin/component/alerts.blade.php ENDPATH**/ ?>
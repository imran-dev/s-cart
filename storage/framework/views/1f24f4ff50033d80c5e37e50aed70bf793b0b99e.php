<!--Module right -->
  <?php if(isset($blocksContent['right'])): ?>
      <?php $__currentLoopData = $blocksContent['right']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $layout): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($layout->page == null ||  $layout->page =='*' || $layout->page =='' || (isset($layout_page) && in_array($layout_page, $layout->page) ) ): ?>
          <?php if($layout->type =='html'): ?>
            <?php echo $layout->text; ?>

          <?php elseif($layout->type =='view'): ?>
            <?php if(view()->exists('block.'.$layout->text)): ?>
             <?php echo $__env->make('block.'.$layout->text, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
          <?php elseif($layout->type =='module'): ?>
            <?php echo sc_block_render($layout->text); ?>

          <?php endif; ?>
        <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php endif; ?>
<!--//Module right -->
<?php /**PATH E:\laragon\www\anytimebazar\resources\views/templates/default/right.blade.php ENDPATH**/ ?>
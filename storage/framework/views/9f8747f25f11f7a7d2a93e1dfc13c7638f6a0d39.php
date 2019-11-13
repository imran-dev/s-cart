<!--main left-->
<div class="col-sm-3">
   <?php $__env->startSection('left'); ?>
        <div class="left-sidebar">
      <!--Module left -->
          <?php if(isset($blocksContent['left'])): ?>
              <?php $__currentLoopData = $blocksContent['left']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $layout): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                $arrPage = explode(',', $layout->page)
              ?>
                <?php if($layout->page == '*' ||  (isset($layout_page) && in_array($layout_page, $arrPage))): ?>
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
      <!--//Module left -->
      </div>
    <?php echo $__env->yieldSection(); ?>
</div>
<!--//main left-->
<?php /**PATH E:\laragon\www\anytimebazar\resources\views/templates/default/left.blade.php ENDPATH**/ ?>
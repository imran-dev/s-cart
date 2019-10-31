  <?php
    $brands = (new \App\Models\ShopBrand)->getBrandsList()
  ?>
  <?php if(!empty($brands)): ?>
              <div class="brands_products"><!--brands_products-->
                <h2><?php echo e(trans('front.brands')); ?></h2>
                <div class="brands-name">
                  <ul class="nav nav-pills nav-stacked">
                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li><a href="<?php echo e($brand->getUrl()); ?>"> <?php echo e($brand->name); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                </div>
              </div><!--/brands_products-->
  <?php endif; ?>
<?php /**PATH E:\laragon\www\s-cart\resources\views/block/brands_left.blade.php ENDPATH**/ ?>
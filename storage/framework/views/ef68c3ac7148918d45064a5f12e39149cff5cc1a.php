  <?php
    $productsSpecial = (new \App\Models\ShopProduct)->getProductsSpecial($limit = 1, $random = true)
  ?>
  <?php if(!empty($productsSpecial)): ?>
              <div class="brands_products"><!--product special-->
                <h2><?php echo e(trans('front.products_special')); ?></h2>
                <div class="products-name">
                  <ul class="nav nav-pills nav-stacked">
                    <?php $__currentLoopData = $productsSpecial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $productSpecial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li>
                        <div class="product-image-wrapper product-single">
                          <div class="single-products product-box-<?php echo e($key); ?>">
                              <div class="productinfo text-center">
                                <a href="<?php echo e($productSpecial->getUrl()); ?>"><img src="<?php echo e(asset($productSpecial->getThumb())); ?>" alt="<?php echo e($productSpecial->name); ?>" /></a>
                                <?php echo $productSpecial->showPrice(); ?>

                                <a href="<?php echo e($productSpecial->getUrl()); ?>"><p><?php echo e($productSpecial->name); ?></p></a>
                              </div>
                          <?php if($productSpecial->price != $productSpecial->getFinalPrice()): ?>
                          <img src="<?php echo e(asset('templates/'.sc_store('template').'/images/home/sale.png')); ?>" class="new" alt="" />
                          <?php elseif($productSpecial->type == SC_PRODUCT_NEW): ?>
                          <img src="<?php echo e(asset('templates/'.sc_store('template').'/images/home/new.png')); ?>" class="new" alt="" />
                          <?php endif; ?>
                          </div>
                        </div>
                      </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                </div>
              </div><!--/product special-->
  <?php endif; ?>
<?php /**PATH E:\laragon\www\s-cart\resources\views/block/product_special.blade.php ENDPATH**/ ?>
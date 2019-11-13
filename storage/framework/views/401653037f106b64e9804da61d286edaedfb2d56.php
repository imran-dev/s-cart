<?php if(!empty($arrProductsLastView)): ?>
            <div class="last_view_product"><!--last_view_product-->
              <h2><?php echo e(trans('front.products_last_view')); ?></h2>
              <div class="products-lasView">
                <ul class="nav nav-pills nav-stacked">
                  <?php $__currentLoopData = $arrProductsLastView; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_lastView): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                      <div class="row">
                        <div class="col-xs-4"><a href="<?php echo e($product_lastView->getUrl()); ?>"><img src="<?php echo e(asset($product_lastView->getThumb())); ?>" alt="<?php echo e($product_lastView->name); ?>" /></a></div>
                        <div class="col-xs-8"><a href="<?php echo e($product_lastView->getUrl()); ?>"><?php echo e($product_lastView->name); ?></a><span class="last-view">(<?php echo e($product_lastView['timelastview']); ?>)</span></div>
                      </div>
                    </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              </div>
            </div><!--/last_view_product-->
<?php endif; ?>
<?php /**PATH E:\laragon\www\anytimebazar\app\Modules/Block/Views/LastViewProduct.blade.php ENDPATH**/ ?>
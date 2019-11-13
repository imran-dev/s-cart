<?php $__env->startSection('center'); ?>
          <div class="features_items"><!--features_items-->
            <h2 class="title text-center"><?php echo e(trans('front.features_items')); ?></h2>
                <?php $__currentLoopData = $products_new; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product_new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="col-sm-4">
                    <div class="product-image-wrapper product-single">
                      <div class="single-products product-box-<?php echo e($product_new->id); ?>">
                          <div class="productinfo text-center">
                            <a href="<?php echo e($product_new->getUrl()); ?>"><img src="<?php echo e(asset($product_new->getThumb())); ?>" alt="<?php echo e($product_new->name); ?>" /></a>
                            <?php echo $product_new->showPrice(); ?>

                            <a href="<?php echo e($product_new->getUrl()); ?>"><p><?php echo e($product_new->name); ?></p></a>

                            <?php if($product_new->allowSale()): ?>
                             <a class="btn btn-default add-to-cart" onClick="addToCartAjax('<?php echo e($product_new->id); ?>','default')"><i class="fa fa-shopping-cart"></i><?php echo e(trans('front.add_to_cart')); ?></a>
                            <?php else: ?>
                              &nbsp;
                            <?php endif; ?>

                          </div>
                      <?php if($product_new->price != $product_new->getFinalPrice() && $product_new->kind != SC_PRODUCT_GROUP): ?>
                      <img src="<?php echo e(asset('templates/'.sc_store('template').'/images/home/sale.png')); ?>" class="new" alt="" />
                      <?php elseif($product_new->type == SC_PRODUCT_NEW): ?>
                      <img src="<?php echo e(asset('templates/'.sc_store('template').'/images/home/new.png')); ?>" class="new" alt="" />
                      <?php elseif($product_new->type == SC_PRODUCT_HOT): ?>
                      <img src="<?php echo e(asset('templates/'.sc_store('template').'/images/home/hot.png')); ?>" class="new" alt="" />
                      <?php elseif($product_new->kind == SC_PRODUCT_BUILD): ?>
                      <img src="<?php echo e(asset('templates/'.sc_store('template').'/images/home/bundle.png')); ?>" class="new" alt="" />
                      <?php elseif($product_new->kind == SC_PRODUCT_GROUP): ?>
                      <img src="<?php echo e(asset('templates/'.sc_store('template').'/images/home/group.png')); ?>" class="new" alt="" />
                      <?php endif; ?>
                      </div>
                      <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                          <li><a onClick="addToCartAjax('<?php echo e($product_new->id); ?>','wishlist')"><i class="fa fa-plus-square"></i><?php echo e(trans('front.add_to_wishlist')); ?></a></li>
                          <li><a onClick="addToCartAjax('<?php echo e($product_new->id); ?>','compare')"><i class="fa fa-plus-square"></i><?php echo e(trans('front.add_to_compare')); ?></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div><!--features_items-->

          <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center"><?php echo e(trans('front.products_hot')); ?></h2>

            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <?php $__currentLoopData = $products_hot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product_hot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($key % 3 == 0): ?>
                  <div class="item <?php echo e(($key ==0)?'active':''); ?>">
                <?php endif; ?>
                  <div class="col-sm-4">
                    <div class="product-image-wrapper product-single">
                      <div class="single-products   product-box-<?php echo e($product_hot->id); ?>">
                          <div class="productinfo text-center">
                            <a href="<?php echo e($product_hot->getUrl()); ?>"><img src="<?php echo e(asset($product_hot->getThumb())); ?>" alt="<?php echo e($product_hot->name); ?>" /></a>
                            <?php echo $product_hot->showPrice(); ?>

                            <a href="<?php echo e($product_hot->getUrl()); ?>"><p><?php echo e($product_hot->name); ?></p></a>
                            <?php if($product_hot->allowSale()): ?>
                             <a class="btn btn-default add-to-cart" onClick="addToCartAjax('<?php echo e($product_hot->id); ?>','default')"><i class="fa fa-shopping-cart"></i><?php echo e(trans('front.add_to_cart')); ?></a>
                            <?php else: ?>
                              &nbsp;
                            <?php endif; ?>
                          </div>

                      <?php if($product_hot->price != $product_hot->getFinalPrice() && $product_hot->kind != SC_PRODUCT_GROUP): ?>
                      <img src="<?php echo e(asset('templates/'.sc_store('template').'/images/home/sale.png')); ?>" class="new" alt="" />
                      <?php elseif($product_hot->type == SC_PRODUCT_NEW): ?>
                      <img src="<?php echo e(asset('templates/'.sc_store('template').'/images/home/new.png')); ?>" class="new" alt="" />
                      <?php elseif($product_hot->type == SC_PRODUCT_HOT): ?>
                      <img src="<?php echo e(asset('templates/'.sc_store('template').'/images/home/hot.png')); ?>" class="new" alt="" />
                      <?php elseif($product_hot->kind == SC_PRODUCT_BUILD): ?>
                      <img src="<?php echo e(asset('templates/'.sc_store('template').'/images/home/bundle.png')); ?>" class="new" alt="" />
                      <?php elseif($product_hot->kind == SC_PRODUCT_GROUP): ?>
                      <img src="<?php echo e(asset('templates/'.sc_store('template').'/images/home/group.png')); ?>" class="new" alt="" />
                      <?php endif; ?>

                      </div>
                      <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                          <li><a onClick="addToCartAjax('<?php echo e($product_hot->id); ?>','wishlist')"><i class="fa fa-plus-square"></i><?php echo e(trans('front.add_to_wishlist')); ?></a></li>
                          <li><a onClick="addToCartAjax('<?php echo e($product_hot->id); ?>','compare')"><i class="fa fa-plus-square"></i><?php echo e(trans('front.add_to_compare')); ?></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                <?php if($key % 3 == 2 || $key+1 == $products_hot->count()): ?>
                  </div>
                <?php endif; ?>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              </div>
               <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                </a>
                <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
                </a>
            </div>
          </div><!--/recommended_items-->

          <div class="category-tab"><!--category-tab-->
            <div class="col-sm-12">
              <ul class="nav nav-tabs">
                  <li class="active"><a href="#cate1" data-toggle="tab"><?php echo e(trans('front.products_build')); ?></a></li>
                  <li><a href="#cate2" data-toggle="tab"><?php echo e(trans('front.products_group')); ?></a></li>
              </ul>
            </div>
            <div class="tab-content">

                <div class="tab-pane fade active in" id="cate1" >
                  <?php $__currentLoopData = $products_build; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-sm-3">
                      <div class="product-image-wrapper product-single">
                        <div class="single-products  product-box-<?php echo e($product->id); ?>">
                          <div class="productinfo text-center">
                            <a href="<?php echo e($product->getUrl()); ?>"><img src="<?php echo e(asset($product->getThumb())); ?>" alt="<?php echo e($product->name); ?>" /></a>
                            <?php echo $product->showPrice(); ?>

                            <a href="<?php echo e($product->getUrl()); ?>"><p><?php echo e($product->name); ?></p></a>
                            <?php if($product->allowSale()): ?>
                             <a class="btn btn-default add-to-cart" onClick="addToCartAjax('<?php echo e($product->id); ?>','default')"><i class="fa fa-shopping-cart"></i><?php echo e(trans('front.add_to_cart')); ?></a>
                            <?php else: ?>
                              &nbsp;
                            <?php endif; ?>
                          </div>

                      <?php if($product->price != $product->getFinalPrice() && $product->kind != SC_PRODUCT_GROUP): ?>
                      <img src="<?php echo e(asset('templates/'.sc_store('template').'/images/home/sale.png')); ?>" class="new" alt="" />
                      <?php elseif($product->type == SC_PRODUCT_NEW): ?>
                      <img src="<?php echo e(asset('templates/'.sc_store('template').'/images/home/new.png')); ?>" class="new" alt="" />
                      <?php elseif($product->type == SC_PRODUCT_HOT): ?>
                      <img src="<?php echo e(asset('templates/'.sc_store('template').'/images/home/hot.png')); ?>" class="new" alt="" />
                      <?php elseif($product->kind == SC_PRODUCT_BUILD): ?>
                      <img src="<?php echo e(asset('templates/'.sc_store('template').'/images/home/bundle.png')); ?>" class="new" alt="" />
                      <?php elseif($product->kind == SC_PRODUCT_GROUP): ?>
                      <img src="<?php echo e(asset('templates/'.sc_store('template').'/images/home/group.png')); ?>" class="new" alt="" />
                      <?php endif; ?>
                        </div>
                      </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
                <div class="tab-pane fade" id="cate2" >
                  <?php $__currentLoopData = $products_group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-sm-3">
                      <div class="product-image-wrapper product-single">
                        <div class="single-products  product-box-<?php echo e($product->id); ?>">
                          <div class="productinfo text-center">
                            <a href="<?php echo e($product->getUrl()); ?>"><img src="<?php echo e(asset($product->getThumb())); ?>" alt="<?php echo e($product->name); ?>" /></a>
                            <?php echo $product->showPrice(); ?>

                            <a href="<?php echo e($product->getUrl()); ?>"><p><?php echo e($product->name); ?></p></a>
                            <?php if($product->allowSale()): ?>
                             <a class="btn btn-default add-to-cart" onClick="addToCartAjax('<?php echo e($product->id); ?>','default')"><i class="fa fa-shopping-cart"></i><?php echo e(trans('front.add_to_cart')); ?></a>
                            <?php else: ?>
                              &nbsp;
                            <?php endif; ?>
                          </div>

                      <?php if($product->price != $product->getFinalPrice() && $product->kind != SC_PRODUCT_GROUP): ?>
                      <img src="<?php echo e(asset('templates/'.sc_store('template').'/images/home/sale.png')); ?>" class="new" alt="" />
                      <?php elseif($product->type == SC_PRODUCT_NEW): ?>
                      <img src="<?php echo e(asset('templates/'.sc_store('template').'/images/home/new.png')); ?>" class="new" alt="" />
                      <?php elseif($product->type == SC_PRODUCT_HOT): ?>
                      <img src="<?php echo e(asset('templates/'.sc_store('template').'/images/home/hot.png')); ?>" class="new" alt="" />
                      <?php elseif($product->kind == SC_PRODUCT_BUILD): ?>
                      <img src="<?php echo e(asset('templates/'.sc_store('template').'/images/home/bundle.png')); ?>" class="new" alt="" />
                      <?php elseif($product->kind == SC_PRODUCT_GROUP): ?>
                      <img src="<?php echo e(asset('templates/'.sc_store('template').'/images/home/group.png')); ?>" class="new" alt="" />
                      <?php endif; ?>
                        </div>
                      </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
          </div><!--/category-tab-->


<?php $__env->stopSection(); ?>



<?php $__env->startPush('styles'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('templates.'.sc_store('template').'.shop_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\anytimebazar\resources\views/templates/tz-template/shop_home.blade.php ENDPATH**/ ?>
<?php $__env->startSection('center'); ?>
          <div class="product-details"><!--product-details-->
            <div class="col-sm-6">


              <div id="product-detail-image" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                      <div class="view-product item active"  data-slide-number="0">
                        <img src="<?php echo e(asset($product->getImage())); ?>" alt="">
                      </div>
                    <?php if($product->images->count()): ?>
                       <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="view-product item"  data-slide-number="<?php echo e($key + 1); ?>">
                          <img src="<?php echo e(asset($image->getImage())); ?>" alt="">
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    </div>
                  
              </div>
              <?php if($product->images->count()): ?>
                    <!-- Controls -->
                    <a class="left item-control" style="display: inherit;" href="#product-detail-image" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="right item-control" href="#product-detail-image" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                    </a>
                <?php endif; ?>
            </div>

        <form id="buy_block" action="<?php echo e(route('cart.add')); ?>" method="post">
          <?php echo e(csrf_field()); ?>

          <input type="hidden" name="product_id" id="product-detail-id" value="<?php echo e($product->id); ?>" />
            <div class="col-sm-6">
              <div class="product-information"><!--/product-information-->
                <?php if($product->price != $product->getFinalPrice() && $product->kind != SC_PRODUCT_GROUP): ?>
                <img src="<?php echo e(asset('templates/'.sc_store('template').'/images/home/sale2.png')); ?>" class="newarrival" alt="" />
                <?php elseif($product->type == SC_PRODUCT_NEW): ?>
                <img src="<?php echo e(asset('templates/'.sc_store('template').'/images/home/new2.png')); ?>" class="newarrival" alt="" />
                <?php elseif($product->type == SC_PRODUCT_HOT): ?>
                <img src="<?php echo e(asset('templates/'.sc_store('template').'/images/home/hot2.png')); ?>" class="newarrival" alt="" />
                <?php elseif($product->kind == SC_PRODUCT_BUILD): ?>
                <img src="<?php echo e(asset('templates/'.sc_store('template').'/images/home/bundle2.png')); ?>" class="newarrival" alt="" />
                <?php elseif($product->kind == SC_PRODUCT_GROUP): ?>
                <img src="<?php echo e(asset('templates/'.sc_store('template').'/images/home/group2.png')); ?>" class="newarrival" alt="" />
                <?php endif; ?>

                <h2  id="product-detail-name"><?php echo e($product->name); ?></h2>
                <p>SKU: <span  id="product-detail-model"><?php echo e($product->sku); ?></span></p>
                <div id="product-detail-price">
                  <?php echo $product->showPrice(); ?>

                </div>
                <span>
                  <label><?php echo e(trans('product.quantity')); ?>:</label>
                  <input type="number" name="qty" value="1" min="1" />
                  <button type="submit" class="btn btn-fefault cart">
                    <i class="fa fa-shopping-cart"></i>
                    <?php echo e(trans('front.add_to_cart')); ?>

                  </button>
                </span>
                <div  id="product-detail-attr">
                  <?php if($product->attributes()): ?>
                  <?php echo $product->renderAttributeDetails(); ?>

                  <?php endif; ?>
                </div>
                <b><?php echo e(trans('product.availability')); ?>:</b>
                <span id="product-detail-available">
                    <?php if(sc_config('show_date_available') && $product->date_available >= date('Y-m-d H:i:s')): ?>
                    <?php echo e($product->date_available); ?>

                    <?php elseif($product->stock <=0 && sc_config('product_buy_out_of_stock') == 0): ?>
                    <?php echo e(trans('product.out_stock')); ?>

                    <?php else: ?>
                    <?php echo e(trans('product.in_stock')); ?>

                    <?php endif; ?>
                </span>
                <br>
                <b><?php echo e(trans('product.brand')); ?>:</b> <span id="product-detail-brand"><?php echo e(empty($product->brand->name)?'None':$product->brand->name); ?></span><br>

              <?php if($product->kind == SC_PRODUCT_GROUP): ?>
              <div class="products-group">
                <?php
                  $groups = $product->groups
                ?>
                <b><?php echo e(trans('product.groups')); ?></b>:<br>
                <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <span class="product-group" data-id="<?php echo e($group->product_id); ?>"><?php echo sc_image_render($group->product->image); ?></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
              <?php endif; ?>

              <?php if($product->kind == SC_PRODUCT_BUILD): ?>
              <div class="products-group">
                <?php
                  $builds = $product->builds
                ?>
                <b><?php echo e(trans('product.builds')); ?></b>:<br>
                <span class="product-build"><?php echo sc_image_render($product->image); ?> = </span>
                <?php $__currentLoopData = $builds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $build): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php echo ($k)?'<i class="fa fa-plus" aria-hidden="true"></i>':''; ?> <span class="product-build"><?php echo e($build->quantity); ?> x <a target="_new" href="<?php echo e($build->product->getUrl()); ?>"><?php echo sc_image_render($build->product->image); ?></a></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
              <?php endif; ?>


              </div><!--/product-information-->
            </div>
          </div><!--/product-details-->
        </form>

          <div class="category-tab shop-details-tab"><!--category-tab-->
            <div class="col-sm-12">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#details" data-toggle="tab"><?php echo e(trans('product.description')); ?></a></li>
              </ul>
            </div>
            <div class="tab-content">
              <div class="tab-pane fade  active in" id="product-detail-content" >
                <?php echo sc_html_render($product->content); ?>

              </div>
            </div>
          </div><!--/category-tab-->
<?php if($productsToCategory->count()): ?>
          <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center"><?php echo e(trans('front.recommended_items')); ?></h2>

            <div id="recommended-item-carousel" class="carousel slide">
              <div class="carousel-inner">
               <?php $__currentLoopData = $productsToCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product_rel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($key % 4 == 0): ?>
                  <div class="item <?php echo e(($key ==0)?'active':''); ?>">
                <?php endif; ?>
                  <div class="col-sm-3">
                    <div class="product-image-wrapper product-single">
                      <div class="single-products   product-box-<?php echo e($product_rel->id); ?>">
                          <div class="productinfo text-center">
                            <a href="<?php echo e($product_rel->getUrl()); ?>"><img src="<?php echo e(asset($product_rel->getThumb())); ?>" alt="<?php echo e($product_rel->name); ?>" /></a>
                        <?php echo $product_rel->showPrice(); ?>

                            <a href="<?php echo e($product_rel->getUrl()); ?>"><p><?php echo e($product_rel->name); ?></p></a>
                          </div>
                          <?php if($product_rel->price != $product_rel->getFinalPrice()): ?>
                          <img src="<?php echo e(asset('templates/'.sc_store('template').'/images/home/sale.png')); ?>" class="new" alt="" />
                          <?php elseif($product_rel->type == 1): ?>
                          <img src="<?php echo e(asset('templates/'.sc_store('template').'/images/home/new.png')); ?>" class="new" alt="" />
                          <?php endif; ?>
                      </div>
                    </div>
                  </div>
                <?php if($key % 4 == 3): ?>
                  </div>
                <?php endif; ?>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
          </div><!--/recommended_items-->
<?php endif; ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
  $('.product-group').click(function(event) {
    if($(this).hasClass('active')){
      return;
    }
    $('.product-group').removeClass('active');
    $(this).addClass('active');
    var id = $(this).data("id");
      $.ajax({
          url:'<?php echo e(route("product.info")); ?>',
          type:'POST',
          dataType:'json',
          data:{id:id,"_token": "<?php echo e(csrf_token()); ?>"},
          beforeSend: function(){
              $('#loading').show();
          },
          success: function(data){
            console.log(data);
            $('#product-detail-name').html(data.name);
            $('#product-detail-model').html(data.sku);
            $('#product-detail-price').html(data.showPrice);
            $('#product-detail-brand').html(data.brand_name);
            $('#product-detail-image').html(data.showImages);
            $('#product-detail-available').html(data.availability);
            $('#product-detail-id').val(data.id);
            $('#product-detail-image').carousel();
            $('#loading').hide();
            window.history.pushState("", "", data.url);            
          }
      });

  });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('templates.'.sc_store('template').'.shop_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\anytimebazar\resources\views/templates/tz-template/shop_product_detail.blade.php ENDPATH**/ ?>
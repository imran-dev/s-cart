<?php $__env->startSection('center'); ?>
  <div class="features_items">
    <h2 class="title text-center"><?php echo e($title); ?></h2>

    <?php if(isset($itemsList)): ?>
      <?php if($itemsList->count()): ?>
      <div class="item-folder">
            <?php $__currentLoopData = $itemsList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-3 col-xs-4">
                <div class="item-folder-wrapper product-single">
                  <div class="single-products">
                    <div class="productinfo text-center product-box-<?php echo e($item->id); ?>">
                      <a href="<?php echo e($item->getUrl()); ?>"><img src="<?php echo e(asset($item->getThumb())); ?>" alt="<?php echo e($item->name); ?>" /></a>
                      <a href="<?php echo e($item->getUrl()); ?>"><p><?php echo e($item->name); ?></p></a>
                    </div>
                  </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div style="clear: both; ">
        </div>
      </div>
      <?php endif; ?>
    <?php endif; ?>

      <?php if(count($products) ==0): ?>
        <?php echo e(trans('front.empty_product')); ?>

      <?php else: ?>
          <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-sm-4 col-xs-6">
              <div class="product-image-wrapper product-single">
                <div class="single-products">
                  <div class="productinfo text-center product-box-<?php echo e($product->id); ?>">
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
                <div class="choose">
                  <ul class="nav nav-pills nav-justified">
                    <li><a  onClick="addToCartAjax(<?php echo e($product->id); ?>,'wishlist')"><i class="fa fa-plus-square"></i><?php echo e(trans('front.add_to_wishlist')); ?></a></li>
                    <li><a  onClick="addToCartAjax(<?php echo e($product->id); ?>,'compare')"><i class="fa fa-plus-square"></i><?php echo e(trans('front.add_to_compare')); ?></a></li>
                  </ul>
                </div>
              </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>

    <div style="clear: both; ">
        <ul class="pagination">
          <?php echo e($products->appends(request()->except(['page','_token']))->links()); ?>

      </ul>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('breadcrumb'); ?>
    <div class="breadcrumbs pull-left">
        <ol class="breadcrumb">
          <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
          <li class="active"><?php echo e($title); ?></li>
        </ol>
      </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('filter'); ?>
  <form action="" method="GET" id="filter_sort">
        <div class="pull-right">
        <div>
            <?php
              $queries = request()->except(['filter_sort','page']);
            ?>
            <?php $__currentLoopData = $queries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $query): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <input type="hidden" name="<?php echo e($key); ?>" value="<?php echo e($query); ?>">
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <select class="custom-select" name="filter_sort">
            <option value=""><?php echo e(trans('front.filters.sort')); ?></option>
            <option value="price_asc" <?php echo e(($filter_sort =='price_asc')?'selected':''); ?>><?php echo e(trans('front.filters.price_asc')); ?></option>
            <option value="price_desc" <?php echo e(($filter_sort =='price_desc')?'selected':''); ?>><?php echo e(trans('front.filters.price_desc')); ?></option>
            <option value="sort_asc" <?php echo e(($filter_sort =='sort_asc')?'selected':''); ?>><?php echo e(trans('front.filters.sort_asc')); ?></option>
            <option value="sort_desc" <?php echo e(($filter_sort =='sort_desc')?'selected':''); ?>><?php echo e(trans('front.filters.sort_desc')); ?></option>
            <option value="id_asc" <?php echo e(($filter_sort =='id_asc')?'selected':''); ?>><?php echo e(trans('front.filters.id_asc')); ?></option>
            <option value="id_desc" <?php echo e(($filter_sort =='id_desc')?'selected':''); ?>><?php echo e(trans('front.filters.id_desc')); ?></option>
          </select>
        </div>
      </div>
  </form>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
  <script type="text/javascript">
    $('[name="filter_sort"]').change(function(event) {
      $('#filter_sort').submit();
    });
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('templates.'.sc_store('template').'.shop_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\s-cart\resources\views/templates/default/shop_products_list.blade.php ENDPATH**/ ?>
  <?php
    $banners = \App\Models\ShopBanner::where('status', 1)->sort()->get()
  ?>
 <?php if(!empty($banners)): ?>
 <section id="slider"><!--slider-->
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div id="slider-carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li data-target="#slider-carousel" data-slide-to="<?php echo e($key); ?>" class="<?php echo e(($key)?'':'active'); ?>"></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ol>
            <div class="carousel-inner">
               <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="item <?php echo e(($key)?'':'active'); ?>">
                    <div class="col-sm-12">
                      <img src="<?php echo e($banner->image); ?>" class="girl img-responsive" alt="" />
                    </div>
                  </div>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
              <i class="fa fa-angle-left"></i>
            </a>
            <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
              <i class="fa fa-angle-right"></i>
            </a>
          </div>

        </div>
      </div>
    </div>
  </section><!--/slider-->
<?php endif; ?>
<?php /**PATH E:\laragon\www\s-cart\resources\views/block/banner_image.blade.php ENDPATH**/ ?>
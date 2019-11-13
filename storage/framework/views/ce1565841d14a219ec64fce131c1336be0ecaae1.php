<!--Footer-->

<!--Module top footer -->
  <?php if(isset($blocksContent['footer'])): ?>
      <?php $__currentLoopData = $blocksContent['footer']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $layout): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
          $arrPage = explode(',', $layout->page)
        ?>
        <?php if($layout->page == '*' ||  (isset($layout_page) && in_array($layout_page, $arrPage))): ?>
          <?php if($layout->type =='html'): ?>
            <?php echo $layout->text; ?>

          <?php elseif($layout->type =='view'): ?>
            <?php if(view()->exists('blockView.'.$layout->text)): ?>
             <?php echo $__env->make('blockView.'.$layout->text, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
          <?php elseif($layout->type =='module'): ?>
            <?php echo sc_block_render($layout->text); ?>

          <?php endif; ?>
        <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php endif; ?>
<!--//Module top footer -->

  <footer id="footer"><!--Footer-->
    <div class="footer-widget">
      <div class="container">
        <div class="row">
          <div class="col-sm-3">
            <div class="single-widget">
              <h2><a href="<?php echo e(route('home')); ?>"><img style="max-width: 150px;" src="<?php echo e(asset(sc_store('logo'))); ?>"></a></h2>
             <ul class="nav nav-pills nav-stacked">
               <li><?php echo e(sc_store('title')); ?></li>
             </ul>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="single-widget">
              <h2><?php echo e(trans('front.my_account')); ?></h2>
              <ul class="nav nav-pills nav-stacked">
                <?php if(!empty($layoutsUrl['footer'])): ?>
                  <?php $__currentLoopData = $layoutsUrl['footer']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a <?php echo e(($url->target =='_blank')?'target=_blank':''); ?> href="<?php echo e(sc_url_render($url->url)); ?>"><?php echo e(sc_language_render($url->name)); ?></a></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
              </ul>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="single-widget">
              <h2><?php echo e(trans('front.about')); ?></h2>
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#"><?php echo e(trans('front.shop_info.address')); ?>: <?php echo e(sc_store('address')); ?></a></li>
                <li><a href="#"><?php echo e(trans('front.shop_info.hotline')); ?>: <?php echo e(sc_store('long_phone')); ?></a></li>
                <li><a href="#"><?php echo e(trans('front.shop_info.email')); ?>: <?php echo e(sc_store('email')); ?></a></li>
            </ul>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="single-widget">
              <h2><?php echo e(trans('front.subscribe.title')); ?></h2>
              <form action="<?php echo e(route('subscribe')); ?>" method="post" class="searchform">
                <?php echo csrf_field(); ?>

                <input type="email" name="subscribe_email" required="required" placeholder="<?php echo e(trans('front.subscribe.subscribe_email')); ?>">
                <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                <p><?php echo e(trans('front.subscribe.subscribe_des')); ?></p>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <p class="pull-left">Copyright © 2018 <a href="<?php echo e(config('scart.homepage')); ?>"><?php echo e(config('scart.name')); ?> <?php echo e(config('scart.version')); ?></a> Inc. All rights reserved.</p>
          <p class="pull-right">Hosted by  <span><a target="_blank" href="https://giaiphap247.com">GiaiPhap247</a></span></p>
            <!--
            S-Cart is free open source and you are free to remove the powered by S-cart if you want, but its generally accepted practise to make a small donation.
            Please donate via PayPal to https://www.paypal.me/LeLanh or Email: fastle.ktc@gmail.com
            //-->
        </div>
      </div>
    </div>
  </footer>
<!--//Footer-->
<?php /**PATH E:\laragon\www\anytimebazar\resources\views/templates/tz-template/footer.blade.php ENDPATH**/ ?>
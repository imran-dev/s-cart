  <header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <div class="contactinfo">
              <ul class="nav nav-pills">
                <li><a href="#"><i class="fa fa-phone"></i> <?php echo e(sc_store('phone')); ?></a></li>
                <li><a href="#"><i class="fa fa-envelope"></i> <?php echo e(sc_store('email')); ?></a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="btn-group pull-right">
              <div class="btn-group locale">
                <?php if(count($languages)>1): ?>
                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown"><img src="<?php echo e(asset($languages[app()->getLocale()]['icon'])); ?>" style="height: 25px;">
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo e(url('locale/'.$key)); ?>"><img src="<?php echo e(asset($language['icon'])); ?>" style="height: 25px;"></a></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <?php endif; ?>
              </div>
              <?php if(count($currencies)>1): ?>
               <div class="btn-group locale">
                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                  <?php echo e(sc_currency_info()['name']); ?>

                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo e(url('currency/'.$currency->code)); ?>"><?php echo e($currency->name); ?></a></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div><!--/header_top-->
    <div class="header-middle"><!--header-middle-->
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <div class="logo pull-left">
              <a href="<?php echo e(route('home')); ?>"><img style="width: 150px;" src="<?php echo e(asset(sc_store('logo'))); ?>" alt="" /></a>
            </div>
          </div>
          <div class="col-sm-8">
            <div class="shop-menu pull-right">
              <ul class="nav navbar-nav">

                <li><a href="<?php echo e(route('wishlist')); ?>"><span  class="cart-qty  shopping-wishlist" id="shopping-wishlist"><?php echo e(Cart::instance('wishlist')->count()); ?></span><i class="fa fa-star"></i> <?php echo e(trans('front.wishlist')); ?></a></li>
                <li><a href="<?php echo e(route('compare')); ?>"><span  class="cart-qty shopping-compare" id="shopping-compare"><?php echo e(Cart::instance('compare')->count()); ?></span><i class="fa fa-crosshairs"></i> <?php echo e(trans('front.compare')); ?></a></li>
                <li><a href="<?php echo e(route('cart')); ?>"><span class="cart-qty shopping-cart" id="shopping-cart"><?php echo e($carts['count']); ?></span><i class="fa fa-shopping-cart"></i> <?php echo e(trans('front.cart_title')); ?></a>
                </li>
                <?php if(auth()->guard()->guest()): ?>
                <li><a href="<?php echo e(route('login')); ?>"><i class="fa fa-lock"></i> <?php echo e(trans('front.login')); ?></a></li>
                <?php else: ?>
                <li><a href="<?php echo e(route('member.index')); ?>"><i class="fa fa-user"></i> <?php echo e(trans('front.account')); ?></a></li>
                <li><a href="<?php echo e(route('logout')); ?>" rel="nofollow" onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> <?php echo e(trans('front.logout')); ?></a></li>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                  <?php echo csrf_field(); ?>
                </form>
                <?php endif; ?>

              </ul>
            </div>
          </div>
        </div>
      </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
      <div class="container">
        <div class="row">
          <div class="col-sm-9">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div class="mainmenu pull-left">
              <ul class="nav navbar-nav collapse navbar-collapse">
                <li><a href="<?php echo e(route('home')); ?>" class="active"><?php echo e(trans('front.home')); ?></a></li>
                <li class="dropdown"><a href="#"><?php echo e(trans('front.shop')); ?><i class="fa fa-angle-down"></i></a>
                    <ul role="menu" class="sub-menu">
                        <li><a href="<?php echo e(route('product.all')); ?>"><?php echo e(trans('front.all_product')); ?></a></li>
                        <li><a href="<?php echo e(route('compare')); ?>"><?php echo e(trans('front.compare')); ?></a></li>
                        <li><a href="<?php echo e(route('cart')); ?>"><?php echo e(trans('front.cart_title')); ?></a></li>
                        <li><a href="<?php echo e(route('categories')); ?>"><?php echo e(trans('front.categories')); ?></a></li>
                        <li><a href="<?php echo e(route('brands')); ?>"><?php echo e(trans('front.brands')); ?></a></li>
                        <li><a href="<?php echo e(route('vendors')); ?>"><?php echo e(trans('front.vendors')); ?></a></li>
                    </ul>
                </li>

                <li><a href="<?php echo e(route('news')); ?>"><?php echo e(trans('front.blog')); ?></a></li>

                <?php if(!empty(sc_config('Content'))): ?>
                <li class="dropdown"><a href="#"><?php echo e(trans('front.cms_category')); ?><i class="fa fa-angle-down"></i></a>
                    <ul role="menu" class="sub-menu">
                      <?php
                        $cmsCategories = (new \App\Modules\Cms\Models\CmsCategory)->where('status',1)->get();
                      ?>
                      <?php $__currentLoopData = $cmsCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cmsCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e($cmsCategory->getUrl()); ?>"><?php echo e(sc_language_render($cmsCategory->title)); ?></a></li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </li>
                <?php endif; ?>

                  <?php if(!empty($layoutsUrl['menu'])): ?>
                    <?php $__currentLoopData = $layoutsUrl['menu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li><a <?php echo e(($url->target =='_blank')?'target=_blank':''); ?> href="<?php echo e(sc_url_render($url->url)); ?>"><?php echo e(sc_language_render($url->name)); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
              </ul>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="search_box pull-right">
              <form id="searchbox" method="get" action="<?php echo e(route('search')); ?>" >
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="<?php echo e(trans('front.search_form.keyword')); ?>..." name="keyword">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div><!--/header-bottom-->
  </header><!--/header-->
<?php /**PATH E:\laragon\www\anytimebazar\resources\views/templates/default/header.blade.php ENDPATH**/ ?>
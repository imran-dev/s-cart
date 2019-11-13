<?php
  $carts = \Cart::getListCart();
?>
<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo e($description??sc_store('description')); ?>">
    <meta name="keyword" content="<?php echo e($keyword??sc_store('keyword')); ?>">
    <title><?php echo e($title??sc_store('title')); ?></title>
    <meta property="og:image" content="<?php echo e(!empty($og_image)?$og_image:asset('images/org.jpg')); ?>" />
    <meta property="og:url" content="<?php echo e(\Request::fullUrl()); ?>" />
    <meta property="og:type" content="Website" />
    <meta property="og:title" content="<?php echo e($title??sc_store('title')); ?>" />
    <meta property="og:description" content="<?php echo e($description??sc_store('description')); ?>" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<!--Module meta -->
  <?php if(isset($blocksContent['meta'])): ?>
      <?php $__currentLoopData = $blocksContent['meta']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $layout): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
          $arrPage = explode(',', $layout->page)
        ?>
        <?php if($layout->page == '*' ||  (isset($layout_page) && in_array($layout_page, $arrPage))): ?>
          <?php if($layout->page =='html'): ?>
            <?php echo e($layout->text); ?>

          <?php endif; ?>
        <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php endif; ?>
<!--//Module meta -->
    <link href="<?php echo e(asset('templates/'.sc_store('template').'/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('templates/'.sc_store('template').'/css/font-awesome.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('templates/'.sc_store('template').'/css/prettyPhoto.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('templates/'.sc_store('template').'/css/animate.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('templates/'.sc_store('template').'/css/main.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('templates/'.sc_store('template').'/css/responsive.css')); ?>" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="<?php echo e(asset('templates/'.sc_store('template').'/js/html5shiv.js')); ?>"></script>
    <script src="<?php echo e(asset('templates/'.sc_store('template').'/js/respond.min.js')); ?>"></script>
    <![endif]-->
    <link rel="shortcut icon" href="<?php echo e(asset('templates/'.sc_store('template').'/images/ico/favicon.ico')); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo e(asset('templates/'.sc_store('template').'/images/ico/apple-touch-icon-144-precomposed.png')); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo e(asset('templates/'.sc_store('template').'/images/ico/apple-touch-icon-114-precomposed.png')); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo e(asset('templates/'.sc_store('template').'/images/ico/apple-touch-icon-72-precomposed.png')); ?>">
    <link rel="apple-touch-icon-precomposed" href="<?php echo e(asset('templates/'.sc_store('template').'/images/ico/apple-touch-icon-57-precomposed.png')); ?>">
<!--Module header -->
  <?php if(isset($blocksContent['header'])): ?>
      <?php $__currentLoopData = $blocksContent['header']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $layout): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php
        $arrPage = explode(',', $layout->page)
      ?>
        <?php if($layout->page == '*' ||  (isset($layout_page) && in_array($layout_page, $arrPage))): ?>
          <?php if($layout->page =='html'): ?>
            <?php echo e($layout->text); ?>

          <?php endif; ?>
        <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php endif; ?>
<!--//Module header -->

</head><!--/head-->
<body>

<?php echo $__env->make('templates.'.sc_store('template').'.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!--Module banner -->
  <?php if(isset($blocksContent['banner_top'])): ?>
      <?php $__currentLoopData = $blocksContent['banner_top']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $layout): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
<!--//Module banner -->


<!--Module top -->
  <?php if(isset($blocksContent['top'])): ?>
      <?php $__currentLoopData = $blocksContent['top']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $layout): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
<!--//Module top -->


  <section>
    <div class="container">
      <div class="row">
        <div class="col-sm-12" id="breadcrumb">
          <!--breadcrumb-->
          <?php echo $__env->yieldContent('breadcrumb'); ?>
          <!--//breadcrumb-->

          <!--//fillter-->
          <?php echo $__env->yieldContent('filter'); ?>
          <!--//fillter-->
        </div>

        <!--body-->
        <?php $__env->startSection('main'); ?>
          <?php echo $__env->make('templates.'.sc_store('template').'.left', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <?php echo $__env->make('templates.'.sc_store('template').'.center', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <?php echo $__env->make('templates.'.sc_store('template').'.right', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldSection(); ?>
        <!--//body-->

      </div>
    </div>
  </section>

<?php echo $__env->make('templates.'.sc_store('template').'.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script src="<?php echo e(asset('templates/'.sc_store('template').'/js/jquery.js')); ?>"></script>
<script src="<?php echo e(asset('templates/'.sc_store('template').'/js/jquery-ui.min.js')); ?>"></script>
<script src="<?php echo e(asset('templates/'.sc_store('template').'/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('templates/'.sc_store('template').'/js/jquery.scrollUp.min.js')); ?>"></script>
<script src="<?php echo e(asset('templates/'.sc_store('template').'/js/jquery.prettyPhoto.js')); ?>"></script>
<script src="<?php echo e(asset('templates/'.sc_store('template').'/js/main.js')); ?>"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/mouse0270-bootstrap-notify/3.1.7/bootstrap-notify.min.js"></script>


<?php echo $__env->yieldPushContent('scripts'); ?>

    <script type="text/javascript">
      function formatNumber (num) {
          return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
      }
      $('#shipping').change(function(){
          $('#total').html(formatNumber(parseInt(<?php echo e(Cart::subtotal()); ?>)+ parseInt($('#shipping').val())));
      });
    </script>

    <script type="text/javascript">
        function addToCartAjax(id,instance = null){
        $.ajax({
            url: "<?php echo e(route('cart.add_ajax')); ?>",
            type: "POST",
            dataType: "JSON",
            data: {"id": id,"instance":instance, "_token":"<?php echo e(csrf_token()); ?>"},
            async: false,
            success: function(data){
              // console.log(data);
                error= parseInt(data.error);
                if(error ==0)
                {
                  setTimeout(function () {
                    if(data.instance =='default'){
                      $('.shopping-cart').html(data.count_cart);
                    }else{
                      $('.shopping-'+data.instance).html(data.count_cart);
                    }
                  }, 1000);

                    $.notify({
                      icon: 'glyphicon glyphicon-star',
                      message: data.msg
                    },{
                      type: 'success'
                    });
                }else{
                  if(data.redirect){
                    window.location.replace(data.redirect);
                    return;
                  }
                  $.notify({
                  icon: 'glyphicon glyphicon-warning-sign',
                    message: data.msg
                  },{
                    type: 'danger'
                  });
                }

                }
        });
    }
</script>

<!--message-->
    <?php if(Session::has('success')): ?>
    <script type="text/javascript">
        $.notify({
          icon: 'glyphicon glyphicon-star',
          message: "<?php echo Session::get('success'); ?>"
        },{
          type: 'success'
        });
    </script>
    <?php endif; ?>
    <?php if(Session::has('error')): ?>
    <script type="text/javascript">
        $.notify({
        icon: 'glyphicon glyphicon-warning-sign',
          message: "<?php echo Session::get('error'); ?>"
        },{
          type: 'danger'
        });
    </script>
    <?php endif; ?>
    <?php if(Session::has('warning')): ?>
    <script type="text/javascript">
        $.notify({
        icon: 'glyphicon glyphicon-warning-sign',
          message: "<?php echo Session::get('warning'); ?>"
        },{
          type: 'warning'
        });
    </script>
    <?php endif; ?>
<!--//message-->


<!--Module bottom -->
  <?php if(isset($blocksContent['bottom'])): ?>
      <?php $__currentLoopData = $blocksContent['bottom']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $layout): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
<!--//Module bottom -->
    <div id="loading">
          <div id="overlay" class="overlay"><i class="fa fa-spinner fa-pulse fa-5x fa-fw "></i></div>
   </div>
</body>
</html>
<?php /**PATH E:\laragon\www\anytimebazar\resources\views/templates/default/shop_layout.blade.php ENDPATH**/ ?>
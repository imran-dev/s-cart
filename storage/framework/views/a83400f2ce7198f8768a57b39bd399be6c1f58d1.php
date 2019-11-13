<?php
  $newOrders = \App\Models\ShopOrder::where('status',1)->orderBy('id','desc');
  $totalNewOrders = $newOrders->count();
  $orders = $newOrders->limit(10)->get();
?>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning"><?php echo e($totalNewOrders); ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header"> <?php echo e(trans('admin.menu_notice.new_order',['total'=>$totalNewOrders])); ?></li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                      <a href="<?php echo e(route('admin_order.detail',['id'=>$order->id])); ?>">
                        <i class="fa fa-shopping-cart text-green"></i> #<?php echo e($order->id); ?> - <?php echo e(trans('admin.menu_notice.date')); ?>: <?php echo e($order->created_at); ?>

                      </a>
                    </li>                      
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              </li>
              <li class="footer"><a href="<?php echo e(route('admin_order.index')); ?>?order_status=1"><?php echo e(trans('admin.menu_notice.view_all')); ?></a></li>
            </ul>
          </li>
<?php /**PATH E:\laragon\www\anytimebazar\resources\views/admin/component/notice.blade.php ENDPATH**/ ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo e(Admin::user()->avatar); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo e(Admin::user()->name); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form -->
      <form action="<?php echo e(route('admin_order.index')); ?>" method="get" class="sidebar-form">
        <div class="input-group">
        <input type="text" name="keyword" class="form-control" placeholder="<?php echo e(trans('order.search')); ?>">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

<?php
  $menus = Admin::getMenu();
  // print_r($menus);
?>

        <?php $__currentLoopData = $menus[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level0): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($level0->type ==1): ?>
            <?php if(Admin::user()->visible($level0)): ?>
            <li class="header"><?php echo e(sc_language_render($level0->title)); ?></li>
            <?php endif; ?>
          <?php elseif($level0->uri): ?>
            <?php if(Admin::user()->visible($level0)): ?>
              <li class=""><a href="<?php echo e($level0->uri?sc_url_render($level0->uri):'#'); ?>"><i class="fa <?php echo e($level0->icon); ?>"></i><?php echo e(sc_language_render($level0->title)); ?></a></li>
            <?php endif; ?>
          <?php else: ?>
            <?php if(Admin::user()->visible($level0)): ?>
            <li class="treeview">
              <a href="#">
                <i class="fa <?php echo e($level0->icon); ?>"></i> <span><?php echo e(sc_language_render($level0->title)); ?></span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
    
            <?php if(isset($menus[$level0->id]) && count($menus[$level0->id])): ?>
              <ul class="treeview-menu">
                <?php $__currentLoopData = $menus[$level0->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($level1->uri): ?>
                    <?php if(Admin::user()->visible($level1)): ?>
                    <li class=""><a href="<?php echo e($level1->uri?sc_url_render($level1->uri):'#'); ?>"><i class="fa <?php echo e($level1->icon); ?>"></i> <?php echo e(sc_language_render($level1->title)); ?></a></li>
                    <?php endif; ?>
                  <?php else: ?>
                  <?php if(Admin::user()->visible($level1)): ?>
                  <li class="treeview">
                    <a href="#">
                      <i class="fa <?php echo e($level1->icon); ?>"></i> <span><?php echo e(sc_language_render($level1->title)); ?></span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
            
                        <?php if(isset($menus[$level1->id]) && count($menus[$level1->id])): ?>
                          <ul class="treeview-menu">
                            <?php $__currentLoopData = $menus[$level1->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php if($level2->uri): ?>
                                <?php if(Admin::user()->visible($level2)): ?>
                                <li class=""><a href="<?php echo e($level2->uri?sc_url_render($level2->uri):'#'); ?>"><i class="fa <?php echo e($level2->icon); ?>"></i> <?php echo e(sc_language_render($level2->title)); ?></a></li>
                                <?php endif; ?>
                              <?php else: ?>
                              <?php if(Admin::user()->visible($level2)): ?>
                              <li class="treeview">
                                <a href="#">
                                  <i class="fa <?php echo e($level2->icon); ?>"></i> <span><?php echo e(sc_language_render($level2->title)); ?></span>
                                  <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                  </span>
                                </a>

                                </li>
                                <?php endif; ?>
                              <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </ul>
                        <?php endif; ?>
                        
                    </li>
                    <?php endif; ?>
                  <?php endif; ?>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            <?php endif; ?>
              
            </li>
            <?php endif; ?>
          <?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      

      </ul>

<?php echo $__env->make('admin.component.sidebar_bottom', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </section>
    <!-- /.sidebar -->
  </aside>
<?php /**PATH E:\laragon\www\s-cart\resources\views/admin/sidebar.blade.php ENDPATH**/ ?>
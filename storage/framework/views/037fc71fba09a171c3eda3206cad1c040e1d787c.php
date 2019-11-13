  <?php
    $modelCategory = (new \App\Models\ShopCategory);
    $categories = $modelCategory->getCategoriesAll();
    $categoriesTop = $modelCategory->getCategoriesTop();
  ?>
  <?php if($categoriesTop->count()): ?>
              <h2><?php echo e(trans('front.categories')); ?></h2>
              <div class="panel-group category-products" id="accordian">
              <?php $__currentLoopData = $categoriesTop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>  $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(!empty($categories[$category->id])): ?>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordian" href="#<?php echo e($key); ?>">
                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                      </a>
                      <a href="<?php echo e($category->getUrl()); ?>">  <?php echo e($category->name); ?></a>
                    </h4>
                  </div>
                  <div id="<?php echo e($key); ?>" class="panel-collapse collapse">
                    <div class="panel-body">
                      <ul>
                        <?php $__currentLoopData = $categories[$category->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cateChild): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                - <a href="<?php echo e($cateChild->getUrl()); ?>"><?php echo e($cateChild->name); ?></a>
                                <ul>
                                  <?php if(!empty($categories[$cateChild->id])): ?>
                                    <?php $__currentLoopData = $categories[$cateChild->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cateChild2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            -- <a href="<?php echo e($cateChild2->getUrl()); ?>"><?php echo e($cateChild2->name); ?></a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  <?php endif; ?>
                                </ul>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </ul>
                    </div>
                  </div>
                </div>
                <?php else: ?>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <a href="<?php echo e($category->getUrl()); ?>"><h4 class="panel-title"><a href="<?php echo e($category->getUrl()); ?>"><?php echo e($category->name); ?></a></h4></a>
                    </div>
                  </div>
               <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
  <?php endif; ?>
<?php /**PATH E:\laragon\www\anytimebazar\resources\views/block/categories.blade.php ENDPATH**/ ?>
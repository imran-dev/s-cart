<?php
    $languages     = sc_language_all();
?>
<div style="margin:10px;" class="btn-group">
    <button type="button" class="dropdown-toggle usa" data-toggle="dropdown" aria-expanded="false"><img src="<?php echo e(asset($languages[session('locale')??app()->getLocale()]['icon'])); ?>" style="height: 25px;"><span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>
            <a href="<?php echo e(route('admin.locale', ['locale' => $key])); ?>"><img src="<?php echo e(asset($language['icon'])); ?>" style="height: 25px;"></a>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php /**PATH E:\laragon\www\anytimebazar\resources\views/admin/component/language.blade.php ENDPATH**/ ?>
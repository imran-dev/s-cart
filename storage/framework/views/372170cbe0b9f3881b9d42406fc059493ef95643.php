<style type="text/css">
#summary li {
    font-size: 11px;
    color: #9d9d9d;
    padding: 5px 10px;
    border-bottom: 1px dotted #373737;
}
#summary ul, #summary li {
    padding: 0;
    margin: 0;
    list-style: none;
}
#summary {
    border-radius: 2px;
    color: #808b9c;
    background: #2e3a47;
    margin: 15px 10px;
    padding: 5px 0;
}
#summary div:first-child {
    margin-bottom: 4px;
}
#summary li {
    font-size: 11px;
    color: #9d9d9d;
    padding: 5px 10px;
    border-bottom: 1px dotted #373737;
}
#summary .progress {
    height: 3px;
    margin-bottom: 0;
}

.progress {
    overflow: hidden;
    height: 18px;
    margin-bottom: 18px;
    background-color: #f5f5f5;
    border-radius: 3px;
    -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
    box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
}
.progress-bar-default {
    background-color: #000;
}
</style>
<?php
    $totalOrder = \App\Models\ShopOrder::count();
    $styleStatus = \App\Models\ShopOrder::$mapStyleStatus;
?>
<?php if($totalOrder): ?>
<?php
    $arrStatus = \App\Models\ShopOrderStatus::pluck('name','id')->all();
    $groupOrder = (new \App\Models\ShopOrder)->all()->groupBy('status');
?>
    <div id="summary">
    <ul>
        <?php $__currentLoopData = $groupOrder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status => $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $style = $styleStatus[$status]??'light';
            $percent = floor($element->count() * 100/$totalOrder);
        ?>
            <li>
                <div>Orders <?php echo e($arrStatus[$status]??''); ?> <span class="pull-right"><?php echo e($percent); ?>%</span></div>
                <div class="progress">
                <div class="progress-bar progress-bar-<?php echo e($style); ?>" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo e($percent); ?>%"> <span class="sr-only"><?php echo e($percent); ?>%</span></div>
                </div>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </ul>
    </div>

<?php endif; ?>
<?php /**PATH E:\laragon\www\s-cart\resources\views/admin/component/sidebar_bottom.blade.php ENDPATH**/ ?>
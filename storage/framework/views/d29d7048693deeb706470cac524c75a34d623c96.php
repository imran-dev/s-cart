<?php $__env->startSection('main'); ?>
<style>
#start-add{
    margin: 20px;
}
.select-product{
    margin: 10px 0;
}
</style>
   <div class="row">
      <div class="col-md-12">
         <div class="box">
                <div class="box-header with-border">
                    <h2 class="box-title"><?php echo e($title_description??''); ?></h2>

                    <div class="box-tools">
                        <div class="btn-group pull-right" style="margin-right: 5px">
                            <a href="<?php echo e(route('admin_product.index')); ?>" class="btn  btn-flat btn-default" title="List"><i class="fa fa-list"></i><span class="hidden-xs"> <?php echo e(trans('admin.back_list')); ?></span></a>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="<?php echo e(route('admin_product.edit',['id'=>$product['id']])); ?>" method="post" accept-charset="UTF-8" class="form-horizontal" id="form-main"  enctype="multipart/form-data">

                    <div class="col-xs-12" id="start-add">
                        <div class="col-md-4"></div>
                        <div class="col-md-4 form-group">
                            <div class="input-group input-group-sm" style="width: 300px;text-align: center;">
                                <b><?php echo e(trans('product.type')); ?>:</b> <?php echo e($kinds[$product->kind]??''); ?>

                            </div>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="fields-group">


<?php
    $descriptions = $product->descriptions->keyBy('lang')->toArray();
?>

<?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class="form-group">
                                <label class="col-sm-2  control-label"></label>
                                <div class="col-sm-8">
                                    <b><?php echo e($language->name); ?></b>
                                    <?php echo sc_image_render($language->icon,'20px','20px'); ?>

                                </div>
                            </div>

                            <div class="form-group   <?php echo e($errors->has('descriptions.'.$code.'.name') ? ' has-error' : ''); ?>">
                                <label for="<?php echo e($code); ?>__name" class="col-sm-2  control-label"><?php echo e(trans('product.name')); ?></label>

                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                        <input type="text" id="<?php echo e($code); ?>__name" name="descriptions[<?php echo e($code); ?>][name]" value="<?php echo old('descriptions.'.$code.'.name',($descriptions[$code]['name']??'')); ?>" class="form-control <?php echo e($code.'__name'); ?>" placeholder="" />
                                    </div>
                                        <?php if($errors->has('descriptions.'.$code.'.name')): ?>
                                            <span class="help-block">
                                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('descriptions.'.$code.'.name')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group   <?php echo e($errors->has('descriptions.'.$code.'.keyword') ? ' has-error' : ''); ?>">
                                <label for="<?php echo e($code); ?>__keyword" class="col-sm-2  control-label"><?php echo e(trans('product.keyword')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                        <input type="text" id="<?php echo e($code); ?>__keyword" name="descriptions[<?php echo e($code); ?>][keyword]" value="<?php echo old('descriptions.'.$code.'.keyword',($descriptions[$code]['keyword']??'')); ?>" class="form-control <?php echo e($code.'__keyword'); ?>" placeholder="" />
                                    </div>
                                        <?php if($errors->has('descriptions.'.$code.'.keyword')): ?>
                                            <span class="help-block">
                                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('descriptions.'.$code.'.keyword')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group   <?php echo e($errors->has('descriptions.'.$code.'.description') ? ' has-error' : ''); ?>">
                                <label for="<?php echo e($code); ?>__description" class="col-sm-2  control-label"><?php echo e(trans('product.description')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                        <input type="text" id="<?php echo e($code); ?>__description" name="descriptions[<?php echo e($code); ?>][description]" value="<?php echo old('descriptions.'.$code.'.description',($descriptions[$code]['description']??'')); ?>" class="form-control <?php echo e($code.'__description'); ?>" placeholder="" />
                                    </div>
                                        <?php if($errors->has('descriptions.'.$code.'.description')): ?>
                                            <span class="help-block">
                                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('descriptions.'.$code.'.description')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>

    <?php if($product->kind == SC_PRODUCT_SINGLE): ?>
                            <div class="form-group <?php echo e($errors->has('descriptions.'.$code.'.content') ? ' has-error' : ''); ?>">
                                <label for="<?php echo e($code); ?>__content" class="col-sm-2 control-label"><?php echo e(trans('product.content')); ?></label>
                                <div class="col-sm-8">
                                    <textarea  id="<?php echo e($code); ?>__content" class="editor" name="descriptions[<?php echo e($code); ?>][content]">
                                        <?php echo old('descriptions.'.$code.'.content',($descriptions[$code]['content']??'')); ?>

                                    </textarea>
                                    <?php if($errors->has('descriptions.'.$code.'.content')): ?>
                                        <span class="help-block">
                                            <i class="fa fa-info-circle"></i> <?php echo e($errors->first('descriptions.'.$code.'.content')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
    <?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




<?php if($product->kind == SC_PRODUCT_SINGLE || $product->kind == SC_PRODUCT_BUILD): ?>
<hr>

    <?php
    $listCate = [];
        $category = old('category',$product->categories->pluck('id')->toArray());
        if(is_array($category)){
            foreach($category as $value){
                $listCate[] = (int)$value;
            }
        }
    ?>

                            <div class="form-group <?php echo e($errors->has('category') ? ' has-error' : ''); ?>">
                                <label for="category" class="col-sm-2 control-label"><?php echo e(trans('product.admin.select_category')); ?></label>
                                <div class="col-sm-8">
                                    <select class="form-control input-sm category select2"  multiple="multiple" data-placeholder="<?php echo e(trans('product.admin.select_category')); ?>" style="width: 100%;" name="category[]" >
                                        <option value=""></option>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($k); ?>"  <?php echo e((count($listCate) && in_array($k, $listCate))?'selected':''); ?>><?php echo e($v); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                        <?php if($errors->has('category')): ?>
                                            <span class="help-block">
                                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('category')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>
<?php endif; ?>



                            <div class="form-group   <?php echo e($errors->has('image') ? ' has-error' : ''); ?>">
                                <label for="image" class="col-sm-2  control-label"><?php echo e(trans('product.image')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <input type="text" id="image" name="image" value="<?php echo old('image',$product->image); ?>" class="form-control input-sm image" placeholder=""  />
                                       <span class="input-group-btn">
                                         <a data-input="image" data-preview="preview_image" data-type="product" class="btn btn-sm btn-primary lfm">
                                           <i class="fa fa-picture-o"></i> <?php echo e(trans('product.admin.choose_image')); ?>

                                         </a>
                                       </span>
                                    </div>
                                        <?php if($errors->has('image')): ?>
                                            <span class="help-block">
                                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('image')); ?>

                                            </span>
                                        <?php endif; ?>
                                    <div id="preview_image" class="img_holder"><img src="<?php echo e(old('image',$product->image)); ?>"></div>
                    <?php
                        $listsubImages = old('sub_image',$product->images->pluck('image')->all());
                    ?>
                        <?php if(!empty($listsubImages)): ?>
                            <?php $__currentLoopData = $listsubImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sub_image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($sub_image): ?>
                                <div class="group-image">
                                    <div class="input-group"><input type="text" id="sub_image_<?php echo e($key); ?>" name="sub_image[]" value="<?php echo $sub_image; ?>" class="form-control input-sm sub_image" placeholder=""  /><span class="input-group-btn"><span><a data-input="sub_image_<?php echo e($key); ?>" data-preview="preview_sub_image_<?php echo e($key); ?>" data-type="product" class="btn btn-sm btn-flat btn-primary lfm"><i class="fa fa-picture-o"></i> <?php echo e(trans('product.admin.choose_image')); ?></a></span><span title="Remove" class="btn btn-flat btn-sm btn-danger removeImage"><i class="fa fa-times"></i></span></span></div>
                                    <div id="preview_sub_image_<?php echo e($key); ?>" class="img_holder"><img src="<?php echo e($sub_image); ?>"></div>
                                </div>

                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                                    <button type="button" id="add_sub_image" class="btn btn-flat btn-success">
                                        <i class="fa fa-plus" aria-hidden="true"></i> <?php echo e(trans('product.admin.add_sub_image')); ?>

                                    </button>

                                </div>
                            </div>




                            <div class="form-group <?php echo e($errors->has('sku') ? ' has-error' : ''); ?>">
                                <label for="sku" class="col-sm-2 control-label"><?php echo e(trans('product.sku')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                        <input type="text" style="width: 100px;"  id="sku" name="sku" value="<?php echo old('sku',$product->sku); ?>" class="form-control input-sm sku" placeholder="" />
                                    </div>
                                        <?php if($errors->has('sku')): ?>
                                            <span class="help-block">
                                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('sku')); ?>

                                            </span>
                                        <?php else: ?>
                                            <span class="help-block">
                                                <i class="fa fa-info-circle"></i> <?php echo e(trans('product.sku_validate')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>



                            <div class="form-group  <?php echo e($errors->has('brand_id') ? ' has-error' : ''); ?>">
                                <label for="brand_id" class="col-sm-2 control-label"><?php echo e(trans('product.brand')); ?></label>
                                <div class="col-sm-8">
                                    <select class="form-control input-sm brand_id select2" style="width: 100%;" name="brand_id" >
                                        <option value=""></option>
                                        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($k); ?>" <?php echo e((old('brand_id') ==$k || (!old() && $product->brand_id ==$k) ) ? 'selected':''); ?>><?php echo e($v->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                        <?php if($errors->has('brand_id')): ?>
                                            <span class="help-block">
                                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('brand_id')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>



                            <div class="form-group  <?php echo e($errors->has('vendor_id') ? ' has-error' : ''); ?>">
                                <label for="vendor_id" class="col-sm-2 control-label"><?php echo e(trans('product.vendor')); ?></label>
                                <div class="col-sm-8">
                                    <select class="form-control input-sm vendor_id select2" style="width: 100%;" name="vendor_id" >
                                        <option value=""></option>
                                        <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($k); ?>" <?php echo e((old('vendor_id') ==$k || (!old() && $product->vendor_id ==$k) ) ? 'selected':''); ?>><?php echo e($v->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                        <?php if($errors->has('vendor_id')): ?>
                                            <span class="help-block">
                                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('vendor_id')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>




<?php if($product->kind == SC_PRODUCT_SINGLE): ?>
                            <div class="form-group  kind kind0 kind1  <?php echo e($errors->has('cost') ? ' has-error' : ''); ?>">
                                <label for="cost" class="col-sm-2  control-label"><?php echo e(trans('product.cost')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                        <input type="number" style="width: 100px;"  id="cost" name="cost" value="<?php echo old('cost',$product->cost); ?>" class="form-control input-sm cost" placeholder="" />
                                    </div>
                                        <?php if($errors->has('cost')): ?>
                                            <span class="help-block">
                                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('cost')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>
<?php endif; ?>




<?php if($product->kind == SC_PRODUCT_SINGLE || $product->kind == SC_PRODUCT_BUILD): ?>

                            <div class="form-group   <?php echo e($errors->has('price') ? ' has-error' : ''); ?>">
                                <label for="price" class="col-sm-2  control-label"><?php echo e(trans('product.price')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                        <input type="number" style="width: 100px;"  id="price" name="price" value="<?php echo old('price',$product->price); ?>" class="form-control input-sm price" placeholder="" />
                                    </div>
                                        <?php if($errors->has('price')): ?>
                                            <span class="help-block">
                                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('price')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>





                            <div class="form-group  kind kind0 kind1">
                                <label for="price" class="col-sm-2  control-label"><?php echo e(trans('product.price_promotion')); ?></label>
                                <div class="col-sm-8">
    <?php if(old('price_promotion') || $product->promotionPrice): ?>
                                <div class="price_promotion">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                        <input type="number" style="width: 100px;"  id="price_promotion" name="price_promotion" value="<?php echo old('price_promotion',$product->promotionPrice->price_promotion); ?>" class="form-control input-sm price_promotion" placeholder="" />
                                        <span title="Remove" class="btn btn-flat btn-sm btn-danger removePromotion"><i class="fa fa-times"></i></span>
                                    </div>

                                    <div class="form-inline">
                                      <div class="input-group">
                                        <?php echo e(trans('product.price_promotion_start')); ?><br><div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                        <input type="text" style="width: 100px;"  id="price_promotion_start" name="price_promotion_start" value="<?php echo old('price_promotion_start',$product->promotionPrice->date_start); ?>" class="form-control input-sm price_promotion_start date_time" placeholder="" />
                                        </div>
                                      </div>

                                      <div class="input-group">
                                        <?php echo e(trans('product.price_promotion_end')); ?><br><div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                        <input type="text" style="width: 100px;"  id="price_promotion_end" name="price_promotion_end" value="<?php echo old('price_promotion_end',$product->promotionPrice->date_end); ?>" class="form-control input-sm price_promotion_end date_time" placeholder="" />
                                        </div>
                                      </div>
                                    </div>
                                </div>

                                  <button type="button" style="display: none;" id="add_product_promotion" class="btn btn-flat btn-success">
                                    <i class="fa fa-plus" aria-hidden="true"></i> <?php echo e(trans('product.admin.add_product_promotion')); ?>

                                </button>
    <?php else: ?>
                                  <button type="button" id="add_product_promotion" class="btn btn-flat btn-success">
                                        <i class="fa fa-plus" aria-hidden="true"></i> <?php echo e(trans('product.admin.add_product_promotion')); ?>

                                    </button>
    <?php endif; ?>




                                </div>
                            </div>

<?php endif; ?>




<?php if($product->kind == SC_PRODUCT_SINGLE || $product->kind == SC_PRODUCT_BUILD): ?>
                            <div class="form-group  <?php echo e($errors->has('stock') ? ' has-error' : ''); ?>">
                                <label for="stock" class="col-sm-2  control-label"><?php echo e(trans('product.stock')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                        <input type="number" style="width: 100px;"  id="stock" name="stock" value="<?php echo old('stock',$product->stock); ?>" class="form-control input-sm stock" placeholder="" />
                                    </div>
                                        <?php if($errors->has('stock')): ?>
                                            <span class="help-block">
                                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('stock')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>
<?php endif; ?>



<?php if($product->kind == SC_PRODUCT_SINGLE || $product->kind == SC_PRODUCT_BUILD): ?>
<hr>
                            <div class="form-group  kind kind0 kind1  <?php echo e($errors->has('type') ? ' has-error' : ''); ?>">
                                <label for="type" class="col-sm-2  control-label"><?php echo e(trans('product.type')); ?></label>
                                <div class="col-sm-8">
                                <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label class="radio-inline"><input type="radio" name="type" value="<?php echo $key; ?>"  <?php echo e((old('type',$product->type) == $key)?'checked':''); ?>><?php echo e($type); ?></label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($errors->has('type')): ?>
                                            <span class="help-block">
                                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('type')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>
<?php endif; ?>



<?php if($product->kind == SC_PRODUCT_SINGLE || $product->kind == SC_PRODUCT_BUILD): ?>
                            <div class="form-group  kind kind0 kind1  <?php echo e($errors->has('virtual') ? ' has-error' : ''); ?>">
                                <label for="virtual" class="col-sm-2  control-label"><?php echo e(trans('product.virtual')); ?></label>
                                <div class="col-sm-8">
                                <?php $__currentLoopData = $virtuals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $virtual): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label class="radio-inline"><input type="radio" name="virtual" value="<?php echo e($key); ?>"  <?php echo e((old('virtual',$product->virtual) == $key)?'checked':''); ?>><?php echo e($virtual); ?></label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($errors->has('virtual')): ?>
                                            <span class="help-block">
                                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('virtual')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>
<?php endif; ?>



<?php if($product->kind == SC_PRODUCT_SINGLE || $product->kind == SC_PRODUCT_BUILD): ?>
                            <div class="form-group  kind kind0 kind1  <?php echo e($errors->has('date_available') ? ' has-error' : ''); ?>">
                                <label for="date_available" class="col-sm-2  control-label"><?php echo e(trans('product.date_available')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                        <input type="text" style="width: 100px;"  id="date_available" name="date_available" value="<?php echo old('date_available',$product->date_available); ?>" class="form-control input-sm date_available date_time" placeholder="" />
                                    </div>
                                        <?php if($errors->has('date_available')): ?>
                                            <span class="help-block">
                                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('date_available')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>
<?php endif; ?>




                            <div class="form-group   <?php echo e($errors->has('sort') ? ' has-error' : ''); ?>">
                                <label for="sort" class="col-sm-2  control-label"><?php echo e(trans('product.sort')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                        <input type="number" style="width: 100px;"  id="sort" name="sort" value="<?php echo old('sort',$product['sort']); ?>" class="form-control sort" placeholder="" />
                                    </div>
                                        <?php if($errors->has('sort')): ?>
                                            <span class="help-block">
                                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('sort')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>



                            <div class="form-group  ">
                                <label for="status" class="col-sm-2  control-label"><?php echo e(trans('product.status')); ?></label>
                                <div class="col-sm-8">
                                <?php if(old()): ?>
                                   <input type="checkbox" name="status"  <?php echo e(old('status',$product['status'])?'checked':''); ?>>
                                <?php else: ?>
                                    <input type="checkbox" name="status"  checked>
                                <?php endif; ?>

                                </div>
                            </div>



<?php if($product->kind == SC_PRODUCT_GROUP): ?>

<hr>
                            <div class="form-group <?php echo e($errors->has('productInGroup') ? ' has-error' : ''); ?>">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-8"><label><?php echo e(trans('product.admin.select_product_in_group')); ?></label></div>
                            </div>
                            <div class="form-group <?php echo e($errors->has('productInGroup') ? ' has-error' : ''); ?>">
                                <div class="col-sm-2">
                                </div>
                                <div class="col-sm-8">
        <?php
        $listgroups= [];
            $groups = old('productInGroup',$product->groups->pluck('product_id')->toArray());
            if(is_array($groups)){
                foreach($groups as $value){
                    $listgroups[] = (int)$value;
                }
            }
        ?>
                            <?php if($listgroups): ?>
                                <?php $__currentLoopData = $listgroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pID): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if((int)$pID): ?>
                                        <?php
                                            $newHtml = str_replace('value="'.(int)$pID.'"', 'value="'.(int)$pID.'" selected', $htmlSelectGroup);
                                        ?>
                                        <?php echo $newHtml; ?>

                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                                    <div id="position_group_flag"></div>
                                        <?php if($errors->has('productInGroup')): ?>
                                            <span class="help-block">
                                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('productInGroup')); ?>

                                            </span>
                                        <?php endif; ?>
                                    <button type="button" id="add_product_in_group" class="btn btn-flat btn-success">
                                        <i class="fa fa-plus" aria-hidden="true"></i> <?php echo e(trans('product.admin.add_product')); ?>

                                    </button>
                                    <?php if($errors->has('productInGroup')): ?>
                                        <span class="help-block">
                                            <i class="fa fa-info-circle"></i> <?php echo e($errors->first('productInGroup')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

<?php endif; ?>



<?php if($product->kind == SC_PRODUCT_BUILD): ?>
<hr>

                            <div class="form-group <?php echo e($errors->has('productBuild') ? ' has-error' : ''); ?>">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-8">
                                    <label><?php echo e(trans('product.admin.select_product_in_build')); ?></label>
                                </div>
                            </div>

                            <div class="form-group <?php echo e($errors->has('productBuild') ? ' has-error' : ''); ?>">
                                <div class="col-sm-2">
                                </div>
                                <div class="col-sm-8">
                                    <div class="row"></div>

        <?php
        $listBuilds= [];
            $groups = old('productBuild',$product->builds->pluck('product_id')->toArray());
            $groupsQty = old('productBuildQty',$product->builds->pluck('quantity')->toArray());
            if(is_array($groups)){
                foreach($groups as $key => $value){
                    $listBuilds[] = (int)$value;
                    $listBuildsQty[] = (int)$groupsQty[$key];
                }
            }
        ?>

                                <?php if($listBuilds): ?>
                                    <?php $__currentLoopData = $listBuilds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pID): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if((int)$pID && $listBuildsQty[$key]): ?>
                                            <?php
                                                $newHtml = str_replace('value="'.(int)$pID.'"', 'value="'.(int)$pID.'" selected', $htmlSelectBuild);
                                                $newHtml = str_replace('name="productBuildQty[]" value="1" min=1', 'name="productBuildQty[]" value="'.$listBuildsQty[$key].'"', $newHtml);
                                            ?>
                                            <?php echo $newHtml; ?>

                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                    <div id="position_build_flag"></div>
                                        <?php if($errors->has('productBuild')): ?>
                                            <span class="help-block">
                                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('productBuild')); ?>

                                            </span>
                                        <?php endif; ?>
                                    <button type="button" id="add_product_in_build" class="btn btn-flat btn-success">
                                        <i class="fa fa-plus" aria-hidden="true"></i> <?php echo e(trans('product.admin.add_product')); ?>

                                    </button>
                                    <?php if($errors->has('productBuild') || $errors->has('productBuildQty')): ?>
                                        <span class="help-block">
                                            <i class="fa fa-info-circle"></i> <?php echo e($errors->first('productBuild')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

<?php endif; ?>



<?php if($product->kind == SC_PRODUCT_SINGLE): ?>

<hr>
    <?php if(!empty($attributeGroup)): ?>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"></label>
                                    <div class="col-sm-8">
                                        <label><?php echo e(trans('product.attribute')); ?></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-8">


                <?php
                    $dataAtt = [];
                    if(old('attribute')){
                        $dataAtt = old('attribute');
                    }else{
                            $getDataAtt = $product->attributes->groupBy('attribute_group_id')->toArray();
                            if(count($getDataAtt)){
                                foreach ($getDataAtt as $groupKey => $row) {
                                   $dataAtt[$groupKey] = array_column($row, 'name');
                                }
                            }
                    }
                ?>

                                        <?php $__currentLoopData = $attributeGroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attGroupId => $attName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <table width="100%">
                                            <tr><td colspan="2"><b><?php echo e($attName); ?>:</b><br></td></tr>
                                                <?php if(!empty($dataAtt[$attGroupId])): ?>
                                                    <?php $__currentLoopData = $dataAtt[$attGroupId]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($attValue): ?>
                                                            <?php
                                                                $newHtml = str_replace('attribute_group', $attGroupId, $htmlProductAtrribute);
                                                                $newHtml = str_replace('attribute_value', $attValue, $newHtml);
                                                            ?>
                                                            <?php echo $newHtml; ?>

                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            <tr><td colspan="2"><br><button type="button" class="btn btn-flat btn-success add-attribute" data-id="<?php echo e($attGroupId); ?>">
                                            <i class="fa fa-plus" aria-hidden="true"></i> <?php echo e(trans('product.admin.add_attribute')); ?>

                                        </button><br></td></tr>
                                        </table>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
    <?php endif; ?>

<?php endif; ?>

                        </div>
                    </div>



                    <!-- /.box-body -->

                    <div class="box-footer">
                            <?php echo csrf_field(); ?>
                        <div class="col-md-2">
                        </div>

                        <div class="col-md-8">
                            <div class="btn-group pull-right">
                                <button type="submit" class="btn btn-primary"><?php echo e(trans('admin.submit')); ?></button>
                            </div>

                            <div class="btn-group pull-left">
                                <button type="reset" class="btn btn-warning"><?php echo e(trans('admin.reset')); ?></button>
                            </div>
                        </div>
                    </div>

                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<!-- Select2 -->
<link rel="stylesheet" href="<?php echo e(asset('admin/AdminLTE/bower_components/select2/dist/css/select2.min.css')); ?>">


<link rel="stylesheet" href="<?php echo e(asset('admin/plugin/bootstrap-switch.min.css')); ?>">




<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<!--ckeditor-->
<script src="<?php echo e(asset('packages/ckeditor/ckeditor.js')); ?>"></script>
<script src="<?php echo e(asset('packages/ckeditor/adapters/jquery.js')); ?>"></script>

<!-- Select2 -->
<script src="<?php echo e(asset('admin/AdminLTE/bower_components/select2/dist/js/select2.full.min.js')); ?>"></script>





<script src="<?php echo e(asset('admin/plugin/bootstrap-switch.min.js')); ?>"></script>

<script type="text/javascript">
    $("[name='top'],[name='status']").bootstrapSwitch();
</script>

<script type="text/javascript">
// Promotion
$('#add_product_promotion').click(function(event) {
    $(this).before('<div class="price_promotion"><div class="input-group"><span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span><input type="number" style="width: 100px;"  id="price_promotion" name="price_promotion" value="0" class="form-control input-sm price" placeholder="" /><span title="Remove" class="btn btn-flat btn-sm btn-danger removePromotion"><i class="fa fa-times"></i></span></div><div class="form-inline"><div class="input-group"><?php echo e(trans('product.price_promotion_start')); ?><br><div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span><input type="text" style="width: 100px;"  id="price_promotion_start" name="price_promotion_start" value="" class="form-control input-sm price_promotion_start date_time" placeholder="" /></div></div><div class="input-group"><?php echo e(trans('product.price_promotion_end')); ?><br><div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span><input type="text" style="width: 100px;"  id="price_promotion_end" name="price_promotion_end" value="" class="form-control input-sm price_promotion_end date_time" placeholder="" /></div></div></div></div>');
    $(this).hide();
    $('.removePromotion').click(function(event) {
        $(this).closest('.price_promotion').remove();
        $('#add_product_promotion').show();
    });
    $('.date_time').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })
});
$('.removePromotion').click(function(event) {
    $('#add_product_promotion').show();
    $(this).closest('.price_promotion').remove();
});
//End promotion

// Add sub images
var id_sub_image = <?php echo e(old('sub_image')?count(old('sub_image')):0); ?>;
$('#add_sub_image').click(function(event) {
    id_sub_image +=1;
    $(this).before('<div class="group-image"><div class="input-group"><input type="text" id="sub_image_'+id_sub_image+'" name="sub_image[]" value="" class="form-control input-sm sub_image" placeholder=""  /><span class="input-group-btn"><span><a data-input="sub_image_'+id_sub_image+'" data-preview="preview_sub_image_'+id_sub_image+'" data-type="product" class="btn btn-sm btn-flat btn-primary lfm"><i class="fa fa-picture-o"></i> <?php echo e(trans('product.admin.choose_image')); ?></a></span><span title="Remove" class="btn btn-flat btn-sm btn-danger removeImage"><i class="fa fa-times"></i></span></span></div><div id="preview_sub_image_'+id_sub_image+'" class="img_holder"></div></div>');
    $('.removeImage').click(function(event) {
        $(this).closest('div').remove();
    });
    $('.lfm').filemanager();
});
    $('.removeImage').click(function(event) {
        $(this).closest('.group-image').remove();
    });
//end sub images

// Select product in group
$('#add_product_in_group').click(function(event) {
    var htmlSelectGroup = '<?php echo $htmlSelectGroup; ?>';
    $(this).before(htmlSelectGroup);
    $('.select2').select2();
    $('.removeproductInGroup').click(function(event) {
        $(this).closest('table').remove();
    });
});
$('.removeproductInGroup').click(function(event) {
    $(this).closest('table').remove();
});
//end select in group

// Select product in build
$('#add_product_in_build').click(function(event) {
    var htmlSelectBuild = '<?php echo $htmlSelectBuild; ?>';
    $(this).before(htmlSelectBuild);
    $('.select2').select2();
    $('.removeproductBuild').click(function(event) {
        $(this).closest('table').remove();
    });
});
$('.removeproductBuild').click(function(event) {
    $(this).closest('table').remove();
});
//end select in build


// Select product attributes
$('.add-attribute').click(function(event) {
    var htmlProductAtrribute = '<?php echo $htmlProductAtrribute??''; ?>';
    var attGroup = $(this).attr("data-id");
    htmlProductAtrribute = htmlProductAtrribute.replace("attribute_group", attGroup);
    htmlProductAtrribute = htmlProductAtrribute.replace("attribute_value", "");
    $(this).closest('tr').before(htmlProductAtrribute);
    $('.removeAttribute').click(function(event) {
        $(this).closest('tr').remove();
    });
});
$('.removeAttribute').click(function(event) {
    $(this).closest('tr').remove();
});
//end select attributes

$(document).ready(function() {
    $('.select2').select2()
});

//Date picker
$('.date_time').datepicker({
  autoclose: true,
  format: 'yyyy-mm-dd'
})

$('textarea.editor').ckeditor(
    {
        filebrowserImageBrowseUrl: '/<?php echo e(config('lfm.url_prefix')); ?>?type=product',
        filebrowserImageUploadUrl: '/<?php echo e(config('lfm.url_prefix')); ?>/upload?type=product&_token=<?php echo e(csrf_token()); ?>',
        filebrowserBrowseUrl: '/<?php echo e(config('lfm.url_prefix')); ?>?type=Files',
        filebrowserUploadUrl: '/<?php echo e(config('lfm.url_prefix')); ?>/upload?type=file&_token=<?php echo e(csrf_token()); ?>',
        filebrowserWindowWidth: '900',
        filebrowserWindowHeight: '500'
    }
);
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\s-cart\resources\views/admin/screen/product_edit.blade.php ENDPATH**/ ?>
<?php $__env->startSection('main'); ?>
<section>
    <div class="container">
      <div class="row">
<h2 class="title text-center"><?php echo e($title); ?></h2>
<?php if(count($cart) ==0): ?>
    <div class="col-md-12 text-danger">
        Cart empty!
    </div>
<?php else: ?>
    <style>
    .shipping_address td{
        padding: 3px !important;
    }
    .shipping_address textarea,.shipping_address input[type="text"],.shipping_address option{
        width: 100%;
        padding: 7px !important;
    }
    .row_cart>td{
        vertical-align: middle !important;
    }
    input[type="number"]{
        text-align: center;
        padding:2px;
    }
</style>
<div class="table-responsive">
<table class="table box table-bordered">
    <thead>
      <tr  style="background: #eaebec">
        <th style="width: 50px;">No.</th>
        <th style="width: 100px;"><?php echo e(trans('product.sku')); ?></th>
        <th><?php echo e(trans('product.name')); ?></th>
        <th><?php echo e(trans('product.price')); ?></th>
        <th ><?php echo e(trans('product.quantity')); ?></th>
        <th><?php echo e(trans('product.total_price')); ?></th>
        <th><?php echo e(trans('cart.delete')); ?></th>
      </tr>
    </thead>
    <tbody>

    <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $n = (isset($n)?$n:0);
            $n++;
            $product = App\Models\ShopProduct::find($item->id);
        ?>
    <tr class="row_cart">
        <td ><?php echo e($n); ?></td>
        <td><?php echo e($product->sku); ?></td>
        <td>
            <?php echo e($product->getName()); ?><br>

                <?php if($item->options->count()): ?>
                    (
                    <?php $__currentLoopData = $item->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyAtt => $att): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <b><?php echo e($attributesGroup[$keyAtt]); ?></b>: <i><?php echo e($att); ?></i> ;
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    )<br>
                <?php endif; ?>

            <a href="<?php echo e($product->getUrl()); ?>"><img width="100" src="<?php echo e(asset($product->getImage())); ?>" alt=""></a>
        </td>
        <td><?php echo $product->showPrice(); ?></td>
        <td><input style="width: 70px;" type="number" data-id="<?php echo e($item->id); ?>" data-rowid="<?php echo e($item->rowId); ?>" onChange="updateCart($(this));" class="item-qty" name="qty-<?php echo e($item->id); ?>" value="<?php echo e($item->qty); ?>"><span class="text-danger item-qty-<?php echo e($item->id); ?>" style="display: none;"></span></td>
        <td align="right"><?php echo e(sc_currency_render($item->subtotal)); ?></td>
        <td>
            <a onClick="return confirm('Confirm?')" title="Remove Item" alt="Remove Item" class="cart_quantity_delete" href="<?php echo e(route("cart.remove",['id'=>$item->rowId])); ?>"><i class="fa fa-times"></i></a>
        </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
    <tfoot>
        <tr  style="background: #eaebec">
            <td colspan="7">
                 <div class="pull-left">
                <button class="btn btn-default" type="button" style="cursor: pointer;padding:10px 30px" onClick="location.href='<?php echo e(route('home')); ?>'"><i class="fa fa-arrow-left"></i><?php echo e(trans('cart.back_to_shop')); ?></button>
                </div>
                 <div class="pull-right">
                <a onClick="return confirm('Confirm ?')" href="<?php echo e(route('cart.clear')); ?>"><button class="btn" type="button" style="cursor: pointer;padding:10px 30px"><?php echo e(trans('cart.remove_all')); ?></button></a>
                </div>
            </td>
        </tr>
    </tfoot>
  </table>
  </div>
<form class="shipping_address" id="form-order" role="form" method="POST" action="<?php echo e(route('checkout')); ?>">
<div class="row">
    <div class="col-md-6">
            <?php echo csrf_field(); ?>
            <table class="table  table-bordered table-responsive">
                <tr>
                <td class="form-group<?php echo e($errors->has('first_name') ? ' has-error' : ''); ?>">
                    <label for="phone" class="control-label"><i class="fa fa-user"></i> <?php echo e(trans('cart.first_name')); ?>:</label> <input name="first_name" type="text" placeholder="<?php echo e(trans('cart.first_name')); ?>" value="<?php echo e((old('first_name'))?old('first_name'):$shippingAddress['first_name']); ?>">
                        <?php if($errors->has('first_name')): ?>
                            <span class="help-block"><?php echo e($errors->first('first_name')); ?></span>
                        <?php endif; ?>
                    </td>
                    <td class="form-group<?php echo e($errors->has('last_name') ? ' has-error' : ''); ?>">
                        <label for="phone" class="control-label"><i class="fa fa-user"></i> <?php echo e(trans('cart.last_name')); ?>:</label> <input name="last_name" type="text" placeholder="<?php echo e(trans('cart.last_name')); ?>" value="<?php echo e((old('last_name'))?old('last_name'):$shippingAddress['last_name']); ?>">
                            <?php if($errors->has('last_name')): ?>
                                <span class="help-block"><?php echo e($errors->first('last_name')); ?></span>
                            <?php endif; ?>
                        </td>
                </tr>
                <tr>
                    <td  class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                        <label for="email" class="control-label"><i class="fa fa-user"></i> <?php echo e(trans('cart.email')); ?>:</label> <input name="email" type="text" placeholder="<?php echo e(trans('cart.email')); ?>" value="<?php echo e((old('email'))?old('email'):$shippingAddress['email']); ?>">
                            <?php if($errors->has('email')): ?>
                                <span class="help-block"><?php echo e($errors->first('email')); ?></span>
                            <?php endif; ?>
                    </td>
                    <td class="form-group<?php echo e($errors->has('phone') ? ' has-error' : ''); ?>">
                        <label for="phone" class="control-label"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo e(trans('cart.phone')); ?>:</label> <input name="phone" type="text" placeholder="<?php echo e(trans('cart.phone')); ?>" value="<?php echo e((old('phone'))?old('phone'):$shippingAddress['phone']); ?>">
                            <?php if($errors->has('phone')): ?>
                                <span class="help-block"><?php echo e($errors->first('phone')); ?></span>
                            <?php endif; ?>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" class="form-group<?php echo e($errors->has('country') ? ' has-error' : ''); ?>">
                        <label  for="country" class="control-label"><i class="fa fa-dribbble" aria-hidden="true"></i> <?php echo e(trans('cart.country')); ?>:</label>
                        <?php
                            $ct = (old('country'))?old('country'):$shippingAddress['country'];
                        ?>
                        <select class="form-control country " style="width: 100%;" name="country" >
                            <option value="">__<?php echo e(trans('cart.country')); ?>__</option>
                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($k); ?>" <?php echo e(($ct ==$k) ? 'selected':''); ?>><?php echo e($v); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if($errors->has('country')): ?>
                            <span class="help-block">
                                <?php echo e($errors->first('country')); ?>

                            </span>
                        <?php endif; ?>
                    </td>
                </tr>


                <tr>
                    <td class="form-group<?php echo e($errors->has('address1') ? ' has-error' : ''); ?>"><label for="address1" class="control-label"><i class="fa fa-home"></i> <?php echo e(trans('cart.address1')); ?>:</label> <input name="address1" type="text" placeholder="<?php echo e(trans('cart.address1')); ?>" value="<?php echo e((old('address1'))?old('address1'):$shippingAddress['address1']); ?>">
                            <?php if($errors->has('address1')): ?>
                                <span class="help-block"><?php echo e($errors->first('address1')); ?></span>
                            <?php endif; ?></td>
                    <td class="form-group<?php echo e($errors->has('address2') ? ' has-error' : ''); ?>"><label for="address2" class="control-label"><i class="fa fa-university"></i> <?php echo e(trans('cart.address2')); ?></label><input name="address2" type="text" placeholder="<?php echo e(trans('cart.address2')); ?>" value="<?php echo e((old('address2'))?old('address2'):$shippingAddress['address2']); ?>">
                            <?php if($errors->has('address2')): ?>
                                <span class="help-block"><?php echo e($errors->first('address2')); ?></span>
                            <?php endif; ?></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label  class="control-label"><i class="fa fa-file-image-o"></i> <?php echo e(trans('cart.note')); ?>:</label>
                        <textarea rows="5" name="comment" placeholder="<?php echo e(trans('cart.note')); ?>...."><?php echo e((old('comment'))?old('comment'):$shippingAddress['comment']); ?></textarea>
                    </td>

                </tr>
            </table>

    </div>
    <div class="col-md-6">




        <div class="row">
            <div class="col-md-12">
                <table class="table box table-bordered" id="showTotal">
                    <?php $__currentLoopData = $dataTotal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($element['value'] !=0): ?>

                     <?php if($element['code']=='total'): ?>
                         <tr class="showTotal" style="background:#f5f3f3;font-weight: bold;">
                     <?php else: ?>
                        <tr class="showTotal">
                     <?php endif; ?>
                             <th><?php echo $element['title']; ?></th>
                            <td style="text-align: right" id="<?php echo e($element['code']); ?>"><?php echo e($element['text']); ?></td>
                        </tr>
                    <?php endif; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>


        <?php if($extensionDiscount): ?>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label class="control-label" for="inputGroupSuccess3"><i class="fa fa-exchange" aria-hidden="true"></i> <?php echo e(trans('cart.coupon')); ?>

                        <span style="display:inline; cursor: pointer; display: <?php echo e(($hasCoupon)?'inline':'none'); ?>" class="text-danger" id="removeCoupon">(<?php echo e(trans('cart.remove_coupon')); ?> <i class="fa fa fa-times"></i>)</span>
                    </label>
                    <div id="coupon-group" class="input-group <?php echo e(Session::has('error_discount')?'has-error':''); ?>">
                      <input type="text" <?php echo e(($extensionDiscount['permission'])?'':'disabled'); ?> placeholder="Your coupon" class="form-control" id="coupon-value" aria-describedby="inputGroupSuccess3Status">
                      <span class="input-group-addon <?php echo e(($extensionDiscount['permission'])?'':'disabled'); ?>"  <?php echo ($extensionDiscount['permission'])?'id="coupon-button"':''; ?> style="cursor: pointer;" data-loading-text="<i class='fa fa-spinner fa-spin'></i> checking"><?php echo e(trans('cart.apply')); ?></span>
                    </div>
                    <span class="status-coupon" style="display: none;" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                    <div class="coupon-msg  <?php echo e(Session::has('error_discount')?'text-danger':''); ?>" style="text-align: left;padding-left: 10px;"><?php echo e(Session::has('error_discount')?Session::get('error_discount'):''); ?></div>
                  </div>
              </div>
        <?php endif; ?>





        <div class="row">
            <div class="col-md-12">
                    <div class="form-group <?php echo e($errors->has('shippingMethod') ? ' has-error' : ''); ?>">
                        <h3 class="control-label"><i class="fa fa-truck" aria-hidden="true"></i> <?php echo e(trans('cart.shipping_method')); ?>:<br></h3>
                        <?php if($errors->has('shippingMethod')): ?>
                            <span class="help-block"><?php echo e($errors->first('shippingMethod')); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <?php $__currentLoopData = $shippingMethod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $shipping): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div>
                                <label class="radio-inline">
                                 <input type="radio" name="shippingMethod" value="<?php echo e($shipping['code']); ?>"  <?php echo e((old('shippingMethod') == $key)?'checked':''); ?> style="position: relative;" <?php echo e(($shipping['permission'])?'':'disabled'); ?>>
                                 <?php echo e($shipping['title']); ?> (<?php echo e(sc_currency_render($shipping['value'])); ?>)
                                </label>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
            </div>
        </div>




        <div class="row">
            <div class="col-md-12">
                    <div class="form-group <?php echo e($errors->has('paymentMethod') ? ' has-error' : ''); ?>">
                        <h3 class="control-label"><i class="fa fa-credit-card-alt"></i> <?php echo e(trans('cart.payment_method')); ?>:<br></h3>
                        <?php if($errors->has('paymentMethod')): ?>
                            <span class="help-block"><?php echo e($errors->first('paymentMethod')); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <?php $__currentLoopData = $paymentMethod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div>
                                <label class="radio-inline">
                                 <input type="radio" name="paymentMethod" value="<?php echo e($payment['code']); ?>"  <?php echo e((old('paymentMethod') == $key)?'checked':''); ?> style="position: relative;" <?php echo e(($payment['permission'])?'':'disabled'); ?>>
                                 <img title="<?php echo e($payment['title']); ?>" alt="<?php echo e($payment['title']); ?>" src="<?php echo e(asset($payment['image'])); ?>" style="width: 120px;">
                                </label>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
            </div>
        </div>

            </div>
        </div>



        <div class="row" style="padding-bottom: 20px;">
            <div class="col-md-12 text-center">
                    <div class="pull-right">
                        <button class="btn btn-success" id="submit-order" type="button" style="cursor: pointer;padding:10px 30px"><i class="fa fa-check"></i> <?php echo e(trans('cart.checkout')); ?></button>
                    </div>
            </div>
        </div>



    </div>
</div>
</form>
<?php endif; ?>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
          <li class="active"><?php echo e($title); ?></li>
        </ol>
      </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
    function updateCart(obj){
        var new_qty = obj.val();
        var rowid = obj.data('rowid');
        var id = obj.data('id');
            $.ajax({
            url: '<?php echo e(route('cart.update')); ?>',
            type: 'POST',
            dataType: 'json',
            async: false,
            cache: false,
            data: {
                id: id,
                rowId: rowid,
                new_qty: new_qty,
                _token:'<?php echo e(csrf_token()); ?>'},
            success: function(data){
                error= parseInt(data.error);
                if(error ===0)
                {
                        window.location.replace(location.href);
                }else{
                    $('.item-qty-'+id).css('display','block').html(data.msg);
                }

                }
        });
    }

$('#submit-order').click(function(){
    $('#form-order').submit();
    $(this).prop('disabled',true);
});

<?php if($extensionDiscount): ?>
    $('#coupon-button').click(function() {
     var coupon = $('#coupon-value').val();
        if(coupon==''){
            $('#coupon-group').addClass('has-error');
            $('.coupon-msg').html('<?php echo e(trans('cart.coupon_empty')); ?>').addClass('text-danger').show();
        }else{
        $('#coupon-button').button('loading');
        setTimeout(function() {
            $.ajax({
                url: '<?php echo e(route('useDiscount')); ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    code: coupon,
                    uID: <?php echo e($uID); ?>,
                    _token: "<?php echo e(csrf_token()); ?>",
                },
            })
            .done(function(result) {
                    $('#coupon-value').val('');
                    $('.coupon-msg').removeClass('text-danger');
                    $('.coupon-msg').removeClass('text-success');
                    $('#coupon-group').removeClass('has-error');
                    $('.coupon-msg').hide();
                if(result.error ==1){
                    $('#coupon-group').addClass('has-error');
                    $('.coupon-msg').html(result.msg).addClass('text-danger').show();
                }else{
                    $('#removeCoupon').show();
                    $('.coupon-msg').html(result.msg).addClass('text-success').show();
                    $('.showTotal').remove();
                    $('#showTotal').prepend(result.html);
                }
            })
            .fail(function() {
                console.log("error");
            })
           $('#coupon-button').button('reset');
       }, 2000);
        }

    });
    $('#removeCoupon').click(function() {
            $.ajax({
                url: '<?php echo e(route('removeDiscount')); ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    _token: "<?php echo e(csrf_token()); ?>",
                },
            })
            .done(function(result) {
                    $('#removeCoupon').hide();
                    $('#coupon-value').val('');
                    $('.coupon-msg').removeClass('text-danger');
                    $('.coupon-msg').removeClass('text-success');
                    $('.coupon-msg').hide();
                    $('.showTotal').remove();
                    $('#showTotal').prepend(result.html);
            })
            .fail(function() {
                console.log("error");
            })
            // .always(function() {
            //     console.log("complete");
            // });
    });
<?php endif; ?>

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('templates.'.sc_store('template').'.shop_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\s-cart\resources\views/templates/default/shop_cart.blade.php ENDPATH**/ ?>
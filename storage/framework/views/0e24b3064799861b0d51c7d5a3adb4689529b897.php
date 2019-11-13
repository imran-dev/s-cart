<?php $__env->startSection('main'); ?>
 <div class="row">
    <div class="col-md-12">
       <div class="box">

          <div class="box-header with-border">
              <h3 class="box-title"><?php echo e(trans('order.order_detail')); ?> #<?php echo e($order->id); ?></h3>
              <div class="box-tools not-print">
                  <div class="btn-group pull-right" style="margin-right: 0px">
                      <a href="<?php echo e(route('admin_order.index')); ?>" class="btn btn-sm btn-flat btn-default"><i class="fa fa-list"></i>&nbsp;<?php echo e(trans('admin.list')); ?></a>
                  </div>
                  <div class="btn-group pull-right" style="margin-right: 10px">
                      <a href="<?php echo e(route('admin_order.export_detail').'?order_id='.$order->id.'&type=invoice'); ?>" class="btn btn-sm btn-flat btn-twitter" title="Export"><i class="fa fa-file-excel-o"></i><span class="hidden-xs"> Excel</span></a>
                  </div>

                  <div class="btn-group pull-right" style="margin-right: 10px;border:1px solid #c5b5b5;">
                      <a class="btn btn-sm btn-flat" title="Export" onclick="order_print()"><i class="fa fa-print"></i><span class="hidden-xs"> Print</span></a>
                  </div>
              </div>
          </div>

          <div class="row" id="order-body">
            <div class="col-sm-6">
                 <table class="table table-bordered">
                    <tr>
                      <td class="td-title"><?php echo e(trans('order.shipping_first_name')); ?>:</td><td><a href="#" class="updateInfoRequired" data-name="first_name" data-type="text" data-pk="<?php echo e($order->id); ?>" data-url="<?php echo e(route("admin_order.update")); ?>" data-title="<?php echo e(trans('order.shipping_first_name')); ?>" ><?php echo $order->first_name; ?></a></td>
                    </tr>
                    <tr>
                      <td class="td-title"><?php echo e(trans('order.shipping_last_name')); ?>:</td><td><a href="#" class="updateInfoRequired" data-name="last_name" data-type="text" data-pk="<?php echo e($order->id); ?>" data-url="<?php echo e(route("admin_order.update")); ?>" data-title="<?php echo e(trans('order.shipping_last_name')); ?>" ><?php echo $order->last_name; ?></a></td>
                    </tr>
                    <tr>
                      <td class="td-title"><?php echo e(trans('order.shipping_phone')); ?>:</td><td><a href="#" class="updateInfoRequired" data-name="phone" data-type="text" data-pk="<?php echo e($order->id); ?>" data-url="<?php echo e(route("admin_order.update")); ?>" data-title="<?php echo e(trans('order.shipping_phone')); ?>" ><?php echo $order->phone; ?></a></td>
                    </tr>
                    <tr>
                      <td class="td-title"><?php echo e(trans('order.email')); ?>:</td><td><?php echo empty($order->email)?'N/A':$order->email; ?></td>
                    </tr>
                    <tr>
                      <td class="td-title"><?php echo e(trans('order.shipping_address1')); ?>:</td><td><a href="#" class="updateInfoRequired" data-name="address1" data-type="text" data-pk="<?php echo e($order->id); ?>" data-url="<?php echo e(route("admin_order.update")); ?>" data-title="<?php echo e(trans('order.address1')); ?>" ><?php echo $order->address1; ?></a></td>
                    </tr>
                      <tr>
                      <td class="td-title"><?php echo e(trans('order.shipping_address2')); ?>:</td><td><a href="#" class="updateInfoRequired" data-name="address2" data-type="text" data-pk="<?php echo e($order->id); ?>" data-url="<?php echo e(route("admin_order.update")); ?>" data-title="<?php echo e(trans('order.address2')); ?>" ><?php echo $order->address2; ?></a></td>
                    </tr>
                      <tr>
                      <td class="td-title"><?php echo e(trans('order.country')); ?>:</td><td><a href="#" class="updateInfoRequired" data-name="country" data-type="select" data-source ="<?php echo e(json_encode($countryMap)); ?>" data-pk="<?php echo e($order->id); ?>" data-url="<?php echo e(route("admin_order.update")); ?>" data-title="<?php echo e(trans('order.country')); ?>" data-value="<?php echo $order->country; ?>"></a></td>
                    </tr>
                </table>
            </div>
            <div class="col-sm-6">
                <table  class="table table-bordered">
                    <tr><td  class="td-title"><?php echo e(trans('order.order_status')); ?>:</td><td><a href="#" class="updateStatus" data-name="status" data-type="select" data-source ="<?php echo e(json_encode($statusOrderMap)); ?>"  data-pk="<?php echo e($order->id); ?>" data-value="<?php echo $order->status; ?>" data-url="<?php echo e(route("admin_order.update")); ?>" data-title="<?php echo e(trans('order.order_status')); ?>"><?php echo e($statusOrder[$order->status]); ?></a></td></tr>
                    <tr><td><?php echo e(trans('order.order_shipping_status')); ?>:</td><td><a href="#" class="updateStatus" data-name="shipping_status" data-type="select" data-source ="<?php echo e(json_encode($statusShippingMap)); ?>"  data-pk="<?php echo e($order->id); ?>" data-value="<?php echo $order->shipping_status; ?>" data-url="<?php echo e(route("admin_order.update")); ?>" data-title="<?php echo e(trans('order.order_shipping_status')); ?>"><?php echo e($statusShipping[$order->shipping_status]??''); ?></a></td></tr>
                    <tr><td><?php echo e(trans('order.shipping_method')); ?>:</td><td><a href="#" class="updateStatus" data-name="shipping_method" data-type="select" data-source ="<?php echo e(json_encode($shippingMethod)); ?>"  data-pk="<?php echo e($order->id); ?>" data-value="<?php echo $order->shipping_method; ?>" data-url="<?php echo e(route("admin_order.update")); ?>" data-title="<?php echo e(trans('order.shipping_method')); ?>"><?php echo e($order->shipping_method); ?></a></td></tr>
                    <tr><td><?php echo e(trans('order.payment_method')); ?>:</td><td><a href="#" class="updateStatus" data-name="payment_method" data-type="select" data-source ="<?php echo e(json_encode($paymentMethod)); ?>"  data-pk="<?php echo e($order->id); ?>" data-value="<?php echo $order->payment_method; ?>" data-url="<?php echo e(route("admin_order.update")); ?>" data-title="<?php echo e(trans('order.payment_method')); ?>"><?php echo e($order->payment_method); ?></a></td></tr>
                  </table>
                 <table class="table table-bordered">
                    <tr>
                      <td class="td-title"><?php echo e(trans('order.currency')); ?>:</td><td><?php echo e($order->currency); ?></td>
                    </tr>
                    <tr>
                      <td class="td-title"><?php echo e(trans('order.exchange_rate')); ?>:</td><td><?php echo e(($order->exchange_rate)??1); ?></td>
                    </tr>
                </table>
            </div>

          </div>

<?php
    if($order->balance == 0){
        $style = 'style="color:#0e9e33;font-weight:bold;"';
    }else
        if($order->balance < 0){
        $style = 'style="color:#ff2f00;font-weight:bold;"';
    }else{
        $style = 'style="font-weight:bold;"';
    }
?>

    <form id="form-add-item" action="" method="">
      <?php echo csrf_field(); ?>
      <input type="hidden" name="order_id"  value="<?php echo e($order->id); ?>">
      <div class="row">
        <div class="col-sm-12">
          <div class="box collapsed-box">
          <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th><?php echo e(trans('product.name')); ?></th>
                    <th><?php echo e(trans('product.sku')); ?></th>
                    <th class="product_price"><?php echo e(trans('product.price')); ?></th>
                    <th class="product_qty"><?php echo e(trans('product.quantity')); ?></th>
                    <th class="product_total"><?php echo e(trans('product.total_price')); ?></th>
                    <th><?php echo e(trans('admin.action')); ?></th>
                  </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $order->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                            <td><?php echo e($item->name); ?>

                              <?php
                              $html = '';
                                if($item->attribute && is_array(json_decode($item->attribute,true))){
                                  $array = json_decode($item->attribute,true);
                                      foreach ($array as $key => $element){
                                        $html .= '<br><b>'.$attributesGroup[$key].'</b> : <i>'.$element.'</i>';
                                      }
                                }
                              ?>
                            <?php echo $html; ?>

                            </td>
                            <td><?php echo e($item->sku); ?></td>
                            <td class="product_price"><a href="#" class="edit-item-detail" data-value="<?php echo e($item->price); ?>" data-name="price" data-type="number" min=0 data-pk="<?php echo e($item->id); ?>" data-url="<?php echo e(route("admin_order.edit_item")); ?>" data-title="<?php echo e(trans('product.price')); ?>"><?php echo e($item->price); ?></a></td>
                            <td class="product_qty">x <a href="#" class="edit-item-detail" data-value="<?php echo e($item->qty); ?>" data-name="qty" data-type="number" min=0 data-pk="<?php echo e($item->id); ?>" data-url="<?php echo e(route("admin_order.edit_item")); ?>" data-title="<?php echo e(trans('order.qty')); ?>"> <?php echo e($item->qty); ?></a></td>
                            <td class="product_total item_id_<?php echo e($item->id); ?>"><?php echo e(sc_currency_render_symbol($item->total_price,$order->currency)); ?></td>
                            <td>
                                <button  onclick="deleteItem(<?php echo e($item->id); ?>);" class="btn btn-danger btn-xs" data-title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </td>
                          </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <tr  id="add-item" class="not-print">
                      <td colspan="6">
                        <button  type="button" class="btn btn-sm btn-flat btn-success" id="add-item-button"  title="<?php echo e(trans('product.add_product')); ?>"><i class="fa fa-plus"></i> <?php echo e(trans('product.add_product')); ?></button>
                        &nbsp;&nbsp;&nbsp;<button style="display: none; margin-right: 50px" type="button" class="btn btn-sm btn-flat btn-warning" id="add-item-button-save"  title="Save"><i class="fa fa-save"></i> Save</button>
                    </td>
                  </tr>

                    </form>
                </tbody>
              </table>
            </div>
        </div>
        </div>

      </div>
</form>

      <div class="row">
        
          <div class="col-sm-6">
            <div class="box collapsed-box">
                <table   class="table table-bordered">
                  <?php $__currentLoopData = $dataTotal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($element['code'] =='subtotal'): ?>
                      <tr><td  class="td-title-normal"><?php echo $element['title']; ?>:</td><td style="text-align:right" class="data-<?php echo e($element['code']); ?>"><?php echo e(sc_currency_format($element['value'])); ?></td></tr>
                    <?php endif; ?>
                    <?php if($element['code'] =='shipping'): ?>
                      <tr><td><?php echo $element['title']; ?>:</td><td style="text-align:right"><a href="#" class="updatePrice data-<?php echo e($element['code']); ?>"  data-name="<?php echo e($element['code']); ?>" data-type="text" data-pk="<?php echo e($element['id']); ?>" data-url="<?php echo e(route("admin_order.update")); ?>" data-title="<?php echo e(trans('order.shipping_price')); ?>"><?php echo e($element['value']); ?></a></td></tr>
                    <?php endif; ?>
                    <?php if($element['code'] =='discount'): ?>
                      <tr><td><?php echo $element['title']; ?>(-):</td><td style="text-align:right"><a href="#" class="updatePrice data-<?php echo e($element['code']); ?>" data-name="<?php echo e($element['code']); ?>" data-type="text" data-pk="<?php echo e($element['id']); ?>" data-url="<?php echo e(route("admin_order.update")); ?>" data-title="<?php echo e(trans('order.discount')); ?>"><?php echo e($element['value']); ?></a></td></tr>
                    <?php endif; ?>

                     <?php if($element['code'] =='total'): ?>
                      <tr style="background:#f5f3f3;font-weight: bold;"><td><?php echo $element['title']; ?>:</td><td style="text-align:right" class="data-<?php echo e($element['code']); ?>"><?php echo e(sc_currency_format($element['value'])); ?></td></tr>
                    <?php endif; ?>

                    <?php if($element['code'] =='received'): ?>
                      <tr><td><?php echo $element['title']; ?>(-):</td><td style="text-align:right"><a href="#" class="updatePrice data-<?php echo e($element['code']); ?>" data-name="<?php echo e($element['code']); ?>" data-type="text" data-pk="<?php echo e($element['id']); ?>" data-url="<?php echo e(route("admin_order.update")); ?>" data-title="<?php echo e(trans('order.received')); ?>"><?php echo e($element['value']); ?></a></td></tr>
                    <?php endif; ?>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <tr  <?php echo $style; ?>  class="data-balance"><td><?php echo e(trans('order.balance')); ?>:</td><td style="text-align:right"><?php echo e(($order->balance === NULL)?sc_currency_format($order->total):sc_currency_format($order->balance)); ?></td></tr>
              </table>
            </div>

          </div>
          

          
          <div class="col-sm-6">
            <div class="box collapsed-box">
              <table class="table box table-bordered">
                <tr>
                  <td  class="td-title"><?php echo e(trans('order.order_note')); ?>:</td>
                  <td>
                    <a href="#" class="updateInfo" data-name="comment" data-type="text" data-pk="<?php echo e($order->id); ?>" data-url="<?php echo e(route("admin_order.update")); ?>" data-title="" ><?php echo e($order->comment); ?>

                    </a>
                </td>
                </tr>
              </table>
            </div>

            <div class="box collapsed-box">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo e(trans('order.order_history')); ?></h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                  </button>
                  </div>
              </div>

              <div class="box-body table-responsive no-padding box-primary">
                    <?php if(count($order->history)): ?>
                      <table  class="table table-bordered" id="history">
                        <tr>
                          <th><?php echo e(trans('order.history_staff')); ?></th>
                          <th><?php echo e(trans('order.history_content')); ?></th>
                          <th><?php echo e(trans('order.history_time')); ?></th>
                        </tr>
                      <?php $__currentLoopData = $order->history->sortKeysDesc()->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e(\App\Admin\Models\AdminUser::find($history['admin_id'])->name??''); ?></td>
                          <td><div class="history"><?php echo $history['content']; ?></div></td>
                          <td><?php echo e($history['add_date']); ?></td>
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </table>
                    <?php endif; ?>
              </div>
            </div>

          </div>
          
      </div>
<?php
  $htmlSelectProduct = '<tr>
              <td>
                <select onChange="selectProduct($(this));"  class="add_id form-control select2" name="add_id[]" style="width:100% !important;">
                <option value="0">'.trans('order.select_product').'</option>';
                if(count($products)){
                  foreach ($products as $pId => $productName){
                    $htmlSelectProduct .='<option  value="'.$pId.'" >'.$productName.'</option>';
                   }
                }
  $htmlSelectProduct .='
              </select>
              <span class="add_attr"></span>
            </td>
              <td><input type="text" disabled class="add_sku form-control"  value=""></td>
              <td><input onChange="update_total($(this));" type="number" min="0" class="add_price form-control" name="add_price[]" value="0"></td>
              <td><input onChange="update_total($(this));" type="number" min="0" class="add_qty form-control" name="add_qty[]" value="0"></td>
              <td><input type="number" disabled class="add_total form-control" value="0"></td>
              <td><button onClick="$(this).parent().parent().remove();" class="btn btn-danger btn-md btn-flat" data-title="Delete"><i class="fa fa-times" aria-hidden="true"></i></button></td>
            </tr>
          <tr>
          </tr>';
        $htmlSelectProduct = str_replace("\n", '', $htmlSelectProduct);
        $htmlSelectProduct = str_replace("\t", '', $htmlSelectProduct);
        $htmlSelectProduct = str_replace("\r", '', $htmlSelectProduct);
?>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('styles'); ?>
<style type="text/css">
.history{
  max-height: 50px;
  max-width: 300px;
  overflow-y: auto;
}
.td-title{
  width: 35%;
  font-weight: bold;
}
.td-title-normal{
  width: 35%;
}
.product_qty{
  width: 80px;
  text-align: right;
}
.product_price,.product_total{
  width: 120px;
  text-align: right;
}

</style>
<!-- Ediable -->
<link rel="stylesheet" href="<?php echo e(asset('admin/plugin/bootstrap-editable.css')); ?>">
<!-- Select2 -->
<link rel="stylesheet" href="<?php echo e(asset('admin/AdminLTE/bower_components/select2/dist/css/select2.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>

<script src="<?php echo e(asset('admin/plugin/jquery.pjax.js')); ?>"></script>

<!-- Ediable -->
<script src="<?php echo e(asset('admin/plugin/bootstrap-editable.min.js')); ?>"></script>

<!-- Select2 -->
<script src="<?php echo e(asset('admin/AdminLTE/bower_components/select2/dist/js/select2.full.min.js')); ?>"></script>

<script type="text/javascript">

$(document).ready(function() {
//Initialize Select2 Elements
$('.select2').select2();
});

function update_total(e){
    node = e.closest('tr');
    var qty = node.find('.add_qty').eq(0).val();
    var price = node.find('.add_price').eq(0).val();
    node.find('.add_total').eq(0).val(qty*price);
}


//Add item
    function selectProduct(element){
        node = element.closest('tr');
        var id = parseInt(node.find('option:selected').eq(0).val());
        if(id == 0){
            node.find('.add_sku').val('');
            node.find('.add_qty').eq(0).val('');
            node.find('.add_price').eq(0).val('');
            node.find('.add_attr').html('');
        }else{
            $.ajax({
                url : '<?php echo e(route('admin_order.product_info')); ?>',
                type : "get",
                dateType:"application/json; charset=utf-8",
                data : {
                     id : id
                },
            beforeSend: function(){
                $('#loading').show();
            },
            success: function(result){
                var returnedData = JSON.parse(result);
                node.find('.add_sku').val(returnedData.sku);
                node.find('.add_qty').eq(0).val(1);
                node.find('.add_price').eq(0).val(returnedData.price_final * <?php echo ($order->exchange_rate)??1; ?>);
                node.find('.add_total').eq(0).val(returnedData.price_final * <?php echo ($order->exchange_rate)??1; ?>);
                node.find('.add_attr').eq(0).html(returnedData.renderAttDetails);
                $('#loading').hide();
                }
            });
        }

    }
$('#add-item-button').click(function() {
  var html = '<?php echo $htmlSelectProduct; ?>';
  $('#add-item').before(html);
  $('.select2').select2();
  $('#add-item-button-save').show();
});

$('#add-item-button-save').click(function(event) {
    $('#add-item-button').prop('disabled', true);
    $('#add-item-button-save').button('loading');
    $.ajax({
        url:'<?php echo e(route("admin_order.add_item")); ?>',
        type:'post',
        dataType:'json',
        data:$('form#form-add-item').serialize(),
        beforeSend: function(){
            $('#loading').show();
        },
        success: function(result){
          $('#loading').hide();
            if(parseInt(result.error) ==0){
                location.reload();
            }else{
                alert(result.msg);
            }
        }
    });
});

//End add item
//

$(document).ready(function() {

  all_editable();
});

function all_editable(){
    $.fn.editable.defaults.params = function (params) {
        params._token = "<?php echo e(csrf_token()); ?>";
        return params;
    };

    $('.updateInfo').editable({});

    $(".updatePrice").on("shown", function(e, editable) {
      var value = $(this).text().replace(/,/g, "");
      editable.input.$input.val(parseInt(value));
    });
    $('.updateStatus').editable({
        validate: function(value) {
            if (value == '') {
                return '<?php echo e(trans('language.admin.not_empty')); ?>';
            }
        }
    });

    $('.updateInfoRequired').editable({
        validate: function(value) {
            if (value == '') {
                return '<?php echo e(trans('language.admin.not_empty')); ?>';
            }
        }
    });


    $('.edit-item-detail').editable({
        ajaxOptions: {
        type: 'post',
        dataType: 'json'
        },
        validate: function(value) {
          if (value == '') {
              return '<?php echo e(trans('language.admin.not_empty')); ?>';
          }
          if (!$.isNumeric(value)) {
              return '<?php echo e(trans('language.admin.only_numeric')); ?>';
          }
        },
        success: function(response,newValue) {
            var rs = response;
            if(rs.error ==0){
                $('.data-shipping').html(rs.msg.shipping);
                $('.data-received').html(rs.msg.received);
                $('.data-subtotal').html(rs.msg.subtotal);
                $('.data-total').html(rs.msg.total);
                $('.data-shipping').html(rs.msg.shipping);
                $('.data-discount').html(rs.msg.discount);
                $('.item_id_'+rs.msg.item_id).html(rs.msg.item_total_price);
                var objblance = $('.data-balance').eq(0);
                objblance.before(rs.msg.balance);
                objblance.remove();
            }
        }

    });

    $('.updatePrice').editable({
        ajaxOptions: {
        type: 'post',
        dataType: 'json'
        },
        validate: function(value) {
          if (value == '') {
              return '<?php echo e(trans('language.admin.not_empty')); ?>';
          }
          if (!$.isNumeric(value)) {
              return '<?php echo e(trans('language.admin.only_numeric')); ?>';
          }
       },

        success: function(response, newValue) {
              // console.log(response);
              var rs = response;
              if(rs.error ==0){
                  $('.data-shipping').html(rs.msg.shipping);
                  $('.data-received').html(rs.msg.received);
                  $('.data-subtotal').html(rs.msg.subtotal);
                  $('.data-total').html(rs.msg.total);
                  $('.data-shipping').html(rs.msg.shipping);
                  $('.data-discount').html(rs.msg.discount);
                  var objblance = $('.data-balance').eq(0);
                  objblance.before(rs.msg.balance);
                  objblance.remove();

              }
      }
    });
}



function deleteItem(id){
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success',
      cancelButton: 'btn btn-danger'
    },
    buttonsStyling: true,
  })

  swalWithBootstrapButtons.fire({
    title: 'Are you sure to delete this item ?',
    text: "",
    type: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, delete it!',
    confirmButtonColor: "#DD6B55",
    cancelButtonText: 'No, cancel!',
    reverseButtons: true,

    preConfirm: function() {
        return new Promise(function(resolve) {
            $.ajax({
                method: 'post',
                url: '<?php echo e(route("admin_order.delete_item")); ?>',
                data: {
                  'pId':id,
                    _token: '<?php echo e(csrf_token()); ?>',
                },
                success: function (data) {
                  location.reload();
                }
            });
        });
    }

  }).then((result) => {
    if (result.value) {
      swalWithBootstrapButtons.fire(
        'Deleted!',
        'Item has been deleted.',
        'success'
      )
    } else if (
      // Read more about handling dismissals
      result.dismiss === Swal.DismissReason.cancel
    ) {
      // swalWithBootstrapButtons.fire(
      //   'Cancelled',
      //   'Your imaginary file is safe :)',
      //   'error'
      // )
    }
  })
}



  $(document).ready(function(){
  // does current browser support PJAX
    if ($.support.pjax) {
      $.pjax.defaults.timeout = 2000; // time in milliseconds
    }

  });

    function order_print(){
      $('.not-print').hide();
      window.print();
      $('.not-print').show();
    }

</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\anytimebazar\resources\views/admin/screen/order_edit.blade.php ENDPATH**/ ?>
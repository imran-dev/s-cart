<?php $__env->startSection('main'); ?>

<div class="row">

  <div class="col-md-6">

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">
          <div class="btn-group">
            <a class="btn btn-warning btn-flat btn-sm menu-sort-save" title="Save"><i class="fa fa-save"></i><span class="hidden-xs">&nbsp;Save</span></a>
          </div>
      </h3>

      </div>

      <div class="box-body table-responsive no-padding box-primary">

<div class="dd" id="menu-sort">
    <ol class="dd-list">
<?php
  $menus = Admin::getMenu();
  // print_r($menus);
?>

        <?php $__currentLoopData = $menus[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level0): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($level0->type ==1): ?>
            <li class="dd-item" data-id="<?php echo e($level0->id); ?>">
                <div class="dd-handle header-fix">
                  <?php echo e(sc_language_render($level0->title)); ?>

                  <span class="pull-right dd-nodrag">
                      <a href="<?php echo e(route('admin_menu.edit',['id'=>$level0->id])); ?>"><i class="fa fa-edit"></i></a>
                      <a data-id="<?php echo e($level0->id); ?>" class="remove_menu"><i class="fa fa-trash"></i></a>
                  </span>
                </div>
            </li>
          <?php elseif($level0->uri): ?>
            <li class="dd-item" data-id="<?php echo e($level0->id); ?>">
                <div class="dd-handle">
                  <i class="fa <?php echo e($level0->icon); ?>"></i> <?php echo e(sc_language_render($level0->title)); ?>

                  <span class="pull-right dd-nodrag">
                      <a href="<?php echo e(route('admin_menu.edit',['id'=>$level0->id])); ?>"><i class="fa fa-edit"></i></a>
                      <a data-id="<?php echo e($level0->id); ?>" class="remove_menu"><i class="fa fa-trash"></i></a>
                  </span>
                </div>
            </li>
          <?php else: ?>
            <li class="dd-item" data-id="<?php echo e($level0->id); ?>">
              <div class="dd-handle">
                <i class="fa <?php echo e($level0->icon); ?>"></i> <?php echo e(sc_language_render($level0->title)); ?>

                  <span class="pull-right dd-nodrag">
                      <a href="<?php echo e(route('admin_menu.edit',['id'=>$level0->id])); ?>"><i class="fa fa-edit"></i></a>
                      <a data-id="<?php echo e($level0->id); ?>" class="remove_menu"><i class="fa fa-trash"></i></a>
                  </span>
              </div>
    
            <?php if(isset($menus[$level0->id]) && count($menus[$level0->id])): ?>
              <ol class="dd-list">
                <?php $__currentLoopData = $menus[$level0->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($level1->uri): ?>
                    <li class="dd-item" data-id="<?php echo e($level1->id); ?>">
                        <div class="dd-handle">
                          <i class="fa <?php echo e($level1->icon); ?>"></i> <?php echo e(sc_language_render($level1->title)); ?>

                          <span class="pull-right dd-nodrag">
                              <a href="<?php echo e(route('admin_menu.edit',['id'=>$level1->id])); ?>"><i class="fa fa-edit"></i></a>
                              <a data-id="<?php echo e($level1->id); ?>" class="remove_menu"><i class="fa fa-trash"></i></a>
                          </span>
                        </div>
                    </li>
                  <?php else: ?>
                  <li class="dd-item" data-id="<?php echo e($level1->id); ?>">
                    <div class="dd-handle">
                      <i class="fa <?php echo e($level1->icon); ?>"></i> <?php echo e(sc_language_render($level1->title)); ?>

                      <span class="pull-right dd-nodrag">
                          <a href="<?php echo e(route('admin_menu.edit',['id'=>$level1->id])); ?>"><i class="fa fa-edit"></i></a>
                          <a data-id="<?php echo e($level1->id); ?>" class="remove_menu"><i class="fa fa-trash"></i></a>
                      </span>
                    </div>
            
                        <?php if(isset($menus[$level1->id]) && count($menus[$level1->id])): ?>
                          <ol class="dd-list">
                            <?php $__currentLoopData = $menus[$level1->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php if($level2->uri): ?>
                                <li class="dd-item" data-id="<?php echo e($level2->id); ?>">
                                    <div class="dd-handle">
                                      <i class="fa <?php echo e($level2->icon); ?>"></i> <?php echo e(sc_language_render($level2->title)); ?>

                                      <span class="pull-right dd-nodrag">
                                          <a href="<?php echo e(route('admin_menu.edit',['id'=>$level2->id])); ?>"><i class="fa fa-edit"></i></a>
                                          <a data-id="<?php echo e($level2->id); ?>" class="remove_menu"><i class="fa fa-trash"></i></a>
                                      </span>
                                    </div>
                                </li>
                              <?php else: ?>
                              <li class="dd-item" data-id="<?php echo e($level2->id); ?>">
                                <div class="dd-handle">
                                  <i class="fa <?php echo e($level2->icon); ?>"></i> <?php echo e(sc_language_render($level2->title)); ?>

                                  <span class="pull-right dd-nodrag">
                                      <a href="<?php echo e(route('admin_menu.edit',['id'=>$level2->id])); ?>"><i class="fa fa-edit"></i></a>
                                      <a data-id="<?php echo e($level2->id); ?>" class="remove_menu"><i class="fa fa-trash"></i></a>
                                  </span>
                                </li>
                              <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </ol>
                        <?php endif; ?>
                        
                    </li>
                  <?php endif; ?>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ol>
            <?php endif; ?>
              
            </li>
          <?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      

    </ol>
</div>

      </div>
    </div>
  </div>

  <div class="col-md-6">

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo $title_form; ?></h3>

      </div>


                <form action="<?php echo e($url_action); ?>" method="post" accept-charset="UTF-8" class="form-horizontal" id="form-main"  enctype="multipart/form-data">


                    <div class="box-body">
                        <div class="fields-group">

                            <div class="form-group   <?php echo e($errors->has('parent_id') ? ' has-error' : ''); ?>">
                                <label for="name" class="col-sm-2  control-label"><?php echo e(trans('menu.admin.parent')); ?></label>
                                <div class="col-sm-8">
                                    <select class="form-control parent select2" style="width: 100%;" name="parent_id" >
                                        <option value=""></option>
                                        <option value="0" <?php echo e((old('parent',$menu['parent']??'') ==0) ? 'selected':''); ?>>== ROOT ==</option>
                                        <?php $__currentLoopData = $treeMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($k); ?>" <?php echo e((old('parent',$menu['parent_id']??'') ==$k) ? 'selected':''); ?>><?php echo $v; ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                        <?php if($errors->has('name')): ?>
                                            <span class="help-block">
                                                <?php echo e($errors->first('parent_id')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group   <?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                                <label for="title" class="col-sm-2  control-label"><?php echo e(trans('menu.admin.title')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                        <input type="text"   id="title" name="title" value="<?php echo e(old('title',$menu['title']??'')); ?>" class="form-control title" placeholder="" />
                                    </div>
                                        <?php if($errors->has('title')): ?>
                                            <span class="help-block">
                                                <?php echo e($errors->first('title')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>

                          <div class="form-group">
                              <label for="icon" class="col-sm-2  control-label"><?php echo e(trans('menu.admin.icon')); ?></label>
                              <div class="col-sm-8">
                                  <div class="input-group">
                                      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                      <input required="1" style="width: 140px" type="text" id="icon" name="icon" value="<?php echo e(old('icon',$menu['icon']??'fa-bars')); ?>" class="form-control icon" placeholder="Input Icon" />
                                  </div>
                              </div>
                          </div>

                            <div class="form-group   <?php echo e($errors->has('uri') ? ' has-error' : ''); ?>">
                                <label for="uri" class="col-sm-2  control-label"><?php echo e(trans('menu.admin.uri')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                        <input type="text"   id="uri" name="uri" value="<?php echo e(old('uri',$menu['uri']??'')); ?>" class="form-control uri" placeholder="" />
                                    </div>
                                        <?php if($errors->has('uri')): ?>
                                            <span class="help-block">
                                                <?php echo e($errors->first('uri')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group    <?php echo e($errors->has('sort') ? ' has-error' : ''); ?>">
                                <label for="sort" class="col-sm-2  control-label"><?php echo e(trans('menu.admin.sort')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                        <input type="number" style="width: 100px;"  id="sort" name="sort" value="<?php echo old('sort',$menu['sort']??0)??0; ?>" class="form-control input-sm sort" placeholder="" />
                                    </div>
                                        <?php if($errors->has('sort')): ?>
                                            <span class="help-block">
                                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('sort')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>


                            <div class="form-group  <?php echo e($errors->has('roles') ? ' has-error' : ''); ?>">
        <?php
        $listRoles = [];
        $old_roles = old('roles',($menu?$menu->roles->pluck('id')->toArray():''));
            if(is_array($old_roles)){
                foreach($old_roles as $value){
                    $listRoles[] = (int)$value;
                }
            }
        ?>
                                <label for="roles" class="col-sm-2  control-label"><?php echo e(trans('menu.admin.roles')); ?></label>
                                <div class="col-sm-8">
                                    <select class="form-control input-sm roles select2"  multiple="multiple" data-placeholder="<?php echo e(trans('user.admin.select_permission')); ?>" style="width: 100%;" name="roles[]" >
                                        <option value=""></option>
                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($k); ?>"  <?php echo e((count($listRoles) && in_array($k, $listRoles))?'selected':''); ?>><?php echo e($v); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                        <?php if($errors->has('roles')): ?>
                                            <span class="help-block">
                                                <?php echo e($errors->first('roles')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>




                            <div class="form-group  <?php echo e($errors->has('permissions') ? ' has-error' : ''); ?>">
        <?php
        $listPermission = [];
        $old_permission = old('permissions',($menu?$menu->permissions->pluck('id')->toArray():''));
            if(is_array($old_permission)){
                foreach($old_permission as $value){
                    $listPermission[] = (int)$value;
                }
            }
        ?>
                                <label for="permissions" class="col-sm-2  control-label"><?php echo e(trans('menu.admin.permissions')); ?></label>
                                <div class="col-sm-8">
                                    <select class="form-control input-sm permissions select2"  multiple="multiple" data-placeholder="<?php echo e(trans('user.admin.select_permission')); ?>" style="width: 100%;" name="permissions[]" >
                                        <option value=""></option>
                                        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($k); ?>"  <?php echo e((count($listPermission) && in_array($k, $listPermission))?'selected':''); ?>><?php echo e($v); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                        <?php if($errors->has('permissions')): ?>
                                            <span class="help-block">
                                                <?php echo e($errors->first('permissions')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>




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
<!-- Ediable -->
<link rel="stylesheet" href="<?php echo e(asset('admin/plugin/nestable/jquery.nestable.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('admin/plugin/iconpicker/fontawesome-iconpicker.min.css')); ?>">
<!-- Select2 -->
<link rel="stylesheet" href="<?php echo e(asset('admin/AdminLTE/bower_components/select2/dist/css/select2.min.css')); ?>">

<style type="text/css">
  .header-fix,.header-fix:hover{
    background: #8cc1dc;
    border-radius: 0px;
    color:#424242;
  }
  .dd-handle{
    border-radius: 0px;
  }
  .remove_menu{
    cursor: pointer;
  }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<!-- Ediable -->

<script src="<?php echo e(asset('admin/plugin/nestable/jquery.nestable.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/plugin/iconpicker/fontawesome-iconpicker.min.js')); ?>"></script>
<!-- Select2 -->
<script src="<?php echo e(asset('admin/AdminLTE/bower_components/select2/dist/js/select2.full.min.js')); ?>"></script>

<script type="text/javascript">
$('.remove_menu').click(function(event) {
  var id = $(this).data('id');
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
                url: '<?php echo e($url_delete_item); ?>',
                data: {
                  id:id,
                    _token: '<?php echo e(csrf_token()); ?>',
                },
                success: function (data) {
                    if(data.error == 1){
                      swalWithBootstrapButtons.fire(
                        'Cancelled',
                        data.msg,
                        'error'
                      )
                      return;
                    }else{
                      location.reload();
                    }

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

});


$('#menu-sort').nestable();
$('.menu-sort-save').click(function () {
    $('#loading').show();
    var serialize = $('#menu-sort').nestable('serialize');
    var menu = JSON.stringify(serialize);
    $.ajax({
      url: '<?php echo e(route('admin_menu.update_sort')); ?>',
      type: 'POST',
      dataType: 'json',
      data: {
        _token: '<?php echo e(csrf_token()); ?>',
        menu: menu
      },
    })
    .done(function(data) {
      $('#loading').hide();
      if(data.error == 0){
        location.reload();
      }else{
          swalWithBootstrapButtons.fire(
            'Cancelled',
            data.msg,
            'error'
          )
      }
      //console.log(data);
    });
});


$(document).ready(function() {
    $('.select2').select2();
      //icon picker
    $('.icon').iconpicker({placement:'bottomLeft'});
});

</script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('version-jquery'); ?>
  <script src="<?php echo e(asset('admin/AdminLTE/bower_components/jquery/dist/jQuery-2.1.4.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\s-cart\resources\views/admin/screen/list-menu.blade.php ENDPATH**/ ?>
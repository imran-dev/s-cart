<?php $__env->startSection('main'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="pull-right">
                        <form action="<?php echo e(route('admin_user.index')); ?>" id="button_search">
                            <div onclick="$(this).submit();" class="btn-group pull-right">
                                <a class="btn btn-flat btn-primary" title="Refresh">
                                    <i class="fa  fa-search"></i><span
                                            class="hidden-xs"><?php echo e(trans('admin.search')); ?></span>
                                </a>
                            </div>
                            <div class="btn-group pull-right">
                                <div class="form-group">
                                    <input type="text" name="keyword" class="form-control"
                                           placeholder="<?php echo e(trans('user.admin.search_place')); ?>" value="<?php echo e($keyword); ?>">
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-tools -->
                </div>

                <div class="box-header with-border">
                    <div class="pull-right">
                        <div class="btn-group pull-right" style="margin-right: 10px">
                            <a href="<?php echo e(route('admin_user.create')); ?>" class="btn  btn-success  btn-flat" title="New"
                               id="button_create_new">
                                <i class="fa fa-plus"></i><span class="hidden-xs"><?php echo e(trans('admin.add_new')); ?></span>
                            </a>
                        </div>
                    </div>

                    <span>
                        <div class="pull-left">
                            <button type="button" class="btn btn-default grid-select-all"><i
                                        class="fa fa-square-o"></i></button>
                            <a class="btn   btn-flat btn-danger grid-trash" title="Delete"><i class="fa fa-trash-o"></i><span
                                        class="hidden-xs"><?php echo e(trans('admin.delete')); ?></span></a> &nbsp;
                            <a class="btn   btn-flat btn-primary grid-refresh" title="Refresh"><i
                                        class="fa fa-refresh"></i><span
                                        class="hidden-xs"><?php echo e(trans('admin.refresh')); ?></span></a>
                        </div>

                        <div class="btn-group pull-left" style="padding-left: 10px;">
                            <div class="form-group">
                               <select class="form-control" id="order_sort">
                                <?php echo getSelectOptions($sort_order, $arrSort); ?>

                               </select>
                             </div>
                        </div>

                       <div class="btn-group pull-left">
                           <a class="btn btn-flat btn-primary" title="Sort" id="button_sort">
                              <i class="fa fa-sort-amount-asc"></i>
                               <span class="hidden-xs"><?php echo e(trans('admin.sort')); ?></span>
                           </a>
                       </div>

                    </span>
                </div>
                <!-- /.box-header -->
                <section id="pjax-container" class="table-list">
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th></th>
                                <th>ID</th>
                                <th>User name</th>
                                <th>Full name</th>
                                <th>Roles</th>
                                <th>Permission</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>

                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $dataTr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyRow => $tr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <?php $__currentLoopData = $tr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $trtd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td><?php echo $trtd; ?></td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer clearfix">
                        <?php echo $result_items ?? ''; ?>

                        <?php echo e($pagination ?? ''); ?>

                    </div>
                </section>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('styles'); ?>
    <style type="text/css">
        .box-body td, .box-body th {
            max-width: 150px;
            word-break: break-all;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    
    <script src="<?php echo e(asset('admin/plugin/jquery.pjax.js')); ?>"></script>

    <script type="text/javascript">

        $('.grid-refresh').click(function () {
            $.pjax.reload({container: '#pjax-container'});
        });

        $(document).on('submit', '#button_search', function (event) {
            $.pjax.submit(event, '#pjax-container')
        })

        $(document).on('pjax:send', function () {
            $('#loading').show()
        })
        $(document).on('pjax:complete', function () {
            $('#loading').hide()
        })

        // tag a
        $(function () {
            $(document).pjax('a.page-link', '#pjax-container')
        });

        $(document).ready(function () {
            // does current browser support PJAX
            if ($.support.pjax) {
                $.pjax.defaults.timeout = 2000; // time in milliseconds
            }
        });

        $('#button_sort').click(function (event) {
            var url = '<?php echo e(route('admin_user.index')); ?>?sort_order=' + $('#order_sort option:selected').val();
            $.pjax({
                url: url,
                container: '#pjax-container'
            });
        });

        $(document).on('ready pjax:end', function (event) {
            $('.table-list input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        })

    </script>
    

    <script type="text/javascript">
                
        var selectedRows = function () {
                var selected = [];
                $('.grid-row-checkbox:checked').each(function () {
                    selected.push($(this).data('id'));
                });
                return selected;
            }

        $('.grid-trash').on('click', function () {
            var ids = selectedRows().join();
            deleteItem(ids);
        });

        function deleteItem(ids) {
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

                preConfirm: function () {
                    return new Promise(function (resolve) {
                        $.ajax({
                            method: 'post',
                            url: '<?php echo e($url_delete_item); ?>',
                            data: {
                                ids: ids,
                                _token: '<?php echo e(csrf_token()); ?>',
                            },
                            success: function (data) {
                                if (data.error == 1) {
                                    swalWithBootstrapButtons.fire(
                                        'Cancelled',
                                        data.msg,
                                        'error'
                                    )
                                    $.pjax.reload('#pjax-container');
                                    return;
                                } else {
                                    $.pjax.reload('#pjax-container');
                                    resolve(data);
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
        }
        
    </script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\anytimebazar\resources\views/admin/user/list.blade.php ENDPATH**/ ?>
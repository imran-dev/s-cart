<?php $__env->startSection('main'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="pull-right">
                        <?php echo $menu_search??''; ?>

                    </div>
                    <!-- /.box-tools -->
                </div>

                <div class="box-header with-border">
                    <div class="pull-right">
                        <?php echo $menu_right??''; ?>

                    </div>

                    <span><?php echo $menu_left??''; ?> <?php echo $menu_sort??''; ?></span>
                </div>
                <!-- /.box-header -->
                <section id="pjax-container" class="table-list">
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <?php $__currentLoopData = $listTh; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $th): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <th <?php echo e(($key == 'action')?'class=text-right':''); ?>><?php echo $th; ?></th>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $dataTr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyRow => $tr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <?php $__currentLoopData = $tr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $trtd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php

                                        ?>
                                        <td <?php echo e(($key == 'action')?'class=text-right':''); ?>><?php echo $trtd; ?></td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer clearfix">
                        <?php echo $result_items??''; ?>

                        <?php echo e($pagination??''); ?>

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
        })


        $(document).ready(function () {
            // does current browser support PJAX
            if ($.support.pjax) {
                $.pjax.defaults.timeout = 2000; // time in milliseconds
            }
        });

        <?php echo $script_sort??''; ?>


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

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\anytimebazar\resources\views/admin/screen/list.blade.php ENDPATH**/ ?>
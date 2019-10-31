<?php $__env->startSection('main'); ?>

<div class="row">
  <div class="col-md-4">
      <div  class="small-box bg-aqua">
        <div class="inner">
            <h3><?php echo e($products->count()); ?></h3>
            <p><?php echo e(trans('admin.total_product')); ?></p>
        </div>
        <div class="icon">
            <i class="fa fa-tags"></i>
        </div>
        <a href="<?php echo e(route('admin_product.index')); ?>" class="small-box-footer">
            <?php echo e(trans('admin.more')); ?>&nbsp;
            <i class="fa fa-arrow-circle-right"></i>
        </a>
    </div>
  </div>
<div class="col-md-4">
  <div  class="small-box bg-green">
    <div class="inner">
        <h3><?php echo e($orders->count()); ?></h3>
        <p><?php echo e(trans('admin.total_order')); ?></p>
    </div>
    <div class="icon">
        <i class="fa fa-shopping-cart"></i>
    </div>
    <a href="<?php echo e(route('admin_order.index')); ?>" class="small-box-footer">
        <?php echo e(trans('admin.more')); ?>&nbsp;
        <i class="fa fa-arrow-circle-right"></i>
    </a>
</div>
</div>
<div class="col-md-4">
    <div  class="small-box bg-yellow">
      <div class="inner">
          <h3><?php echo e($users->count()); ?></h3>
          <p><?php echo e(trans('admin.total_customer')); ?></p>
      </div>
      <div class="icon">
          <i class="fa fa-user"></i>
      </div>
      <a href="<?php echo e(route('admin_customer.index')); ?>" class="small-box-footer">
          <?php echo e(trans('admin.more')); ?>&nbsp;
          <i class="fa fa-arrow-circle-right"></i>
      </a>
  </div>
</div>
</div>



<div class="row">

  <div class="col-md-12">

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo e(trans('admin.order_month')); ?></h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>

      <div class="box-body table-responsive no-padding box-primary">
        <div class="box">
          <canvas id="chart-days-in-month" width="700" height="200"></canvas>
        </div>
      </div>
    </div>
  </div>


  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo e(trans('admin.order_year')); ?></h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>

      <div class="box-body table-responsive no-padding box-primary">
          <div class="box">
            <canvas id="chartjs-1" width="600" height="150"></canvas>
          </div>
      </div>
    </div>
  </div>
  </div>



<div class="row">


<?php
  $topOrder = $orders->with('orderStatus')->orderBy('id','desc')->limit(10)->get();
?>

  <div class="col-md-6">

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo e(trans('admin.top_order_new')); ?></h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>

      <div class="box-body table-responsive no-padding box-primary">
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th><?php echo e(trans('order.id')); ?></th>
                    <th><?php echo e(trans('order.email')); ?></th>
                    <th><?php echo e(trans('order.status')); ?></th>
                    <th><?php echo e(trans('order.created_at')); ?></th>
                  </tr>
                  </thead>
                  <tbody>
<?php if(count($topOrder)): ?>
  <?php $__currentLoopData = $topOrder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><a href="<?php echo e(route('admin_order.detail',['id'=>$order->id])); ?>">Order#<?php echo e($order->id); ?></a></td>
                      <td><?php echo e($order->email); ?></td>
                      <td><span class="label label-<?php echo e($mapStyleStatus[$order->status]??''); ?>"><?php echo e($order->orderStatus->name); ?></span></td>
                      <td><?php echo e($order->created_at); ?></td>
                    </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>
      </div>
    </div>
  </div>



<?php
  $topCustomer = $users->orderBy('id','desc')->limit(10)->get();
?>
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo e(trans('admin.top_customer_new')); ?></h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>

      <div class="box-body table-responsive no-padding box-primary">
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th><?php echo e(trans('customer.id')); ?></th>
                    <th><?php echo e(trans('customer.email')); ?></th>
                    <th><?php echo e(trans('customer.name')); ?></th>
                    <th><?php echo e(trans('customer.created_at')); ?></th>
                  </tr>
                  </thead>
                  <tbody>
<?php if(count($topCustomer)): ?>
  <?php $__currentLoopData = $topCustomer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><a href="<?php echo e(route('admin_customer.edit',['id'=>$customer->id])); ?>">ID#<?php echo e($customer->id); ?></a></td>
                      <td><?php echo e($customer->email); ?></td>
                      <td><?php echo e($customer->name); ?></td>
                      <td><?php echo e($customer->created_at); ?></td>
                    </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
      </div>
    </div>
  </div>
  
  </div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('styles'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
  <script src="<?php echo e(asset('admin/plugin/chartjs/dist/Chart.bundle.min.js')); ?>"></script>
  <script type="text/javascript">



$(document).ready(function($) {
var ctx_month = document.getElementById('chart-days-in-month').getContext('2d');
 new Chart(ctx_month, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        // type: 'category',
        labels: <?php echo $arrDays; ?>,
        datasets: [

        {
            label: "Total amount",
            backgroundColor: 'rgba(225,0,0,0.4)',
            borderColor: "rgb(231, 53, 253)",
            borderCapStyle: 'square',
            pointHoverRadius: 8,
            pointHoverBackgroundColor: "yellow",
            pointHoverBorderColor: "brown",
            data: <?php echo $arrTotalsAmount; ?>,
            showLine: true, // disable for a single dataset,
            yAxisID: "y-axis-gravity",
            fill: false,
            type: 'line',
            lineTension: 0.1,
        },
        {
            label: "Total order",
            backgroundColor: 'rgb(138, 199, 214)',
            borderColor: 'rgb(138, 199, 214)',
            pointHoverRadius: 8,
            pointHoverBackgroundColor: "brown",
            pointHoverBorderColor: "yellow",
            data: <?php echo $arrTotalsOrder; ?>,
            showLine: true, // disable for a single dataset,
            yAxisID: "y-axis-density",
            spanGaps: true,
            lineTension: 0.1,

        },

        ]
    },

    // Configuration options go here
    options: {
        responsive: true,
        legend: {
          display: true,
        },
        layout: {
            padding: {
                left: 10,
                right: 10,
                top: 0,
                bottom: 0
            }
        },
        scales: {
            yAxes: [
            {
              position: "left",
              id: "y-axis-density",
                ticks: {
                    beginAtZero:true,
                    max: <?php echo $max_order; ?> + 5,
                    min: 0,
                    stepSize: 2,
                },
                  scaleLabel: {
                     display: true,
                     labelString: 'Total order',
                     fontSize: 15,

                  }
            },
            {
              position: "right",
              id: "y-axis-gravity",
              ticks: {
                    beginAtZero:true,
                    callback: function(label, index, labels) {
                        return format_number(label);
                    },
                },
                scaleLabel: {
                     display: true,
                     labelString: 'Total amount (Bit)',
                     fontSize: 15
                  }
            }
            ]
        },

        tooltips: {
            callbacks: {
                label: function(tooltipItem, data) {
                    var label = data.datasets[tooltipItem.datasetIndex].label || '';

                    if (label) {
                        label += ': ';
                    }
                    label += format_number(tooltipItem.yLabel);
                    return label;
                }
            }
        }
    }
});
});






    $(document).ready(function($) {
    var ctx_year = document.getElementById('chartjs-1').getContext('2d');
     new Chart(ctx_year, {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: {
            "labels":<?php echo $months1; ?>,
            "datasets":[
                {
                    "label":"Total amount",
                    "data":<?php echo $arrTotalsAmount_year; ?>,
                    "fill":false,
                    "backgroundColor":[
                    "rgba(191, 25, 232, 0.2)",
                    "rgba(191, 25, 232, 0.2)",
                    "rgba(191, 25, 232, 0.2)",
                    "rgba(191, 25, 232, 0.2)",
                    "rgba(255, 99, 132, 0.2)",
                    "rgba(255, 159, 64, 0.2)",
                    "rgba(255, 205, 86, 0.2)",
                    "rgba(75, 192, 192, 0.2)",
                    "rgba(54, 162, 235, 0.2)",
                    "rgba(153, 102, 255, 0.2)",
                    "rgba(201, 203, 207, 0.2)",
                    "rgba(181, 147, 50, 0.2)",
                    "rgba(232, 130, 81, 0.2)",
                    ],
                    "borderColor":[
                    "rgb(191, 25, 232)",
                    "rgb(191, 25, 232)",
                    "rgb(191, 25, 232)",
                    "rgb(191, 25, 232)",
                    "rgb(255, 99, 132)",
                    "rgb(255, 159, 64)",
                    "rgb(255, 205, 86)",
                    "rgb(75, 192, 192)",
                    "rgb(54, 162, 235)",
                    "rgb(153, 102, 255)",
                    "rgb(201, 203, 207)",
                    "rgb(181, 147, 50)",
                    "rgb(232, 130, 81)",
                    ],
                    "borderWidth":1,
                    type:"bar",
                },
                {
                    "label":"Line total amount",
                    "data":<?php echo $arrTotalsAmount_year; ?>,
                    "fill":false,
                    "backgroundColor":"red",
                    "borderColor":"red",
                    "borderWidth":1,
                    type:"line",
                }
            ]
        },
        options: {
            responsive: true,
            legend: {
              display: true,
            },
            layout: {
                padding: {
                    left: 10,
                    right: 10,
                    top: 0,
                    bottom: 0
                }
            },

            tooltips: {
                callbacks: {
                    label: function(tooltipItem, data) {
                        var label = data.datasets[tooltipItem.datasetIndex].label || '';

                        if (label) {
                            label += ': ';
                        }
                        label += format_number(tooltipItem.yLabel);
                        return label;
                    }
                }
            },
            scales: {
                yAxes: [
                {
                  position: "left",
                  // id: "y-axis-amount",
                  ticks: {
                        beginAtZero:true,
                        callback: function(label, index, labels) {
                            return format_number(label);
                        },
                    },
                    scaleLabel: {
                         display: true,
                         labelString: 'Bit',
                         fontSize: 15
                      }
                }
                ]
            },
        },

    });
    });
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\s-cart\resources\views/admin/home.blade.php ENDPATH**/ ?>
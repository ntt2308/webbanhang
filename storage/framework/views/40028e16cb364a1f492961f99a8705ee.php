<?php $__env->startSection('content'); ?>
<style>
    .abc{
    position: absolute;
    top: 45%;
    left: 50%;
    transform: translateX(-50%) translateY(-50%);
    color: white;
    }
    .highcharts-figure,
.highcharts-data-table table {
    min-width: 310px;
    max-width: 800px;
    margin: 1em auto;
}

#container {
    height: 400px;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}

.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}

.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
    padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}

.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

</style>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<h1 class="page-header">Trang tổng quan</h1>
<div class="row">
    <div class="col-sm-6">
        <figure class="highcharts-figure">
            <div id="container"></div>
        </figure>
    </div>
    <div class="col-sm-6">
        <h2>Danh sách đơn hàng mới</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên Khách hàng</th>
                    <th>Số điện thoại</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $transactionNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($transaction->id); ?></td>
                        <td><?php echo e(isset($transaction->user->name) ? $transaction->user->name : '[N/A]'); ?></td>
                        <td><?php echo e($transaction->tr_phone); ?></td>
                        <td><?php echo e(number_format($transaction->tr_total,0,',','.')); ?> VND</td>
                        <td>
                            <?php if($transaction->tr_status == 1): ?>
                            <a href="" class="label-success label">Đã xử lý</a>
                        <?php elseif($transaction->tr_status == 2): ?>
                            <a href="" class="label label-danger">Đã huỷ</a>
                        
                        <?php else: ?>
                            <a href="<?php echo e(route('admin.get.active.transaction', $transaction->id)); ?>" class="label label-default">Đang chờ</a>

                        <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <?php echo $transactionNews->links(); ?>

        </table>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <h2 class="sub-header">Danh sách liên hệ mới nhất</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên liên hệ</th>
                        <th>Số điện thoại</th>
                        <th>Emaill</th>
                        <th>Tiêu đề</th>
                        <th>Nội dung</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($contacts)): ?>
                        <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($contact->id); ?></td>
                            <td><?php echo e($contact->con_name); ?></td>
                            <td><?php echo e($contact->con_phone); ?></td>
                            <td><?php echo e($contact->con_email); ?></td>
                            <td><?php echo e($contact->con_title); ?></td>
                            <td><?php echo e($contact->con_message); ?></td>
                        </tr>  
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-sm-6">
        <h2 class="sub-header">Danh sách đánh giá mới nhất</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên đánh giá</th>
                        <th>Sản phẩm</th>
                        <th>Nội dung</th>
                        <th>Rating</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($ratings)): ?>
                        <?php $__currentLoopData = $ratings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rating): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($rating->id); ?></td>
                            <td><?php echo e($rating->user->name); ?></td>
                            <td><?php echo e(optional($rating->product)->pro_name); ?></td>
                            <td> <?php echo e($rating->ra_content); ?></td>
                            <td><?php echo e($rating->ra_number); ?></td>
                        </tr>  
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    let data = "<?php echo e($dataMoney); ?>";

    dataChart = JSON.parse(data.replace(/&quot;/g,'"'));
    console.log(dataChart);
    Highcharts.chart('container', {
chart: {
    type: 'column'
},
title: {
    align: 'center',
    text: 'Biểu đồ doanh thu'
},
accessibility: {
    announceNewData: {
        enabled: true
    }
},
xAxis: {
    type: 'category'
},
yAxis: {
    title: {
        text: 'Mức độ'
    }

},
legend: {
    enabled: false
},
plotOptions: {
    series: {
        borderWidth: 0,
        dataLabels: {
        enabled: true,
        format: '{point.y:,.0f} VND'
    }
    }
},

tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:,.0f} VND'
},

series: [
    {
        name: 'Doanh thu',
        colorByPoint: true,
        data: dataChart
    }
]
});

</script>
<?php $__env->stopSection(); ?>
 

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ĐỒ ÁN\tot_nghiep\tot_nghiep\Modules/Admin\resources/views/index.blade.php ENDPATH**/ ?>
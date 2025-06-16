@extends('admin::layouts.master')
@section('content')
<style>
    
.highcharts-figure,
.highcharts-data-table table {
    min-width: 310px;
    max-width: 1000px;
    margin: 1em auto;
}

#container1 {
    height: 400px;
    width: 100%;
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
.highcharts-axis-labels {
        font-size: 19px; /* Đặt kích thước phông chữ cho tên series */
        font-weight: bold; /* Đặt đậm cho phông chữ tên series */
        font-family: Arial, sans-serif; /* Đặt kiểu phông chữ cho tên series */
    }
.highcharts-axis{
    font-size: 16px;
    font-weight: bold;
}
.highcharts-data-labels{
    font-size: 15px;
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
    <div class="col-sm-12">
        <figure class="highcharts-figure">
            <div id="container1"></div>
        </figure>
    </div>
</div>
<div class="row">
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
                @foreach($transactionNews as $transaction)
                    <tr>
                        <td>{{$transaction->id}}</td>
                        <td>{{isset($transaction->user->name) ? $transaction->user->name : '[N/A]'}}</td>
                        <td>{{$transaction->tr_phone}}</td>
                        <td>{{number_format($transaction->tr_total,0,',','.')}} VND</td>
                        <td>
                            @if($transaction->tr_status == 1)
                            <a href="" class="label-success label">Đã xử lý</a>
                        @elseif($transaction->tr_status == 2)
                            <a href="" class="label label-danger">Đã huỷ</a>
                        
                        @else
                            <a href="{{route('admin.get.active.transaction', $transaction->id)}}" class="label label-default">Đang chờ</a>

                        @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
            {!!$transactionNews->links()!!}
        </table>
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
                    @if (isset($ratings))
                        @foreach ($ratings as $rating)
                        <tr>
                            <td>{{$rating->id}}</td>
                            <td>{{$rating->user->name}}</td>
                            <td>{{ optional($rating->product)->pro_name }}</td>
                            <td> {{$rating->ra_content}}</td>
                            <td>{{$rating->ra_number}}</td>
                        </tr>  
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    let data = "{{$dataMoney}}";

    dataChart = JSON.parse(data.replace(/&quot;/g,'"'));
    console.log(dataChart);
    Highcharts.chart('container1', {
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
    headerFormat: '<span style="font-size:20px">{series.name}</span><br>',
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
@stop
 

@extends('admin::layouts.master')
@section('content')
    <div class="table-responsive">
        <h2>CHI TIẾT ĐƠN HÀNG</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Số lượng</th>
                    <th>Giá tiền</th>
                    <th>Tổng tiền</th>
                </tr>
            </thead>
            <tbody>
                    @foreach($orders as $order)
                    @php
                    $sum = $order->od_quantity * $order->od_price
                     @endphp
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->products->pro_name}}</td>
                        <td><img src="{{$order->products->pro_image}}" alt="" style="width:110px; height:70px"></td>
                        <td>{{ $order->od_quantity}}</td>
                        <td>{{number_format($order->od_price)}}</td>
                        <td>{{number_format($sum)}}</td>
                        
                    </tr>                
                    @endforeach
            </tbody>
        </table>
    </div>
@stop
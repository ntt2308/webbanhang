@if($orders)
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Tên Khách hàng</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Ghi chú</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
            <th>Trạng thái</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->od_quantity}}</td>
                {{-- <td>{{$order->tr_address}}</td>
                <td>{{$order->tr_phone}}</td>
                <td>{{$order->tr_note}}</td> --}}
                <td>{{number_format($order->od_price,0,',','.')}} VND</td>
                <td>
                    <a style="padding: 5px 10px; border: 1px solid #995" href="{{route('cart.delete',$item->pro_id)}}"><i class="fa-solid fa-trash" style="font-size:11px"></i>Xoá</a>
                   
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endif
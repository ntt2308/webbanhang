@extends('user.layout')
@section('content')
<style>
    .abc{
    position: absolute;
    top: 45%;
    left: 50%;
    transform: translateX(-50%) translateY(-50%);
    color: white;
    }
</style>
<h1 class="page-header">Trang tổng quan</h1>
<div class="row placeholders">
    <div class="col-xs-6 col-sm-4 placeholder">
        <img src="{{ asset('img/a1.jpg') }}" width="200" height="200"  alt="Generic placeholder thumbnail">
        <h4 class="abc">{{ $totalTransaction}} Đơn hàng</h4>
    </div>
    <div class="col-xs-6 col-sm-4 placeholder">
        <img src="{{ asset('img/a2.jpg') }}" width="200" height="200" alt="Generic placeholder thumbnail">
        <h4 class="abc">{{$totalTransactionDone}} Đơn hàng đã xử lý</h4>
    </div>
    <div class="col-xs-6 col-sm-4 placeholder">
        <img src="{{ asset('img/a3.jpg') }}" width="200" height="200"  alt="Generic placeholder thumbnail">
        <h4 class="abc">{{$totalTransaction - $totalTransactionDone}} Đơn hàng chưa xử lý</h4>
    </div>
    
</div>
<div class="row">
    <div class="col-sm-12">
        <h2>Danh sách đơn hàng của bạn</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Thời gian</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                    <tr>
                        <td>{{$transaction->id}}</td>
                        <td>{{isset($transaction->user->address) ? $transaction->user->address : '[N/A]'}}</td>
                        <td>{{$transaction->tr_phone}}</td>
                        <td>{{number_format($transaction->tr_total,0,',','.')}} VND</td>
                        <td>
                            @if($transaction->tr_status == 1)
                                <a href="" class="label-success label">Đã xử lý</a>
                            
                            @else
                                <a href="#" class="label label-default">Đang chờ</a>
                        
                            
                            @endif
                        </td>
                        <td>{{$transaction->created_at}}</td>
                    </tr>
                @endforeach
            </tbody>
            {!!$transactions->links()!!}
        </table>
    </div>
</div>
{{-- <div class="row">
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
                {{-- <tbody>
                    @if (isset($contacts))
                        @foreach ($contacts as $contact)
                        <tr>
                            <td>{{$contact->id}}</td>
                            <td>{{$contact->con_name}}</td>
                            <td>{{$contact->con_phone}}</td>
                            <td>{{$contact->con_email}}</td>
                            <td>{{$contact->con_title}}</td>
                            <td>{{$contact->con_message}}</td>
                        </tr>  
                        @endforeach
                    @endif
                </tbody> --}}
            </table>
        </div>
    </div>
    {{-- <div class="col-sm-6">
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
    </div> --}}

@stop
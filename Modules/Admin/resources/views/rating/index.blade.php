@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.home')}}">Trang chủ</a></li>
            <li><a href="">Đánh giá</a></li>
            <li><a href="">Danh sách</a></li>
        </ol>
    </div>
    <div class="table-responsive">
        <h2>QUẢN LÝ ĐÁNH GIÁ </h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên đánh giá</th>
                    <th>Số điện thoại</th>
                    <th>Sản phẩm</th>
                    <th>Nội dung</th>
                    <th>Rating</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($ratings))
                    @foreach ($ratings as $rating)
                    <tr>
                        <td>{{$rating->id}}</td>
                        <td>{{$rating->user->name}}</td>
                        <td>{{$rating->user->phone}} </td>
                        <td>{{ optional($rating->product)->pro_name }}</td>
                        <td> {{$rating->ra_content}}</td>
                        <td>{{$rating->ra_number}}</td>
                        <td>
                            <a style="padding: 5px 10px; border: 1px solid #995" href="{{route('admin.delete.rating',$rating->id)}}"><i class="fa-solid fa-trash" style="font-size:11px"></i>Xoá</a>
                        </td>
                    </tr>  
                    @endforeach
                @endif
            </tbody>
            {!!$ratings->links()!!}
        </table>
@stop
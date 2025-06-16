@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.home')}}">Trang chủ</a></li>
            <li><a href="">Banner</a></li>
            <li><a href="">Danh sách</a></li>
        </ol>
    </div>
    <div class="table-responsive">
        <h2>QUẢN LÝ Banner <a href="{{route('admin.get.create.banner')}}" class="pull-right"><i class="fa-solid fa-circle-plus"></i></a></h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên banner</th>
                    <th>Hình ảnh</th>
                    <th>Banner Discount</th>
                    <th>Trạng thái</th>
                    <th>Banner Sale</th>
                    <th>Ngày tạo</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @if( isset($banners))
                    @foreach($banners as $banner)
                    <tr>
                        <td>{{$banner->id}}</td>
                        <td>{{$banner->b_name}}</td>
                        <td>
                            <img src="{{isset($banner->b_image) ? $banner->b_image :'[N\A]'}}" alt="" style="max-width:60px;height: auto;">
                        </td>
                        <td>{{$banner->b_discount}}%</td>
                        <td>
                            <a href="{{route('admin.get.action.banner',['active',$banner->id])}}"class="label {{$banner->getStatus($banner->b_active)['class']}}">{{$banner->getStatus($banner->b_active)['name']}}</a>
                        </td>
                        <td>
                            <a href="{{route('admin.get.action.banner',['sale',$banner->id])}}"class="label {{$banner->getSale($banner->b_sale)['class']}}">{{$banner->getSale($banner->b_sale)['name']}}</a>
                        </td>
                        <td>{{$banner->created_at}}</td>
                
                        <td>
                            <a style="padding: 5px 10px; border: 1px solid #995" href="{{route('admin.get.edit.banner',$banner->id)}}"><i class="fa-solid fa-pen" style="font-size:11px"></i>Chỉnh sửa</a>
                            <a style="padding: 5px 10px; border: 1px solid #995" href="{{route('admin.get.action.banner',['delete',$banner->id])}}"><i class="fa-solid fa-trash" style="font-size:11px"></i>Xoá</a>
                        </td>
                    </tr>                
                    @endforeach
                    @endif
            </tbody>
        </table>
@stop
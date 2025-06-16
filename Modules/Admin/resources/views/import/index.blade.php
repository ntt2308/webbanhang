
@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.home')}}">Trang chủ</a></li>
            <li><a href="">Sản phẩm</a></li>
            <li><a href="">Danh sách</a></li>
        </ol>
    </div>
   
    <div class="table-responsive">
        <h2>QUẢN LÝ NHÀ NHẬP HÀNG <a href="{{route('admin.get.create.import')}}" class="pull-right"><i class="fa-solid fa-circle-plus"></i></a></h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên sản phẩm</th>
                    <th>Tên nhà cung cấp</th>
                    <th>Giá nhập</th>
                    <th>Số lượng</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @if( isset($importgoods))
                    @foreach($importgoods as $importgood)
                    <tr>
                        <td>{{$importgood->id}}</td>
                        <td>{{isset($importgood->product->pro_name) ? $importgood->product->pro_name :'[N\A]'}}</td>
                        <td>{{isset($importgood->supplier->s_name) ? $importgood->supplier->s_name :'[N\A]'}}</td>
                        <td>{{$importgood->price}}</td>
                        <td>{{$importgood->quantity}}</td>
                        <td>
                            <a style="padding: 5px 10px; border: 1px solid #995" href="{{route('admin.get.delete.importdood',$importgood->id)}}"><i class="fa-solid fa-trash" style="font-size:11px"></i>Xoá</a>
                        </td>
                    </tr>                
                    @endforeach
                    @endif
                    {!!$importgoods->links()!!}
            </tbody>
        </table>
@stop

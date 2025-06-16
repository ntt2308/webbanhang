
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
        <h2>QUẢN LÝ NHÀ CUNG CẤP <a href="{{route('admin.get.create.supplier')}}" class="pull-right"><i class="fa-solid fa-circle-plus"></i></a></h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên nhà cung cấp</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @if( isset($suppliers))
                    @foreach($suppliers as $supplier)
                    <tr>
                        <td>{{$supplier->id}}</td>
                        <td>{{isset($supplier->s_name) ? $supplier->s_name :'[N\A]'}}</td>
                        <td>
                         
                            <a style="padding: 5px 10px; border: 1px solid #995" href="{{route('admin.get.delete.supplier',$supplier->id)}}"><i class="fa-solid fa-trash" style="font-size:11px"></i>Xoá</a>
                        </td>
                    </tr>                
                    @endforeach
                    @endif
                    {!!$suppliers->links()!!}
            </tbody>
        </table>
@stop
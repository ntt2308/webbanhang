@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.home')}}">Trang chủ</a></li>
            <li><a href="">Danh mục</a></li>
            <li><a href="">Danh sách</a></li>
        </ol>
    </div>
    <div class="table-responsive">
        <h2>QUẢN LÝ DANH MỤC <a href="{{route('admin.get.create.category')}}" class="pull-right"><i class="fa-solid fa-circle-plus"></i></a></h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên danh mục</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @if( isset($categorys))
                    @foreach($categorys as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->c_name}}</td>
                        <td>
                            <a href="{{route('admin.get.action.category',['active',$category->id])}}"class="label {{$category->getStatus($category->c_active)['class']}}">{{$category->getStatus($category->c_active)['name']}}</a>
                        </td>
                        <td>
                            <a style="padding: 5px 10px; border: 1px solid #995" href="{{route('admin.get.edit.category',$category->id)}}"><i class="fa-solid fa-pen" style="font-size:11px"></i>Chỉnh sửa</a>
                            <a style="padding: 5px 10px; border: 1px solid #995" href="{{route('admin.get.action.category',['delete',$category->id])}}"><i class="fa-solid fa-trash" style="font-size:11px"></i>Xoá</a>
                        </td>
                    </tr>                
                    @endforeach
                    @endif
            </tbody>
        </table>
    </div>
@stop
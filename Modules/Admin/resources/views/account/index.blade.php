@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.home')}}">Trang chủ</a></li>
            <li><a href="">Tài khoản</a></li>
            <li><a href="">Danh sách</a></li>
        </ol>
    </div>
    <div class="table-responsive">
        <h2>QUẢN LÝ QUẢN TRỊ <a href="{{route('account.create')}}" class="pull-right"><i class="fa-solid fa-circle-plus"></i></a></h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên </th>
                    <th>Email</th>
                    <th>Số diện thoại</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($admins))
                    @foreach ($admins as $users)
                    <tr>
                        <td>{{$users->id}}</td>
                        <td>
                            {{isset($users->name) ? $users->name :'[N\A]'}}
                        </td>
                        <td>
                            {{$users->email}}
                        
                        </td>
                        <td>
                            {{$users->phone}}
                        
                        </td>
                        
                        <td>
                            <a style="padding: 5px 10px; border: 1px solid #995" href="{{route('account.update',$users->id)}}"><i class="fa-solid fa-pen" style="font-size:11px"></i>Chỉnh sửa</a>
                            <a style="padding: 5px 10px; border: 1px solid #995" href="{{route('account.delete',$users->id)}}"><i class="fa-solid fa-trash" style="font-size:11px"></i>Xoá</a>
                    </tr>  
                    @endforeach
                @endif
            </tbody>
        </table>
@stop
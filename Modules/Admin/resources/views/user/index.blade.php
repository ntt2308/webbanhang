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
        <h2>QUẢN LÝ TÀI KHOẢN </h2>
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
                @if (isset($userss))
                    @foreach ($userss as $users)
                    <tr>
                        <td>{{$users->id}}</td>
                        <td>
                            {{$users->name}}
                        
                        </td>
                        <td>
                            {{$users->email}}
                        
                        </td>
                        <td>
                            {{$users->phone}}
                        
                        </td>
                        
                        <td>
                            <a style="padding: 5px 10px; border: 1px solid #995" href="{{route('user.delete',$users->id)}}"><i class="fa-solid fa-trash" style="font-size:11px"></i>Xoá</a>
                        </td>
                    </tr>  
                    @endforeach
                @endif
            </tbody>
        </table>
@stop
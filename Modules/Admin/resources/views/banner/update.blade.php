@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.home')}}">Trang chủ</a></li>
            <li><a href="{{route('admin.get.list.banner')}}" title="Danh mục">Banner</a></li>
            <li><a href="">Cập nhật</a></li>
        </ol>
    </div>
    <div class="">
      @include("admin::banner.form")
    </div>
@stop
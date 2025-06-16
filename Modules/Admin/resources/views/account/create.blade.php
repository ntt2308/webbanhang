@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.home')}}">Trang chủ</a></li>
            <li><a href="{{route('account.index')}}" title="Danh mục">Danh sách</a></li>
        </ol>
    </div>
    <div class="">
        @include("admin::account.form")
    </div>

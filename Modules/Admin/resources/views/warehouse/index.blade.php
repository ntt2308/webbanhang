
@extends('admin::layouts.master')
@section('content')
<style>
    .table-responsive .active{
        color: red
    }
</style>
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.home')}}">Trang chủ</a></li>
            <li><a href="">Kho </a></li>
            <li><a href="">Danh sách</a></li>
        </ol>
    </div>
    <dov class="row">
        <div class="col-sm-12">
            <form class="form-inline" action="" style="margin-bottom: 20px">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Tên sản phẩm..." value="{{Request::get('name')}}">
                </div>
                <div class="form-group">
                    <select name="cate" id="" class="form-control" >
                        <option value="">Danh mục</option>
                        @if(isset($categorys))
                            @foreach($categorys as $category )
                            <option value="{{$category->id}}"{{\Request::get('cate') == $category->id ? "selected = 'selected" : ""}}>{{$category->c_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </dov>
    <div class="table-responsive">
        <h2>QUẢN LÝ SẢN PHẨM <br> <a href="?type=inventory" class="{{ Request::get('type') == 'inventory' || !Request::has('type') ? 'active' : '' }}" style="font-size: 20px;">HÀNG TỒN</a>
            <a href="?type=pay" class="{{ Request::get('type') == 'pay' ? 'active' : '' }}" style="font-size: 20px;">HÀNG BÁN CHẠY</a></h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên sản phẩm</th>
                    <th>Loại sản phẩm</th>
                    <th>Giá bán</th>
                    <th>Hình ảnh</th>
                    <th>Số lượng</th>
                    <th>Số lần bán</th>
                </tr>
            </thead>
            <tbody>
                @if( isset($products))
                    @foreach($products as $product)
                    @php
                    $totalReviews = $product->pro_total_number;
                     $totalStars = $product->pro_total;
                    $averageRating = $totalReviews > 0 ? ($totalReviews /  $totalStars) : 0;
                    $roundedNumber = round($averageRating * 2) / 2;
                    @endphp
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>
                            {{$product->pro_name}}
                            <div class="average-rating" style="color:rgb(221, 172, 12)">
                                @for ($i = 1; $i <= 5; $i++)
                              @if ($i <= $roundedNumber)
                                 <i class="fas fa-star"></i>
                                @elseif ($i - 0.5 == $averageRating)
                                <i class="fas fa-star-half-alt"></i>
                            @else
                            <i class="far fa-star"></i> 
                            @endif
                                @endfor
                                <span style="color: black">{{ $roundedNumber }}</span>
                            </div>
                        </td>
                        <td>{{isset($product->category->c_name) ? $product->category->c_name :'[N\A]'}}</td>
                        <td>{{isset($product->pro_price) ? $product->pro_price :'[N\A]'}}</td>
                        <td>
                            <img src="{{isset($product->pro_image) ? $product->pro_image :'[N\A]'}}" alt="" style="max-width:60px;height: auto;">
                        </td>
                        <td>{{isset($product->quantity) ? $product->quantity :'[N\A]'}}</td>
                        <td>{{isset($product->pro_pay) ? $product->pro_pay :'[N\A]'}}</td>
                        <td>
                        </tr>                
                    @endforeach
                    @endif
            </tbody>
        </table>
@stop
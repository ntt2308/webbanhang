@extends('layouts.app')
@section('content')
<div class="heading-banner-area overlay-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-banner">
                    @if(isset($cateProducts))
                    <div class="breadcumbs pb-15">
                        @foreach($cateProducts as $cateProduct)
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li>{{$cateProduct->c_name}}</li>
                        </ul>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- HEADING-BANNER END -->
<!-- PRODUCT-AREA START -->
<div class="product-area pt-80 pb-80 product-style-2">
    <div class="container">
        
        <div class="row">
            <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="shop-content mt-tab-30 mt-xs-30">
                    <div class="product-option mb-30 clearfix">
                        <div class="widget widget-categories  mb-30">
                            <form class="tree-most" id="form_order" method="get">
                            <div class="widget-title">
                                <button type="submit"><h4>Sắp xếp</h4></button>
                                <select name="orderby" class="orderby">
                                    <option {{Request::get('orderby') == "md" || !Request::get('orderby') ? "selected = 'selected'" : ""}} value="md" selected= "selected"> Mặc định</option>
                                    <option {{Request::get('orderby') == "desc" ? "selected = 'selected'" : ""}} value="desc"> Mới nhất</option>
                                    <option {{Request::get('orderby') == "asc" ? "selected = 'selected'" : ""}} value="asc"> Sản phẩm cũ</option>
                                    <option {{Request::get('orderby') == "price_max" ? "selected = 'selected'" : ""}} value="price_max"> Giá tăng dần</option>
                                    <option {{Request::get('orderby') == "price_min" ? "selected = 'selected'" : ""}} value="price_min"> Giá giảm dần</option>
                                </select>
                            </div>
                            </form>
                        </div>
                    </div>
                    <!-- Tab panes --> 
                    <div class="tab-content">
                        <div class="tab-pane active" id="grid-view">
                            <div class="row">
                                @foreach($products as $product)
                                <div class="col-lg-4 col-md-3">
                        
                                    <div class="single-product">
                                        <div class="product-img">
                                            @if($product->quantity == 0)
										<span class="pro-label new-label" style="position:absolute; background:#e91e63; left:0px ">Tạm hết hàng</span>
										@endif
                                            <div class="center"><a href="{{route('get.detail.product',[$product->pro_slug,$product->id])}}"><img src="{{$product->pro_image}}" alt="" style="width: 230px;
                                                height: 150px;
                                                margin-left: auto;
                                                margin-right: auto;
                                                display: block;"/></a></div>
                                            {{-- <span class="pro-price-2">{{number_format($product->pro_price,0,',','.')}} Đ</span> --}}
                                        </div>
                                        <div class="product-info clearfix text-center">
                                            <div class="fix">
                                                <h4 class="post-title"><a href="{{route('get.detail.product',[$product->pro_slug,$product->id])}}">{{$product->pro_name}}</a></h4>
                                            </div>
                                            <div class="fix">
                                                <del><h6 class="" style="color: darkorange">Giá: {{number_format($product->pro_price,0,',','.')}} Đ</h6></del>
                                                <h6 class="" style="color: darkorange">Giá khuyễn mãi: {{number_format($product->pro_sale,0,',','.')}} Đ</h6>
                                            </div>
                                            <div class="fix">
                                                <span class="pro-rating">
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                </span>
                                            </div>
                                            <div class="product-action clearfix">
                                                <a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                <a href="#" data-bs-toggle="modal"  data-bs-target="#productModal" title="Quick View"><i class="zmdi zmdi-zoom-in"></i></a>
                                                <a href="#" data-bs-toggle="tooltip" data-placement="top" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                <a href="{{route('cart.add',$product->id)}}" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>  
                </div>
                    <!-- Pagination end -->
                    <div class="shop-pagination  text-center">
                        <div class="pagination">
                            {!!$products->links()!!}
                        </div>
                    </div>
                <!-- Shop-Content End -->
            </div>
            <div class="col-md-3 ">
                <!-- Widget-Search start -->
                <div class="widget widget-search mb-30">
                    <form action="#">
                        <input type="text" placeholder="Search here..." />
                        <button type="submit">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                    </form>
                </div>
                <aside class="widget widget-categories  mb-30">
                    <div class="widget-title">
                        <h4>Khoảng giá</h4>
                    </div>
                    <div id="cat-treeview"  class="widget-info product-cat boxscrol2">
                        <ul>
                            <li><a class="{{Request::get('price') == 1 ? 'active' : ''}}" href="{{request()->fullUrlWithQuery(['price'=>1])}}">Dưới 1 Triệu</a></li>
                            <li><a class="{{Request::get('price') == 2 ? 'active' : ''}}" href="{{request()->fullUrlWithQuery(['price'=>2])}}">1.000.000 - 3.000.000 Đ</a></li>
                            <li><a class="{{Request::get('price') == 3 ? 'active' : ''}}" href="{{request()->fullUrlWithQuery(['price'=>3])}}">3.000.000 - 5.000.000 Đ</a></li>                   
                            <li><a class="{{Request::get('price') == 4 ? 'active' : ''}}" href="{{request()->fullUrlWithQuery(['price'=>4])}}">5.000.000 - 7.000.000 Đ</a></li>
                            <li><a class="{{Request::get('price') == 5 ? 'active' : ''}}" href="{{request()->fullUrlWithQuery(['price'=>5])}}">7.000.000 - 10.000.000 Đ</a></li>
                            <li><a class="{{Request::get('price') == 6 ? 'active' : ''}}" href="{{request()->fullUrlWithQuery(['price'=>6])}}">Lớn hơn 10.000.000 Đ</a></li>
                        </ul>
                    </div>
                </aside>
             </div>
    </div>
</div>

@stop

@section('script')
    <script>
        $(function(){
           $('.orderby').change(function(){
            $("#form_order").submit() ;
           }) 
        })
    </script>
@stop
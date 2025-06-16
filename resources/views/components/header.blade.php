<header id="sticky-menu" class="header">
    @php
            use App\Models\Models\Category;
            $cat_parent = Category::where('c_parent', 0)->get();
            @endphp
    <div class="header-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 offset-md-4 col-7">
                    <div class="logo text-md-center">
                        <a href="index.html"><img src=" img/logo/logo.png " alt=""  style="height:100px" /></a>
                    </div>
                </div>
                <div class="col-md-4 col-5">
                    <div class="input-group" style="top:43px">
                        <form action="{{route('get.product.list')}}" method="GET" id="searchform" style="display: flex; align-items: center;">
                            <input type="text" class="form-control" name="k" placeholder="Tìm kiếm" style="flex: 1; margin-right: 5px; margin-bottom: 0">
                            <button type="submit" class="btn btn-default" style="font-size: 35px"><i class="zmdi zmdi-search" style="size: 50px"></i></button>
                        </form>
                    </div>
                    <div class="mini-cart text-end">
                        <ul>
                            <li>
                                <a class="cart-icon" href="{{route('cart.index')}}">
                                    <i class="zmdi zmdi-shopping-cart"></i>
                                    <span>{{$carts->sum('quantity')}}</span>
                                </a>
                            </li>
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MAIN-MENU START -->
    <div class="menu-toggle hamburger hamburger--emphatic d-none d-md-block">
        <div class="hamburger-box">
            <div class="hamburger-inner"></div>
        </div>
    </div>
    <div class="main-menu  d-none d-md-block">
        <nav>
            <ul>
                <li><a href="{{route('home')}}">Trang chủ</a></li>
                <li><a href="#">Sản phẩm</a>
                    <div class="mega-menu menu-scroll">
                        <div class="table">
                            <div class="table-cell">
                                <div class="half-width">
                                    <ul class="level1">
                                        @foreach ($cat_parent as $category)
                                        <li class="level1 first parent"><a class="active" href="{{route('get.list.product',[$category->c_slug,$category->id])}}">{{$category->c_name}}</a>
                                            <ul class="level2" >
                                                @php
                                                $cat_children = Category::where('c_parent',$category->id )->get();
                                                @endphp
                                                @foreach ($cat_children as $category)
                                                <li class="level2 nav-2-1-1 first"> <a href="{{route('get.list.product',[$category->c_slug,$category->id])}}">{{$category->c_name}}</a> <span></span></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                             </div>
                        </div>
                    </div>
                </li>
                <li><a href="{{route('get.list.article')}}">Tin tức</a></li>
                <li><a href="">Giới thiệu</a></li>
                <li><a href="{{route('contact.index')}}">Liên hệ</a></li>
            </ul>
        </nav>
    </div>
</header>

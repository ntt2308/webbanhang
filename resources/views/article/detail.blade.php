@extends('layouts.app')
@section('content')
{{-- <div class="heading-banner-area overlay-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-banner">
                    <div class="heading-banner-title">
                        <h2>Single-Blog</h2>
                    </div>
                    <div class="breadcumbs pb-15">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Single-Blog</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- HEADING-BANNER END -->
<!-- BLGO-AREA START -->
<div class="blog-area blog-2 blog-details-area  pt-80 pb-80">
    <div class="container">	
        <div class="blog">
            <div class="row">
                <!-- Single-blog start -->
               
                <div class="col-lg-12">
                    <div class="single-blog mb-30">
                        <div class="blog-photo">
                            <a href="#"><img src="{{$articless->a_avatar}}" alt="" /></a>
                            <div class="">
                                <span class="text-dark-red text-uppercase">{{$articless->created_at->format('d-m-Y')}}</span>
                            </div>
                        </div>
                        <div class="blog-info blog-details-info">
                            <h4 class="post-title post-title-2"><a href="#"></a>{{$articless->a_name}}</h4>
                            <p>{!!$articless->a_content!!}</p>									
                        </div>
                        
                    </div>
                </div>
                <!-- Single-blog end -->
            </div>
        </div>
    </div>
</div>

@stop
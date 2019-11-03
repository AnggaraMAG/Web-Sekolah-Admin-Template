@extends('frontend.master')
@section('content')
<!-- start banner Area -->
<section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Blog Details Page
                    </h1>
                    <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span><a href="blog-home.html">Blog </a> <span class="lnr lnr-arrow-right"></span> <a href="blog-single.html"> Blog Details Page</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->
    <!-- Start post-content Area -->
			<section class="post-content-area single-post-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 posts-list">
                                <div class="single-post row">
                                    <div class="col-lg-12">
                                        <div class="feature-img">
                                            <img class="img-fluid" src="img/blog/feature-img1.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-3  col-md-3 meta-details">
                                        <ul class="tags">
                                            <li><a href="#">Food,</a></li>
                                            <li><a href="#">Technology,</a></li>
                                            <li><a href="#">Politics,</a></li>
                                            <li><a href="#">Lifestyle</a></li>
                                        </ul>
                                        <div class="user-details row">
                                            <p class="user-name col-lg-12 col-md-12 col-6"><a href="#">{{$post->user->role}}</a> <span class="lnr lnr-user"></span></p>
                                        <p class="date col-lg-12 col-md-12 col-6"><a href="#">{{$post->created_at->format('d-M-Y')}}</a> <span class="lnr lnr-calendar-full"></span></p>
                                            <p class="view col-lg-12 col-md-12 col-6"><a href="#"></a> <span class="lnr lnr-eye"></span></p>
                                            <p class="comments col-lg-12 col-md-12 col-6"><a href="#">06 Comments</a> <span class="lnr lnr-bubble"></span></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-9">
                                        <h3 class="mt-20 mb-20">{{$post->title}}</h3>
                                        <p class="excert">
                                            {!!$post->content!!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 sidebar-widgets">
                                <div class="widget-wrap">
                                    <div class="single-sidebar-widget search-widget">
                                        <form class="search-form" action="#">
                                            <input placeholder="Search Posts" name="search" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'" >
                                            <button type="submit"><i class="fa fa-search"></i></button>
                                        </form>
                                    </div>
                                    <div class="single-sidebar-widget user-info-widget">
                                        <img src="img/blog/user-info.png" alt="">
                                        <a href="#"><h4>{{$post->user->name}}</h4></a>
                                        <p>Role :
                                            {{$post->user->role}}
                                        </p>
                                        <ul class="social-links">
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-github"></i></a></li>
                                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                        </ul>
                                        <p>
                                            Boot camps have its supporters andit sdetractors. Some people do not understand why you should have to spend money on boot camp when you can get. Boot camps have itssuppor ters andits detractors.
                                        </p>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End post-content Area -->
@endsection

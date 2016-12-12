
@extends('master')
@section('title')
    {{ $classified_details->title }}
@endsection
@section('middle_header')
    @include('partials.middle_header')
@endsection

@section('bottom_header')
    @include('partials.bottom_header')
@endsection
@section('content')
    <div class="container">
    @include('partials.breadcrumbs')
    <div class="row">
        <div class="col-sm-3">
            <div class="left-sidebar">
           @include('partials.category_sidebar')
            @include('partials.most_searched')
            @include('partials.adverts.sidebar_ad')
            </div>
        </div>

        <div class="col-sm-9 padding-right">
            <div class="product-details"><!--product-details-->

                <div class="col-sm-5">
                    <div class="view-product">

                        <img src="{{ asset($image_path->value.$classified_details->image_path) }}" alt="" />

                    </div>
                    <div id="other-images" class="carousel slide" data-ride="carousel">

                        <!-- Wrapper for slides THUMBNAILS -->
                            @if(isset($thumbnails))
                            <div class="carousel-inner">
                                <div class="portfolioContainer">
                                    <div class="item active">
                                        <?php $set = 0?>
                                    @foreach($thumbnails as $key => $value )
                                    <a href="{{ asset($image_path->value.$images[$key]['filename']) }}" title="{{ $classified_details->title }}" class="image-popup">
                                        <img src="{{ asset($thumb_image_path->value.$value['filename']) }}" class="thumb-img" alt="">
                                    </a>
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                            @endif
                        <!-- Controls -->
                        <!--
                        <a class="left item-control" href="#similar-product" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right item-control" href="#similar-product" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a> -->
                    </div>
                    <Span><b>Tags:</b> {{ $classified_details->keywords }}</span>
                    <br/>
                    <button type="button" class="btn btn-danger ">
                        Flag as Inappropriate
                    </button>
                </div>

                <div class="col-sm-7">
                    <div class="product-information"><!--/product-information-->
                        @if($difference == 'Today')
                            <img src="{{ asset('images/product-details/new.jpg') }}" class="newarrival" alt="" />
                        @elseif($difference < 2 && $difference != '1 week ago' && $difference != '1 month ago' && $difference != '1 year ago')

                            <img src="{{ asset('images/product-details/new.jpg') }}" class="newarrival" alt="" />
                        @endif
                        <h2>{{ $classified_details->title }}</h2>
                        <p>{{ $classified_details->description }}</p>
                         <small class="col-lg-12 col-md-12 col-sm-12">Posted: {{ $difference }}
                         </small>
                        <!--<img src="images/product-details/rating.png" alt="" />-->

                                <span>
                                    @if($classified_details->discounted == '1')
                                        <span style="color: #8a1f11; text-decoration: line-through">
                                        <h3>MK {{ number_format($classified_details->originalPrice, 2) }}</h3>
                                        </span>

                                        <span>MK {{ number_format($classified_details->price, 2) }}</span>
                                            <span style="color: #8c8c8c">
                                                <h6>Save MK {{ number_format(($classified_details->originalPrice - $classified_details->price), 2) }}</h6>
                                            </span>

                                        @if(Auth::user()['id'] != $user_info->id)
                                            <a href="#reviews">
                                                <button type="button" class="btn btn-default cart">
                                                    Review Classified
                                                </button>
                                            </a>
                                        @endif
                                        @else
                                        <span>MK {{ number_format($classified_details->price, 2) }}</span>
                                    @endif
								</span>
                        @if(Auth::check())
                            @if(Auth::user()['id'] != $user_info->id)
                               <p><b>Seller Info : </b>{{ $user_info->name }}
                                   <a href="#new_messageModal" data-toggle="modal">
                                       <button type="button" class="btn btn-default cart">
                                           Contact This User
                                       </button>
                                   </a>
                               </p>
                            @endif
                            @if($classified_details->discounted == '1')
                                   @if($hasVoucher == '0')
                                        <p>
                                            <a href="{{ route('voucher.create', $classified_details->id) }}" >
                                                <button type="button" class="btn btn-success">
                                                    Buy This Voucher (MK {{ number_format($classified_details->voucherPrice, 2) }})
                                                </button>
                                            </a>
                                        </p>
                                       @else
                                       @if($paid == 1)
                                            <p>
                                                <a href="" data-toggle="modal">
                                                    <button type="button" class="btn btn-info">
                                                        View Voucher
                                                    </button>
                                                </a>
                                            </p>
                                       @else
                                            <p>
                                                <button type="button" class="btn btn-info">
                                                        Voucher In Moderation
                                                </button>
                                                <small>
                                                    <a href="{{ route('voucher.instructions') }}" style="color: #8c8c8c;">
                                                        View Payment Instructions
                                                    </a>
                                                </small>
                                            </p>
                                       @endif
                                    @endif
                            @endif
                        @endif

                        <p><b>Email Address : </b>{{ $user_info->email }}</p>
                        <p><b>Location : </b>{{ $location->name }}</p>
                        <p><b>Phone #:</b> @if($user_info->mobile == '')None Listed @else {{  $user_info->mobile }}@endif</p>
                        <p><b>Condition:</b> {{ $condition->name }}</p>
                        <p><b>Views:</b>{{ $classified_details->view_count }}</p>

                        <h2 style="padding-top: 2px">Find This User On</h2>
                            <p><b>Facebook : </b>{{ $user_info->facebook_page }}</p>
                            <p><b>Twitter : </b>{{ $user_info->twitter_handle }}</p>
                            <p><b>Skype : </b>{{ $user_info->skype_id }}</p>
                        @include('partials.product_page.safety')
                    </div><!--/product-information-->
                </div>
            </div><!--/product-details-->

            <div class="category-tab shop-details-tab"><!--category-tab-->
                <div class="col-sm-12">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#reviews" data-toggle="tab">Reviews (<span id="count"></span>)</a></li>
                        <li><a href="#morefrom" data-toggle="tab">More From</a></li>
                        <li><a href="#related" data-toggle="tab">related</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    @include('partials.product_page.more_from')
                    @include('partials.product_page.related_products')

                    <div class="tab-pane fade active in" id="reviews" >
                        @include('partials.product_page.reviews')
                    </div>
                 </div>
               </div><!--/category-tab-->



            </div>
        </div>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->

    </div>
    @include('messaging.new_message_modal')
@endsection


@section('footer')
    @include('partials.footer')
@endsection

@section('jquery')
    <script type="text/javascript">
        $(window).load(function(){
            var $container = $('.portfolioContainer');
            $container.isotope({
                filter: '*',
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });

            $('.portfolioFilter a').click(function(){
                $('.portfolioFilter .current').removeClass('current');
                $(this).addClass('current');

                var selector = $(this).attr('data-filter');
                $container.isotope({
                    filter: selector,
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false
                    }
                });
                return false;
            });
        });
        $(document).ready(function() {
            $('.image-popup').magnificPopup({
                type: 'image',
                closeOnContentClick: true,
                mainClass: 'mfp-fade',
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                }
            });
        });
    </script>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-56f10c41fbec7d18"></script>

@endsection
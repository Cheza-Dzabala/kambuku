@extends('master')
@section('title')
    Home
@endsection

@section('middle_header')
    @include('partials.middle_header')
@endsection

@section('bottom_header')
    @include('partials.bottom_header')
@endsection

@section('content')

    @include('partials.slider')

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
               @include('partials.category_sidebar')
                    @include('partials.adverts.homePageStandardBlocks')
                    <br/>
                    @include('partials.most_searched')
                </div>
            </div>

            <div class="col-sm-9 padding-right">

                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Featured Items</h2>
                    @foreach($classifieds as $key => $value)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ $image_path->value.$value['image_path'] }}" alt="" />
                                    <h2>MK {{ number_format($value['price'], 2) }}</h2>

                                    <p>{{ $value['title'] }}</p>
                                    <a href="#" class="btn btn-default add-to-cart">View Item</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">

                                        <p>  {{ $value['description'] }} </p>
                                        <a href="{{ route('classifieds.show', [$value['id']]) }}" class="btn btn-default add-to-cart">View Item</a>
                                    </div>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                     @endforeach
                </div><!--features_items-->

                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Latest Items</h2>
                    @foreach($latest as $key => $value)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{ $image_path->value.$value['image_path'] }}" alt="" />
                                        <h2>MK {{ number_format($value['price'], 2) }}</h2>

                                        <p>{{ $value['title'] }}</p>
                                        <a href="#" class="btn btn-default add-to-cart">View Item</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">

                                            <p>  {{ $value['description'] }} </p>
                                            <a href="{{ route('classifieds.show', [$value['id']]) }}" class="btn btn-default add-to-cart">View Item</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @include('partials.adverts.homeStripAds')

                <div class="category-tab col-sm-12 col-md-12 col-lg-12"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <?php $i = 0; $active = 0; $activated = ''; ?>
                    <!--
                    $i is a counter to track tabs and assigned panes,
                    $active check to see what tab should be active,
                    $activated checks to see which tab has been activated and sets the appropriate class in the view pane
                    -->
                            @foreach ($tabs as $key => $value)
                                <li @if ($active == 0) class="active" <?php $activated = $i?> @endif >
                                    <a href="#{{ $i }}" data-toggle="tab" name="{{ $activated }}">{{ $key }}</a>
                                </li>
                                <?php $active++; $i++ ?>
                            @endforeach
                        </ul>
                    </div>
                    <div class="tab-content">


                        <?php $i = 0; $verify_active = '' ?>
                        @foreach ($tabs as $key => $value)
                                <?php $verify_active = $i ?>
                                <div @if ($verify_active == $activated) class="tab-pane fade active in" @else class="tab-pane fade in" @endif id="{{ $i }}" name="{{ $verify_active }}" >

                                    @foreach($value as $k => $v)
                                            <div class="col-sm-4">
                                                <div class="product-image-wrapper">
                                                    <div class="single-products">
                                                        <div class="productinfo text-center">
                                                            <img src="{{ $image_path->value.$v['image_path'] }}" alt="{{ $v['title'] }}" />
                                                            <h2>Mk {{ number_format($v['price'],2) }}</h2>
                                                            <p>{{ $v['title'] }}</p>
                                                            <a href="{{ route('classifieds.show', [$v['id']]) }}"class="btn btn-default add-to-cart">View Item</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    @endforeach

                                </div>
                                <?php $i++; $verify_active++ ?>
                        @endforeach

                    </div>
                </div><!--/category-tab-->
            </div>
        </div>
    </div>
</section>
@endsection

@section('footer')
    @include('partials.footer')
@endsection

@extends('master')
@section('title')
    {{ $subcategory->name }}
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
                @include('partials.adverts.sidebar_ad')
                @include('partials.most_searched')
            </div>
        </div>
    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--category_items-->
            <h2 class="title text-center">{{ $category->name }} - {{ $subcategory->name }}</h2>
            @foreach($listingsArray as $key => $value)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{ asset($image_path->value.$value['image_path']) }}" alt="" />
                                <h2>{{ number_format($value['price'], 2) }}</h2>
                                <p style="white-space: nowrap; text-overflow: ellipsis; overflow: hidden;">{{ $value['title'] }}</p>
                                <a href="{{ route('classifieds.show', [$value['id']]) }}" class="btn btn-default add-to-cart">View Item</a>
                            </div>
                        </div>
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
        <div class="col-sm-4">
            {!! $listingsArray->appends(['perPage' => $perPage])->links() !!}
        </div><!--Category_items-->
  </div>
</div></div>

@endsection
@section('footer')
    @include('partials.footer')
@endsection
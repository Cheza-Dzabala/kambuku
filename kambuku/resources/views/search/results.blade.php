@extends('master')

@section('title')

@endsection

@section('middle_header')
    @include('partials.middle_header')
@endsection

@section('bottom_header')
    @include('partials.bottom_header')
@endsection
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    @include('partials.search.refine')
                    @include('partials.adverts.sidebar_ad')
                 </div>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="user-container">
                <h2 class="title text-center">Searching - Results For {{ $search_term }}</h2>
                <div id="w">
                    <div class="table-responsive search_info">
                        @if(isset($empty))
                            <table class="table table-condensed">
                                <thead >
                                    <tr class="search_results">
                                        <th class="description">No Results To Display</th>
                                    </tr>
                                </thead>
                           </table>
                        @else
                        <table class="table table-condensed">
                            <thead >
                            <tr class="search_results">
                                <th class="image">Image</th>
                                <th class="description">Description</th>
                                <th class="price">Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($listingsArray as $key => $value)
                            <tr>
                                <td class="search_product" style="margin-right: 5px">
                                    <a href="{{ route('classifieds.show', [$value['id']]) }}"><img src="{{ asset($image_path->value.$value['image_path']) }}" width="140px" height="140px"></a>
                                </td>
                                <td class="search_description">
                                    <h4><a href="{{ route('classifieds.show', [$value['id']]) }}" style="color: #0f0f0f">{{ $value['title'] }}</a></h4>
                                    <p style="white-space: nowrap;text-overflow:ellipsis; max-width: 70ch; overflow: hidden;">{{ $value['description'] }}</p>
                                </td>
                                <td class="search_price">
                                    <p>MK {{ number_format($value['price'], 2) }}</p>
                                </td>

                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $listingsArray->appends(['perPage' => $perPage, 'search_term' => $search_term])->links() !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection


@section('footer')
    @include('partials.footer')
@endsection
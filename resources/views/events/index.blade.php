@extends('master')

@section('title')
    Events
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
                    @include('partials.adverts.sidebar_ad')
                    @include('partials.adverts.sidebar_ad')
                </div>
            </div>
            <div class="col-sm-9">
                <div class="user-container">
                    <h2 class="title text-center">Events | <a href="{{ route('tickets.view') }}">My Tickets</a></h2>
                    <div id="w">
                        <div id="content" class="clearfix">
                            @foreach($events as $event)
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{ asset($event->artwork) }}" alt="" width="50px" height="50px"/>
                                                <h2>{{ number_format($event->price  , 2) }}</h2>
                                                <p>{{ $event->eventName }}</p>
                                                <a href="{{ route('ticket.buy', $event->id) }}" class="btn btn-default add-to-cart">Buy Ticket</a>
                                            </div>
                                        </div>
                                        <div class="choose">
                                           <b>Host:</b> {{ $event->host }} <br/>
                                            <b>Venue:</b> {{ $event->venue }} <br/>
                                            <b>Date:</b> {{ $event->eventDate }} <br/>
                                            <b>Time:</b> {{ $event->time }} <br/>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div><!-- end #content -->
                    </div><!-- end #w -->

                </div><!--/User-Container-->
            </div>
        </div>
    </div>
@endsection


@section('footer')
    @include('partials.footer')
@endsection


@section('scripts')
    <script type="text/javascript" src="{{ asset('public/js/user/accountManagement.js') }}"></script>
@endsection
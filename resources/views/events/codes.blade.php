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
                    <h2 class="title text-center">{{ $event->eventName }} Tickets</h2>
                    <div id="w">
                        <div id="content" class="clearfix">
                        @foreach($tickets as $ticket)
                            <img src="{!! route('tickets.barcode', ['text' => 'verificationCode=' . $ticket->verificationCode .'-'. 'isUsed=' . $ticket->isUsed .'-'. 'eventId=' . $ticket->eventId]) !!}">
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
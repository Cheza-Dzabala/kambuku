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

                </div>
            </div>
            <div class="col-sm-9">
                <div class="user-container">
                    <h2 class="title text-center">Secure Your Ticket</h2>
                    <div id="w">
                        <div id="content" class="clearfix">
                            <p>
                               <h6>
                                Your security key will be used when verifying your ticket.
                                It is important that you keep your ticket security key to yourself.
                                <br/> DO NOT LOSE IT. DO NOT FORGET IT.  If you do, It will render your ticket unusable. <br/>
                                Every Ticket can only be used once.
                              </h6>
                            </p>
                            <form action="{{ route('ticket.generate') }}" method="post">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="securityKey" placeholder="securityKey" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="numberTickets" type="number" placeholder="Number Of Tickets" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="eventId" type="hidden" value="{{ $ticketId }}" required>
                                </div>

                                <br/>
                                <button type="submit" class="btn btn-primary">
                                    Submit Key
                                </button>
                            </form>
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
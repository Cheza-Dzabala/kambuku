@extends('master')

@section('title')
    {{ $user_details['name'] }}
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
                <h2 class="title text-center">Your Profile Summary</h2>
                <div id="w">
                    <div id="content" class="clearfix">
                        <div id="userphoto" class="pull-right"><img src="{{ asset($user_details['image_path']) }}" alt="default avatar" class="img-circle"></div>
                        <h2>{{ $user_details['name'] }}  <small class="text-muted" style="font-size: small"><a href="{{ route('profile.edit') }}">Edit Account Information</a>
                            </small> </h2>

                        <div id="userdetails" class="user-details">
                            <p><span>Date Of Birth: </span>{{ $user_details['date_of_birth'] }}</p>
                            <p><span>Address: </span>{{ $user_details['address'] }}</p>
                            <p><span>Email: </span> {{ $user_details['email'] }}</p>
                            <p><span>Phone: </span>{{ $user_details['mobile'] }}</p>
                            <div style="color: white">

                                    <button class="btn btn-facebook">
                                        <i class="fa fa-facebook fa-2x"></i> <small>{{ $user_details->facebook_page }}</small>
                                    </button>
                                    <button class="btn btn-twitter">
                                        <i class="fa fa-twitter fa-2x"></i> <small>{{ $user_details->twitter_handle }}</small>
                                    </button>
                                    <button class="btn btn-skype">
                                        <i class="fa fa-skype fa-2x"></i><small>{{ $user_details->skype_id }}</small>
                                    </button>

                            </div>
                        </div>
                    @include('partials.Account.listings')

                    </div><!-- @end #content -->
                </div><!-- @end #w -->

            </div><!--/User-Container-->
    </div>
    </div>
    </div>
@endsection


@section('footer')
    @include('partials.footer')
@endsection


@section('scripts')
    <script type="text/javascript" src="{{ asset('js/user/accountManagement.js') }}"></script>
@endsection
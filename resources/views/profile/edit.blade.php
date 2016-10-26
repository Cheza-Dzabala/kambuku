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
    <div class="container" xmlns="http://www.w3.org/1999/html">
        @include('partials.breadcrumbs')
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">

                @include('partials.adverts.sidebar_ad')
            </div>
        </div>
        <div class="col-sm-9">
    <div class="user-container">
        <h2 class="title text-center">{{ $user_details['name'] }} - Edit Your Profile</h2>
        <div id="w">
            <div id="content" class="clearfix">
                <!--<div id="userphoto"><img src="images/Profile/avatar.png" alt="default avatar"></div>-->
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-3">
                        <div class="text-center">
                            <img src="{{ asset($user_details['image_path']) }}" class="avatar img-circle" alt="avatar">
                            <h2 class="text-center">- OR -</h2>
                            <h6>upload a new profile picture...</h6>
                            <input type="file" name="image" class="upload">
                        </div>
                    </div>

                    <!-- edit form column -->
                    <div class="col-md-9 personal-info">
                        <h2>Personal info <small class="text-muted" style="font-size: small">This is the basic information required</small></h2>
                        <form class="form-horizontal" role="form" method="post" action="{{ route('profile.save') }}">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Full Name:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" type="text" name="name" value="{{ $user_details['name'] }}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">Date of Birth:</label>
                                <div class="col-lg-8">
                                    <input type="date" name="date_of_birth" value="{{ $user_details['date_of_birth'] }}" required>
                                </div>
                            </div>

                          <h2>Contacts <small class="text-muted" style="font-size: small">Your Contacts Are Required Before You Make A Listing</small></h2>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Mobile:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" type="text" name="mobile" value="{{ $user_details['mobile'] }}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">Email:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" type="email" name="email" value="{{ $user_details['email'] }}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">Address:</label>
                                <div class="col-lg-8">
                                    <textarea name="address" cols="10" rows="5" class="form-control">{{ $user_details['address'] }}</textarea>
                                </div>
                            </div>

                            <h2>Location <small class="text-muted"  style="font-size: small">You need to add your location for your listings</small></h2>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Country:</label>
                                <div class="col-md-8">
                                    <select name="country" class="form-control">

                                            <option selected>Malawi</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">City:</label>
                                <div class="col-md-8">
                                    <select name="city_id" class="form-control">
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}" @if($city->id == $user_details['city_id']) selected @endif>{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @if(Auth::user()['canList'] == '1')
                                <h2>Voucher <small class="text-muted"  style="font-size: small">These instructions are printed on the voucher</small></h2>
                                <label class="col-lg-3 control-label">Voucher Instructions:</label>
                                <div class="col-lg-8">
                                    <textarea name="voucher_instructions" cols="10" rows="5" class="form-control">{{ $user_details['voucher_instructions'] }}</textarea>
                                </div>
                            @endif

                            <h2>Social <small class="text-muted"  style="font-size: small">Help your clients engage with you</small></h2>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Website:</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" name="website" value="{{ $user_details['website'] }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Facebook Page:</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" name="facebook_page" value="{{ $user_details['facebook_page'] }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Twitter:</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" name="twitter_handle" value="{{ $user_details['twitter_handle'] }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Skype:</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" name="skype_id" value="{{ $user_details['skype_id'] }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Gender:</label>
                                <div class="col-md-8">
                                    <select name="gender" class="form-control">
                                        @if($user_details['gender'] == 'm')
                                            <option value="m" selected>Male</option>
                                            <option value="f">Female</option>

                                        @else
                                            <option value="f" selected>Female</option>
                                            <option value="m">Male</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-8">
                                    <input type="submit" class="btn btn-primary" value="Save Changes">

                                    <input type="reset" class="btn btn-info cancel" value="Reset Form">
                                    <br/>
                                    <br/>
                                    <a href="{{ route('profile') }}"><< Back To Profile</a>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>

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
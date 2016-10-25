@extends('master')

@section('middle_header')
    @include('partials.middle_header')
@endsection

@section('content')
<section id="form" style="margin-top: 5px; margin-bottom: 5px"><!--form-->
        <div class="container" >
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="signup-form"><!--sign up form-->
                        <h2>New User Signup!</h2>
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="col-md-6">
                                    <input type="text"
                                           name="name"
                                           value="{{ old('name') }}"
                                           placeholder="Name"
                                           style="width: 300px"
                                    >

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="col-md-6">
                                    <input type="email"
                                           name="email"
                                           value="{{ old('email') }}"
                                           placeholder="Email"
                                           style="width: 300px"
                                    >

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
                                <div class="col-md-6">
                                    <input type="text"
                                           name="date_of_birth"
                                           style="width: 300px"
                                           placeholder="mm/dd/yyyy" id="datepicker"
                                    >
                                    @if ($errors->has('date_of_birth'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('date_of_birth') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                <div class="col-md-6">
                                    <select name="gender" style="width: 300px">
                                        <option value="m">Male</option>
                                        <option value="f">Female</option>
                                    </select>
                                    @if ($errors->has('gender'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('gender') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="col-md-6">
                                    <input type="password"
                                           name="password"
                                           placeholder="Password"
                                           style="width: 300px"
                                    >
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

                                <div class="col-md-6">
                                    <input type="password"
                                           name="password_confirmation"
                                           placeholder="Confirm Password"
                                           style="width: 300px"
                                    >

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i>Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
             </div>
         </div>
</section>
@endsection

@section('footer')
    @include('partials.footer')
@endsection


@extends('master')



@section('middle_header')
    @include('partials.middle_header')
@endsection


@section('content')
    <section id="form" style="margin-top: 0px; margin-bottom: 0px"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form">
                        <h2>{{ Lang::get('auth.enter_password') }}</h2>
                        <form class="form-horizontal"  method="POST" action="{{ url('/login') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                <div class="col-md-6">
                                    <input type="email" name="email"
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

                            <div class="form-group">
                                <div class="col-md-6">
                                    <div >
                                     <span>
                                        <input type="checkbox"  class="checkbox" name="remember"> Remember Me
                                    </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 ">
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary">
                                          {{ Lang::get('actions.login') }}
                                        </button>
                                    </div>
                                    <div class="col-md-3">
                                      <h3>{{ Lang::get('actions.or') }}</h3>
                                    </div>
                                    <div class="col-md-4">
                                        <a class="btn btn-primary" href="{{ url('/register') }}">
                                            {{ Lang::get('actions.register') }}
                                        </a>
                                    </div>
                                </div>
                                <a class="btn btn-link" href="{{ url('/password/reset') }}">{{ Lang::get('auth.forget_password') }}</a>
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

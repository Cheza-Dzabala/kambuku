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

@section('title')
    Page Not Found
@endsection

@section('content')
    <div class="container">
        <div class="row col-sm-12">
               <h2 class="title text-center" >PAGE NOT FOUNd</h2>
        </div>
        <div class="row col-sm-12">
            <p class="">
              <h5 class="text-center title">You broke kambuku!!! The page you're looking for cannot be found</h5>
            </p>
        </div>
        <div class="row col-sm-12">
               <div class="text-center">
                   <img src="{{ asset('public/images/errors/4.0.4.jpg') }}" width="500px">
               </div>
        </div>

    </div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection

@extends('master')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}" />
@section('title')
    {{ $page->title }}
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
            <h2 class="title text-center">{{ $page->title }}</h2>
        </div>
        <div class="row">
            <p>
                @if($content != null)

                {!! $content->content !!}
                @endif
            </p>

        </div>
    </div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection
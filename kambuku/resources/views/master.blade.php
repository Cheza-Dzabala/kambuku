<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')| Kambuku</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <!--Custom Scripts Noptification Plugin-->
    <link href="{{ asset('js/timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('js/timepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
    <link href="{{asset('js/notifications/notification.css')}}" rel="stylesheet" />

    <!-- Custom Files -->

    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />

    <!--venobox lightbox-->
    <link rel="stylesheet" href="{{ asset('js/magnific-popup/magnific-popup.css') }}"/>
    <!--[if lt IE 9]-->
    <script src="{{  asset('js/html5shiv.js') }}"></script>
    <script src="{{  asset('js/respond.min.js') }}"></script>
    <![endif]-->
    @yield('css')
    <link rel="shortcut icon" href="{{ asset('images/ico/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('images/ico/apple-touch-icon-57-precomposed.png') }}">

</head><!--/head-->

<body>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +265 99 91 88 821</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> info@kambuku.com</a></li>
                            <li class="dropdown" style="cursor: pointer;">
                                @if(Config::get('app.locale')== 'en')
                                    <a class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="{{ asset('images/flags/gb.png') }}" class="position-left" alt="">
                                        English
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('language.set', 'mw') }}" class="chichewa" style="cursor: pointer;">
                                                <img src="{{ asset('images/flags/mw.png') }}" alt="">
                                                Chichewa
                                            </a>
                                        </li>
                                    </ul>
                                    @else
                                    <a class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="{{ asset('images/flags/mw.png') }}" class="position-left" alt="">
                                        Chichewa
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('language.set', 'en') }}" class="chichewa" style="cursor: pointer;">
                                                <img src="{{ asset('images/flags/gb.png') }}" alt="">
                                                English
                                            </a>
                                        </li>
                                    </ul>

                                @endif
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->
@yield('middle_header')
@yield('bottom_header')
</header><!--/header-->

@yield('content')

@yield('vue_templates')


@yield('footer')


<script src="{{  asset('js/jquery.js') }}"></script>
<script src="{{  asset('js/links.js') }}"></script>
<script src="{{  asset('js/socket.io.js') }}"></script>
<script src="{{  asset('js/test.js') }}"></script>
<script src="{{  asset('js/bootstrap.min.js') }}"></script>
<script src="{{  asset('js/jquery.scrollUp.min.js') }}"></script>
<script src="{{  asset('js/price-range.js') }}"></script>
<script src="{{  asset('js/jquery.prettyPhoto.js') }}"></script>
<script src="{{  asset('js/main.js') }}"></script>
<script src="{{  asset('js/timepicker/bootstrap-timepicker.min.js') }}"></script>
<script src="{{  asset('js/timepicker/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript" src="{{  asset('js/gallery/isotope.js') }}"></script>
<script type="text/javascript" src="{{  asset('js/magnific-popup/magnific-popup.js') }}"></script>
<!-- NOTIFICATION -->
<script src="{{asset('js/notifications/notify.js')}}"></script>
<script src="{{asset('js/notifications/notify-metro.js')}}"></script>
<script src="{{asset('js/notifications/notifications.js')}}"></script>
<script src="{{asset('js/global.js')}}"></script>


<!-- Chat -->


<!-- Other -->
<script src="{{ asset('js/jquery.nicescroll.js') }}" type="text/javascript"></script>
<script>
    var socket = io(main_host+':3000');
   // var message_socket = io(main_host+'4000');
</script>
@yield('scripts')

<script>
    // Date Picker
    jQuery('#datepicker').datepicker();
    jQuery('#datepicker-inline').datepicker();
    jQuery('#datepicker-multiple').datepicker({
        numberOfMonths: 3,
        showButtonPanel: true
    });






</script>

@yield('jquery')

@if(Auth::check())
    <script>

        //Announce Online


        //Comment Sockets

        socket.on("comment-channel:App\\Events\\NewCommentEvent", function (message) {
            // alert('comment');
            if (message.data.human_target == "{{ Auth::user()->id }}") {
                //  var resizefunc = [];
                $.Notification.notify('info', 'top right', 'New Comment from ' + message.data.name + ' On Product ' + message.data.title, message.data.comment);
            }
        });


        //Messaging Sockets
        socket.on("message-channel:App\\Events\\NewMessage", function (message) {
            if (message.data.human_target == "{{ Auth::user()->id }}") {
                if (window.location.href == main_link + 'messaging') {
                    null;
                } else {
                    $.Notification.notify('success', 'top right', 'New Message from ' + message.data.sender_name, message.data.message_body);
                }
            }
        });

        //Online Users
        socket.on("online-channel:App\\Events\\ShoutEvent", function(message){

        });

    </script>
@endif
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="{{ asset('admin/images/favicon_1.ico') }}">

    <title>@yield('title')</title>

    <!-- Base Css Files -->
    <link href="https://kambuku.com/public/admin/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Font Icons -->
    <link href="{{ asset('admin/assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/admin/assets/ionicon/css/ionicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/admin/css/material-design-iconic-font.min.css') }}" rel="stylesheet">

    <!-- animate css -->
    <link href="{{ asset('/admin/css/animate.css') }}" rel="stylesheet" />

    <!-- Waves-effect -->
    <link href="{{ asset('/admin/css/waves-effect.css') }}" rel="stylesheet">

    <!-- sweet alerts -->
    <link href="{{ asset('/admin/assets/sweet-alert/sweet-alert.min.css') }}" rel="stylesheet">

    <!-- Custom Files -->
    <link href="{{ asset('/admin/css/helper.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin/css/style.css') }}" rel="stylesheet" type="text/css" />
    @yield('css')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{ URL::asset('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}"></script>
    <script src="{{ URL::asset('https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js') }}"></script>
    <![endif]-->

    <script src="https://kambuku.com/public/admin/js/modernizr.min.js"></script>
    @yield('head')
</head>



<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">

    @include('admin.partials.general.topbar')
    @include('admin.partials.general.leftsidebar')

            <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            @if (Session::has('message'))
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ Session::get('message') }}
                </div>
            @endif
            <div class="container">
                @yield('content')
            </div>
        </div>
        <footer class="footer text-right">
            2015 © Dibs Africa Ltd.
        </footer>
    </div>




    @include('admin.partials.general.rightsidebar')


</div>
<!-- END wrapper -->



<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="{{ asset('/admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('/admin/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/admin/js/waves.js') }}"></script>
<script src="{{ asset('/admin/js/wow.min.js') }}"></script>
<script src="{{ asset('/admin/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
<script src="{{ asset('/admin/js/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset('/admin/assets/chat/moment-2.2.1.js') }}"></script>
<script src="{{ asset('/admin/assets/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('/admin/assets/jquery-detectmobile/detect.js') }}"></script>
<script src="{{ asset('/admin/assets/fastclick/fastclick.js') }}"></script>
<script src="{{ asset('/admin/assets/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('/admin/assets/jquery-blockui/jquery.blockUI.js') }}"></script>

<script src="{{ asset('/js/links.js') }}"></script>


<!-- sweet alerts -->
<script src="{{ asset('/admin/assets/sweet-alert/sweet-alert.min.js') }}"></script>
<script src="{{ asset('/admin/assets/sweet-alert/sweet-alert.init.js') }}"></script>


<!-- Counter-up -->
<script src="{{ asset('/admin/assets/counterup/waypoints.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/admin/assets/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>

<!-- CUSTOM JS -->
<script src="{{ asset('/admin/js/jquery.app.js') }}"></script>

<script src="{{ asset('/assets/timepicker/bootstrap-datepicker.js') }}"></script>

<!-- Chat -->
<script src="{{ asset('/admin/js/jquery.chat.js') }}"></script>

<!-- Todo -->
<script src="{{ asset('/admin/js/jquery.todo.js') }}"></script>
@yield('scripts')
<script type="text/javascript">
    /* ==============================================
     Counter Up
     =============================================== */
    jQuery(document).ready(function($) {
        $('.counter').counterUp({
            delay: 100,
            time: 1200
        });
    });

    jQuery('#datepicker').datepicker();
</script>

</body>
</html>

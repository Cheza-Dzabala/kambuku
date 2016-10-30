<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Merchant Portal</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('/merchants/assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/merchants/assets/css/minified/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/merchants/assets/css/minified/core.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/merchants/assets/css/minified/components.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/merchants/assets/css/minified/colors.min.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="{{ asset('/merchants/assets/js/core/libraries/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/merchants/assets/js/core/libraries/bootstrap.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ asset('/merchants/assets/js/plugins/ui/drilldown.js') }}"></script>

    <script type="text/javascript" src="{{ asset('/merchants/assets/js/core/app.js') }}"></script>
    <!-- /theme JS files -->

</head>

<body>

<!-- Main navbar -->
<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="">KAMBUKU.COM MERCHANT PORTAL</a>

        <ul class="nav navbar-nav pull-right visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <!--
            <li><a href=""><i class="icon-home"></i> Home</a></li>
            <li><a href=""><i class="icon-spinner10"></i> Vouchers</a></li>
            <li><a href=""><i class="icon-coins"></i> Sales</a></li>
            <li><a href=""><i class="icon-bubbles8"></i> Contact</a></li>
            -->

        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ route('home') }}" target="_blank">Visit Website</a></li>
            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ asset('merchants/assets/images/image.png') }}" alt="">
                    <span>{{ Auth::user()['name'] }}</span>
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                   <!--
                    <li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>
                    <li><a href="#"><i class="icon-spinner10"></i> My Vouchers</a></li>
                    -->
                    <li class="divider"></li>

                    <li><a href="/logout"><i class="icon-switch2"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->


<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Page header -->
            <div class="page-header">
                <div class="page-header-content">
                    <div class="page-title">
                        <h4><span class="text-semibold">Home</span> - Merchant Portal</h4>
                    </div>

                </div>


            </div>
            <!-- /page header -->


            <!-- Content area -->
            <div class="content">
                @yield('content')
            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->

</body>
</html>
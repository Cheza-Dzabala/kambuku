<div class="header-middle"><!--header-middle-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-lg-4">
                <div class="logo pull-left">
                    <a href="{{ url('/') }}"><img src="{{ asset('/images/home/logo.png') }}" alt="" width="80px" height="auto"/></a>
                </div>
		<div style="margin-top:5%">
			 <span id="siteseal"><script async type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=mYWZXbZXPiYLsectzsnHi4SLTFqshnXQuT7rl67XQvwUZxjM7bpSgKGL6brn"></script></span>
		</div>

                <div class="btn-group pull-right">
                    @if (Session::has('inactive'))
                        <div class="alert alert-warning alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ Session::get('inactive') }}
                        </div>
                    @endif

                    @if (Session::has('savedProfile'))
                        <div class="alert alert-success alert-dismissable col-md-12">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ Session::get('savedProfile') }}
                        </div>
                    @endif

                    @if (Session::has('EditedListing'))
                        <div class="alert alert-success alert-dismissable col-md-12">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ Session::get('EditedListing') }}
                        </div>
                    @endif

                    @if (Session::has('listing_failed'))
                        <div class="alert alert-danger alert-dismissable col-md-12">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ Session::get('listing_failed') }}
                        </div>
                    @endif


                    @if (Session::has('savedListing'))
                        <div class="alert alert-success alert-dismissable col-md-12">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ Session::get('savedListing') }}
                        </div>
                    @endif

                    @if (Session::has('comment'))
                        <div class="alert alert-success alert-dismissable col-md-12">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ Session::get('comment') }}
                        </div>
                    @endif


                    @if (Session::has('message'))
                        <div class="alert alert-success alert-dismissable col-md-12">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ Session::get('message') }}
                        </div>
                    @endif

                    @if (Session::has('CantList'))
                        <div class="alert alert-danger alert-dismissable col-md-12">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ Session::get('CantList') }}
                        </div>
                    @endif

                    @if (Session::has('savedVoucher'))
                        <div class="alert alert-success alert-dismissable col-md-12">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ Session::get('savedVoucher') }}
                        </div>
                    @endif

                </div>
            </div>
            <div class="col-sm-8 col-lg-8">
                <div class="shop-menu pull-right">
                    <ul class="nav navbar-nav">
                        @if (Auth::check())

                        <li><a href="{{ route('events') }}"><i class="fa fa-ticket"></i> Events</a></li>
                        <li><a href="{{ route('voucher.show') }}"><i class="fa fa-ticket"></i> Product Vouchers</a></li>
                        <li><a href="{{ route('profile') }}"><i class="fa fa-user"></i> My Account</a></li>
                            @if(Auth::user()['canList'] == '1')
                                <li><a href="{{ route('classifieds.create') }}"><i class="fa fa-plus-circle"></i> Post Listing</a></li>
                            @endif
                        @endif
                       @if (Auth::check())
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-lock"></i>Logout</a></li>
                       @else
                            <li><a href="{{ url('/login') }}"><i class="fa fa-lock"></i> {{ Lang::get('actions.login') }}</a></li>
                            <li><a href="{{ url('/register') }}"><i class="fa fa-lock"></i> {{ Lang::get('actions.register') }}</a></li>
                       @endif

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><!--/header-middle-->
	

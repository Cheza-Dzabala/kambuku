

<!-- ========== Left Sidebar Start ========== -->

<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft" style="overflow-y: scroll">
        <div class="user-details">
            <div class="pull-left">
                <img src="{{ asset($user_details->image_path) }}" alt="" class="thumb-md img-circle" width="50px" height="auto">
            </div>
            <div class="user-info">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{ $user_details->name }}<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>
                        <li><a href="{{ route('admin.settings') }}"><i class="md md-settings"></i> Settings</a></li>
                        <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                        <li><a href="javascript:void(0)"><i class="md md-settings-power"></i> Logout</a></li>
                    </ul>
                </div>
                <p class="text-muted m-0">Admin</p>
            </div>
        </div>
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ route('admin.home') }}" class="waves-effect active"><i class="md md-home"></i><span> Dashboard </span></a>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md  md-public"></i><span> Site Management </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('admin.categories') }}">Manage Categories</a></li>
                        <li><a href="{{ route('admin.locations') }}">Manage Locations</a></li>
                        <li class="has_sub">
                            <a href="#" class="waves-effect">Website Views & Settings<span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="#">Website Logo</a></li>
                                <li><a href="{{ route('admin.safety_guidelines.index') }}">Safety Guidlines</a></li>
                                <li><a href="#"></a></li>
                            </ul>
                        </li>
                        <li><a href="email-read.html">Contact Us Accounts</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md md-event"></i><span> Revenue </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('admin.homesliderconfig') }}">Home Slider</a></li>
                        <li><a href="{{ route('admin.adverts_config') }}">Paid Adverts</a></li>
                        <li><a href="{{ route('admin.vouchers') }}">Vouchers</a></li>

                    </ul>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md md-event"></i><span> Events </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('admin.tickets') }}">Clients</a></li>
                        <li><a href="{{ route('admin.tickets.index') }}">Tickets</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md md-event"></i><span> APP </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('admin.app.index') }}">Index</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md md-invert-colors-on"></i><span> User Management </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('admin.users') }}">User Accounts</a></li>
                        <li><a href="{{ route('admin.adminUsers') }}">Admin Accounts</a></li>
                        <li><a href="#">Create Account</a></li>

                    </ul>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md md-redeem"></i> <span> Manage Listings </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">

                        <li><a href="{{ route('admin.allclassifieds') }}">All Listings</a></li>
                        <li><a href="{{ route('admin.badwords') }}">Bad Word Filter</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md md-now-widgets"></i><span> Usage Statistics </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="form-elements.html">Categories</a></li>
                        <li><a href="form-validation.html">Listings</a></li>
                        <li><a href="form-advanced.html">Users</a></li>
                        <li><a href="form-wizard.html">General Statistics</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('admin.contentHeaders') }}" class="waves-effect"><span> Content Pages </span><span class="pull-right"></span></a>
                </li>
                <li>
                    <a href="{{ route('home') }}" target="_blank" class="waves-effect"><i class="md md-view-list"></i><span> Visit Site</span><span class="pull-right"><i class="md md-add"></i></span></a>
                </li>
                @if (Auth::user()['canList'] == '1')
                    <li>
                        <a href="{{ route('merchant.index') }}" target="_blank" class="waves-effect"><span>Merchant Portal</span><span class="pull-right"></span></a>
                    </li>
                @endif
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Left Sidebar End -->
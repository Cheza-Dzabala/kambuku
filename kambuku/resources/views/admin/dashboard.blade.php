

@extends('adminMaster');
@section('title')
        Dashboard::Kambuku
@endsection
@section('content')
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->


            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Dashboard !</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">kambuku Admin</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>

            @include('admin.partials.dashboard.widgets')


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->
@endsection
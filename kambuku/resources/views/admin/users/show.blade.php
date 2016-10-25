@extends('adminMaster')
@section('css')
    <link href="{{ asset('admin/assets/datatables/jquery.dataTables.min.css" rel="stylesheet') }}" type="text/css" />
    @endsection

    @section('content')
            <!-- ============================================================== -->
    <!-- Start right Content here -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ul>
                        <li class="dropdown" style="list-style: none">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                           <span class="panel-title"><h4>Users
                                                   <span class="caret"></span></h4>
                                               </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a data-toggle="modal" data-target="#newCategoryModal">New User</a></li>
                            </ul>
                        </li>
                    </ul>


                </div>
                <div class="panel-body">
                    <div class="row">


                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Number Of Classifieds</th>
                                        <th>Active Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($users as $key => $value)
                                        <tr>
                                            <td>{{ $value['id'] }}</td>
                                            <td>{{ $value['name'] }}</td>
                                            <td>{{ $value['email'] }}</td>
                                            <td>
                                                <div class="col-lg-2">
                                                   {{ $value['listings'] }}
                                                </div>
                                                <div class="col-lg-8" >
                                                    @if($value['listings'] != 0)
                                                        <a href="{{ route('admin.GetClassifieds', $value['id']) }}">
                                                                View
                                                        </a>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                @if($value['is_active'] == 1)
                                                   <span class="text-success">Active</span>
                                                @else
                                                   <span class="text-danger">Inactive</span>
                                                @endif

                                            </td>

                                            <td>
                                                <div>
                                                    <a href="{{ route('admin.ModerateUsers', $value['id']) }}">
                                                        Moderate Account
                                                    </a>
                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->
@endsection

@section('scripts')
    <script src="{{ URL::asset('admin/assets/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/datatables/dataTables.bootstrap.js') }}"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').dataTable();
        } );
    </script>
@endsection
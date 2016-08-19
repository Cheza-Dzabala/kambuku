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
                                           <span class="panel-title"><h4>Users Listings
                                                   <span class="caret"></span></h4>
                                               </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a data-toggle="modal" data-target="#newCategoryModal">New User Listing</a></li>
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
                                        <th>User Email</th>
                                        <th>User Name</th>
                                        <th>Listing Name</th>
                                        <th>Number Of Views</th>
                                        <th>Active Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($listings as $key => $value)
                                        <tr>
                                            <td>{{ $value['userName'] }}</td>
                                            <td>{{ $value['userEmail'] }}</td>
                                            <td>
                                                {{ $value['title'] }}
                                            </td>
                                            <td>{{ $value['view_count'] }}</td>
                                            <td>
                                                @if($value['is_active'] == 1)
                                                    <span class="text-success">Active</span>
                                                @else
                                                    <span class="text-danger">Inactive</span>
                                                @endif
                                            </td>

                                            <td>
                                                <a href="{{ route('admin.showclassifieds', $value['id']) }}">
                                                    Manage
                                                </a>
                                                <a href="{{ route('classifieds.show', $value['id']) }}" target="_blank">
                                                    View
                                                </a>
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
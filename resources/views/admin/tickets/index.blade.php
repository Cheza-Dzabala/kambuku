@extends('adminMaster')
@section('css')
    <link href="{{ asset('public/admin/assets/datatables/jquery.dataTables.min.css" rel="stylesheet') }}" type="text/css" />
@endsection

@section('content')


    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ul>
                        <li class="dropdown" style="list-style: none">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                           <span class="panel-title"><h4>Clients</h4>
                                           </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('admin.tickets.clients') }}">Create Client</a></li>
                            </ul>
                        </li>
                    </ul>

                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Client Contact Person</th>
                                    <th>Client Phone Number</th>
                                    <th>Event Count</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($clients as $client)
                                        <tr>
                                            <td>{{ $client->name }}</td>
                                            <td>{{ $client->contactPerson }}</td>
                                            <td>{{ $client->contactNumber }}</td>
                                            <td>{{ $client->eventCount }}</td>
                                            <td>
                                                <a href="{{ route('admin.tickets.events', $client->id) }}">
                                                    Create Event
                                                </a>
                                                <a href="{{ route('admin.tickets.events.view', $client->id) }}">
                                                    View Events
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

    </div> <!-- End row -->

    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->
@endsection

@section('scripts')
    <script src="{{ URL::asset('public/admin/assets/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('public/admin/assets/datatables/dataTables.bootstrap.js') }}"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').dataTable();
        } );
    </script>
@endsection

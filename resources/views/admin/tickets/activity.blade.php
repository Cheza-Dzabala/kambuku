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
                                           <span class="panel-title"><h4>Tickets
                                                   </h4>
                                               </span>
                            </a>

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

                                        <th>Event Name</th>
                                        <th>Event Venue</th>
                                        <th>User Name</th>
                                        <th>Mobile Number</th>
                                        <th>Active Status</th>
                                        <th>Reference Code</th>
                                        <th>Bulk Code</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tickets as $ticket)
                                       <tr>
                                           <td>{{ $ticket->eventName }}</td>
                                           <td>{{ $ticket->venue }}</td>
                                           <td>{{ $ticket->user }}</td>
                                           <td>{{ $ticket->mobile }}</td>
                                           <td>{{ $ticket->isActive }}</td>
                                           <td>{{ $ticket->referenceCode }}</td>
                                           <td>{{ $ticket->bulkCode }}</td>
                                           <td>
                                               <a href="{{ route('admin.tickets.moderate', $ticket->id) }}">Moderate Ticket</a>
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

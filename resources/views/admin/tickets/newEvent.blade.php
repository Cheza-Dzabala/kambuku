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
                                           <span class="panel-title"><h4>Create Event</h4>
                                               </span>
                            </a>
                        </li>
                    </ul>

                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            {!! Form::open(['method' => 'post', 'files' => 'true', 'route' => 'admin.tickets.events.save']) !!}
                                {{ csrf_field() }}
                                <div class="form-group">

                                    <input type="hidden" class="form-control" name="clientId" value="{{ $client->id }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="eventName" placeholder="Event Name" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="price" placeholder="Ticket Price" required>
                                </div>
                                <div class="form-group">
                                    <input type="date" class="form-control" name="eventDate" placeholder="Date" required>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" name="venue" placeholder="Venue" required>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" name="city" placeholder="city" required>
                                </div>

                                <div class="form-group">
                                    <input type="time" class="form-control" name="time" placeholder="time" required>
                                </div>

                                <div class="form-group">
                                    <textarea name="eventNotes" class="form-control" rows="8" placeholder="notes"></textarea>
                                </div>

                                <div class="form-group">
                                    <input type="file" class="form-control" name="artwork">
                                </div>

                                <div class="form-group">
                                    <input type="radio" name="isActive" value="0"> Inactive
                                    <input type="radio" name="isActive" value="1"> Active
                                </div>

                                <button type="submit" class="btn-md btn-success">Save Event</button>


                            </form>
                        </div>
                        <div class="col-md-2"></div>
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

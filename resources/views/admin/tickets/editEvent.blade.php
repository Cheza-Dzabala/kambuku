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
                                           <span class="panel-title"><h4>Edit Event {{ $event->eventName }}</h4>
                                               </span>
                            </a>
                        </li>
                    </ul>

                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            {!! Form::open(['method' => 'post', 'files' => 'true', 'route' => 'admin.tickets.events.update']) !!}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="clientId" value="{{ $event->clientId }}">
                                <input type="hidden" class="form-control" name="id" value="{{ $event->id }}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="eventName" value="{{ $event->eventName }}" placeholder="Event Name" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="price"  value="{{ $event->price }}" placeholder="Ticket Price" required>
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control" name="eventDate" value="{{ $event->eventDate }}" placeholder="Date" required>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="venue"  value="{{ $event->venue }}" placeholder="Venue" required>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="city" value="{{ $event->city }}" placeholder="city" required>
                            </div>

                            <div class="form-group">
                                <input type="time" class="form-control" name="time" value="{{ $event->time }}" placeholder="time" required>
                            </div>

                            <div class="form-group">
                                <textarea name="notes" class="form-control" rows="8" placeholder="notes">{{ $event->notes }}</textarea>
                            </div>

                            <div class="form-group">

                            </div>

                            <div class="form-group">
                                <input type="radio" name="isActive" value="0" @if($event->isActive == 0) checked @endif> Inactive
                                <input type="radio" name="isActive" value="1" @if($event->isActive == 1) checked @endif> Active
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

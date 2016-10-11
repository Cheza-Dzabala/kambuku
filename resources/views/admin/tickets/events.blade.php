@extends('adminMaster')
@section('css')
    <link href="{{ asset('public/admin/assets/datatables/jquery.dataTables.min.css" rel="stylesheet') }}" type="text/css" />
@endsection

@section('content')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="row">
        @foreach($events as $event)
            <div class="col-sm-6 col-lg-4">
                <div class="panel">
                    <div class="panel-body">
                        <div class="media-main">
                            <a class="pull-left" href="#">
                                <img class="thumb-lg img-circle" src="/{{ $event->artwork }}" alt="">
                            </a>
                            <div class="pull-right btn-group-sm">
                                <a href="{{ route('admin.tickets.events.edit', $event->id) }}" class="btn btn-success waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Edit">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="#" class="btn btn-danger waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Delete">
                                    <i class="fa fa-close"></i>
                                </a>
                            </div>
                            <div class="info">
                                <h4>{{ $event->eventName }}</h4>
                                <p class="text-muted">{{ $event->eventDate }} - {{ $event->time }}</p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr/>
                        <ul class="social-links list-inline">
                            {{ $event->notes }}
                        </ul>
                    </div> <!-- panel-body -->
                </div> <!-- panel -->
            </div> <!-- end col -->
        @endforeach

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

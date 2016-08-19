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
                                           <span class="panel-title">
                                               <h4>New Bad Word Filters</h4>
                                           </span>
                            </a>
                        </li>
                    </ul>


                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        <form method="POST" action="{{ route('admin.saveWords') }}">
                            {!! csrf_field() !!}

                            <div class="form-group col-md-8">
                                <label for="filter_name">Filter Name</label>&nbsp;<small>E.g: English Filter</small>
                                <input class="form-control" name="filter_name" required>
                            </div>

                            <div class="form-group col-md-8">
                                <label for="words">Words</label>&nbsp;<small>E.g: Separate Words By Commas</small>
                                <textarea class="form-control" cols="10" rows="10" name="words" required></textarea>
                            </div>

                            <div class="form-group col-md-8">
                                <input type="checkbox" name="is_active"> Active Status
                                <br/>
                                <br/>
                                <button type="submit" class="btn btn-info">Save</button>
                            </div>
                        </form>


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
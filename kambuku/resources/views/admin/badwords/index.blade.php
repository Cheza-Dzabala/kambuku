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
                                           <span class="panel-title"><h4>Bad Word Filters
                                                   <span class="caret"></span></h4>
                                               </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('admin.badwordsNew') }}">New Word Filter</a></li>
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

                                        <th>Filter Name</th>
                                        <th>Active Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($badwords as $word)
                                        <tr>

                                            <td>{{ $word['filter_name'] }}</td>
                                            <td>
                                                @if($word['is_active'] == 1)
                                                    <span class="text-success">Active</span>
                                                @else
                                                    <span class="text-danger">Inactive</span>
                                                @endif

                                            </td>

                                            <td>
                                                <div>
                                                    <a href="{{ route('admin.badwordsEdit', [$word->filter_name]) }}">
                                                        Edit Word List
                                                    </a>
                                                    |
                                                      <a href="{{ url('admin/badwords/delete/'.$word->id) }}">
                                                      Delete
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
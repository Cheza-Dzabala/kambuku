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
                                           <span class="panel-title"><h4>Content Headers
                                                   <span class="caret"></span></h4>
                                               </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('admin.newContentHeader') }}">New Content Header</a></li>
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
                                        <th>Title</th>
                                        <th>Order</th>
                                        <th>Active</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($headers as $header)
                                        <tr>
                                            <td>{{ $header->title }}</td>
                                            <td>{{ $header->order }}</td>
                                            <td>{{ $header->is_active }}</td>
                                            <td>
                                                <a>
                                                    Edit
                                                </a>
                                                |
                                                <a href="{{ route('admin.pagesIndex', $header->id) }}">
                                                    Content Pages
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
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
                                           <span class="panel-title"><h4>{{ $catname->name }}
                                                   <span class="caret"></span></h4>
                                               </span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('admin.createnewsubcategory', [$catname->id]) }}">New Sub Category</a></li>
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
                                                <th>#</th>
                                                <th>Sub Category Name</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($subcats as $key => $value)
                                                <tr>
                                                    <td>{{ $value['#']+1 }}</td>
                                                    <td>{{ $value['name'] }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.editsubcategory', [$value['id']]) }}">
                                                            <i class="fa fa-pencil-square fa-lg" style="cursor: pointer; color: lightskyblue"></i>&nbsp;
                                                        </a>

                                                        <a href="{{ route('admin.deletesubcategory', [$value['id']]) }}">
                                                            <i class="fa fa-trash fa-lg" style="cursor: pointer; color: red"></i>&nbsp;
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

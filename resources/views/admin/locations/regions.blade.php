@extends('adminMaster')
@section('css')
    <link href="{{ asset('admin/assets/datatables/jquery.dataTables.min.css" rel="stylesheet') }}" type="text/css" />
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
                                           <span class="panel-title"><h4>{{ $country_name['name'] }}
                                                   <span class="caret"></span></h4>
                                               </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">New Region</a></li>
                        </ul>
                    </li>
                </ul>

            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th># <span class="pull-right"><i class="md md-sort"></i></span></th>
                                    <th>Location Name <span class="pull-right"><i class="md md-sort"></i></span></th>
                                    <th>Number of cities <span class="pull-right"><i class="md md-sort"></i></span></th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($region_array as $key => $value)
                                    <tr>
                                        <td>{{ $value['#']+1 }}</td>
                                        <td>{{ $key }}</td>
                                        <td>
                                            <div class="col-lg-2">
                                                {{ $value['cities'] }}
                                            </div>
                                            <div class="col-lg-8">
                                                <a href="{{ route('admin.GetCities', $value['id']) }}">
                                                    Manage
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <i class="fa fa-pencil-square fa-lg" style="cursor: pointer; color: lightskyblue"></i>&nbsp;
                                            <i class="fa fa-trash fa-lg" style="cursor: pointer; color: red"></i>&nbsp;
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
    <script src="{{ URL::asset('admin/assets/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/datatables/dataTables.bootstrap.js') }}"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').dataTable();
        } );
    </script>
@endsection
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
                                           <span class="panel-title"><h4>Slides
                                                   <span class="caret"></span></h4>
                                               </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('admin.newHomesliderconfig') }}">New Slide</a></li>
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
                                        <th>Slider Name</th>
                                        <th>Client</th>
                                        <th>Client Phone Number</th>
                                        <th>Header</th>
                                        <th>Active Status</th>
                                        <th>Display Order</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($slides as $slide)
                                        <tr>
                                            <td></td>
                                            <td>
                                                {{ $slide->name }}
                                            </td>
                                            <td>
                                               {{ $slide->client_name }}
                                            </td>
                                            <td>
                                              {{ $slide->client_phoneNumber }}
                                            </td>
                                            <td>
                                                {{ $slide->header }}
                                            </td>
                                            <td>
                                                {{ $slide->is_active }}
                                            </td>
                                            <td>
                                               {{ $slide->order }}
                                            </td>
                                            <td>
                                                <i class="fa fa-pencil-square fa-lg" style="cursor: pointer; color: lightskyblue"></i>&nbsp;
                                                <a href="{{ route('admin.deleteSlide', $slide->id) }}">
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
    <script src="{{ URL::asset('admin/assets/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/datatables/dataTables.bootstrap.js') }}"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').dataTable();
        } );
    </script>
@endsection
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
                                           <span class="panel-title"><h4>Adverts
                                                   <span class="caret"></span></h4>
                                               </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('admin.addNewAd') }}">New Advert</a></li>
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
                                        <th>Ad Name</th>
                                        <th>Client</th>
                                        <th>Client Phone Number</th>
                                        <th>Is Targeted</th>
                                        <th>Expiry Date</th>
                                        <th>Display Order</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($ads as $ad)
                                        <tr>
                                            <td></td>
                                            <td>
                                                {{ $ad->ad_name }}
                                            </td>
                                            <td>
                                                {{ $ad->client_name }}
                                            </td>
                                            <td>
                                                {{ $ad->client_phonenumber }}
                                            </td>
                                            <td>
                                                {{ $ad->is_targeted }}
                                            </td>
                                            <td>
                                                {{ $ad->expiry_date }}
                                            </td>
                                            <td>
                                                {{ $ad->display_order }}
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.editAd', $ad->id) }}">
                                                    Edit
                                                </a>
                                                <a>
                                                    Disable
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
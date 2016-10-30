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
                                           <span class="panel-title"><h4>Vouchers
                                                  </h4>
                                               </span>
                            </a>

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
                                        <th>Item Name</th>
                                        <th>Merchant</th>
                                        <th>Customer</th>
                                        <th>Active Status</th>
                                        <th>Reference Code</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($vouchers as $voucher)
                                            <tr>
                                                <td>{{ $voucher->listing }}</td>
                                                <td>{{ $voucher->merchant }}</td>
                                                <td>{{ $voucher->customer }}</td>
                                                <td>{{ $voucher->isActive }}</td>
                                                <td>{{ $voucher->referenceCode }}</td>
                                                <td>
                                                    <a href="{{ route('admin.vouchers.moderate', $voucher->referenceCode) }}">Moderate</a>

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
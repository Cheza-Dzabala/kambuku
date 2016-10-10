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
                                           <span class="panel-title"><h4>Create Client</h4>
                                               </span>
                            </a>
                        </li>
                    </ul>

                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <form action="{{ route('admin.tickets.clients.save') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">

                                    <input type="text" class="form-control" name="name" placeholder="Name" required>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" name="contactPerson" placeholder="Contact Person" required>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" name="contactNumber" placeholder="Contact Number" required>
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                </div>

                                <div class="form-group">
                                   <textarea name="postalAddress" class="form-control" placeholder="Postal Address" rows="8"></textarea>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" name="bankName" placeholder="Bank Name" required>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" name="bankBranch" placeholder="Bank Branch" required>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" name="accountName" placeholder="Account Name" required>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" name="accountNumber" placeholder="Account Number" required>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" name="airtelMoneyNumber" placeholder="Airtel Money Number">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" name="tnmMpambaMoneyNumber" placeholder="Mpamba Money Number">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" name="preferredPayments" placeholder="Preferred Payments" required>
                                </div>

                                <button type="submit" class="btn-md btn-success">Save Client</button>




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

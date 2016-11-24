@extends('adminMaster')
@section('css')
    <link href="{{ asset('public/admin/assets/datatables/jquery.dataTables.min.css" rel="stylesheet') }}" type="text/css" />
    <link href="{{ asset('public/admin/assets/plugins/select2/dist/css/select2.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/admin/assets/plugins/select2/dist/css/select2-bootstrap.css') }}" rel="stylesheet" type="text/css">
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

                                        <select class="select2 form-control" data-placeholder="Choose a User..." name="user_id">
                                            <option>Select User...</option>
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>

                                </div>
                                <hr>

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
    <script src="{{ URL::asset('public/admin/assets/plugins/select2/dist/js/select2.min.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').dataTable();
        } );
    </script>
@endsection

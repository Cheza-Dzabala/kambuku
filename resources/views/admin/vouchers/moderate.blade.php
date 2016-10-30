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
                                           <span class="panel-title"><h4>Moderate Voucher With Code {{ $code }}
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
                                <form action="{{ route('admin.vouchers.saveModeration')  }}" method="post">
                                    <input type="hidden" value="{{ $code }}" name="code">
                                        <div class="form-group">
                                            <input type="radio" name="isActive" value="0" @if($voucher->isActive == 0) checked @endif> Inactive
                                            <br/>
                                            <input type="radio" name="isActive" value="1" @if($voucher->isActive == 1) checked @endif> Active
                                        </div>
                                    <button type="submit" class="btn-md">
                                        Save
                                    </button>
                                </form>

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

@extends('merchantMaster')


@section('content')

     <div class="col-md-8" style="margin-left: 15%">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h6 class="panel-title">Verify Voucher</h6>
            </div>
            <div class="panel-body">
                <form action="{{ route('merchant.verify') }}" method="post">
                    <div class="form-group">
                        <input type="text" name="voucherCode" class="form-control" placeholder="Voucher code">
                    </div>
                    <div class="form-group">
                        <p>
                            <button type="submit" class="btn btn-primary btn-xlg">
                                <i class="icon-qrcode position-left"></i> Verify Voucher
                            </button>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
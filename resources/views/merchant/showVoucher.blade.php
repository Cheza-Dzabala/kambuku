@extends('merchantMaster')


@section('content')
    <!-- Invoice template -->
    <div class="panel panel-white">
        <div class="panel-heading">
            <h6 class="panel-title">Voucher Verification</h6>
            <div class="heading-elements">
                @if($listing->user_id == Auth::user()['id'])
                    <a href="{{ route('merchant.setCollected', $voucher->id) }}" class="btn btn-default btn-xs heading-btn"><i class="icon-file-check position-left"></i> Set To Collected</a>
                @endif
            </div>
        </div>

        @if($listing->user_id == Auth::user()['id'])
            <div class="panel-body no-padding-bottom">
                <div class="row">
                    <div class="col-md-6 content-group">
                        <img src="{{ asset('/images/uploads/classifieds/'.$listing->image_path) }}" class="content-group mt-10" alt="" style="width: 120px;">
                        <ul class="list-condensed list-unstyled">
                            <li>Title: {{ $listing->title }}</li>
                            <li>Description: {{ $listing->description }}</li>
                            <li>Collecton Status: @if($voucher->isCollected == 0) Not Collected @else Collected @endif</li>
                            @if($voucher->isCollected == 1)
                                <li>Collected On: {{ $voucher->collectionDate }} </li>
                            @endif
                            <li><a href="{{ route('classifieds.show', $listing->id) }}" target="_blank">View This Listing</a></li>
                        </ul>
                    </div>

                    <div class="col-md-6 content-group">
                        <div class="invoice-details">
                            <h5 class="text-uppercase text-semibold">Voucher Number {{ $voucher->referenceCode }}</h5>
                            <ul class="list-condensed list-unstyled">
                                <li>Created On: <span class="text-semibold">{{ $voucher->created_at }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-lg-9 content-group">
                        <span class="text-muted">Customer Details Details:</span>
                        <ul class="list-condensed list-unstyled">
                            <li><h5>{{ $customer->name }}</h5></li>
                            <li><span class="text-semibold">{{ $customerCity->name }}</span></li>
                            <li>{{ $customer->mobile }}</li>
                            <li>{{ $customer->email }}</li>

                        </ul>
                    </div>

                    <div class="col-md-6 col-lg-3 content-group">
                        <span class="text-muted">Finances:</span>
                        <ul class="list-condensed list-unstyled invoice-payment-details">
                            <li><h5>Total Due: <span class="text-right text-semibold">MK {{ number_format($listing->price, 2)  }}</span></h5></li>
                            <li>Original Listing Price: <span class="text-semibold">MK {{ number_format($listing->originalPrice, 2)  }}</span></li>
                            <li>Discount: <span>MK {{ number_format(($listing->originalPrice - $listing->price), 2)  }}</span></li>
                            <li>Purchase Status: <span>{{ $voucher->isActive }}</span></li>

                        </ul>
                    </div>
                </div>
            </div>
        @else
            <div class="panel-body no-padding-bottom">
                <div class="row">
                   <h2>This Voucher Is Not Associated With Your Account</h2>
                </div>
            </div>
        @endif
    </div>
    <!-- /invoice template -->

@endsection
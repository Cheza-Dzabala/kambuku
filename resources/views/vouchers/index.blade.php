@extends('master')

@section('title')
    {{ $user_details['name'] }}
@endsection

@section('middle_header')
    @include('partials.middle_header')
@endsection

@section('bottom_header')
    @include('partials.bottom_header')
@endsection


@section('content')
    <div class="container">

        <div class="row">
            <div class="col-sm-12">
                @if($empty ==  1)
                    <div class="table-responsive userad_info">
                        <table class="table table-condensed">
                            <thead>
                            <tr class="userad_menu">
                                <td><center>No Vouchers To Show</center></td>
                            </tr>
                            </thead>
                        </table>
                    </div>
                @else
                    <div class="table-responsive userad_info">
                        <table class="table table-condensed">
                            <thead>
                            <tr class="userad_menu">
                                <td class="image">Item</td>
                                <td class="description">Description</td>
                                <td class="price">Price</td>
                                <td class="price">Voucher Cost</td>
                                <td class="price">Paid Status</td>
                                <td class="price">Reference Code</td>
                            </tr>
                            </thead>
                            <tbody>
                        <span id='notification_section'>
                                @foreach($vouchers as $voucher)
                                <tr >
                                    <td class="userad_product" >
                                        <a href="{{ route('voucher.instructions') }}"><img src="{{ asset($voucher->listingImage) }}" alt="Antique Vase" height="100" width=""></a>
                                    </td>
                                    <td class="userad_description" style="padding-left: 10%; width: 40%">
                                        <h4><a href="">{{ $voucher->listingName }}</a></h4>
                                        <p
                                                style=" overflow: hidden;
                                           width: 90%;

                                                                           text-overflow: ellipsis;
                                                                           display: -webkit-box;
                                                                           -webkit-box-orient: vertical;
                                                                           -webkit-line-clamp: 1; /* number of lines to show */
                                                                           line-height: 25px;        /* fallback */
                                                                            max-height: 25px; "
                                        >{{ $voucher->description }}</p>
                                    </td>
                                    <td class="userad_price">
                                        <p>{{ number_format($voucher->price, 2) }}</p>
                                    </td>
                                    <td>
                                       <p>{{ number_format($voucher->voucherCost, 2) }}</p>
                                    </td>
                                    <td>
                                       <p>
                                           @if($voucher->isActive == '1')
                                               Paid
                                           @else
                                               Unpaid
                                           @endif
                                       </p>
                                    </td>
                                    <td>
                                        <p style="font-weight: 800">
                                            {{ $voucher->referenceCode }}
                                        </p>
                                    </td>
                                </tr>
                            @endforeach
                        </span>
                            </tbody>

                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @include('partials.footer')
@endsection
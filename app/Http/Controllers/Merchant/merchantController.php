<?php

namespace App\Http\Controllers\Merchant;

use App\cities;
use App\classifieds;
use App\Http\Controllers\Controller;
use App\User;
use App\vouchers;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class merchantController extends Controller
{
    // Retrieve Merchant Index
    public function index()
    {
        return view('merchant.index');
    }

    public function verify(Request $request)
    {
       // dd($request->referenceCode);
        $voucher = vouchers::whereVouchercode($request->voucherCode)->first();
        $listing = classifieds::whereId($voucher->listingId)->first();
        $customer = User::whereId($voucher->userId)->first();
        $customerCity = cities::whereId($customer->city_id)->first();

        return view('merchant.showVoucher', compact('voucher', 'listing', 'customer', 'customerCity'));
    }

    public function setCollected($id)
    {
        $voucher = vouchers::whereId($id)->first();
        $voucher->iSCollected = 1;
        $voucher->collectionDate = Carbon::today();
        $voucher->save();
        return redirect()->route('merchant.index');
    }

}

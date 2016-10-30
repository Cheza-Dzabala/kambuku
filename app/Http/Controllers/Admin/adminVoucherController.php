<?php

namespace App\Http\Controllers\Admin;

use App\classifieds;
use App\Http\Controllers\Controller;
use App\User;
use App\vouchers;
use Illuminate\Http\Request;

use App\Http\Requests;

class adminVoucherController extends Controller
{
    //
    public function index()
    {
        $vouchers = vouchers::get();

        foreach ($vouchers as $voucher)
        {
            $listing = classifieds::whereId($voucher->listingId)->first();
            $merchant = User::whereId($listing->user_id)->first();
            $customer = User::whereId($voucher->userId)->first();

            $voucher = array_add($voucher, 'listing', $listing->title);
            $voucher = array_add($voucher, 'merchant', $merchant->name);
            $voucher = array_add($voucher, 'customer', $customer->name);
        }

        return view('admin.vouchers.index', compact('vouchers'));
    }

    public function moderate($code)
    {
        $voucher = vouchers::whereReferencecode($code)->first();

        return view('admin.vouchers.moderate', compact('code', 'voucher'));
    }

    public function saveModeration(Request $request)
    {
        $voucher = vouchers::whereReferencecode($request->code)->first();
        $string = "";

        if($request->isActive == 1)
        {
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            for($i=0;$i<11;$i++)
            {
                $string.=substr($chars,rand(0,strlen($chars)),1);
            }
        }else{
            $string = null;
        }

        $voucher->isActive = $request->isActive;
        $voucher->voucherCode = $string;
        $voucher->save();
        return redirect()->route('admin.vouchers');
    }
}

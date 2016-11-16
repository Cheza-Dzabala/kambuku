<?php

namespace App\Http\Controllers;

use App\Classes\voucherClass;
use App\classifieds;
use App\Config;
use App\User;
use App\views;
use App\vouchers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class voucherController extends Controller
{
    //
    public function processVoucher($id)
    {
        $voucherClass = new voucherClass();
        $voucher = $voucherClass->purchaseVoucher($id);
        Session::flash('savedVoucher', 'Successfully Created Your Voucher');
        return redirect()->route('classifieds.show', $id);
    }

    public function loadVouchers()
    {
        $vouchers = vouchers::whereUserid(Auth::user()['id'])->get();
        $image_dir = Config::whereName('image_dir')->first();

        if ($vouchers != null)
        {
            foreach ($vouchers as $voucher)
            {
                $listing = classifieds::whereId($voucher->listingId)->first();
                $voucher = array_add($voucher, 'listingName', $listing->title);
                $voucher = array_add($voucher, 'listingImage', $image_dir->value.$listing->image_path);
                $voucher = array_add($voucher, 'price', $listing->price);
                $voucher = array_add($voucher, 'description', $listing->description);
            }
            $empty = 0;
        }else{
            $empty = 1;
        }


        return view('vouchers.index', compact('vouchers', 'empty'));
    }

    public function instructions()
    {
        return view('vouchers.instructions');
    }
}

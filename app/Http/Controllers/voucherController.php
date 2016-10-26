<?php

namespace App\Http\Controllers;

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
        $userId = Auth::user()['id'];
        $listing = classifieds::whereId($id)->first();
        $lister = User::whereId($listing->user_id)->first();
        $string = "";

        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

        for($i=0;$i<5;$i++)
        {
            $string.=substr($chars,rand(0,strlen($chars)),1);
        }

        $referenceCode = $userId.$string.$lister->id ;

        vouchers::create([
            'userId' => $userId,
            'listingId' => $listing->id,
            'voucherCost' => $listing->voucherPrice,
            'referenceCode' => $referenceCode
        ]);

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

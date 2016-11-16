<?php
/**
 * Created by PhpStorm.
 * User: cheza
 * Date: 11/16/16
 * Time: 10:06 AM
 */

namespace App\Classes;


use App\classifieds;
use App\User;
use App\vouchers;
use Illuminate\Support\Facades\Auth;

class voucherClass
{
    public function purchaseVoucher($id)
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

        $newVoucher = vouchers::create([
            'userId' => $userId,
            'listingId' => $listing->id,
            'voucherCost' => $listing->voucherPrice,
            'referenceCode' => $referenceCode
        ]);

        return $newVoucher;
    }

}
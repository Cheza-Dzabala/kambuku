<?php

namespace App\Http\Controllers\App;

use App\Classes\voucherClass;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use Tymon\JWTAuth\Facades\JWTAuth;

class appVouchers extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('appAuthenticate');
    }

    public function buyVoucher($id)
    {
        $newToken = $this->generateToken();
        $voucherClass = new voucherClass();
        $voucher = $voucherClass->purchaseVoucher($id);
        $referenceCode = $voucher->referenceCode;
        return response(compact('referenceCode'))
            ->header('token', $newToken);
    }

    private function generateToken()
    {
        $newToken = JWTAuth::getToken();
        $token = JWTAuth::refresh($newToken);
        return $token;
    }

}

<?php

namespace App\Http\Controllers\App;

use App\classifieds;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AppdashBoardController extends Controller
{
    //
    public function index()
    {
        $listings = classifieds::orderBy('id', 'DESC')->whereIs_active('1')->take(20)->get()->toJson();

        return $listings;

    }

    public function userDetails($id)
    {
        $listing = classifieds::whereId($id)->first();
        $userDetails = User::whereId($listing->user_id)->first();
        return $userDetails->toJson();
    }



}

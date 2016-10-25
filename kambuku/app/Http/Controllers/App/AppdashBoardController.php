<?php

namespace App\Http\Controllers\App;

use App\classifieds;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AppdashBoardController extends Controller
{
    //
    public function index()
    {
        $listings = classifieds::orderBy('id', 'DESC')->whereIs_active('1')->take(10)->get()->toArray();

        return $listings;

    }
}

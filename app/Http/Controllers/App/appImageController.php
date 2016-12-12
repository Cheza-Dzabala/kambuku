<?php

namespace App\Http\Controllers\App;

use App\appDependancies;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;

class appImageController extends Controller
{
    //
    public function index()
    {
        $image = appDependancies::select('image_path')->whereName('appImage')->first();
        return $image;
    }
}

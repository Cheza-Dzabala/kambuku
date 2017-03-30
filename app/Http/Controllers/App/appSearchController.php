<?php

namespace App\Http\Controllers\App;

use App\classifieds;
use Illuminate\Http\Request;

use App\Http\Requests;

class appSearchController extends Controller
{
    //

    public function search($searchTerm)
    {
        $results = classifieds::where('title', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('description', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('keywords', 'LIKE', '%' . $searchTerm . '%')
            ->get();

        return $results->toJson();
    }
}

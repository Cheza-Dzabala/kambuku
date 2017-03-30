<?php

namespace App\Http\Controllers\App;

use App\classifieds;
use App\Config;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;

class appSearchController extends Controller
{
    //

    public function search($searchTerm)
    {
        $config = Config::whereName('image_dir')->first();

        $results = classifieds::where('title', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('description', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('keywords', 'LIKE', '%' . $searchTerm . '%')
            ->get();


        foreach ($results as $result)
        {
            $result->image_path = $config->value.$result->image_path;
        }

        return $results->toJson();
    }
}

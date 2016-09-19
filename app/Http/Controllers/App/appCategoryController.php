<?php

namespace App\Http\Controllers\App;

use App\categories;
use App\classifieds;
use App\Http\Controllers\Controller;
use App\sub_categories;
use Illuminate\Http\Request;

use App\Http\Requests;

class appCategoryController extends Controller
{
    //

    public function index()
    {
        $categories = categories::get()->toJson();

        return strip_tags($categories);
    }

    public function subCategories($id)
    {
        $subcategories = sub_categories::whereCategory_id($id)->get()->toJson();

        return strip_tags($subcategories);
    }

    public function categoryListings($id)
    {
        $listings = classifieds::whereCategory_id($id)->get()->toJson();

        return $listings;
    }

    public function subcategoryListings($id)
    {
        $listings = classifieds::whereSub_category_id($id)->get()->toJson();

        return $listings;
    }


}
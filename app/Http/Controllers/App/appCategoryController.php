<?php

namespace App\Http\Controllers\App;

use App\categories;
use App\Classes\listingsClass;
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
        $categories = categories::get(['id', 'name'])->toJson();

        return strip_tags($categories);
    }




    public function subCategories($id)
    {
        $subcategories = sub_categories::whereCategory_id($id)->get(['id', 'name']);

        foreach ($subcategories as $subcategory)
        {
            $classified_count = classifieds::whereSub_category_id($subcategory->id)->count();
            $subcategory = array_add($subcategory, 'sub_category_count', $classified_count);
        }

        return strip_tags($subcategories->toJson());
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

    public function pullDateTime($dateTime)
    {
        $class = new listingsClass();
        $dateTimePull = $class->pullDateTime($dateTime);
        $classifieds = json_encode(array('recent_listing' => $dateTimePull));
        return $classifieds;
    }


}

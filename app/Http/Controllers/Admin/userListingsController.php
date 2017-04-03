<?php

namespace App\Http\Controllers\Admin;

use App\categories;
use App\classified_images;
use App\classifieds;
use App\sub_categories;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class userListingsController extends Controller
{
    //


    public function index()
    {
        $listings = classifieds::get();

       // dd($listings);

        $classifieds = [];

        foreach ($listings as $key => $value)
        {
            $user = User::whereId($value['user_id'])->first();

           // dd($user);

            $value = array_add($value, 'userName', $user->name);

            $value = array_add($value, 'userEmail', $user->email);

        }

     //   dd($listings);
        return view('admin.listings.index', compact('listings'));
    }

    public function showlisting($id)
    {
        $listing = classifieds::whereId($id)->first();

        $user = User::whereid($listing->user_id)->first();

        $category = categories::whereId($listing->category_id)->first();

        $subcategory = sub_categories::whereId($listing->sub_category_id)->first();

        $categories = categories::get();

        $subcategories = sub_categories::whereCategory_id($listing->category_id)->get();

        $images = classified_images::whereClassified_id($listing->id)->get();



        //dd($listing);

        return view('admin.listings.show', compact('listing', 'user', 'category', 'subcategory', 'categories', 'subcategories', 'images'));
    }

    public function update(Request $request)
    {
     //   dd($request);

        $listing = classifieds::whereId($request->id)->first();

        if(isset($request->is_active))
        {
            $active = 1;
        }else{
            $active = 0;
        }

        if (isset($request->is_featured))
        {
            $featured = 1;
        }else{
            $featured = 0;
        }

        if (isset($request->is_deal))
        {
            $deal = 1;
        }else{
            $deal = 0;
        }

        $listing->title = $request->title;
        $listing->description = $request->description;
        $listing->category_id = $request->category_id;
        $listing->sub_category_id = $request->sub_category_id;
        $listing->is_active = $active;
        $listing->is_featured = $featured;
        $listing->is_deal = $deal;

        $listing->save();

        return redirect()->back();

    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\adTypes;
use App\categories;
use App\pageAds;
use App\paidAdPages;
use App\paidAdverts;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class AdvertEngineController extends Controller
{
    //

    public function index()
    {
        $ads = paidAdverts::get();

        return view('admin.revenue.adverts.index', compact('ads'));
    }

    public function newAd()
    {
        $adPages = paidAdPages::get();
        $adTypes = adTypes::get();
        $categories = categories::get();
        return view('admin.revenue.adverts.new', compact('adPages', 'adTypes', 'categories'));
    }

    public function save(Request $request)
    {
       // dd($request);

        $adDirectory = Config::whereName('advert_dir')->first();

        //Save Advert Data
        $advert = $this->create_new_advert($request);

        //Process Advert Image
        if (isset($request->image_path))
        {
            $type = adTypes::whereId($request->ad_type)->first();

            $width = $type->width_px;
            $height = $type->height_px;

            $image = $request->image_path;
            $img = Image::make($image);
            $img->resize($width, $height);
            $filename = $request->client_name.$image->getClientOriginalName();
            $fullpath = $adDirectory->value.$filename;
            $img->save($fullpath);

            //Add To Database
            $advert->images_path = $fullpath;
            $advert->save();

        }else{
            $advert->delete();
            Session::flash('error', 'No Advert Image Was Uploaded');
            return Redirect::back();
        }

        //Log Which Pages This Advert Is Active On

        $pages = paidAdPages::get();

        foreach ($pages as $page)
        {
            $pageName = $page->page_name;
            if(isset($request->$pageName)){
                $adPage = new pageAds();
                $adPage->page_name = $pageName;
                $adPage->advert_id = $advert->id;
                $adPage->is_active = $request->is_active;
                $adPage->save();
            };
        }

        return redirect(route('admin.adverts_config'));

    }

    /**
     * @param Request $request
     * @return paidAdverts
     */
    private function create_new_advert(Request $request)
    {
        $advert = new paidAdverts();

        $advert->client_name = $request->client_name;
        $advert->client_phoneNumber = $request->client_phoneNumber;

        if (isset($request->client_phonenumber2)) {
            $advert->client_phonenumber2 = $request->client_phonenumber2;
        }

        $advert->client_address = $request->client_address;
        $advert->ad_name = $request->ad_name;
        $advert->ad_type = $request->ad_type;
        $advert->is_targeted = $request->is_targeted;
        $advert->min_age = $request->min_age;
        $advert->max_age = $request->max_age;
        if (isset($request->is_categoried)){
            $advert->category_id = $request->category_id;
            $advert->sub_category_id = $request->sub_category_id;
        }else{
            $advert->category_id = null;
            $advert->sub_category_id = null;
        }
        $advert->expiry_date = Carbon::parse($request->expiry_date);
        $advert->display_order = $request->display_order;

        $advert->save();
        return $advert;
    }

    public function edit($id)
    {
        $ad = paidAdverts::whereId($id)->first();

        $adPages = paidAdPages::get();
        $adTypes = adTypes::get();
        $categories = categories::get();

        return view('admin.revenue.adverts.edit', compact('adPages', 'adTypes', 'categories', 'ad'));
    }


}

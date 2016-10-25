<?php

namespace App\Http\Controllers\Api;

use App\classified_images;
use App\classifieds;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AccountFunctionsApiController extends Controller
{
    //

    public function __construct()
    {

    }

    public function deactivate($id)
    {
        $listing = classifieds::whereId($id)->first();

        $listing->is_active = '0';

        $listing->save();
    }

    public function activate($id)
    {
        $listing = classifieds::whereId($id)->first();

        $listing->is_active = '1';

        $listing->save();
    }

    public function delete($id)
    {
        $thumbnails = classified_images::whereClassified_id($id)->get()->toArray();

       // dd($thumbnails);

        if($thumbnails != [])
        {
            foreach ($thumbnails as $thumb)
            {
                $target = classified_images::whereId($thumb['id'])->first();
                $target->delete();
            }
        }

        $listing = classifieds::whereId($id)->first();

        $listing->delete();

        return redirect(route('profile'));

    }


}

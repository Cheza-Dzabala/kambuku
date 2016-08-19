<?php

namespace App\Http\Controllers\Admin;

use App\Config;
use App\homeSliders;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
class HomeSliderController extends Controller
{
    //
    /**
     * @var homeSliders
     */
    private $homeSliders;

    /**
     * HomeSliderController constructor.
     * @param homeSliders $homeSliders
     */
    public function __construct(homeSliders $homeSliders)
    {

        $this->homeSliders = $homeSliders;
    }

    public function index()
    {
        $slides = homeSliders::get();
        return view('admin.revenue.sliders.index', compact('slides'));
    }

    public function newSlide()
    {
        return view('admin.revenue.sliders.new');
    }

    public function save(Request $request)
    {
        $slider = new homeSliders();

        $slider->client_name = $request->client_name;
        $slider->client_phoneNumber = $request->client_phoneNumber;
        $slider->name = $request->name;
        $slider->header = $request->header;
        $slider->sub_header = $request->sub_header;
        $slider->description = $request->description;
        $slider->web_link = $request->web_link;
        $slider->facebook_link = $request->facebook_link;
        $slider->twitter_link = $request->twitter_link;
        $slider->is_active = $request->is_active;
        $slider->order = $request->order;

        $slider->save();



        if (isset($request->image_path))
        {
          $file = $request->image_path;
            $rules = array('file' => 'required|mimes:jpeg,jpg,png|max:2000');
            $validator = validator(array('file' => $file), $rules);
            if ($validator->passes()) {
                $img = Image::make($file);
                $filename = $file->getClientOriginalName();
                $this->compile($img, $filename, $request->client, $slider->id);
            }
        }
        //dd($request);

        return ('done');
    }

    private function compile($img, $filename, $client, $sliderId)
    {
        $img->resize(500, 500);
        $image_path = Config::whereName('slider_dir')->first();
        $fullpath = $image_path->value;

        $dir = $fullpath.$filename;
        //dd($dir);
        $img->save($dir);

        DB::table('home_sliders')
                ->whereId($sliderId)
                ->update(['image_path' => $dir]);
    }
}

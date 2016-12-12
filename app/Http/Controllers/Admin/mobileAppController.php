<?php

namespace App\Http\Controllers\Admin;

use App\appDependancies;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use File;
use Illuminate\Http\Request;

use App\Http\Requests;

class mobileAppController extends Controller
{
    //
    public function index()
    {
        return view('admin.app.index');
    }

    public function imageIndex()
    {
        $currentImage = appDependancies::whereName('appImage')->first();
        return view('admin.app.image', compact('currentImage'));
    }

    public function saveImage(Request $request)
    {
        if (isset($request->image))
        {
            $img = Image::make($request->image);
            $filename =  str_random(10). '.'.$request->image->getClientOriginalExtension();
            $dir = 'uploads/app/images/';
            if(!file_exists($dir)) File::makeDirectory($dir, 0777, true);
            $img->resize(960, 640);
            $savePath = $dir.$filename;
            $img->save($savePath);
            $dep = appDependancies::whereName('appImage')->first();
            if ($dep == null)
            {
                $image = new appDependancies();
                $image->name = 'appImage';
                $image->image_path = $savePath;
                $image->save();
            }else{
                if (file_exists($dep->image_path))
                {
                    unlink($dep->image_path);
                }
                $dep->image_path = $savePath;
                $dep->save();
            }
        }
        return redirect()->route('admin.app.index');
    }
}

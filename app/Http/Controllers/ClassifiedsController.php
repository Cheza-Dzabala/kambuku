<?php

namespace App\Http\Controllers;

use App\categories;
use App\cities;
use App\classified_images;
use App\ClassifiedThumbnails;
use App\Config;
use App\Events\TestEvent;
use App\sub_categories;
use App\thumbnails;
use App\vouchers;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\classifieds;
use App\condition_types;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Event;
use App\Events\classified_view;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;


class ClassifiedsController extends Controller
{
    /**
     * @var classifieds
     */
    private $classifieds;
    /**
     * @var User
     */
    private $user;
    /**
     * @var condition_types
     */
    private $condition_types;
    /**
     * @var views
     */
    private $views;
    /**
     * @var classified_images
     */
    private $classified_images;
    /**
     * @var ClassifiedThumbnails
     */
    private $classifiedThumbnails;

    /**
     * Display a listing of the resource.
     *
     * @param classifieds $classifieds
     * @param User $user
     * @param condition_types $condition_types
     * @param classified_images $classified_images
     * @param ClassifiedThumbnails $classifiedThumbnails
     */

    public function __construct(classifieds $classifieds, User $user,
                                condition_types $condition_types, classified_images $classified_images,
                                ClassifiedThumbnails $classifiedThumbnails)
    {
        $this->middleware('auth', ['except' => ['show']]);
        $this->middleware('checkListingAbility', ['only' => ['create']]);
        $this->classifieds = $classifieds;
        $this->user = $user;
        $this->condition_types = $condition_types;
        $this->classified_images = $classified_images;
        $this->classifiedThumbnails = $classifiedThumbnails;
    }

    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $condition = $this->condition_types->get()->toArray();
        return view('classifieds.create', compact('condition'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\ClassifiedListingValidator $request)
    {
  // dd($request);



        $user = Auth::user()['id'];

        $classifieds = $this->create_classified($request, $user);
           if($classifieds == 'invalidDiscount')
           {
               Session::flash('invalidDiscount', 'The Price Must be less than the original price');
               return redirect()->back();
           }else{
               $classified_id = $classifieds->id;
               $request->request->add(['classified_id' => $classified_id]);

               $counter = 0;

               $check = '';

               while($counter <= 5)
               {
                   if (isset($request['file'.$counter])){
                       $check = 'checked';
                   }
                   $counter++;
               }


               if ($check == '')
               {


                   $listing = classifieds::whereId($request->classified_id)->first();

                   $listing->image_path = 'placeholder.jpg';

                   $listing->save();
                   Session::flash('savedListing', 'Successfully Saved Your Listing');
                   return redirect(route('profile'));
               }else{
                   return $this->process_images($request);
               }

           }



        //dd($request->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        list($classified_details, $condition, $user_info) = $this->compile($id);
        $paid = null;
        $location = cities::whereId($user_info->city_id)->first();
        $created = new Carbon($classified_details->created_at);
        $now = Carbon::now();
        $difference = ($created->diff($now)->days <1) ? 'Today' : $created->diffForHumans($now);

        $vouchers = vouchers::whereUserid(Auth::user()['id'])
            ->whereListingid($id)->first();

        if($vouchers != null)
        {
            $hasVoucher = '1';
            if($vouchers->isActive == '1')
            {
                $paid = '1';
            }
        }else{
            $hasVoucher = '0';
        }




        return $this->check_for_thumbnails($classified_details, $user_info, $condition, $location, $difference, $hasVoucher, $paid);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $classified = classifieds::whereId($id)->first();



        if ($classified->have_image == '1')
        {
            $classified_images = classified_images::whereClassified_id($id)->get();
            $classified_images_count = classified_images::whereClassified_id($id)->count();
        }else{
            $classified_images = null;
            $classified_images_count = 0;
        }

        $category = categories::whereId($classified->category_id)->first();
        $sub_category = sub_categories::whereId($classified->sub_category_id)->first();



        $listed_condition = $this->get_condition($id);

        $conditions = condition_types::get();

       // dd($conditions);


        return view('classifieds.edit', compact('classified', 'classified_images',
                                                'listed_condition', 'conditions',
                                                'category', 'sub_category', 'classified_images_count'
                                                )
                    );


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    //    dd($id);
        //dd($request);
       // dd(\Request::Input());
       $classified = classifieds::whereId($id)->first();

        $discounted = $classified->discounted;

       $image_path = Config::whereName('image_dir')->first();

       $thumb_image_path = Config::whereName('thumbnail_image_dir')->first();
        $check = 'nothing';
       $i = 0;
       while ($i <= 5)
       {
           if (isset($request['check_box_images_'.$i]))
           {
             $target =   $request['check_box_images_'.$i];

             $image = classified_images::whereFilename($target)->first();

               if ($image != null){
                   $filename = $image->filename;

                   //   dd($image_path->value.$filename);
                   unlink($image_path->value.$filename);
                   $image->delete();
               }


               $thumbnail = thumbnails::whereFilename($target)->first();

               if($thumbnail != null)
               {
                   $filename = $thumbnail->filename;
                   unlink($thumb_image_path->value.$filename);
                   $thumbnail->delete();
               }

           }
           $i ++;
           if (isset($request['file'.$i]))
           {
                $check = 'has';
           }
       }

        if ($check == 'has')
        {
            $request->request->add(['classified_id' => $id]);
            $this->process_images($request);
        }

        if (isset($request['price']) && isset($request['originalPrice']))
        {
            if ($request['price'] >= $request['originalPrice'])
            {
               dd('invalid discount');
            }else{
                $discounted = '1';
                $discount = $request['originalPrice'] - $request['price'];

                if($discount >= 100000)
                {
                    $voucherPrice = $discount * 0.1;
                }else{
                    $voucherPrice = $discount * 0.2;
                }

                //dd('Voucher Price is '.number_format($voucherPrice, 2).'and The Discount is '.number_format($discount, 2));
            }
        }


       $classified->title = $request['name'];
       $classified->price = $request['price'];
       $classified->originalPrice = $request['originalPrice'];
       $classified->description = $request['description'];
       $classified->category_id = $request['category'];
       $classified->discounted = $discounted;
       $classified->voucherPrice = $voucherPrice;
       $classified->sub_category_id = $request['subcategory'];
       $classified->is_active = $request['is_active'];
       $classified->keywords = $request['tags'];
       $classified->condition = $request['condition'];
        $classified->save();

        Session::flash('EditedListing', 'Successfully Edited Your Listing');
        return redirect()->route('edit.product', [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    private function get_classified($id)
    {
        $classified = $this->classifieds->whereId($id)->first();

      //  dd($classified);
        return $classified;
    }

    private function get_user_info($user)
    {
        $user = $this->user->whereId($user)->first();
        return $user;
    }

    private function get_condition($class_id){
        $condition = $this->condition_types->whereId($class_id)->first();

        return $condition;


    }


    private function add_to_views($classified){

    }

    /**
     * @param $files
     * @param $name
     * @param $classified_id
     * @return string
     */
    private function make_images($files, $name, $classified_id, $request)
    {
        $user = Auth::user()['id'];
        $marker = 0;
        $watermark_dir = base_path().'/public/'.'images/watermark/watermark.png';
       // dd($watermark_dir);
        foreach ($files as $file) {
            if (!empty($file)) {
                $rules = array('file' => 'required|mimes:jpeg,jpg,png');
                $validator = validator(array('file' => $file), $rules);
                if ($validator->passes()){
                    $img = Image::make($file);
                    $watermark = Image::make($watermark_dir);
                    $img->insert($watermark, 'bottom-right', 10,10);
                    $filename = $user.time() . str_random(10). '.' .$file->getClientOriginalExtension();
                    $this->make_main_image($img, $filename, $classified_id, $marker);
                    $marker++;
                    $this->make_thumbnail($img, $filename, $classified_id);
                    //           $destinationPath = 'images/uploads/demo';
                }else{
                    $listing = classifieds::whereId($request->classified_id)->first();

                    $listing->delete();

                    Session::flash('listing_failed', 'Failed To List Your Classified');
                    return redirect()->back();
                }
            }

        }
        Session::flash('savedListing', 'Successfully Saved Your Listing');
        return redirect(route('profile'));
    }

    /**
     * @param $img
     * @param $filename
     * @param $classified_id
     * @param $marker
     */
    private function make_main_image($img, $filename, $classified_id, $marker)
    {
//Make main image
        $img_path = Config::whereName('image_dir')->first();

        $img->resize(500, 500);
        

        $dir = $img_path->value.$filename;
        $img->save($dir, 50);

        if ($marker == 0)
        {
            DB::table('classifieds')
                ->where('id', $classified_id)
                ->update(['image_path' => $filename]);
        }

        if ($marker == 1)
        {
            DB::table('classifieds')
                ->where('id', $classified_id)
                ->update(['have_image' => 1]);
        }

        DB::table('classified_images')->insert([
            'classified_id' => $classified_id, 'filename' => $filename
        ]);


    }

    /**
     * @param $img
     * @param $filename
     * @param $classified_id
     */
    private function make_thumbnail($img, $filename, $classified_id)
    {
//make thumbnail
        $img_path = Config::whereName('thumbnail_image_dir')->first();

        $dir = $img_path->value . $filename;

        $img->resize(50, 50);
        $img->save($dir);
        DB::table('classified_thumbnails')->insert([
           'classified_id' => $classified_id, 'filename' => $filename
        ]);
    }

    /**
     * @param Request $request
     * @return array
     */
    private function check_images(Request $request)
    {
        $files = [];
        if ($request->file('file1')) $files[] = $request->file('file1');
        if ($request->file('file2')) $files[] = $request->file('file2');
        if ($request->file('file3')) $files[] = $request->file('file3');
        if ($request->file('file4')) $files[] = $request->file('file4');
        if ($request->file('file5')) $files[] = $request->file('file5');
        return $files;
    }

    /**
     * @param $id
     * @return mixed
     */
    private function get_details($id)
    {
        $classified_details = $this->get_classified($id);
        return $classified_details;
    }

    /**
     * @param $classified_details
     * @return array
     */
    private function get_user_condition($classified_details)
    {
        $user = $classified_details['user_id'];

        $condition = $this->get_condition($classified_details['condition']);
        return array($user, $condition);
    }

    /**
     * @param $classified_details
     */
    private function fire_event($classified_details)
    {
        Event::fire(new classified_view($classified_details)); //Fire Event To Add To New Page View Counter
    }

    /**
     * @param $id
     * @return array
     */
    private function compile($id)
    {
        $classified_details = $this->get_details($id);

        list($user, $condition) = $this->get_user_condition($classified_details);

        $this->fire_event($classified_details);

        $user_info = $this->get_user_info($user);


        return array($classified_details, $condition, $user_info);
    }

    /**
     * @param Requests\ClassifiedListingValidator $request
     * @param $classified_id
     * @return string
     */
    private function process_images(Request $request)
    {
        $name = $request->name;
        $files = $this->check_images($request);
        $classified_id = $request['classified_id'];
        return $this->make_images($files, $name, $classified_id, $request);
    }

    /**
     * @param Request $request
     * @param $user
     * @return static
     */
    private function create_classified(Request $request, $user)
    {
        if (isset($request['price']) && isset($request['originalPrice']))
        {
            if ($request['price'] >= $request['originalPrice'])
            {
                return 'invalidDiscount';
            }else{
                $discounted = '1';
                $discount = $request['originalPrice'] - $request['price'];

                if($discount >= 100000)
                {
                    $voucherPrice = $discount * 0.1;
                }else{
                    $voucherPrice = $discount * 0.2;
                }

                //dd('Voucher Price is '.number_format($voucherPrice, 2).'and The Discount is '.number_format($discount, 2));
            }
        }

        $classifieds = classifieds::create([
            'user_id' => $user,
            'title' => $request['name'],
            'condition' => $request['condition'],
            'category_id' => $request['category'],
            'price' => $request['price'],
            'sub_category_id' => $request['subcategory'],
            'description' => $request['description'],
            'keywords' => $request['tags'],
            'originalPrice' => $request['originalPrice'],
            'discounted' => $discounted,
            'voucherPrice' => $voucherPrice,
            'is_active' => $request['is_active'],
            'city_id' => '4',
            'country_id' => '4',
            'state_id' => '74'
        ]);
        return $classifieds;
    }

    /**
     * @param $classified_details
     * @param $user_info
     * @param $condition
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    private function check_for_thumbnails($classified_details, $user_info, $condition, $location, $difference, $hasVoucher, $paid)
    {
        if ($classified_details['have_image'] == 1) {
            $thumbnails = $this->classifiedThumbnails->whereClassified_id($classified_details['id'])->get()->toArray();
            $images =  $this->classified_images->whereClassified_id($classified_details['id'])->get()->toArray();
            return view('classifieds.show', compact('user_info', 'classified_details', 'condition', 'thumbnails', 'images', 'location', 'difference', 'hasVoucher', 'paid'));
        } else {
            return view('classifieds.show', compact('user_info', 'classified_details', 'condition', 'location', 'difference', 'hasVoucher', 'paid'));
        }
    }
    /**
     * @param $user
     * @return mixed
     */

}

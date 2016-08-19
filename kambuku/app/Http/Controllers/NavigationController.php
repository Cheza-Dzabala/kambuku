<?php

namespace App\Http\Controllers;

use App\classified_images;
use App\classifieds;
use App\Config;
use App\countries;
use App\sub_categories;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\categories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class NavigationController extends Controller
{
    //
    /**
     * @var categories
     */
    private $categories;
    /**
     * @var sub_categories
     */
    private $sub_categories;
    /**
     * @var classifieds
     */
    private $classifieds;
    /**
     * @var classified_images
     */
    private $classified_images;
    /**
     * @var countries
     */
    private $countries;
    /**
     * @var User
     */
    private $user;

    /**
     * NavigationController constructor.
     * @param categories $categories
     * @param sub_categories $sub_categories
     * @param classifieds $classifieds
     * @param classified_images $classified_images
     * @param countries $countries
     * @param User $user
     */
    public function __construct(categories $categories, sub_categories $sub_categories,
                                classifieds $classifieds, classified_images $classified_images,
                                countries $countries, user $user)
    {

        $this->categories = $categories;
        $this->sub_categories = $sub_categories;
        $this->classifieds = $classifieds;
        $this->classified_images = $classified_images;
        $this->countries = $countries;
        $this->user = $user;


    }

    public function login()
    {
        if (Auth::check())
        {
            return Redirect::back();
        }else{
            return view('auth.login');
        }

    }

    public function register()
    {
        if (Auth::check())
        {
            return Redirect::back();
        }else{
            return view('auth.register');
        }

    }

    public function landing()
    {


       $classifieds = $this->get_products();

       $latest = $this->latest();

        $countries = $this->load_countries();

       $tabs = $this->get_tabbed_categories();




      //  dd($classifieds);
       return view('landing', compact('categories', 'classifieds', 'tabs', 'countries', 'latest'));
    }


    public function messaging()
    {
        return view('messaging.chat');
    }

    /**
     * @return array of categories and sub categories
     */


    /**
     * @return Array of products
     */


    private function get_products()
    {
        $classified_details = $this->classifieds->orderBy('id', 'DESC')->take(9)->where('is_active', '=', '1')->where('is_featured', '=', '1')->get();
        return $classified_details->toArray();
    }

    private function get_tabbed_categories()
    {
        $categories = array();
        $maincat = $this->categories
                    ->where('is_tabbed', '=', '1')
                    ->get();
        foreach ($maincat as $key => $value)
        {
            $class = $this->classifieds->take(6)->orderBy('id', 'DESC')
                        ->where('category_id', '=', $value['id'])
                        ->where('is_active', '=', '1')
                        ->get();
            if (count($class)){
                $categories = array_add($categories, $value['name'], $class->toArray());
            }

        }
        return $categories;

    }

    private function load_countries()
    {
        $counties = $this->countries->where('id', '!=', '1')->get();

        return $counties->toArray();
    }


    public function users()
    {
        $users = $this->user->get();

        dd($users->toArray());
    }

    public function test(){
        return view('test');
    }

    private function latest()
    {
        $latest = $this->classifieds->orderBy('id', 'DESC')->take(6)->where('is_active', '=', '1')->get()->toArray();

        return $latest;
    }


}

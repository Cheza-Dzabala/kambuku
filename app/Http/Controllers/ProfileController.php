<?php

namespace App\Http\Controllers;

use App\cities;
use App\classifieds;
use App\countries;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    //
    /**
     * @var User
     */
    private $user;
    /**
     * @var countries
     */
    private $countries;
    /**
     * @var classifieds
     */
    private $classifieds;

    /**
     * ProfileController constructor.
     * @param User $user
     * @param countries $countries
     * @param classifieds $classifieds
     */
    public function __construct(User $user, countries $countries, classifieds $classifieds)
    {
        //Construct User Details
        $this->middleware('auth');
        $this->countries = $countries;
        $this->user = $user;
        $this->classifieds = $classifieds;
    }

    public function index(Request $request)
    {
        $user_id = Auth::user()['id'];
        $listings = classifieds::orderBy('id', 'DESC')->whereUser_id($user_id)->get()->toArray();
        $listings_count = classifieds::whereUser_id($user_id)->count();

        $items = collect($listings);

        if (isset($request['page']))
        {
            $page = $request['page'];
        }else{
            $page = 1;
        }

        if (isset($request['perPage']))
        {
            $perPage = $request['perPage'];
        }else{
            $perPage = 5;
        }

        $listingsArray = new LengthAwarePaginator(
            $items->forPage($page, $perPage), $items->count(), $perPage, $page
        );
        $listingsArray->setPath('/profile');
        // dd($request);

        // dd($listings);
        if ($listings_count == 0) {
            return view('profile.show')->with('empty', true);
        }else{
            return view('profile.show')->with(['listings' => $listingsArray, 'perPage' => $perPage]);
        }

    }

    public function edit()
    {
        $countries = countries::orderBy('id', 'ASC')->get();
        $cities = cities::orderBy('id', 'ASC')->get();
        return view('profile.edit', compact('countries', 'cities'));
    }

    public function save(Request $request)
    {
        $id = Auth::user()['id'];

        $user = User::whereId($id)->first();

        $user->name = $request->name;
        $user->date_of_birth = Carbon::parse($request->date_of_birth);
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->city_id = $request->city_id;
        $user->facebook_page = $request->facebook_page;
        $user->website = $request->website;
        $user->twitter_handle = $request->twitter_handle;
        $user->skype_id = $request->skype_id;
        $user->gender = $request->gender;

        $user->save();

        Session::flash('savedProfile', 'Successfully Saved Your Profile');

        return redirect(route('profile.edit'));


    }
}

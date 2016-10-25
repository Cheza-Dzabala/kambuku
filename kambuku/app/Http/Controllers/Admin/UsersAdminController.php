<?php

namespace App\Http\Controllers\Admin;

use App\classifieds;
use App\Http\Controllers\ClassifiedsController;
use App\User;
use App\userType;
use Illuminate\Http\Request;
use App\Online;
use App\permission_types;
use App\permissions;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersAdminController extends Controller
{
    //
    /**
     * @var User
     */
    private $user;
    /**
     * @var ClassifiedsController
     */
    private $classifieds;

    /**
     * UsersAdminController constructor.
     * @param User $user
     * @param ClassifiedsController $classifieds
     */
    public function __construct(User $user, ClassifiedsController $classifieds)
    {
        $this->middleware('admin');
        $this->user = $user;
        $this->classifieds = $classifieds;
    }

    public function index()
    {
        $users = User::whereUser_type_id('2')->get();

        foreach ($users as $key => $value)
        {
            $listings = classifieds::whereUser_id($value['id'])->count();

            $users[$key]->setAttribute('listings', $listings);
        }
      //  dd($users);


        return view('admin.users.show', compact('users'));
    }


    public function GetClassifieds($id)
    {
        $username = User::whereId($id)->get()->first();

        $classifieds = classifieds::whereUser_id($id)->get();

       // dd($classifieds);

        return view('admin.users.userlistings', compact('classifieds', 'username'));
    }

    public function ModerateUsers($id)
    {

        $user = User::whereId($id)->get()->first();




      //  dd($user_details);

        return view('admin.users.moderate', compact('user'));
    }


    public function getAdminUsers()
    {
        $users = User::whereUser_type_id('4')->get();

        foreach ($users as $key => $value)
        {
            $listings = classifieds::whereUser_id($value['id'])->count();

            $users[$key]->setAttribute('listings', $listings);
        }
        //  dd($users);


        return view('admin.users.showAdmins', compact('users'));
    }

    public function saveModeration(Request $request)
    {
       // dd($request);

        $user = User::whereId($request->id)->first();

        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->date_of_birth = $request->date_of_birth;
        $user->facebook_page = $request->facebook_page;
        $user->twitter_handle = $request->twitter_handle;
        $user->skype_id = $request->skype_id;
        $user->website = $request->website;
        $user->is_active = $request->is_active;
        $user->user_type_id = $request->user_type_id;
        $user->address = $request->address;
        $user->mobile = $request->mobile;
        $user->email = $request->email;

        $user->save();

        if($user->user_type_id == 4)
        {
            return redirect(route('admin.adminUsers'));
        }else{
            return redirect(route('admin.users'));
        }


    }
}

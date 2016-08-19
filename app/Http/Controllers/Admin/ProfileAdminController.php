<?php

namespace App\Http\Controllers\Admin;

use App\classifieds;
use App\Online;
use App\permission_types;
use App\permissions;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class ProfileAdminController extends Controller
{
    //
    /**
     * @var permission_types
     */
    private $permission_types;

    /**
     * ProfileAdminController constructor.
     * @param permission_types $permission_types
     */
    public function __construct(permission_types $permission_types)
    {
        $this->middleware('admin');
        $this->permission_types = $permission_types;
    }

    public function index()
    {
        $permission_types = permission_types::get();
        $user_details = User::whereId(Auth::user()->id)->first();
        $permissions = array();
        $status = array();
        $stats = array();

        foreach ($permission_types as $permission_type)
        {
            $permission = permissions::wherePermission_type($permission_type->id)
                    ->whereUser_id(Auth::user()->id)
                    ->first();
            if ($permission == null)
            {
                $status = array_add($status, 'status', 'Unauthorized');
                $status = array_add($status, 'description', $permission_type->description);
                $status = array_add($status, 'id', $permission_type->id);
            }else{
                $status = array_add($status, 'status', 'Authorized');
                $status = array_add($status, 'description', $permission_type->description);
                $status = array_add($status, 'id', $permission_type->id);
            }
            $permissions = array_add($permissions, $permission_type->module, $status);
            $status = array();
        }

        $sessions = Online::whereUser_id(Auth::user()->id)->count();
        $listings = classifieds::whereUser_id(Auth::user()->id)->count();

        $stats = array_add($stats, 'Sessions Recorded', $sessions);
        $stats = array_add($stats, 'Listings Posted', $listings);



       // dd($permissions);

        return view('admin.settings.show', compact('user_details', 'permissions', 'stats'));
    }


    public function update_info(Request $request)
    {
       // dd(\Request::Input());

        $user = User::whereId(Auth::user()->id)->first();

        $user->name = $request['name'];

        $user->gender = $request['gender'];

        $user->date_of_birth = $request['date_of_birth'];

        $user->facebook_name = $request['facebook_name'];

        $user->twitter_handle = $request['twitter_handle'];

        $user->skype_id = $request['skype_id'];

        $user->address = $request['address'];

        $user->mobile = $request['mobile'];

        $user->email = $request['email'];

        $user->save();

        return redirect()->route('admin.settings');
    }
}

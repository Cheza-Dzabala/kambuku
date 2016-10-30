<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserType extends Controller
{
    //
    public function check_type()
    {
            $user_type = Auth::user()['user_type_id'];

        if ($user_type == '2'){
            if (Auth::user()['canList'] == '1')
            {
                return redirect()->route('merchant.index');
            }else{
                return redirect(route('profile'));
            }
        }else if($user_type == '4'){
            return redirect('/admin/dashboard');
        }else{
            return redirect('/');
        }
    }
}

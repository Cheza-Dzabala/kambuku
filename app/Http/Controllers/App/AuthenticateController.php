<?php

namespace App\Http\Controllers\App;

use App\User;

use Illuminate\Support\Facades\Auth;
use Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthenticateController extends Controller
{
    //
    /**
     * AuthenticateController constructor.
     */
    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => ['authenticate', 'signUp']]);
        $this->middleware('CORS');
        $this->middleware('appAuthenticate', ['except' => ['authenticate', 'signUp']]);
    }

    public function authenticate(Request $request)
    {
        $email = Request::header('email');
        $password = Request::header('password');
        $credentials = (['email' => $email, 'password' => $password]);

        //dd($credentials);
        try {
            // verify the credentials and create a token for the user
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // if no errors are encountered we can return a JWT
        return response('successfully logged in', 200)->header('token', $token);
    }

    public function signUp(Request $request)
    {
        $input = Request::input();
        if ($input['gender'] == 'm') {
            $default_image = 'images/uploads/avatars/defaults/male.png';
        } else {
            $default_image = 'images/uploads/avatars/defaults/female.png';
        }

        $currentUsers = User::whereEmail($input['email'])->first();
        if ($currentUsers != null) {
            return response(json_encode('user_already_exists'));
        } else {
            User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'date_of_birth' => $input['dob'],
                'gender' => $input['gender'],
                'mobile' => $input['mobile'],
                'password' => bcrypt($input['password']),
                'is_active' => '1',
                'image_path' => $default_image,
            ]);
            return response(json_encode('successfully_created_account'));
        }

    }

    public function index()
    {
        $newToken = JWTAuth::parseToken()->refresh();
        //dd($newToken);
        // the token is valid and we have found the user via the sub claim
        $user = User::whereId(Auth::user()['id'])->first()->toArray();
        return response(compact('user'))
            ->header('token', $newToken);
    }
}

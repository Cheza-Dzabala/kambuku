<?php

namespace App\Http\Controllers\Events;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class eventsAppAuthenticateController extends Controller
{
    //
    public function login(Request $request)
    {
        //$user = User::whereEmail($request->input('email'))->first()->toJson();

        $email = $request->input('email');
        $password = $request->input('password');

        $credentials = (['email' => $email, 'password' => $password]);
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
}

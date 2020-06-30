<?php
/**
 * Created by PhpStorm.
 * User: fahrur
 * Date: 01/07/20
 * Time: 5:40
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController
{
    public function authenticate(Request $request)
    {

        $email = $request->get('email');
        $password = $request->get('password');

        if (Auth::attempt(
            [
                'email' => $email,
                'password' => $password,
            ], true)) {

            $token = Auth::user()->api_token;
            return response()->json(['message' => 'Login Success', 'data' => $token], 200);
        } else {
            return response()->json(['message' => 'Wrong username and password'], 500);
        }
    }
}
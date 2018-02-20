<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterFormRequest;
use App\User;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\Exceptions;
use Carbon\Carbon;


class AuthController extends Controller
{
    //
   	
   	public function register(RegisterFormRequest $request){
   		User::create([
   			'name' => $request->json('name'),
   			'email' => $request->json('email'),
   			'hp' => $request->json('hp'),
   			'level' => $request->json('level'),
   			'password' => bcrypt($request->json('password')),
   		]);

   	}

      public function signin(Request $request)
    {
        try {
            $token = JWTAuth::attempt($request->only('email', 'password'), 
               [ 'exp' => Carbon::now()->addWeek()->timestamp,]);
        } catch (JWTException $e) {
            return response()->json([
                'error' => 'Could not authenticate',
            ], 500);
        }

        if (!$token) {
            return response()->json([
                'error' => 'Could not authenticate',
            ], 401);
        } else {
            $data = [];
            $meta = [];

            $data['name'] = $request->user()->name;
            $data['level'] = $request->user()->id_level;
            $meta['token'] = $token;

            return response()->json([
                'data' => $data,
                'meta' => $meta
            ]);
        }
    }
}

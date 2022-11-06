<?php

namespace App\Http\Controllers;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\Request;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Contracts\Providers\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only([
            'email',
            'password'
        ]);
       try {
        $token =  Auth::attempt($credentials);
        return Response()->json(['token'=>$token] , 202);
       }catch(Exception $error){
        return Response()->json($error , 400);
       }


    }
    public function Register(Request $request)
    {
        $inputs = $request->only([
            'name',
            'email',
            'password',
            'password_verify'
        ]);
        try {
            if (!empty($inputs['password']) && !empty($inputs['password_verify'])) {
                if ($inputs['password'] == $inputs['password_verify']) {
                    $inputs['password'] = Hash::make($inputs['password']);
                    $user = User::create($inputs);
                    return Response()->json($user, 201);
                } else {
                    return Response()->json(['massage'=>'password verify wrong !!!'], 202);
                }
            }
            // return $inputs['name'];
        } catch (Exception $error) {
            return Response()->json($error, 400);
        }
    }
}

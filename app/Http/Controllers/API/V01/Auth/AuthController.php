<?php

namespace App\Http\Controllers\API\V01\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\UserRepository;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationData;
use Illuminate\Validation\ValidationException as ValidationValidationException;
use League\Flysystem\Config;

class AuthController extends Controller
{
    public function register(Request $request){

        $request->validate([
            'name'=>['required'] ,
            'email'=>['required','email','unique:users'] ,
            'password'=>['required']
        ]);


       $user = resolve(UserRepository::class)->create($request);

       $Defualt_Super_Admin = config('permission.dedfualt_super_admin_email');
       $user->email ===$Defualt_Super_Admin ? $user->assignRole('Super Admin') : $user->assignRole('User');


        return response()->json([
            'massage'=>'successfully'
        ] ,200);

    }
    public function login(Request $request){

        $request->validate([
            'email'=>['required','email' , 'exists:users'] ,
            'password'=>['required']
        ]);

        if(Auth::attempt($request->only('email' , 'password'))){
            return response()->json(Auth::user() , 201);
        }




        return throw ValidationValidationException::withMessages([
            'email'=>'invalide email',
            'password'=>'wrong pass'
        ] , 422);




    }

    public function user(){
        return response()->json(Auth::user() , 200);
    }



    public function logout(){
        Auth::logout();
    }
}

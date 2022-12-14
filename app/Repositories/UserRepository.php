<?php

namespace App\Repositories;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserRepository{

    public function create(Request $request) : User
    {


        $pass_input = $request->password ;
        $hashed_pass = Hash::make($pass_input);
        if(Hash::check($pass_input , $hashed_pass)){
            $final_pass = $hashed_pass;
        }
        return User::create([

            'name'=>$request->name ,
            'email'=>$request->email ,
            'password'=>$final_pass ,
        ]);

    }


}




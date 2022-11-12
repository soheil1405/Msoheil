<?php

namespace App\Repositories;

use App\Models\Channel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class ChannelRepository{





    
    /*
    * All Channels
    */

    public function all()
    {

       return Channel::all();
    }


    
    /*
    *@param  $request
    * Create New Channel
    */

    public function create(Request $request) :void
    {
        $flag = Str::slug($request->name);
        Channel::create([
            'name'=>$request->name , 
            'slug'=>$flag
        ]);
    }





    /*
    *@param  $name $id
    * Update Channel
    */

    public function update($id , $name): void 
    {
        
        Channel::find($id)->update([
            'name'=>$name ,
            'slug'=>Str::slug($name)
        ]);

    }








    public function delete($id){
        Channel::destroy($id);
    }





}
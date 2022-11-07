<?php

namespace App\Http\Controllers\API\V01\Channel;

use App\Http\Controllers\Controller;
use App\Models\Channel;
use Illuminate\Http\Request;

class Channelcontroller extends Controller
{
    public function grtAllChannelsList(){
        return response()->json(Channel::all() ,200);
    }












    public function createNewChannel(Request $request){
        $request->validate([
            'name'=>['required']
        ]);
    
    
        Channel::create([
            'name'=>$request->name , 
            'slug' = Str::slug($request->name) 
        ]);
    

    }











}

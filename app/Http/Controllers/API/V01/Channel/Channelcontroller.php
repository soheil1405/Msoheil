<?php

namespace App\Http\Controllers\API\V01\Channel;

use App\Http\Controllers\Controller;
use App\Models\Channel;
use App\Repositories\ChannelRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Spatie\FlareClient\Http\Response as HttpResponse;

class Channelcontroller extends Controller
{
    public function grtAllChannelsList(){
       
        $all_channels = resolve(ChannelRepository::class)->all();
        return response()->json( $all_channels ,Response::HTTP_OK);
    
    }



    public function createNewChannel(Request $request){
        $request->validate([
            'name'=>['required']
        ]);

        resolve(ChannelRepository::class)->create($request);

        return response()->json([
            'massage'=>'channel created successfully'
        ] , Response::HTTP_CREATED) ;

    }


    public function update(Request $request){

        
        $request->validate([
            'name'=>['required']
        ]);

        resolve(ChannelRepository::class)->update($request->id , $request->name);

        return response()->json([
            'massage'=>'channel Edited successfully'
        ] , Response::HTTP_OK) ;

    }



    public function destroy(Request $request){
        $request->validate([
            'id'=>['required']
        ]);

        resolve(ChannelRepository::class)->delete($request->id);

        return response()->json([
            'massage'=>'channel Deleted successfully'
        ] , Response::HTTP_OK) ;


    }





}

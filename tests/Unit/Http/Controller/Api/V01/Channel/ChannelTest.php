<?php

namespace Tests\Unit\Http\Controller\Api\V01\Channel;

use App\Models\Channel;
use Illuminate\Http\Request;
use  Tests\TestCase;
use Illuminate\Support\Str;

 class ChannelTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_all_channels_list_shoul_be_accessable()
    {
        $response = $this->get(route('Channel.all'));
        $response ->assertStatus(200);
    }

    public function createNewChannel(Request $request){
        $request->validate([
            'name'=>['required']
        ]);


        Channel::create([
            'name'=>$request->name ,
            'slug'=>Str::slug($request->slug) ,

        ]);

        return response()->json([
            'massage'=>'channel created successfully ' 
        ] , 201);

    }

}

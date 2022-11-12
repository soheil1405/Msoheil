<?php

namespace Tests\Unit\Http\Controller\Api\V01\Channel;

use App\Models\Channel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use  Tests\TestCase;
use Illuminate\Support\Str;

class ChannelTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_all_channels_list_should_be_accessable()
    {
        $response = $this->get(route('Channel.all'));
        $response->assertStatus(200);
    }


    public function test_cannot_create_channel_should_be_validate()
    {

        $response = $this->postJson(route('Channel.CreateNew'));
        $response->assertStatus(422);
    }




    public function test_create_channel()
    {


        // $channel = Channel::class::factory()->create();
        $response = $this->postJson(route('Channel.CreateNew'), [
            'name' => 'soheil amini'
        ]);


        $response->assertStatus(201);
    }



    public function test_update_fail_channel()
    {


        // $channel = Channel::class::factory()->create();
        $response = $this->Json('PUT', route('Channel.update'), []);

        $response->assertStatus(422);
    }



    public function test_update_channel_successfully()
    {


        $channel = Channel::class::factory()->create(
            [
                'name' => 'laravel'
            ]
        );
        $response = $this->Json('PUT', route('Channel.update'), [
            'id' => $channel->id,
            'name' => 'Channel'
        ]);


        $updated_channel = Channel::find($channel->id);


        $response->assertStatus(200);

        $this->assertEquals('Channel', $updated_channel->name);
    }








    //delete channel 
    public function test_channel_delete_fail(){
       
        $response = $this->json('DELETE' , route('Channel.delete') , []);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }



    public function test_channel_delete_successfully(){

       $channel = Channel::class::factory()->create();
        $response = $this->json('DELETE' , route('Channel.delete') , [
            'id'=>$channel->id
        ]);
        $response->assertStatus(200);
    }






}

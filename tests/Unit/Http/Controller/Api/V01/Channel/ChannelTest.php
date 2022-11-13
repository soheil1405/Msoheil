<?php

namespace Tests\Unit\Http\Controller\Api\V01\Channel;

use App\Models\Channel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use  Tests\TestCase;
use Illuminate\Support\Str;

class ChannelTest extends TestCase
{


    public function RegisterRoleAndPermissions()
    {
        $role_in_db = Role::where('name' , config('permission.default_roles'));
        if($role_in_db->count()<1){
            foreach (config('permission.default_roles') as $role){
                Role::create([
                    'name'=>$role
                ]);
            }
        }

        $permission_in_db = Permission::where('name' , config('permission.default_permissions'));
        if($permission_in_db->count()<1){
            foreach (config('permission.default_permissions') as $permissions){
                Permission::create([
                    'name'=>$permissions
                ]);
            }
        }
    }

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
        $this->RegisterRoleAndPermissions();
        $user = User::class::factory()->create();
        $user->givePermissionTo('channel management');

        $response = $this-> actingAs($user)-> postJson(route('Channel.CreateNew'));
        $response->assertStatus(422);
    }




    public function test_create_channel()
    {

        $this->RegisterRoleAndPermissions();
        $user = User::class::factory()->create();
        $user->givePermissionTo('channel management');

        // $channel = Channel::class::factory()->create();
        $response = $this-> actingAs($user)-> postJson(route('Channel.CreateNew'), [
            'name' => 'soheil amini'
        ]);


        $response->assertStatus(201);
    }



    public function test_update_fail_channel()
    {




        $this->RegisterRoleAndPermissions();
        $user = User::class::factory()->create();
        $user->givePermissionTo('channel management');

        // $channel = Channel::class::factory()->create();
        $response = $this-> actingAs($user)-> Json('PUT', route('Channel.update'), []);

        $response->assertStatus(422);
    }



    public function test_update_channel_successfully()
    {


        $this->RegisterRoleAndPermissions();
        $user = User::class::factory()->create();
        $user->givePermissionTo('channel management');

        $channel = Channel::class::factory()->create(
            [
                'name' => 'laravel'
            ]
        );
        $response = $this->actingAs($user)->Json('PUT', route('Channel.update'), [
            'id' => $channel->id,
            'name' => 'Channel'
        ]);


        $updated_channel = Channel::find($channel->id);


        $response->assertStatus(200);

        $this->assertEquals('Channel', $updated_channel->name);
    }








    //delete channel
    public function test_channel_delete_fail(){



        $this->RegisterRoleAndPermissions();
        $user = User::class::factory()->create();
        $user->givePermissionTo('channel management');
        $response = $this-> actingAs($user)->json('DELETE' , route('Channel.delete') , []);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }



    public function test_channel_delete_successfully(){

        $this->RegisterRoleAndPermissions();
        $user = User::class::factory()->create();
        $user->givePermissionTo('channel management');
       $channel = Channel::class::factory()->create();
        $response = $this->actingAs($user)->   json('DELETE' , route('Channel.delete') , [
            'id'=>$channel->id
        ]);
        $response->assertStatus(200);
    }






}

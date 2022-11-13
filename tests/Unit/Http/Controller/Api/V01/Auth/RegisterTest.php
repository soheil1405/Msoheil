<?php

namespace Tests\Unit\Http\Controller\Api\V01\Auth;

// use PHPUnit\Framework\TestCase;

use App\Models\User;
use Database\Factories\UserFactory;
use Faker\Factory;
use Illuminate\Database\Eloquent\Factories\Factory as FactoriesFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Test\TestCase;
use Symfony\Component\Routing\Route;
use Tests\TestCase as TestsTestCase;

class RegisterTest extends TestsTestCase
{



    use RefreshDatabase;


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
    public function test_register_shoud_be_validate()
    {
        $response = $this->postJson(route('auth.register'));
        $response->assertStatus(422);
    }



    public function test_new_user_can_register()
    {
        $this->RegisterRoleAndPermissions();
        $response = $this->postJson(route('auth.register') , [
            'name'=>'soheil' ,
            'email'=>'msoheilamini@gmail.com' ,
            'password'=>'1405'
        ]);
        $response->assertStatus(200);
    }

    public function test_login_shoud_be_validate()
    {
        $response = $this->postJson(route('auth.login'));
        $response->assertStatus(422);
    }


    public function test_user_can_login()
    {

        $user = User::factory()->create();
        // $user = Factor(User::class);

        $response = $this->postJson(route('auth.login') , [
            // 'name'=>'soheil' ,
            'email'=>$user->email ,
            'password'=>$user->password
        ]);
        $response->assertStatus(422);
    }





    public function test_logout(){
        // $user = (User::class)->make();
        $user = User::class::factory()->create();
        $response = $this->actingAs($user)->postJson(route('auth.logout'));
        $response->assertStatus(200);

    }




    public function test_user_loggined_get_data(){
        $user = User::class::factory()->create();
        $response = $this->actingAs($user)->get(route('auth.user'));
        $response->assertStatus(200);
    }










}

<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\Category;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminProductTest extends TestCase
{
    use RefreshDatabase;

//    public function test_public_user_cannot_access_adding_Product(): void
//    {
//        $Category = Category::factory()->create();
//        $response = $this->postJson('/api/v1/admin/Categorys/'.$Category->id.'/Products');
//
//        $response->assertStatus(401);
//    }
//
//    public function test_non_admin_user_cannot_access_adding_Product(): void
//    {
//        $this->seed(RoleSeeder::class);
//        $user = User::factory()->create();
//        $user->roles()->attach(Role::where('name', 'editor')->value('id'));
//        $Category = Category::factory()->create();
//        $response = $this->actingAs($user)->postJson('/api/v1/admin/Categorys/'.$Category->id.'/Products');
//
//        $response->assertStatus(403);
//    }
//
//    public function test_saves_Product_successfully_with_valid_data(): void
//    {
//        $this->seed(RoleSeeder::class);
//        $user = User::factory()->create();
//        $user->roles()->attach(Role::where('name', 'admin')->value('id'));
//        $Category = Category::factory()->create();
//
//        $response = $this->actingAs($user)->postJson('/api/v1/admin/Categorys/'.$Category->id.'/Products', [
//            'name' => 'Product name',
//        ]);
//        $response->assertStatus(422);
//
//        $response = $this->actingAs($user)->postJson('/api/v1/admin/Categorys/'.$Category->id.'/Products', [
//            'name' => 'Product name',
//            'starting_date' => now()->toDateString(),
//            'ending_date' => now()->addDay()->toDateString(),
//            'price' => 123.45,
//        ]);
//
//        $response->assertStatus(201);
//
//        $response = $this->get('/api/v1/Categorys/'.$Category->slug.'/Products');
//        $response->assertJsonFragment(['name' => 'Product name']);
//    }
}

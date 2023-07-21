<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\Category;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminCategoryTest extends TestCase
{
    use RefreshDatabase;

//    public function test_public_user_cannot_access_adding_Category(): void
//    {
//        $response = $this->postJson('/api/v1/admin/Categorys');
//
//        $response->assertStatus(401);
//    }
//
//    public function test_non_admin_user_cannot_access_adding_Category(): void
//    {
//        $user = User::factory()->create();
//        $user->roles()->attach(Role::where('name', 'editor')->value('id'));
//        $response = $this->actingAs($user)->postJson('/api/v1/admin/Categorys');
//
//        $response->assertStatus(403);
//    }
//
//    public function test_saves_Category_successfully_with_valid_data(): void
//    {
//        $this->seed(RoleSeeder::class);
//        $user = User::factory()->create();
//        $user->roles()->attach(Role::where('name', 'admin')->value('id'));
//
//        $response = $this->actingAs($user)->postJson('/api/v1/admin/Categorys', [
//            'name' => 'Category name',
//        ]);
//        $response->assertStatus(422);
//
//        $response = $this->actingAs($user)->postJson('/api/v1/admin/Categorys', [
//            'name' => 'Category name',
//            'is_public' => 1,
//            'description' => 'Some description',
//            'number_of_days' => 5,
//        ]);
//
//        $response->assertStatus(201);
//
//        $response = $this->get('/api/v1/Categorys');
//        $response->assertJsonFragment(['name' => 'Category name']);
//    }
//
//    public function test_updates_Category_successfully_with_valid_data(): void
//    {
//        $this->seed(RoleSeeder::class);
//        $user = User::factory()->create();
//        $user->roles()->attach(Role::where('name', 'editor')->value('id'));
//        $Category = Category::factory()->create();
//
//        $response = $this->actingAs($user)->putJson('/api/v1/admin/Categorys/'.$Category->id, [
//            'name' => 'Category name',
//        ]);
//        $response->assertStatus(422);
//
//        $response = $this->actingAs($user)->putJson('/api/v1/admin/Categorys/'.$Category->id, [
//            'name' => 'Category name updated',
//            'is_public' => 1,
//            'description' => 'Some description',
//            'number_of_days' => 5,
//        ]);
//
//        $response->assertStatus(200);
//
//        $response = $this->get('/api/v1/Categorys');
//        $response->assertJsonFragment(['name' => 'Category name updated']);
//    }
}

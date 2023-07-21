<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategorysListTest extends TestCase
{
    use RefreshDatabase;

//    public function test_Categorys_list_returns_pagination(): void
//    {
//        Category::factory(16)->create(['is_public' => true]);
//        $response = $this->get('/api/v1/Categorys');
//
//        $response->assertStatus(200);
//        $response->assertJsonCount(15, 'data');
//        $response->assertJsonPath('meta.last_page', 2);
//    }
//
//    public function test_Categorys_list_shows_only_public_records()
//    {
//        $nonPublicCategory = Category::factory()->create(['is_public' => false]);
//        $publicCategory = Category::factory()->create(['is_public' => true]);
//        $response = $this->get('/api/v1/Categorys');
//
//        $response->assertStatus(200);
//        $response->assertJsonCount(1, 'data');
//        $response->assertJsonFragment(['id' => $publicCategory->id]);
//        $response->assertJsonMissing(['id' => $nonPublicCategory->id]);
//
//    }
}

<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductsListTest extends TestCase
{
    use RefreshDatabase;

//    public function test_Products_list_by_Category_slug_returns_correct_Products(): void
//    {
//        $Category = Category::factory()->create();
//        $Product = Product::factory()->create(['Category_id' => $Category->id]);
//
//        $response = $this->get('/api/v1/Categorys/'.$Category->slug.'/Products');
//
//        $response->assertStatus(200);
//        $response->assertJsonCount(1, 'data');
//        $response->assertJsonFragment(['id' => $Product->id]);
//    }
//
//    public function test_Product_price_is_shown_correctly(): void
//    {
//        $Category = Category::factory()->create();
//        Product::factory()->create([
//            'Category_id' => $Category->id,
//            'price' => 123.45,
//        ]);
//
//        $response = $this->get('/api/v1/Categorys/'.$Category->slug.'/Products');
//
//        $response->assertStatus(200);
//        $response->assertJsonCount(1, 'data');
//        $response->assertJsonFragment(['price' => '123.45']);
//    }
//
//    public function test_Products_list_returns_pagination(): void
//    {
//        $Category = Category::factory()->create();
//        Product::factory(16)->create(['Category_id' => $Category->id]);
//
//        $response = $this->get('/api/v1/Categorys/'.$Category->slug.'/Products');
//
//        $response->assertStatus(200);
//        $response->assertJsonCount(15, 'data');
//        $response->assertJsonPath('meta.last_page', 2);
//    }
//
//    public function test_Products_list_sorts_by_starting_date_correctly(): void
//    {
//        $Category = Category::factory()->create();
//        $laterProduct = Product::factory()->create([
//            'Category_id' => $Category->id,
//            'starting_date' => now()->addDays(2),
//            'ending_date' => now()->addDays(3),
//        ]);
//        $earlierProduct = Product::factory()->create([
//            'Category_id' => $Category->id,
//            'starting_date' => now(),
//            'ending_date' => now()->addDays(1),
//        ]);
//
//        $response = $this->get('/api/v1/Categorys/'.$Category->slug.'/Products');
//
//        $response->assertStatus(200);
//        $response->assertJsonPath('data.0.id', $earlierProduct->id);
//        $response->assertJsonPath('data.1.id', $laterProduct->id);
//    }
//
//    public function test_Products_list_sorts_by_price_correctly(): void
//    {
//        $Category = Category::factory()->create();
//        $expensiveProduct = Product::factory()->create([
//            'Category_id' => $Category->id,
//            'price' => 200,
//        ]);
//        $cheapLaterProduct = Product::factory()->create([
//            'Category_id' => $Category->id,
//            'price' => 100,
//            'starting_date' => now()->addDays(2),
//            'ending_date' => now()->addDays(3),
//        ]);
//        $cheapEarlierProduct = Product::factory()->create([
//            'Category_id' => $Category->id,
//            'price' => 100,
//            'starting_date' => now(),
//            'ending_date' => now()->addDays(1),
//        ]);
//
//        $response = $this->get('/api/v1/Categorys/'.$Category->slug.'/Products?sortBy=price&sortOrder=asc');
//
//        $response->assertStatus(200);
//        $response->assertJsonPath('data.0.id', $cheapEarlierProduct->id);
//        $response->assertJsonPath('data.1.id', $cheapLaterProduct->id);
//        $response->assertJsonPath('data.2.id', $expensiveProduct->id);
//    }
//
//    public function test_Products_list_filters_by_price_correctly(): void
//    {
//        $Category = Category::factory()->create();
//        $expensiveProduct = Product::factory()->create([
//            'Category_id' => $Category->id,
//            'price' => 200,
//        ]);
//        $cheapProduct = Product::factory()->create([
//            'Category_id' => $Category->id,
//            'price' => 100,
//        ]);
//
//        $endpoint = '/api/v1/Categorys/'.$Category->slug.'/Products';
//
//        $response = $this->get($endpoint.'?priceFrom=100');
//        $response->assertJsonCount(2, 'data');
//        $response->assertJsonFragment(['id' => $cheapProduct->id]);
//        $response->assertJsonFragment(['id' => $expensiveProduct->id]);
//
//        $response = $this->get($endpoint.'?priceFrom=150');
//        $response->assertJsonCount(1, 'data');
//        $response->assertJsonMissing(['id' => $cheapProduct->id]);
//        $response->assertJsonFragment(['id' => $expensiveProduct->id]);
//
//        $response = $this->get($endpoint.'?priceFrom=250');
//        $response->assertJsonCount(0, 'data');
//
//        $response = $this->get($endpoint.'?priceTo=200');
//        $response->assertJsonCount(2, 'data');
//        $response->assertJsonFragment(['id' => $cheapProduct->id]);
//        $response->assertJsonFragment(['id' => $expensiveProduct->id]);
//
//        $response = $this->get($endpoint.'?priceTo=150');
//        $response->assertJsonCount(1, 'data');
//        $response->assertJsonMissing(['id' => $expensiveProduct->id]);
//        $response->assertJsonFragment(['id' => $cheapProduct->id]);
//
//        $response = $this->get($endpoint.'?priceTo=50');
//        $response->assertJsonCount(0, 'data');
//
//        $response = $this->get($endpoint.'?priceFrom=150&priceTo=250');
//        $response->assertJsonCount(1, 'data');
//        $response->assertJsonMissing(['id' => $cheapProduct->id]);
//        $response->assertJsonFragment(['id' => $expensiveProduct->id]);
//    }
//
//    public function test_Products_list_filters_by_starting_date_correctly(): void
//    {
//        $Category = Category::factory()->create();
//        $laterProduct = Product::factory()->create([
//            'Category_id' => $Category->id,
//            'starting_date' => now()->addDays(2),
//            'ending_date' => now()->addDays(3),
//        ]);
//        $earlierProduct = Product::factory()->create([
//            'Category_id' => $Category->id,
//            'starting_date' => now(),
//            'ending_date' => now()->addDays(1),
//        ]);
//
//        $endpoint = '/api/v1/Categorys/'.$Category->slug.'/Products';
//
//        $response = $this->get($endpoint.'?dateFrom='.now());
//        $response->assertJsonCount(2, 'data');
//        $response->assertJsonFragment(['id' => $earlierProduct->id]);
//        $response->assertJsonFragment(['id' => $laterProduct->id]);
//
//        $response = $this->get($endpoint.'?dateFrom='.now()->addDay());
//        $response->assertJsonCount(1, 'data');
//        $response->assertJsonMissing(['id' => $earlierProduct->id]);
//        $response->assertJsonFragment(['id' => $laterProduct->id]);
//
//        $response = $this->get($endpoint.'?dateFrom='.now()->addDays(5));
//        $response->assertJsonCount(0, 'data');
//
//        $response = $this->get($endpoint.'?dateTo='.now()->addDays(5));
//        $response->assertJsonCount(2, 'data');
//        $response->assertJsonFragment(['id' => $earlierProduct->id]);
//        $response->assertJsonFragment(['id' => $laterProduct->id]);
//
//        $response = $this->get($endpoint.'?dateTo='.now()->addDay());
//        $response->assertJsonCount(1, 'data');
//        $response->assertJsonMissing(['id' => $laterProduct->id]);
//        $response->assertJsonFragment(['id' => $earlierProduct->id]);
//
//        $response = $this->get($endpoint.'?dateTo='.now()->subDay());
//        $response->assertJsonCount(0, 'data');
//
//        $response = $this->get($endpoint.'?dateFrom='.now()->addDay().'&dateTo='.now()->addDays(5));
//        $response->assertJsonCount(1, 'data');
//        $response->assertJsonMissing(['id' => $earlierProduct->id]);
//        $response->assertJsonFragment(['id' => $laterProduct->id]);
//    }
//
//    public function test_Product_list_returns_validation_errors(): void
//    {
//        $Category = Category::factory()->create();
//
//        $response = $this->getJson('/api/v1/Categorys/'.$Category->slug.'/Products?dateFrom=abcde');
//        $response->assertStatus(422);
//
//        $response = $this->getJson('/api/v1/Categorys/'.$Category->slug.'/Products?priceFrom=abcde');
//        $response->assertStatus(422);
//    }
}

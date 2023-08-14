<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsListRequest;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;

/**
 * @group Admin endpoints
 */
class ProductController extends Controller
{
    /**
     * POST Product
     *
     * Creates a new Product record.
     *
     * @authenticated
     *
     * @response {"data":{"id":"996a381e-64ca-46ba-8b51-f8279d5529ad","name":"Product 1","starting_date":"2023-06-15","ending_date":"2023-06-20","price":"99.99"}}
     * @response 422 {"message":"The name has already been taken.","errors":{"name":["The name has already been taken."]}}
     */
    public function createProduct(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        $product = Product::create($validatedData);

        return new ProductResource($product);
    }

    public function updateProduct($id, Request $request)
    {
        $product = Product::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        $product->update($validatedData);

        return new ProductResource($product);
    }
}

<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsListRequest;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * GET Category Products
     *
     * Returns paginated list of Products by category id.
     *
     * @urlParam Category_slug string Category Id. Example: "3"
     *
     * @bodyParam priceFrom number. Example: "123.45"
     * @bodyParam priceTo number. Example: "234.56"
     * @bodyParam dateFrom date. Example: "2023-06-01"
     * @bodyParam dateTo date. Example: "2023-07-01"
     * @bodyParam sortBy string. Example: "price"
     * @bodyParam sortOrder string. Example: "asc" or "desc"
     *
     * @response {"data":[{"id":"9958e389-5edf-48eb-8ecd-e058985cf3ce","name":"Product on Sunday","starting_date":"2023-06-11","ending_date":"2023-06-16","price":"99.99"},{"id":"9958e389-5edf-48eb-8ecd-e058985cf3c2","name":"Product on Tuesday","starting_date":"2023-06-14","ending_date":"2023-06-19","price":"119.99"},{"id":"9958e389-5edf-48eb-8ecd-e058985cf3c1","name":"Product on Monday","starting_date":"2023-06-18","ending_date":"2023-06-23","price":"79.99"}],"links":{"first":"http://Category-api.test/api/v1/Categorys/first-Category/Products?page=1","last":"http://Category-api.test/api/v1/Categorys/first-Category/Products?page=1","prev":null,"next":null},"meta":{"current_page":1,"from":1,"last_page":1,"links":[{"url":null,"label":"&laquo; Previous","active":false},{"url":"http://Category-api.test/api/v1/Categorys/first-Category/Products?page=1","label":"1","active":true},{"url":null,"label":"Next &raquo;","active":false}],"path":"http://Category-api.test/api/v1/Categorys/first-Category/Products","per_page":15,"to":3,"total":3}}
     *
     */
    public function index(ProductsListRequest $request)
    {
        $products = Product::where('status', 'available')
            ->with(['color', 'size', 'material', 'condition', 'section', 'branch', 'user', 'categories:name', 'images'])
            ->when($request->size, function ($query) use ($request) {
                $query->where('size_id', $request->size);
            })
            ->when($request->color, function ($query) use ($request) {
                $query->where('color_id', $request->color);
            })
            ->when($request->priceFrom, function ($query) use ($request) {
                $query->where('price', '>=', $request->priceFrom);
            })
            ->when($request->priceTo, function ($query) use ($request) {
                $query->where('price', '<=', $request->priceTo);
            })
            ->when($request->condition, function ($query) use ($request) {
                $query->where('condition_id', $request->condition);
            })
            ->when($request->material, function ($query) use ($request) {
                $query->where('material_id', $request->material);
            })
            ->when($request->section, function ($query) use ($request) {
                $query->where('section_id', $request->section);
            })
            ->when($request->branch, function ($query) use ($request) {
                $query->where('branch_id', $request->branch);
            })
            ->when($request->sale, function ($query) use ($request) {
                $query->where('is_for_sale', $request->sale);
            })
            ->when($request->category, function ($query) use ($request) {
                $query->whereHas('categories', function ($query) use ($request) {
                    $query->where('categories.id', $request->category);
                });
            })
            ->when($request->sortBy, function ($query) use ($request) {
                if (!in_array($request->sortBy, ['price', 'created_at'])
                    || (!in_array($request->sortOrder, ['asc', 'desc']))) {
                    return;
                }
                $query->orderBy($request->sortBy, $request->sortOrder);
            })
            ->orderBy('id', 'desc')
            ->paginate();
        return ProductResource::collection($products);
    }

    public function show(Product $product)
    {
        $product->with(['color', 'size', 'material', 'condition', 'section', 'branch', 'user', 'categories:name', 'images']);
        return ProductResource::make($product);
    }
}

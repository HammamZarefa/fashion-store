<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function products()
    {
        $user = auth()->user();
        $products = $user->products;
        return ProductResource::collection($products);
    }
}

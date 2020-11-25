<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Store a newly created product in storage.
     *
     * @param StoreProductRequest $request
     * @return Product
     */
    public function store(StoreProductRequest $request)
    {
        return Product::createFromInventory($request->validated());
    }
}

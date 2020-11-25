<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Inventory landing screen
     *
     * @return View
     */
    public function index()
    {
        $store = Store::firstOrFail();  // currently only one store
        $products = Product::with('comments')->withCount('comments')->get();
        $categories = Category::all();
        $counts = [
            'total' => $products->count(),
            'layaway' => $products->where('on_layaway',1)->count(),
        ];

        return view('products.index', compact('store', 'products', 'categories', 'counts'));
    }
}

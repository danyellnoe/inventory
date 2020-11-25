<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\View\View;

class StoresController extends Controller
{
    /**
     * Stores landing page
     *
     * @return View
     */
    public function index()
    {
        $stores = Store::all();

        return view('stores.index', compact('stores'));
    }

}

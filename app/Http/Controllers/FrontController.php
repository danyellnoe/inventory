<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class FrontController extends Controller
{
    /**
     * Front page of the application
     *
     * @return View
     */
    public function index()
    {
        return view('front');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // Untuk Cart
    public function index()
    {
        return view('pages.cart');
    }

    // Untuk Success
    public function success()
    {
        return view('pages.success');
    }
}

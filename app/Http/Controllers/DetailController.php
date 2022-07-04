<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, $slug)
    {
        $product = Product::with(["galleries", "user"])->where("slug", $slug)->firstOrFail();
        return view('pages.detail', [
            "product" => $product
        ]);
    }
}

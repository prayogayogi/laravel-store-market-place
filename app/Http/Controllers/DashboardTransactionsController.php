<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardTransactionsController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // Untuk pages.dashboard-products
    public function index()
    {
        return view('pages.dashboard-transaction');
    }

    public function details()
    {
        return view('pages.dashboard-transaction-details');
    }
}

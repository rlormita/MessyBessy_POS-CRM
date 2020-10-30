<?php

namespace App\Http\Controllers;

use App\Models\Cashier;
use Illuminate\Http\Request;

class CashierHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:cashier');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('cashier');
    }
}

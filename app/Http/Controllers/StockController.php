<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Branch;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Stock::paginate(25);
        $branches = Branch::paginate(25);
        return view('inventory.stocks.index', compact('stocks','branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $branches = Branch::all();
        $stocks = Stock::all();

        return view('inventory.stocks.create', compact('products','branches','stocks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Stock $stock)
    {
        $stock->create($request->all());

        return redirect()
            ->route('stocks.index')
            ->withStatus('Stocks has been added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stocks, $id)
    {
        $stockser = Stock::where('branch_id', $id)->paginate(25);
        return view('inventory.stocks.show', compact('stockser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {

        $products = Product::all();
        $branches = Branch::all();

        return view('inventory.stocks.edit', compact('products','stock','branches'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        $stock->update($request->all());

        return redirect()
            ->route('stocks.index')
            ->withStatus('Stock successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

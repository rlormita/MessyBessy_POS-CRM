<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\SoldProduct;
use App\Models\Client;
use App\Models\Sale;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(25);

        return view('inventory.products.index', compact('products'));

        //return view('inventory.products')
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::all();

        return view('inventory.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\ProductRequest  $request
     * @param  App\Product  $model
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request, Product $model)
    {

        $filename = $request->image->getClientOriginalName();

        $request->image->move(public_path('img/products'), $filename);

        $model->name = $request->name;
        $model->description = $request->description;
        $model->stock_defective = $request ->stock_defective;
        $model->product_category_id = $request->product_category_id;
        $model->stock = $request->stock;
        $model->price = $request->price;
        $model->image = $filename;

        $model->save();

        return redirect()
            ->route('products.index')
            ->withStatus('Product successfully registered.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $solds = $product->solds()->latest()->limit(25)->get();
        return view('inventory.products.show', compact('product','solds'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = ProductCategory::all();

        return view('inventory.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $filename_edit = $request->image->getClientOriginalName();
        $request->image->move(public_path('img/products'), $filename_edit);

        $product->update($request->all());

        $product->image = $filename_edit;

        $product->save();

        return redirect()
            ->route('products.index')
            ->withStatus('Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('products.index')
            ->withStatus('Product removed successfully.');
    }

    public function productList() {
        $products = DB::select('select * from products');

        return view('transactions\transaction',['products'=>$products]);
    }
}

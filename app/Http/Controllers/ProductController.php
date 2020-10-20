<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\SoldProduct;
use App\Models\Stock;
use App\Models\Client;
use App\Models\Sale;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

// Functions from https://laraveldaily.com/quick-start-laravel-5-5-vue-js-simple-crud-project/

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return Product::all();
        // $products = Product::paginate(25);

        // return view('inventory.products.index', compact('products'));
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
        return Product::findOrFail($id);
        // $categories = ProductCategory::all();

        // return view('inventory.products.create', compact('categories'));
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

        /* $filename = $request->image->getClientOriginalName();

        $request->image->move(public_path('img/products'), $filename);

        $model->product_name = $request->name;
        $model->product_description = $request->description;
        $model->product_category_id = $request->product_category_id;
        $model->product_qty = $request->stock;
        $model->product_minimum = $request->stock_minimum;
        $model->product_price = $request->price;
        $model->product_image = $filename;

        $model->save();

        return response()->json($model, 200);

        /* return redirect()
            ->route('products.index')
            ->withStatus('Product successfully registered.'); */

        /* $product = Product::create($request->all());
        return $product; */

        return Product::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'stock_defective' => $request['stock_defective'],
            'product_category_id' => $request['product_category_id'],
            'stock' => $request['stock'],
            'price' => $request['price'],
            'image' => $request['image'],
        ]);
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
        if($request->hasFile('image')) {
            $edit_image = $request->file('image');
            $filename_edit = time() . '.' . $edit_image->getClientOriginalExtension();
            $request->image->move(public_path('img/products'), $filename_edit);
            $product->image = $filename_edit;
        }

        /* 
        $product->name = $request->name;
        $product->description = $request->description;
        $product->product_category_id = $request->product_category_id;
        $product->price = $request->price;

        $product->save();

        return redirect()
            ->route('products.index')
            ->withStatus('Product updated successfully.'); */

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        /* $product->delete();

        return redirect()
            ->route('products.index')
            ->withStatus('Product removed successfully.'); */

        $product = Product::findOrFail($id);
        $product->delete();
        return '';

    }

    public function productList() {
        $products = DB::select('select * from products');

        return view('transactions\transaction',['products'=>$products]);
    }

    /* Show all products - Ding */
    public function result() {
        return Product::all();
    }
}

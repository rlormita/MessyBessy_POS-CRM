<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Http\Requests\ProductRequest;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::latest()->paginate(10);    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request, Product $model)

    {
        // $filename = $request->file('image')->getClientOriginalName();

        // $request->image->move(public_path('img/products'), $filename);

        // $model->name = $request->name;
        // $model->description = $request->description;
        // $model->product_category_id = $request->product_category_id;
        // $model->stock_qty = $request->stock_qty;
        // $model->minimum_stock = $request->minimum_stock;
        // $model->price = $request->price;
        // $model->image = $filename;

        // $model->save();

         return Product::create([
             'name' => $request['name'],
             'description' => $request['description'],
             'product_category_id' => $request['product_category_id'],
             'stock_qty' => $request['stock_qty'],
             'minimum_stock' => $request['minimum_stock'],
             'price' => $request['price'],
             'image' => ['image']
         ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

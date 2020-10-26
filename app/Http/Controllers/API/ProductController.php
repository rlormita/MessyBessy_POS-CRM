<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Http\Requests\ProductRequest;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Http\Request;


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
    public function store(Request $request, Product $model)

    {        
        $this->validate($request, [
            'image' => 'required',
        ]);
        
        if($request-> image){
            // $filename = $request->file('image')->getClientOriginalName();

            // $filename = time().'.' . explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
            $filename = time().'.' . explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
            Image::make($request->image)->resize(300, 300)->save( public_path('/img/products/' . $filename));
            $request->merge(['image' => $filename]);
        }
        

        $model->name = $request->name;
        $model->description = $request->description;
        $model->product_category_id = $request->product_category_id;
        $model->stock_qty = $request->stock_qty;
        $model->minimum_stock = $request->minimum_stock;
        $model->price = $request->price;
        $model->image = $filename;

        $model->save();
        return response()->json(
            [
                'success' => true,
                'message' => 'User registered successfully'
            ]
        );

        // return redirect()
        //     ->route('products.index')
        //     ->withStatus('Product successfully registered.');

        //  return Product::create([
        //      'name' => $request['name'],
        //      'description' => $request['description'],
        //      'product_category_id' => $request['product_category_id'],
        //      'stock_qty' => $request['stock_qty'],
        //      'minimum_stock' => $request['minimum_stock'],
        //      'price' => $request['price'],
        //      'image' => $request[$filename]
        //  ]);
  
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

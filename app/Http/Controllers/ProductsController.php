<?php

namespace App\Http\Controllers;

use App\Http\Requests\productsRequest;
use App\Models\products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.products.list', [
            'product_list' => products::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.form', [
            'FormName' => 'New Product',
            'rq_method' => 'POST'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(productsRequest $request)
    {
        $product = new products();
        $product->fill($request->all());
        $product->cate_id = 1;
        $product->status = 0;
        $product->description = "";
        if ($request->hasFile('img')) {
            $img = $request->img;
            $ImgName = $request->name . '_' . $img->hashName();
            $img->storeAs('images/products', $ImgName);
            $product->img = 'products/' . $ImgName;
        } else {
            $product->img = 'http://beepeers.com/assets/images/commerces/default-image.jpg';
        }
        $product->save();
        return redirect()->route('product.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(products $products, Request $request)
    {
        $product = products::find($request->id);
        return view('admin.products.form', [
            'product' => $product,
            'FormName' => 'Update Product',
            'rq_method' => 'PUT'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = products::find($id);

        if ($request->hasFile('img')) {
            $img = $request->img;
            $ImgName = $request->name . '_' . $img->hashName();
            $img->storeAs('images/products',$ImgName);
            $product->img = 'products/' . $ImgName;
        } else {
            $product->img = '';
        }
           $product->update();
           return redirect()->route('product.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(products $products,$id)
    {
        $product = products::find($id);
        $product->delete($id);
        return redirect()->route('product.list');
    }
    
    public function changeStatus($id){
        $product = products::find($id);
       if($product->status === 0){
        $product->status = 1;
       }
       else{
        $product->status = 0;
       }
       $product->update();
       return redirect()->route('product.list');
    }
    public function search(Request $request){
          
         if($request->search === ''){
            return view('admin.products.list', [
                'product_list' => products::all()
            ]);
         }else{
            $product_list = products::where('name','like',$request->search.'%')->get();
    
            return view('admin.products.list', [
                'product_list' => $product_list
            ]);
         }

    }

}

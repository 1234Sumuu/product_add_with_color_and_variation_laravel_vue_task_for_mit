<?php

namespace App\Http\Controllers;

use App\Products;
use App\ProductVariation;
use App\ProductVariationType;
use Illuminate\Http\Request;
use App\Http\Resources\Products as ProductsResource;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $products = Products::all()->toArray();
        $products = Products::latestFirst()->paginate(5);
        return ProductsResource::collection($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $products = new Products([
            'title' => $request->input('title'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
        ]);

        public function destroy($id)
    {
        $user = User::find($id);
        if (!is_null($user)) {
            // First Delete User Image & then Delete the user
            UploadHelper::delete('images/product/'.$product->image);
            $user->delete();
            session()->flash('success', 'Product has been deleted !');
        }else{
            session()->flash('error', 'Sorry ! No Images has been found !');
        }
        return redirect()->route('admin.product.index');
    }

        $var_name = $request->name;
        $var_prc = $request->prc;
        $var_qty = $request->qty;
        $vartypes_id = $request->product_variation_types_id;
        $productvariation = [];
        $products->save();
        // insert blog tags
        $length=count($var_name);
        for ($i=0;$i<$length;$i++)
        {
            array_push($productvariation, ['products_id'=>$products->id,'product_variation_types_id' => $vartypes_id,'name' => $var_name[$i],'price' => $var_prc[$i],'quantity' => $var_qty[$i]]);

        }
        ProductVariation::insert($productvariation);
        // topic post relatioship
        //$products->variations()->save($variation);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Products::find($id);
        return response()->json($products);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products = Products::find($id);
        $products->update($request->all());

        return response()->json('The products successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Products::find($id);
        $products->delete();

        return response()->json('The products successfully deleted');
    }
}
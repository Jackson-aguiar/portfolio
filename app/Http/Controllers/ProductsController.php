<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\CategoriesController as Categories;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')->select('id', 'name', 'description', 'price', 'url')->get();

        return view('shop.admin.products.products-list', ['products' => $products]);
    }

    public function list(){
        $categories = new Categories;
        $all_categories = $categories->list();

        $products = DB::table('products')->paginate(6);

        return view('shop.welcome', ['products' => $products]);
    }

    public function search(Request $request){
        $products = DB::table('products')
        ->where('name', 'LIKE', '%' . $request->search . '%')
        ->paginate(9);

        return view('shop.products', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shop.admin.products.products-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required|max:191',
            'price' => 'required',
            'width' => 'required',
            'height' => 'required',
            'length' => 'required',
            'weight' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->route('products.create')->withErrors($validator)->withInput();
        }

        DB::table('products')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'width' => $request->width,
            'height' => $request->height,
            'length' => $request->length,
            'weight' => $request->weight,
            'url' => str_replace(' ', '-', $request->name)
        ]);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show($url)
    {
        $product = DB::table('products')->where('url', $url)->first();

        if(!empty($product)){
            return view('shop.product-detail', ['product' => $product]);
        }else{
            return "error";
        }
        exit;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = DB::table('products')->where('id', '=', $id)->first();

        return view('shop.admin.products.products-edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $product)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required|max:191',
            'price' => 'required',
            'width' => 'required',
            'height' => 'required',
            'length' => 'required',
            'weight' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->route('products.edit', $product->id)->withErrors($validator)->withInput();
        }

        DB::table('products')->where('id', $product->id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'width' => $request->width,
            'height' => $request->height,
            'length' => $request->length,
            'weight' => $request->weight,
            'url' => str_replace($request->name, ' ', '-')
        ]);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        DB::table('products')->delete($products->id);

        return redirect()->route('products.index');
    }
}

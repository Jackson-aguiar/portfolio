<?php

namespace App\Http\Controllers;

use App\Models\CategoriesProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('categories')->get();

        return view('shop.admin.products.product-categories', ['categories' => $categories]);
    }

    //Lista todos os produtos dentro de uma categoria
    public function list($id){
        $products = DB::table('categories_products')
        ->where('categories_products.category_id', $id)
        ->join('products', 'categories_products.product_id', '=', 'products.id')
        ->select('products.*')
        ->paginate(12);

        return view('shop.products', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('categories_products')->insertOrIgnore([
            'product_id' => $request->product_id,
            'category_id' => $request->category_id
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoriesProducts  $categoriesProducts
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Retorna a categoria atual pelo id
        $category = DB::table('categories')
        ->where('id', $id)
        ->select('id','name')
        ->first();

        //Retorna os produtos que estão dentro da categoria, pelo ID
        $products_in = DB::table('categories_products')
        ->where('categories_products.category_id', $id)
        ->join('products', 'categories_products.product_id', '=', 'products.id')
        ->select('categories_products.category_id', 'products.name', 'products.id')
        ->get();

        //Retorna os produtos que estão fora da categoria pelo ID
        $products_out = DB::table('products')->leftJoin('categories_products', function($join){
            $join->on('products.id', '=', 'categories_products.product_id');
        })->whereNotIn('id', function($query){
            $query->select('product_id')->from('categories_products');
        })->orWhere('category_id', '!=', $id)
        ->select('id', 'name', 'category_id')->get();

        return view('shop.admin.products.product-select',
        ['product_in' => $products_in, 'product_out' => $products_out,'category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoriesProducts  $categoriesProducts
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoriesProducts $categoriesProducts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoriesProducts  $categoriesProducts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoriesProducts $categoriesProducts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoriesProducts  $categoriesProducts
     * @return \Illuminate\Http\Response
     */
    public function destroy($param = null, Request $request)
    {
        DB::table('categories_products')
        ->where('product_id', $request->product_id)
        ->where('category_id', $request->category_id)
        ->delete();

        return redirect()->back();
    }
}

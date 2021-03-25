<?php

namespace App\Http\Controllers;

use App\Models\CartProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function getProducts(){
        $cartController = new CartController;

        //Retorna Todos Produtos
        $products = DB::table('cart_products')
        ->join('cart', function($join) use ($cartController){
            $join->on('cart_products.cart_id', '=', 'cart.id')
            ->where('cart.session_id', $cartController->setCartSession());
        })
        ->leftJoin('products', 'products.id', '=', 'cart_products.product_id')
        ->select('products.*')
        ->get();

        return $products;
    }

    public function getTotal(){
        $cartController = new CartController;

        $total = DB::table('cart_products')
        ->join('cart', function($join) use ($cartController){
            $join->on('cart_products.cart_id', '=', 'cart.id')
            ->where('cart.session_id', $cartController->setCartSession());
        })
        ->leftJoin('products', 'products.id', '=', 'cart_products.product_id')
        ->select(DB::raw('SUM(products.price) as total_price'))
        ->first();

        return $total;
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
        $cart = new CartController;

        $cart->store();

        $cart_id = $cart->getCart();

        DB::table('cart_products')->insert([
            'cart_id' => $cart_id->id,
            'product_id' => $request->id
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CartProducts  $cartProducts
     * @return \Illuminate\Http\Response
     */
    public function show(CartProducts $cartProducts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CartProducts  $cartProducts
     * @return \Illuminate\Http\Response
     */
    public function edit(CartProducts $cartProducts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CartProducts  $cartProducts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CartProducts $cartProducts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CartProducts  $cartProducts
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id)
    {
        $cartController = new CartController;
        $cart = $cartController->getCart();

        DB::table('cart_products')
        ->where('product_id', $product_id)
        ->where('cart_id', $cart->id)
        ->limit(1)
        ->delete();

        return redirect()->back();
    }
}

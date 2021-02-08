<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\CartProductsController;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CartProductsController $cartProducts)
    {
        $products = $cartProducts->getProducts();

        return view('shop.cart', ['products' => $products]);
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
        DB::table('cart')->updateOrInsert([
            'session_id' => $this->getCartID(),
            'user_id' => Auth::id(),
        ]);
    }

    public function getCart(){
        $cart = DB::table('cart')
        ->where('session_id', $this->getCartID())
        ->select('id')
        ->first();

        return $cart;
    }

    public function getCartID(){
        if(Cookie::get('cart_session_id') == null){
            Cookie::queue('cart_session_id', Hash::make(Session::getId()), 10080);
            return Cookie::get('cart_session_id');
        }

       return Cookie::get('cart_session_id');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\CartProductsController;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CartProductsController $cartProducts)
    {
        //Retorna os produtos da sessão atual e os valores
        $products = $cartProducts->getProducts();

        $total = $cartProducts->getTotal();

        return view('shop.cart', ['products' => $products, 'value' => $total]);
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
    public function store():void
    {
        //Cria um novo carrinho de compras
        DB::table('cart')->updateOrInsert([
            'session_id' => $this->setCartSession(),
            'user_id' => Auth::id(),
        ]);

    }

    //Método que retorna o id do carrinho do usuário atual
    public function getCart(){

        //Pega o carrinho da sessão atual
        $cart = DB::table('cart')
        ->where('session_id', $this->setCartSession())
        ->select('id')
        ->first();

        return $cart;
    }

    public function setCartSession(){
        //Definindo token da sessão
        $cart_session = Session::get('_token');

        if(Cookie::get('cart_session_id') === null){
            //Guardando _token em um cookie
            Cookie::queue('cart_session_id', $cart_session , 10080);
            return $cart_session;
        }else{
            return Cookie::get('cart_session_id');
        }
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

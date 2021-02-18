<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartProductsController;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = DB::table('orders')
        ->join('status', 'orders.status_id', '=', 'status.id')
        ->join('users', 'orders.user_id', '=', 'users.id')
        ->select('orders.*', 'status.name as status_name', 'status.id as status_id', 'users.name as user_name')
        ->get();

        return view('shop.admin.orders.orders-list', ['orders' => $orders]);
    }

    public function list(){
        $orders = DB::table('orders')
        ->where('user_id', Auth::id())
        ->join('status', 'orders.status_id', '=', 'status.id')
        ->select('orders.*', 'status.name as status_name')
        ->get();

        return view('shop.orders', ['orders' => $orders]);
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
        $cart = new CartController();
        $cartProducts = new CartProductsController();

        $value = $cartProducts->getTotal();
        $id = $cart->getCart();

        DB::table('orders')->insert([
            'user_id' => Auth::id(),
            'cart_id' => $id->id, //retorna id do carrinho
            'total_price' => $value->total_price //retorna o valor total do carrinho
        ]);

        return redirect()->route('orders.user');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show(Orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(Orders $order)
    {
        $order = DB::table('orders')
        ->where('id', $order->id)
        ->select('id', 'status_id')
        ->first();

        $status = DB::table('status')
        ->select('id', 'name')
        ->get();

        return view('shop.admin.orders.order-edit', ['order' => $order, 'status' => $status]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orders $orders)
    {
        //
    }
}

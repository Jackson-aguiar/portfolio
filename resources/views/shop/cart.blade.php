@extends('layouts.app-shop')
@section('content')
    <div class="container py-5 my-5 col-md-7">
        <div class="card">
            <div class="card-header lead">
                <i class="fal fa-shopping-cart mr-2"></i>Meu Carrinho
            </div>
            <div class="card-body">
                <table class="table">
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td class="text-secondary">{{$product->name}}</td>
                            <td class="text-right text-success">R$ {{str_replace('.', ',', $product->price)}}</td>
                            <td class="text-right">
                                <form action="{{route('cart_products.destroy', $product->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-sm btn-outline-danger"><i class="fas fa-minus"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
            <div class="card-footer">
                <div class="container">
                    <table class="table">
                        <tbody>
                            <td class="text-secondary">Valor Total</td>
                            <td class="text-right text-success">R$ {{str_replace('.', ',', $value->total_price)}}</td>
                        </tbody>
                    </table>
                    <div class="row d-flex justify-content-center">
                        <form action="{{route('orders.store')}}" method="POST">
                            @csrf
                            <button class="btn btn-primary">Finalizar Compra</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

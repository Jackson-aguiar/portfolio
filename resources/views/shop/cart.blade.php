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
                            <td class="text-right">R$ {{$product->price}}</td>
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
                    <div class="row d-flex justify-content-center">
                        <a class="btn btn-primary text-light">Finalizar Compra</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

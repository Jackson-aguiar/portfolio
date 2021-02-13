@extends('layouts.app-shop')
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <img class="bd-placeholder-img card-img-top" src="{{asset('storage/products/'.$product->url . '.jpg')}}" alt="{{$product->url}}">
            </div>
            <div class="col">
                <div class="row lead d-flex justify-content-center">
                    {{$product->name}}
                </div>
                <hr/>
                <div class="row">
                    <h3 class="font-weight-normal"> R$ {{$product->price}} </h3>
                </div>
                <hr/>
                <div class="row font-weight-light">
                    {{$product->description}}
                </div>
                <div class="row my-3 d-flex justify-content-center">
                    <form class="form-inline" action="{{route('cart_products.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$product->id}}">
                            <button class="btn btn-sm btn-primary text-light btn-block">
                                <i class="fas fa-cart-plus mr-2"></i>Adicionar ao Carrinho
                            </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row my-4 ml-auto">

        </div>
    </div>
@endsection

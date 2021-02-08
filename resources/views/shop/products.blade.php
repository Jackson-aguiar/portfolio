@extends('layouts.app-shop')
@section('content')
<div class="container p-5">
    <div class="row row-cols-1 row-cols-md-3">
        @foreach ($products as $product)
            <div class="col mb-4">
                <div class="card h-100">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em"></text></svg>
                    <div class="card-body">
                        <h5 class="card-title lead text-center">{{$product->name}}</h5>
                        <p class="card-text font-weight-light">{{$product->description}}</p>
                    </div>
                    <div class="card-footer">
                        <div class="container">
                            <div class="row">
                                <p class="card-text"><small class="text-muted">R$ {{$product->price}}</small></p>
                            </div>
                            <div class="row justify-content-center">
                                <a href="{{route('products.show', $product->url)}}" class="btn btn-sm btn-primary text-light m-2">
                                    <i class="fal fa-info-circle mr-2"></i>Ver Detalhes
                                </a>
                            </div>
                            <div class="row justify-content-center">
                                <form action="{{route('cart_products.store')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$product->id}}">
                                    <button class="btn btn-sm btn-primary text-light">
                                        <i class="fas fa-cart-plus mr-2"></i>Adicionar ao Carrinho
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{$products->links()}}
    </div>
</div>
@endsection

@extends('layouts.app-shop')
@section('content')
    <div class="container col-md-9">
        <!-- Alert -->
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            <strong>Alerta</strong> Site Ilustrativo para fins educacionais!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

        <!-- Carousel -->
        <div class="container my-4">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="{{asset('img/carousel-1.jpg')}}" class="img-fluid">
                  </div>
                  <div class="carousel-item">
                    <img src="{{asset('img/carousel-2.jpg')}}" class="img-fluid">
                  </div>
                  <div class="carousel-item">
                    <img src="{{asset('img/carousel-3.jpg')}}" class="img-fluid">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <!-- Products Title -->
        <div class="d-flex justify-content-center my-5">
            <div class="row">
                <h1 class="lead" style="font-size: 25px">Produtos em Destaque</h1>
            </div>
        </div>

        <!-- Products Cards -->
        <div class="row row-cols-1 row-cols-md-3">
            @foreach ($products as $product)
                <div class="col mb-4">
                <div class="card h-100">
                    <img class="bd-placeholder-img card-img-top" src="{{asset('storage/products/'.$product->url . '.jpg')}}" alt="{{$product->url}}">
                    <div class="card-body">
                        <h5 class="card-title lead text-center">{{$product->name}}</h5>
                        <p class="card-text font-weight-light">{{$product->description}}</p>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <p class="card-text text-success font-weight-light ml-3">
                                R$ <span class="price" id="price">{{str_replace('.', ',', $product->price)}}</span>
                            </p>
                        </div>
                        <div class="container mt-3">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <a href="{{route('product.detail', $product->url)}}" class="btn btn-sm btn-primary text-light m-2 col-9">
                                        <i class="fal fa-info-circle mr-2"></i>Ver Detalhes
                                    </a>
                                </div>
                                <div class="row justify-content-center">
                                    <form class="form-inline" action="{{route('cart_products.store')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$product->id}}">
                                        <button class="btn btn-sm btn-primary text-light btn-block col-12">
                                            <i class="fas fa-cart-plus mr-2"></i>Adicionar ao Carrinho
                                        </button>
                                    </form>
                                </div>
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

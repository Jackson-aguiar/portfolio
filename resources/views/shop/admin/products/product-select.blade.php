@extends('shop.admin.layouts.app')
@section('content')
<div class="container p-3">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header bg-dark lead">
                        Categoria {{$category->name}}
                    </div>
                    <div class="card-body">
                        @foreach ($product_in as $product_in)
                        <li class="list-group-item">
                            <div class="container">
                                <div class="row">
                                    <div class="col font-weight-normal text-left">
                                        {{$product_in->name}}
                                    </div>
                                    <div class="col text-right">
                                        <form action="{{route('categories_products.destroy', 2)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="product_id" value="{{$product_in->id}}">
                                            <input type="hidden" name="category_id" value="{{$category->id}}">
                                            <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fas fa-minus"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-6 ml-auto">
                <div class="card">
                    <div class="card-header bg-dark lead">
                        Não Atribuido
                    </div>
                    <div class="card-body">
                        @foreach ($product_out as $product_out)
                        <li class="list-group-item">
                            <div class="container">
                                <div class="row">
                                    <div class="col text-left">
                                        <form action="{{route('categories_products.store')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$product_out->id}}">
                                            <input type="hidden" name="category_id" value="{{$category->id}}">
                                            <button class="btn btn-sm btn-outline-success"><i class="fas fa-plus"></i></button>
                                        </form>
                                    </div>
                                    <div class="col font-weight-normal text-right">
                                        {{$product_out->name}}
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('shop.admin.layouts.app')
@section('content')
<div class="container my-4">
    <div class="card">
        <div class="card-header bg-dark lead">
            Listagem de Produtos
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Excluir</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <th scope="row">{{$product->id}}</th>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>
                                <form action="{{route('products.edit', $product->id)}}" method="POST">
                                    @csrf
                                    @method('GET')
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="far fa-edit"></i>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="{{route('products.destroy', $product->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>

        </div>
    </div>
</div>
@endsection

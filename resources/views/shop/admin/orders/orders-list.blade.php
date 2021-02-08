@extends('shop.admin.layouts.app')
@section('content')
<div class="container my-4">
    <div class="card">
        <div class="card-header bg-dark lead">
            Listagem de Pedidos
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome Comprador</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Status</th>
                    <th scope="col">Editar</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <th scope="row">{{$order->id}}</th>
                            <td>{{$order->user_name}}</td>
                            <td>{{$order->total_price}}</td>
                            <td>{{$order->status_name}}</td>
                            <td>
                                <form action="{{route('orders.edit', $order->id)}}" method="POST">
                                    @csrf
                                    @method('GET')
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="far fa-edit"></i>
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

@extends('layouts.app-shop')
@section('content')
<div class="container col-md-7 my-5 py-5">
    <div class="card">
        <div class="card-header lead">
            Meus Pedidos
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>
                    @isset($orders)
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->status_name}}</td>
                        </tr>
                        @endforeach
                    @endisset
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

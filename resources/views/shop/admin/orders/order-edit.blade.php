@extends('shop.admin.layouts.app')
@section('content')
<div class="container p-5 col-md-9">
    <div class="card">
        <div class="card-header bg-dark lead">
            Editar Pedido
        </div>
        <div class="card-body">
            <form action="{{route('orders.update', $order->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        @foreach ($status as $status)
                            <option value="{{$status->id}}" selected="{{$status->id == $order->status_id  ? 'selected' : ''}}">
                                {{$status->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="text-center my-4">
                    <button type="submit" class="btn btn-outline-primary">Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

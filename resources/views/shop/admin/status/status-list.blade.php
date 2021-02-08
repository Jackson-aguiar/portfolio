@extends('shop.admin.layouts.app')
@section('content')
<div class="container my-4">
    <div class="card">
        <div class="card-header bg-dark lead">
            Listagem de Status
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Excluir</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($status as $status)
                        <tr>
                            <th scope="row">{{$status->id}}</th>
                            <td>{{$status->name}}</td>
                            <td>
                                <form action="{{route('status.edit', $status->id)}}" method="POST">
                                    @csrf
                                    @method('GET')
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="far fa-edit"></i>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="{{route('status.destroy', $status->id)}}" method="POST">
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

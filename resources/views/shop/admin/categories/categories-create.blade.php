@extends('shop.admin.layouts.app')
@section('content')
<div class="container p-5 col-md-9">
    <div class="card">
        <div class="card-header bg-dark lead">
            Cadastrar Categoria
        </div>
        <div class="card-body">
            <form action="{{route('categories.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" name="name" class="form-control">
                    @error('name')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text-center my-4">
                    <button type="submit" class="btn btn-outline-primary">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@extends('shop.admin.layouts.app')
@section('content')
    <div class="container p-5 col-md-9">
        <div class="card">
            <div class="card-header bg-dark lead">
                Cadastro de Produtos
            </div>
            <div class="card-body">
                <form action="{{route('products.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Nome</label>
                        <input type="text" name="name" class="form-control" @error('name') is-invalid @enderror>
                        @error('name')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Descrição</label>
                        <textarea type="text" name="description" class="form-control" rows="3" @error('description') is-invalid @enderror></textarea>
                        @error('description')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Preço</label>
                        <input type="text" name="price" class="form-control" @error('price') is-invalid @enderror>
                        @error('price')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Largura</label>
                        <input type="text" name="width" class="form-control" @error('width') is-invalid @enderror>
                        @error('width')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Altura</label>
                        <input type="text" name="height" class="form-control" @error('height') is-invalid @enderror>
                        @error('height')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tamanho</label>
                        <input type="text" name="length" class="form-control" @error('length') is-invalid @enderror>
                        @error('length')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Peso</label>
                        <input type="text" name="weight" class="form-control" @error('weight') is-invalid @enderror>
                        @error('weight')
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

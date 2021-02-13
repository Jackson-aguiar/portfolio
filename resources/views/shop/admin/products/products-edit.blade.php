@extends('shop.admin.layouts.app')
@section('content')
<div class="container p-5 col-md-9">
    <div class="card">
        <div class="card-header bg-dark lead">
            Editar Produto
        </div>
        <div class="card-body">
            <form action="{{route('products.update', $product->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" name="name" value="{{$product->name}}" class="form-control">
                    @error('name')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Descrição</label>
                    <textarea type="text" name="description" class="form-control" rows="3">{{$product->description}}</textarea>
                    @error('description')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Preço</label>
                    <input type="text" name="price" value="{{$product->price}}" class="form-control">
                    @error('price')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Largura</label>
                    <input type="text" name="width" value="{{$product->width}}" class="form-control">
                    @error('width')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Altura</label>
                    <input type="text" name="height" value="{{$product->height}}" class="form-control">
                        @error('height')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Tamanho</label>
                    <input type="text" name="length" value="{{$product->length}}" class="form-control">
                    @error('length')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Peso</label>
                    <input type="text" name="weight" value="{{$product->weight}}" class="form-control">
                    @error('weight')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text-center my-4">
                    <button type="submit" class="btn btn-outline-primary">Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

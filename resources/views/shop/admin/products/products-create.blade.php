@extends('shop.admin.layouts.app')
@section('content')
<script type="text/javascript" src="{{asset('js/jquery.mask.min.js')}}"></script>
    <div class="container p-5 col-md-9" id="document">
        <div class="card">
            <div class="card-header bg-dark lead">
                Cadastro de Produtos
            </div>
            <div class="card-body">
                <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Nome</label>
                        <input type="text" name="name" class="form-control" class="@error('name') is-invalid @enderror" >
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
                        <input type="text" name="price" id="price" class="form-control" @error('price') is-invalid @enderror onkeyup="maskIt()">
                        @error('price')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Largura</label>
                        <input type="text" id="width" name="width" class="form-control" @error('width') is-invalid @enderror onkeyup="maskIt()">
                        @error('width')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Altura</label>
                        <input type="text" id="height" name="height" class="form-control" @error('height') is-invalid @enderror onkeyup="maskIt()">
                        @error('height')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tamanho</label>
                        <input type="text" id="length" name="length" class="form-control" @error('length') is-invalid @enderror onkeyup="maskIt()">
                        @error('length')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Peso</label>
                        <input type="text" id="weight" name="weight" class="form-control" @error('weight') is-invalid @enderror onkeyup="maskIt()">
                        @error('weight')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Imagem</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="text-center my-4">
                        <button type="submit" class="btn btn-outline-primary">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function maskIt(){
            $('#price').mask('#.##0,00', {reverse: true});
            $('#width').mask('00,00', {reverse: true});
            $('#height').mask('00,00', {reverse: true});
            $('#length').mask('00,00', {reverse: true});
            $('#weight').mask('0000,00', {reverse: true});
        }
    </script>
@endsection

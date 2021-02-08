@extends('shop.admin.layouts.app')
@section('content')
<div class="container p-5 col-md-6">
    <div class="card">
        <div class="card-header bg-dark lead">
            Selecionar Categoria
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                @foreach ($categories as $category)
                    <li class="list-group-item text-center">
                        <a class="text-success" href="{{route('categories_products.show', $category->id)}}">
                            {{$category->name}}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection

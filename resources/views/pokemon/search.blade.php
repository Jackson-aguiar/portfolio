@extends('layouts.app-pokemon')
@section('content')
    <div class="col col-sm-7 col-md-7 col-lg-5 col-xl-4">
        <form class="" method="POST" action="{{route('pokesearch')}}">
            @csrf
            <div class="form-group">
                <label class="text-light text-label">Buscar Pokémon</label>
                <div class="input-group">
                    <input class="form-control" name="search" placeholder="Digite o nome de um pokémon, Ex: Pikachu">
                    <div class="input-group-append">
                        <button class="btn btn-sm btn-outline-primary">
                            <img class="img-fluid" src="{{asset('img/pokemon/search.png')}}">
                        </button>
                    </div>
                </div>
                @error('search')
                    <div class="alert alert-danger my-3">{{ $message }}</div>
                @enderror
            </div>
        </form>
    </div>
@endsection

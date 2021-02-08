@extends('layouts.app-pokemon')
@section('content')
    <div class="my-5 col-sm-7 col-md-7 col-lg-5 col-xl-4 bg-l">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-16">
                    <h3 class="text-light ml-2">{{ucwords($data->species->name)}}</h3>
                    <img src="{{$data->sprites->front_default}}" class="img-fluid ml-4">
                </div>
            </div>

            <div class="row col-sm-18 col-md-18 col-lg-16 col-xl-15 text-light">
                <h4 class="jumbotron-heading">Tipo</h4>
            </div>

            <div class="row col-sm-18 col-md-18 col-lg-16 col-xl-15 text-light">
                @foreach ($data->types as $types)
                    <ul class="nav">
                        <li class="nav-item">
                            <p class="nav-link lead">
                                {{ucwords($types->type->name)}}
                            </p>
                        </li>
                    </ul>
                @endforeach
            </div>

            <div class="row col-sm-18 col-md-18 col-lg-16 col-xl-15 text-light">
                <h4 class="jumbotron-heading">Habilidades</h4>
            </div>

            <div class="row col-sm-18 col-md-18 col-lg-16 col-xl-15 text-light">
                @foreach ($data->abilities as $abilities)
                    <ul class="nav">
                        <li class="nav-item">
                            <p class="nav-link lead">
                                {{ucwords($abilities->ability->name)}}
                            </p>
                        </li>
                    </ul>
                @endforeach
            </div>

            <div class="row col-sm-18 col-md-18 col-lg-16 col-xl-15 text-light">
                <h4 class="jumbotron-heading">Status</h4>
            </div>

            <div class="row col-sm-18 col-md-18 col-lg-16 col-xl-15 text-light">
                @foreach ($data->stats as $stats)
                    <ul class="nav">
                        <li class="nav-item">
                            <p class="nav-link lead">
                                {{ucwords($stats->stat->name)}} : {{$stats->base_stat}}
                            </p>
                        </li>
                    </ul>
                @endforeach
            </div>

            <div class="row col-sm-18 col-md-18 col-lg-16 col-xl-15 text-light">
                <h4 class="jumbotron-heading">Movimentos</h4>
            </div>

            <div class="row col-sm-18 col-md-18 col-lg-16 col-xl-15 text-light">
                <ul class="nav">
                    <li class="nav-item">
                        <p class="nav-link lead">
                            Quantidade : {{count($data->moves)}}
                        </p>
                    </li>
                </ul>
            </div>

            <div class="row mb-5 mt-3 col-sm-18 col-md-18 col-lg-16 col-xl-15 text-light justify-content-center">
                <a class="btn btn-primary" href="{{url()->previous()}}">Voltar a Página Anterior</a>
            </div>

        </div>
    </div>
@endsection

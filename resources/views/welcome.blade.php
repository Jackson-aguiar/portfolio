@extends('layouts.app')
@section('content')

<!-- Carousel -->


<!--About-->
<div class="container mt-5 py-2">
    <div class="row justify-content-center">
        <h2 class="font-weight-normal text-title">Sobre Mim</h2>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <p class="lead text-muted text-justify animate__backInRight">
                Olá, meu nome é Jackson, sou recém formado em Análise e Desenvolvimento de Sistemas,
                e resolvi criar esse site para praticar meus conhecimentos em desenvolvimento WEB
                e expor esses conhecimentos para que eu possa ter algum feedback sobre os projetos
                do meu portfólio aqui apresentados, lembrando que o meu foco principal é o back-end.
            </p>
        </div>
    </div>
</div>

<!--Skills-->
<div class="container mt-4 py-2 col-md-12">
    <h3 class="jumbotron-heading text-center font-weight-normal text-title">Habilidades</h3>
    <ul class="nav d-flex justify-content-center text-muted pt-3">
        <li class="nav-item">
            <p class="nav-link animate__animated animate__backInUp">HTML</p>
        </li>
        <li class="nav-item">
            <p class="nav-link animate__animated animate__backInUp">PHP</p>
        </li>
        <li class="nav-item">
            <p class="nav-link animate__animated animate__backInUp">JavaScript</p>
        </li>
        <li class="nav-item">
            <p class="nav-link animate__animated animate__backInUp">Vue.js</p>
        </li>
        <li class="nav-item">
            <p class="nav-link animate__animated animate__backInUp">Bootstrap</p></li>
        <li class="nav-item">
            <p class="nav-link animate__animated animate__backInUp">Laravel</p>
        </li>
        <li class="nav-item">
            <p class="nav-link animate__animated animate__backInUp">Slim Framework</p>
        </li>
        <li class="nav-item">
            <p class="nav-link animate__animated animate__backInUp">Power BI</p>
        </li>
        <li class="nav-item">
            <p class="nav-link animate__animated animate__backInUp">Integration Services ETL</p>
        </li>
    </ul>
</div>

<!-- Projects -->
<div class="container mt-4 py-2">
    <h3 id="projetos" class="jumbotron-heading mb-4 text-center text-title">Projetos Pessoais</h3>
<div class="row row-cols-1 row-cols-md-3">
    <div class="col mb-4">
        <div class="card h-100">
            <img src="{{asset('img/project-pokemon-icon.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title text-center  lead">API Pokémon</h5>
            <p class="card-text text-justify font-weight-lighter">
                A aplicação utiliza uma API chamada de "PokéApi",
                para buscar o nome do pokémon digitado e trazer informações completas sobre o mesmo.
                o site foi desenvolvido utilizando vuejs e laravel framework.
            </p>
            </div>
            <div class="card-footer">
                <div class="container">
                    <div class="row">
                        <small class="text-muted">
                            <ul class="nav">
                                <li class="nav-item m-1">#HTML</li>
                                <li class="nav-item m-1">#PHP</li>
                                <li class="nav-item m-1">#Laravel</li>
                                <li class="nav-item m-1">#Bootstrap</li>
                                <li class="nav-item m-1">#Vue.js</li>
                                <li class="nav-item m-1">#API</li>
                            </ul>
                        </small>
                    </div>
                    <div class="row d-flex justify-content-center mt-3">
                        <small class="text-muted">
                            <a class="btn btn-sm btn-dark" href="{{route('pokemon')}}">Busque seu Pokémon</a>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col mb-4">
        <div class="card h-100">
            <img src="{{asset('img/project-shop-icon.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title text-center lead">Ecommerce</h5>
            <p class="card-text text-justify font-weight-lighter">
                A aplicação utiliza a linguagem de programação PHP e o framework Laravel,
                para criar um ecommerce com área de compra para clientes e gerenciamento para administradores.
            </p>
            </div>
            <div class="card-footer">
                <div class="container">
                    <div class="row">
                        <small class="text-muted">
                            <ul class="nav">
                                <li class="nav-item m-1">#HTML</li>
                                <li class="nav-item m-1">#PHP</li>
                                <li class="nav-item m-1">#Laravel</li>
                                <li class="nav-item m-1">#Bootstrap</li>
                            </ul>
                        </small>
                    </div>
                    <div class="row d-flex justify-content-center mt-3">
                        <small class="text-muted">
                            <a class="btn btn-sm btn-dark" href="{{route('shop')}}">Vá as compras</a>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col mb-4">
        <div class="card h-100">
            <img src="{{asset('img/project-powerbi-icon.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title text-center lead">Power BI</h5>
            <p class="card-text text-justify">
                Relatório Power BI, com base de dados tiradas do curso udemy
                voltada para criação de dashboards dinâmicas e formulas DAX.
            </p>
            </div>
            <div class="card-footer">
                <div class="container">
                    <div class="row">
                        <small class="text-muted">
                            <ul class="nav">
                                <li class="nav-item m-1">#PowerBI</li>
                            </ul>
                        </small>
                    </div>
                    <div class="row d-flex justify-content-center mt-3">
                        <small class="text-muted">
                            <a class="btn btn-sm btn-dark" href="https://app.powerbi.com/view?r=eyJrIjoiZjUzNjZiMDEtOTFmNC00YWZkLWIxYmQtOGEyM2IwOWFlMmRkIiwidCI6IjMxODk5MGU0LTk0NTktNDc0Zi05MzMzLTgxMWU0YmIyM2I1NyJ9" target="_blank">
                                Ver Relatório
                            </a>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop</title>

    <!--Style-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="sortcut icon" href="{{asset('img/cerrado-icon.png')}}" type="image/png" />
    <link rel="stylesheet" href="{{asset('css/shopapp.css')}}">
</head>
<body>
    <div class=" m-3 col-3 position-fixed fixed-bottom">
        <a href="{{route('home')}}">
            <i class="fas fa-home fa-lg"></i>
        </a>
    </div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{route('shop')}}"><i class="fad fa-shopping-cart m-1 "></i>Shop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{route('shop')}}">Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Categorias
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @foreach($categories as $category)
                        <a class="dropdown-item" href="{{route('product.category', $category->id)}}">{{$category->name}}</a>
                    @endforeach
                </div>
              </li>
          </ul>

        <ul class="nav col-md-6">
            <li class="nav-item col-md-9 mb-1">
                <form action="{{route('product.search')}}" method="POST">
                    @csrf
                    <div class="input-group">
                        <input class="form-control" type="search" name="search" placeholder="Buscar Produto" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                  </form>
              </li>
        </ul>


        <ul class="nav ml-auto">
            <!-- User Authenticated -->
            @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-secondary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user mr-2"></i>{{Auth::user()->name}}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('cart')}}">
                    <i class="fas fa-shopping-cart mr-2"></i>Carrinho
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-truck mr-2"></i>Meus Pedidos
                    </a>
                    <div class="dropdown-divider"></div>
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button class="dropdown-item">
                            <i class="fas fa-door-open mr-2"></i>Sair
                        </button>
                    </form>

                </div>
            </li>
            @endauth

            <!-- User Not Authenticated -->
            @guest
            <li class="nav-item mr-2">
                <a class="nav-link btn btn-sm btn-outline-dark" href="{{route('login')}}">Entre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-sm btn-outline-dark" href="{{route('cart')}}"><i class="far fa-shopping-cart"></i></a>
            </li>
            @endguest
        </ul>
        </div>
      </nav>

    <main class="container-fluid">
        @yield('content')
    </main>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

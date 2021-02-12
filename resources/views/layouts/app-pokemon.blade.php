<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pokésearch</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="sortcut icon" href="{{asset('img/cerrado-icon.png')}}" type="image/png" />
    <link rel="stylesheet" href="{{asset('css/pokeapp.css')}}">
</head>
<body>
    <div class=" m-3 col-3 position-fixed fixed-bottom">
        <a href="{{route('home')}}">
            <i class="fas fa-home fa-lg"></i>
        </a>
    </div>
    <div class="container-fluid h-50">
        <div id="app" class="row justify-content-center align-items-center h-100">
            <poke-page></poke-page>
        </div>
    </div>
    <script src="{{mix('js/app.js')}}">
    </script>
</body>
</html>

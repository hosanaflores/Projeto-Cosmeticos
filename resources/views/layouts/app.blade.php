<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Produtos Cosméticos')</title>

     <!-- Favicon -->
     <link rel="icon" type="image/png" href="{{ asset('images/cream.png') }}">

    <link rel="stylesheet" href="{{ asset('css/index.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="sidebar">
    <img src="{{ asset('images/cosmetics.png') }}" alt="Logo" class="sidebar-logo">
        <a href="{{ route('newproduct') }}" class="{{ Route::is('newproduct') ? 'active' : '' }}">Adicionar</a>
        <a href="{{ route('index') }}" class="{{ Route::is('index') ? 'active' : '' }}">Ver todos</a>
    </div>

    <div class="content">
        <div class="title" id="title">
            <h1>@yield('header', 'Cosméticos')</h1>
        </div>
        @yield('content')
    </div>

</body>

</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trabalho Marcos</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ url('assets/dist/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/dist/uicons/css/uicons-regular-rounded.css') }}">
    <link rel="stylesheet" href="{{ url('assets/dist/uicons-solid/css/uicons-solid-straight.css') }}">

    <link rel="stylesheet" href="{{ url('assets/css/styles.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary nav-bg">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img class="img-fluid img-nav" src="{{ asset('favicon.ico') }}" alt="Imagem da logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a @class(['nav-link', 'active' => isset($menu) && $menu == 'users']) href="{{route('user.index') }}"> Usuários 
                        </a>
                    </li>
                    <li class="nav-item">
                        <a @class(['nav-link', 'active' => isset($menu) && $menu === 'courses']) href="{{ route('course.index') }}">
                            Cursos
                        </a>       
                        {{-- <a class="nav-link active text-light" aria-current="page" href="{{ route('course.index') }}">Cursos</a> --}}
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-12">
                @yield('content')
            </div>
        </div>
    </div>
</body>

<script src="{{ asset('assets/dist/js/jquery.js') }}"></script>
<script src="{{ asset('assets/dist/js/jquery_mask.js') }}"></script>
<script src="{{ asset('assets/dist/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/dist/js/ra_mask.js') }}"></script>

@yield('script')

</html>

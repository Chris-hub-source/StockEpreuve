<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titre_onglet')</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=download" />
</head>

<body>


    <header>
        <div class="logo">
            <a href="{{ url('/') }}">
                StockEpreuve
            </a>
        </div>

        <form class="search" action="{{ route('search') }}" method="GET">
            <input type="text" name="q" class="form-control" placeholder="Rechercher..."
                value="{{ request('q') }}">
            <button type="submit">Rechercher</button>
            </button>
        </form>

        <nav class="nav">
            <a href="{{ route('accueil.index') }}">Accueil</a>
            <a href="{{ route('accueil.index') }}">Epreuves</a>
            <a href="{{ route('accueil.index') }}">Contact</a>
        </nav>
        <div class="nav">
            @if (!auth()->check())
                <a href="{{ route('login') }}">Se connecter</a>
                <a href="{{ route('register') }}">S'inscrire</a>
            @else
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"> Se deconnecter</button>
                </form>
            @endif
        </div>
    </header>
</body>

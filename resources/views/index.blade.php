<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Reeceflix</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}" />
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/06a651c8da.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</head>
<body>
<div class="topBar">
    <div class="logoContainer">
        <a href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
        </a>
    </div>

    <ul class="navLinks">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ route('shows.index') }}">TV Shows</a></li>
        <li><a href="{{ route('movies.index') }}">Movies</a></li>
    </ul>

    <div class="rightItems">
        <a href="{{ route('search') }}">
            <i class="fas fa-search"></i>
        </a>

        <a href="{{ route('profile') }}">
            <i class="fas fa-user"></i>
        </a>

        <a href="{{ route('logout') }}">
            <i class="fas fa-sign-out-alt"></i>
        </a>
    </div>
</div>

<div class='wrapper'>
    @foreach($entities as $entity)
        <div class="previewContainer small">
            <a href="{{ route('entities.show', $entity->id) }}">
                <img src="{{ $entity->thumbnail }}" title="{{ $entity->name }}">
            </a>
        </div>
    @endforeach
</div>
</body>
</html>

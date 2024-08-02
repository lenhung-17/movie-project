<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Reeceflix</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}" />

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/06a651c8da.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</head>
<body>
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

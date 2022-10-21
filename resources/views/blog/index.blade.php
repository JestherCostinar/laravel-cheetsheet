<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    
    @forelse ($posts as $post )
        {{ $loop->first }}
    @empty
        <p>No posts have been set</p>
    @endforelse

    @if (count($posts) > 100)
        {{ dd($posts) }}
    @elseif (count($posts) === 102)
        <h1>
            You have exactly 102 posts
        </h1>
    @else
        <h1>
            No Posts
        </h1>
    @endif

    @unless (!$posts)
        <h1>
            Posts has been added
        </h1>
    @endunless
    </body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>
<body>

    {{-- Barra de navegación --}}
    @include('partials.navigation')

    <h1>Blog</h1>

    {{-- Lista completa de publicaciones del autor --}}
    @foreach ($user->posts as $post)
        <article>
            <h2>{{ $post->title }}</h2>
            <p>{{ substr($post->content, 0, 100) }}...</p>
            <p>Autor: {{ $post->user->username }}</p>
            <a href="{{ route('post.show', $post->id) }}">Ver más</a>
        </article>
    @endforeach

</body>
</html>

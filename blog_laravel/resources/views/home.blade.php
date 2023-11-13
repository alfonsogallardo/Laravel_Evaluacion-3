<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        header {
            background-color: #fff;
            padding: 1em;
            text-align: center;
        }

        nav {
            background-color: #333;
            color: #fff;
            padding: 1em;
            text-align: center;
        }

        main {
            max-width: 800px;
            margin: 2em auto;
            padding: 1em;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        article {
            margin-bottom: 2em;
        }

        h1, h2 {
            color: #333;
        }

        a {
            color: #3498db;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    {{-- Barra de navegación --}}
    @include('partials.navigation')

    <h1>Publicaciones Recientes</h1>

    {{-- Lista de publicaciones recientes --}}
    @foreach ($recentPosts as $post)
        <article>
            <h2>{{ $post->title }}</h2>
            <p>{{ substr($post->content, 0, 150) }}...</p>
            <p>Autor: {{ $post->user->username }}</p>
            <a href="{{ route('post.show', $post->id) }}">Ver más</a>
        </article>
    @endforeach

</body>
</html>

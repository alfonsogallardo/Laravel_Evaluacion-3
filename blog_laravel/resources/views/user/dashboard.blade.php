<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
            text-align: center;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 1em;
        }

        main {
            max-width: 800px;
            margin: 2em auto;
            padding: 1em;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            color: #333;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin-bottom: 1em;
            border: 1px solid #ddd;
            padding: 1em;
            background-color: #f9f9f9;
        }

        li strong {
            display: block;
            font-size: 1.2em;
            margin-bottom: 0.5em;
        }

        li p {
            margin-bottom: 0.5em;
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

    <header>
        <h1>Bienvenido, {{ $user->username }}!</h1>
    </header>

    <main>
        {{-- Mostrar información del usuario --}}
        <p>Nombre: {{ $user->first_name }} {{ $user->last_name }}</p>
        <p>Correo Electrónico: {{ $user->email }}</p>

        {{-- Lista de publicaciones del usuario --}}
        <h2>Tus Publicaciones</h2>
        @if(count($posts) > 0)
            <ul>
                @foreach($posts as $post)
                    <li>
                        <strong>{{ $post->title }}</strong> - {{ $post->created_at->format('d/m/Y') }}
                        <p>{{ Str::limit($post->content, 100) }}</p>
                        <a href="{{ route('post.show', $post->id) }}">Ver Publicación Completa</a>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No has creado ninguna publicación aún.</p>
        @endif
    </main>

    {{-- Barra de navegación --}}
    @include('partials.navigation')
</body>
</html>

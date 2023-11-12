<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nueva Publicación</title>
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
            max-width: 600px;
            margin: 2em auto;
            padding: 1em;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        form {
            margin-top: 1em;
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 0.5em;
            color: #333;
        }

        input, textarea {
            padding: 0.5em;
            margin-bottom: 1em;
            border: 1px solid #ddd;
        }

        button {
            padding: 0.5em 1em;
            background-color: #3498db;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
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
        <h1>Crear Nueva Publicación</h1>
    </header>

    <main>
        {{-- Formulario para crear una nueva publicación --}}
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <label for="title">Título:</label>
            <input type="text" name="title" id="title" required>

            <label for="content">Contenido:</label>
            <textarea name="content" id="content" rows="5" required></textarea>

            <button type="submit">Publicar</button>
        </form>
    </main>

    {{-- Barra de navegación --}}
    @include('partials.navigation')
</body>
</html>

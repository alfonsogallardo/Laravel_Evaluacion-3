<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
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
            max-width: 400px;
            margin: 2em auto;
            padding: 1em;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 0.5em;
        }

        input {
            width: 100%;
            padding: 0.5em;
            margin-bottom: 1em;
            box-sizing: border-box;
        }

        button {
            background-color: #3498db;
            color: #fff;
            padding: 0.7em 1em;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #207bbd;
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
        <h1>Iniciar Sesión</h1>
    </header>

    <main>
        @if(session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <label for="username">Nombre de Usuario:</label>
            <input type="text" name="username" value="{{ old('username') }}" required>
            @error('username') <p style="color: red;">{{ $message }}</p> @enderror

            <label for="password">Contraseña:</label>
            <input type="password" name="password" required>
            @error('password') <p style="color: red;">{{ $message }}</p> @enderror

            <button type="submit">Iniciar Sesión</button>
        </form>

        <p>¿No tienes una cuenta? <a href="{{ route('register.form') }}">Regístrate Aquí</a></p>
    </main>

    {{-- Barra de navegación --}}
    @include('partials.navigation')
</body>
</html>

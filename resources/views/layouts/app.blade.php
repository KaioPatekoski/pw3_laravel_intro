<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Projeto PW3')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <header class="site-header">
        <div class="container">
            <h1>PW3 - Projeto Laravel</h1>

            <nav>
                <a href="/">Inicio</a>
                <a href="/landing">Landing</a>
                <a href="/admin">Admin</a>
            </nav>
        </div>
    </header>
    <main class="container mx-auto my-8 px-4">
        @yield('content')
    </main>

    <footer class="mt-8 rounded-xl bg-slate-900 px-6 py-5 text-sm text-slate-300">
        <div class="container">
            <p>{{ date('Y') }} - Projeto Academico PW3
        </div>
    </footer>

    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>
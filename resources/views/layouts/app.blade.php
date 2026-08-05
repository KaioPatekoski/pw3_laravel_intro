<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Projeto PW3')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
</head>
<body>
    <header>
        <div>
            <h1>PW3 - Projeto Laravel</h1>

            <nav>
                <a href="/"></a>
                <a href="/landing"></a>
                <a href="/admin"></a>
            </nav>
        </div>
    </header>
    <main>
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="container">
            <p>{{ date('y') }} - Projeto Academico PW3
        </div>
    </footer>

    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>
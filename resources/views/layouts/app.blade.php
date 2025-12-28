<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'JuanBIll')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="bg-neutral-light min-h-screen flex flex-col">
    <main class="flex-grow">
        @yield('content')
    </main>

    <footer">
        @yield('footer')
    </footer>
    @stack('scripts')
</body>
</html>

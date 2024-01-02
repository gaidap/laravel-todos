<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laravel Todos</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    @yield('styles')
</head>
<body class="container mx-auto mt-10 mb-10 max-w-lg">
<h1 class="mb-4 text-2xl">
    @yield('title')
    @if(session()->has('success'))
        <span style="color: green;">{{ session()->get('success') }}</span>
    @endif
</h1>
<div>
    @yield('content')
</div>
</body>
</html>

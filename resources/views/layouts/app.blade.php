<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laravel Todos</title>
    @yield('styles')
</head>
<body>
<h1>
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

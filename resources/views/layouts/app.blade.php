<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laravel Todos</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    @include('layouts.styles')

</head>
<body class="container mx-auto mt-10 mb-10 max-w-lg">
<h1 class="mb-4 text-2xl">
    @yield('title')
</h1>
@if(session()->has('success'))
    <div x-data="{ flashVisible: true }">
        <div x-show="flashVisible" class="alert-box" role="alert">
            <button class="abs"></button>
            <strong class="font-bold">Success!</strong>
            <div>{{ session()->get('success') }}</div>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
          <svg
              xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
              stroke-width="1.5" @click="flashVisible = false"
              stroke="currentColor" class="h-6 w-6 cursor-pointer"
          >
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </span>
        </div>
    </div>
@endif
<div>
    @yield('content')
</div>
</body>
</html>

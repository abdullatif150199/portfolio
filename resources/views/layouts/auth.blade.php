<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Login' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="min-h-screen flex items-center justify-center bg-ink-950 text-ink-100 grid-bg">
    <div class="pointer-events-none fixed inset-0 -z-10">
        <div class="absolute inset-0 gradient-blur opacity-50"></div>
    </div>
    {{ $slot }}
    @livewireScripts
</body>
</html>

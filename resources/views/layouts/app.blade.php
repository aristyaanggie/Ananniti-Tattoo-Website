<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Ananniti Tattoo Bali') }} - {{ $title ?? 'Premium Tattoo Studio' }}</title>
    <meta name="description" content="{{ $description ?? config('ananniti.tagline', 'Premium custom tattoo design in Bali') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-background">
    <div class="min-h-screen flex flex-col">
        @yield('content')
    </div>
</body>
</html>

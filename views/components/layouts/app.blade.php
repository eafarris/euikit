<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"><!-- InsideUIKit Layout -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans antialiased flex flex-col min-h-screen justify-between">

@if (isset($header))
<header class="h-16 bg-slate-100 border-b-2 border-slate-200">
{{ $header }}
</header><!-- .h-32 bg-slate-200 -->
@endif

<main class="container grid grid-cols-1 sm:grid-cols-6 mb-auto">
@if (isset($left))
<div class="col-span-1 bg-slate-50 min-h-screen">
    {{ $left }}
</div><!-- .col-span-1 -->
<div class="col-span-5">
    {{ $slot }}
</div>
@else
<div class="mx-auto col-span-6">
    {{ $slot }}
</div>
@endif
</main>

@if (isset($footer))
<footer class="h-16 bg-slate-100 border-t-2 border-slate-300">
{{ $footer }}
</footer>
@endif

@livewireScripts

</body>
</html>

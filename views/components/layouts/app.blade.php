<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"><!-- InsideUIKit Layout -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- AlpineJS -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/mask@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireStyles
    @if (isset($head)) {{ $head }} @endif
</head>
<body class="font-sans antialiased flex flex-col min-h-screen justify-between">

@if (isset($header))
<header class="h-16 text-2xl bg-gradient-to-r from-slate-100 from-50% to-slate-50 border-b-2 border-slate-200 dark:from-slate-700 dark:border-slate-900 dark:to-slate-600 dark:text-slate-200">
{{ $header }}
</header>
@endif

<main class="container grid grid-cols-1 sm:grid-cols-6 m-auto min-w-full">
@if (isset($left))
<div class="col-span-1 bg-slate-100 dark:bg-slate-600 min-h-screen">
    {{ $left }}
</div><!-- .col-span-1 -->
<div class="col-span-5 bg-gradient-to-br from-slate-50 via-slate-100 from-40% to-white dark:from-slate-800 dark:to-slate-700 min-h-screen min-w-fit">
    {{ $slot }}
</div>
@else
<div class="mx-auto col-span-6">
    {{ $slot }}
</div>
@endif
</main>

@if (isset($footer))
<footer class="h-16 bg-slate-100 border-t-2 border-slate-300 dark:bg-slate-700 dark:border-slate-900">
{{ $footer }}
</footer>
@endif

@livewireScripts

</body>
</html>

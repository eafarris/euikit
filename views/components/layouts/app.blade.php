<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @if (isset($head)) {{ $head }} @endif
</head>
<body class="font-sans antialiased flex flex-col min-h-screen justify-between">

@if (isset($header))
<header class="h-16 text-3xl bg-gradient-to-r from-slate-100 from-50% to-slate-50 border-b-2 border-slate-200 dark:from-slate-700 dark:border-slate-900 dark:to-slate-600 dark:text-slate-200">
    <div class="flex items-center justify-between px-4 py-4 text-slate-500">
        {{ $header }}
    </div><!-- .flex items-center justify-between px-4 py-4 text-slate-500 -->
</header>
@endif

<main class="container grid grid-cols-1 sm:grid-cols-6 m-auto min-w-full">
@if (isset($left))
<div class="col-span-1 bg-slate-100 dark:bg-slate-600 h-[calc(100vh-64px)] flex flex-col justify-between">
    {{ $left }}
</div><!-- left -->
<div class="col-span-5 bg-gradient-to-br from-slate-50 via-slate-100 from-20% to-white dark:from-slate-800 dark:to-slate-700 h-[calc(100vh-64px)] min-w-fit">
    {{ $slot }}
</div><!-- right -->
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

</body>
</html><!-- EUIKit app layout -->

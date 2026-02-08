<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    x-data="{
        darkMode: localStorage.getItem('darkMode') || localStorage.setItem('darkMode', 'system')
        }"
    x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))"
    x-bind:class="{ 'dark': darkMode === 'dark' ||
        (darkMode === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches) }"
    }"
>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @isset($head)
        {{ $head }}
    @endisset
</head>

<body class="font-sans subpixel-antialiased
    @isset($bodyclasses)
        {{ $bodyclasses  }}
    @endisset
    "

    x-data="euikit"
    @resize.window="handleResize()"
>

@isset($header)
<header class="flex flex-row items-center justify-between text-3xl h-16 px-4 bg-linear-to-r border-b-2
     text-slate-500 from-slate-100/80 from-50% to-slate-50/80 border-slate-200
     dark:text-slate-200 dark:from-slate-700/80 dark:to-slate-600/80 dark:border-slate-900"
    {{ $header }}
</header>
@endisset

<main class="container grid grid-cols-1 auto-rows-fr sm:grid-cols-6 grow min-h-screen min-w-full"
>
@isset($left)
<div class="col-span-1 bg-slate-100/80 dark:bg-slate-600/80"
    x-show="isOpen()"
>
    <div @click.away="handleAway()" class="relative pb-8">
        <a @click.prevent="handleClose()" href="#" class="absolute inset-0 text-slate-500" title="Hide sidebar">@svg('heroicon-o-chevron-left', 'w-6 h-6')</a>
    </div>
    {{ $left }}
</div><!-- left -->

<div class="bg-linear-to-br min-w-full
    from-slate-50/70 via-slate-100/70 from-20% to-white/10
    dark:from-slate-600/80 dark:via-slate-900/70 dark:to-slate-700"
    :class="isOpen() ? 'col-span-5' : 'col-span-6'"
>
    <div x-show="!isOpen()" class="relative">
        <a x-show="!isOpen()" @click.prevent="handleOpen()" href="#" class="absolute inset-0 text-slate-400" title="Show sidebar">@svg('heroicon-o-chevron-right', 'w-6 h-6')</a>
    </div> {{ $slot }}
</div><!-- right -->
@else
<div class="mx-auto col-span-6">
    {{ $slot }}
</div>
@endisset
</main>

@isset($footer)
<footer class="h-16 border-t-2
     bg-slate-100/80 border-slate-300
    dark:bg-slate-700/80 dark:border-slate-900">
{{ $footer }}
</footer>
@endisset

{{-- Necessary for Alpine-only pages  --}}
@livewireScripts

{{-- Modal component adapted from https://laracasts.com/series/modals-with-the-tall-stack --}}
<script type="text/javascript">
    window.$modals = {
        show(name) {
            window.dispatchEvent(new CustomEvent('modal', { detail: name }))
        }
    }
</script>

{{-- AlpineJS-based sidebar show/hide adapted from https://github.com/zaxwebs/tailwind-alpine/blob/main/sidebar-2.html --}}
<script type="text/javascript">
    function euikit() {
        const breakpoint=1280
        return {
            euikit_help_show: false,
            open: {
                above: true,
                below: false,
            },
            isAboveBreakpoint: window.innerWidth > breakpoint,

            handleResize() {
                this.isAboveBreakpoint = window.innerWidth > breakpoint
            },

            isOpen() {
                if (this.isAboveBreakpoint) {
                    return this.open.above
                }
                return this.open.below
            },

            handleOpen() {
                if (this.isAboveBreakpoint) {
                    this.open.above = true
                }
                this.open.below = true
            },

            handleClose() {
                if (this.isAboveBreakpoint) {
                    this.open.above = false
                }
                this.open.below = false
            },

            handleAway() {
                if (!this.isAboveBreakpoint) {
                    this.open.below = false
                }
            }
        }
    };
</script>
</body>
</html><!-- EUIKit app layout -->

@props(['header' => '', 'footer' => '',
    'leftheadericon' => '', 'rightheadericon' => '',
    'leftfootericon' => '', 'rightfootericon' => '',
])
<section {{ $attributes->merge(['class' => 'min-w-fit m-12 border-slate-300 bg-gradient-to-br from-slate-100 via-slate-200 via-10% to-80% to-slate-100 dark:border-slate-900 dark:from-slate-600 dark:to-slate-700 border-2 p-6 rounded-lg shadow-2xl']) }}>
@if($header)
    <x-e::header lefticon="{{ $leftheadericon }}" righticon="{{ $rightheadericon }}">
        {{ $header }}
    </x-e::header>
@endif

<div class="text-lg text-slate-700 dark:text-slate-300">
    {{ $slot }}
</div>

@if($footer)
    <x-e::footer lefticon="{{ $leftfootericon }}" righticon="{{ $rightfootericon }}">
        {{ $footer }}
    </x-e::footer>
@endif
</section><!-- EUIKit Section component -->

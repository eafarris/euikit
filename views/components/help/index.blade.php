<aside {{ $attributes->merge(['class' => 'text-sm italic text-slate-400 euikit-help']) }} x-show="euikit_help_show">
    {{ $slot }}
</aside>

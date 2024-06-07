@aware(['nohover' => FALSE])
<tr @class([
    'hover:bg-slate-100 dark:hover:bg-slate-800' => ! $nohover
])
{{ $attributes->merge(['class' => "bg-white dark:bg-slate-500 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0"]) }}>
    {{ $slot }}
</tr><!-- EUIKit Table Row -->

@aware(['nohover' => FALSE])
<tr @class([
    'mb-10 lg:mb-0 flex flex-row lg:table-row flex-wrap lg:flex-no-wrap',
    'bg-white dark:bg-slate-800',
    'hover:bg-slate-200 dark:hover:bg-slate-700' => ! $nohover,
])>
    {{ $slot }}
</tr><!-- EUIKit Table Row -->

@props(['type' => 'ghost'])
<aside x-show="euikit_help_show" @class([
    'bg-slate-100 text-slate-500'=> $type == 'light',
    'bg-slate-500 text-slate-100' => $type == 'dark',
    'bg-transparent text-blue-600' => $type == 'link',
    'bg-slate-300 text-slate-900' => $type == 'info',
    'bg-yellow-300 text-yellow-900' => $type == 'warning' || $type == 'yellow',
    'bg-green-300 text-green-900' => $type == 'success' || $type == 'green',
    'bg-red-300 text-red-900' => $type == 'error' || $type == 'danger' || $type == 'delete' || $type == 'red',
    'bg-blue-300 text-blue-900' => $type == 'primary' || $type == 'blue',
    'bg-transparent text-slate-400' => $type == 'ghost',
    'text-sm italic euikit-help px-2'
])>
    {{ $slot }}
</aside>

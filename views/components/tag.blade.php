@props(['type' => 'info', 'lefticon' => '', 'righticon' => '',
])
<span @class([
    'bg-slate-100 text-slate-500'=> $type == 'light',
    'bg-slate-500 text-slate-100' => $type == 'dark',
    'bg-transparent text-blue-600' => $type == 'link',
    'bg-slate-300 text-slate-900' => $type == 'info',
    'bg-yellow-300 text-yellow-900' => $type == 'warning' || $type == 'yellow',
    'bg-green-300 text-green-900' => $type == 'success' || $type == 'green',
    'bg-red-300 text-red-900' => $type == 'error' || $type == 'danger' || $type == 'delete' || $type == 'red',
    'bg-blue-300 text-blue-900' => $type == 'primary' || $type == 'blue',
    'bg-transparent text-slate-400' => $type == 'ghost',
    'inline-flex gap-1 grow-0 shrink items-center justify-items-center text-xs uppercase font-semibold px-2 py-1 rounded-md mx-1'
])>
    @if ($lefticon)
        @svg($lefticon, 'w-3 h-3 mr-1')
    @endif
{{ $slot }}
@if ($righticon)
    @svg($righticon, 'w-3 h-3 ml-1')
@endif
</span><!-- euikit tag -->


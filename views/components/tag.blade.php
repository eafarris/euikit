<span @class([
    'bg-yellow-300 text-yellow-900' => $type == 'warning' || $type == 'yellow',
    'bg-green-300 text-green-900' => $type == 'success' || $type == 'green',
    'bg-red-300 text-red-900' => $type == 'error' || $type == 'danger' || $type == 'red', 
    'bg-blue-300 text-blue-900' => $type == 'primary' || $type == 'blue',
    'bg-slate-300 text-slate-900' => $type == 'info' || $type == 'slate',
    'inline align-middle text-xs uppercase font-semibold px-2 py-1 rounded-md mx-1'
])>
{{ $slot }}
</span><!-- euikit tag -->


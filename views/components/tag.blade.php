{{-- Yeah, this is not optimal. But the colors need to be hard-coded for vite to pick them up. --}}
<span @class([
    'bg-yellow-300 text-yellow-900' => $type == 'warning' || $type == 'yellow',
    'bg-green-300 text-green-900' => $type == 'success' || $type == 'green',
    'bg-red-300 text-red-900' => $type == 'error' || $type == 'danger' || $type == 'red', 
    'bg-blue-300 text-blue-900' => $type == 'primary' || $type == 'blue',
    'bg-slate-300 text-slate-900' => $type == 'info' || $type == 'slate',
    'inline align-middle text-sm uppercase font-semibold p-1 rounded-md mx-1'
])>
{{ $slot }}
</span><!-- euikit tag -->


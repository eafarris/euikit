<td {{ $attributes->merge(['class' => "w-full lg:w-auto p-2 text-slate-600 dark:text-slate-300 lg:table-cell relative lg:static"]) }}>
    @if(isset($label))
        <span class="lg:hidden absolute top-0 left-0 bg-blue-100 px-2 py-1 text-xs font-bold uppercase">{{ $label }}</span>
    @endif
    @if (isset($type))
      @if ($type == 'actions')
        <div class="flex items-center space-x-1">
      @endif
    @endif
    {{ $slot }}
    @if (isset($type))
      @if ($type == 'actions')
        </div><!-- .flex items-center space-x-1 -->
      @endif
    @endif
</td><!-- EUIKit Table Cell -->

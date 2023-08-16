@props(['type' => '', 'route' => '', 'value' => 'Submit', 'icon' => ''])

@php

$button = 'border-transparent inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline';
$coloring = '';
if ($type) {
  switch ($type) {
    case 'light':
      $coloring = 'bg-slate-100 text-slate-500 hover:bg-slate-200 hover:text-slate-600';
      break;
    case 'dark':
      $coloring = 'bg-slate-500 text-slate-100 hover:bg-slate-800 hover:text-slate-200';
      break;
    case 'link':
      $button = 'inline-block align-middle text-center select-none font-normal whitespace-no-wrap py-1 px-3 leading-normal no-underline border hover:rounded';
      $coloring = 'border-transparent bg-transparent hover:border-slate-100 text-blue-600 hover:bg-blue-200 hover:text-slate-800';
      break;
    case 'info':
      $coloring = 'bg-blue-400 text-slate-100 hover:bg-blue-600 hover:text-white';
      break;
    case 'success':
      $coloring = 'bg-green-400 text-white hover:bg-green-600 hover:text-white';
      break;
    case 'warning':
      $coloring = 'bg-yellow-300 text-slate-800 hover:bg-yellow-500 hover:text-slate-100';
      break;
    case 'danger':
    case 'delete':
      $coloring = 'bg-red-500 text-white hover:bg-red-800 hover:text-slate-100';
      break;
    case 'primary':
      $coloring = 'bg-blue-200 text-slate-800 hover:bg-blue-400 hover:text-gray-200';
      break;
    case 'ghost':
      $coloring = 'bg-transparent hover:bg-slate-100';
      break;
  }
}
@endphp

@if ($type == 'delete')
<form action="{{ $route }}" method="POST">
  @csrf
  @method('DELETE')
  <button type="submit" {{ $attributes->merge(['class' => $button . ' ' . $coloring]) }}>{{ $value }}</button>
</form>
@else
  @if ($route)
  <a {{ $attributes->merge(['class' => $button . ' ' . $coloring]) }} href="{{ $route }}">
  @else
  <button {{ $attributes->merge(['class' => $button . ' '  . $coloring]) }} >
  @endif
    @if ($icon)
      @svg($icon, ['class' => 'icon'])
    @endif
    {{ $value }}
  @if ($route)
  </a>
  @else
  </button> 
  @endif
@endif
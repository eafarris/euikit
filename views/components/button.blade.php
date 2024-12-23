@props(['type' => 'info', 'route' => '', 'value' => 'Submit', 'title' => '',
    'lefticon' => '', 'righticon' => '',
])

@php
$button   = 'flex w-fit place-items-center font-normal text-base whitespace-no-wrap rounded py-1 px-3 no-underline h-12 transition duration-150 hover:scale-105 disabled:hover:scale-100';
if ($type) {
  switch ($type) {
    case 'light':
      $coloring = 'bg-slate-100 text-slate-500 hover:bg-slate-200 hover:text-slate-600 disabled:opacity-50 disabled:hover:bg-slate-100 disabled:hover:text-slate-500 ';
      $coloring .= 'dark:bg-slate-300 dark:text-slate-600 dark:hover:bg-slate-400';
      break;
    case 'dark':
      $coloring = 'bg-slate-500 text-slate-100 hover:bg-slate-800 hover:text-slate-200 disabled:opacity-50 disabled:hover:bg-slate-500 disabled:hover:text-slate-100 ';
      $coloring .= 'dark:bg-slate-700 dark:text-slate-300 hover:dark:bg-slate-600';
      break;
    case 'link':
      $button = 'inline-block align-middle text-center select-none font-normal whitespace-no-wrap py-1 px-3 leading-normal underline underline-offset-2 border hover:rounded';
      $coloring = 'border-transparent bg-transparent hover:border-slate-100 text-blue-600 hover:bg-blue-200 hover:text-slate-800 disabled:hover:bg-transparent disabled:hover:border-transparent disabled:hover:text-blue-600 ';
      $coloring .= 'dark:text-slate-400 dark:text-blue-400 dark:hover:bg-blue-200';
      break;
    case 'info':
      $coloring = 'bg-slate-300 text-slate-800 hover:bg-slate-600 hover:text-white disabled:opacity-50 disabled:hover:bg-slate-300 disabled:hover:text-slate-800 ';
      $coloring .= 'dark:bg-slate-700 dark:text-slate-100 dark:hover:bg-slate-800 dark:hover:text-slate-200';
      break;
    case 'success':
    case 'green':
      $coloring = 'bg-green-400 text-green-800 hover:bg-green-600 hover:text-white disabled:opacity-50 disabled:hover:bg-green-400 disabled:hover:text-green-800 ';
      $coloring .= 'dark:bg-green-800 dark:text-green-100 dark:hover:text-green-200 dark:hover:bg-green-900';
      break;
    case 'warning':
    case 'yellow':
      $coloring = 'bg-yellow-300 text-yellow-800 hover:bg-yellow-500 hover:text-slate-100 disabled:opacity-50 disabled:hover:bg-yellow-300 disabled:hover:text-yellow-800 ';
      $coloring .= 'dark:bg-yellow-800 dark:text-yellow-100 dark:hover:text-yellow-200 dark:hover:bg-yellow-900';
      break;
    case 'danger':
    case 'delete':
    case 'error':
    case 'red':
      $coloring = 'bg-red-300 text-red-800 hover:bg-red-500 hover:text-slate-100 disabled:opacity-50 disabled:hover:bg-red-300 disabled:hover:text-red-800 ';
      $coloring .= 'dark:bg-red-800 dark:text-red-100 dark:hover:bg-red-900 dark:hover:text-red-200';
      break;
    case 'primary':
    case 'blue':
      $coloring = 'bg-blue-300 text-blue-800 hover:bg-blue-400 hover:text-gray-200 disabled:opacity-50 disabled:hover:bg-blue-300 disabled:hover:text-blue-800 ';
      $coloring .= 'dark:bg-blue-800 dark:text-blue-100 dark:hover:bg-blue-900 dark:hover:text-blue-200';
      break;
    case 'ghost':
      $coloring = 'bg-transparent text-slate-400 hover:bg-slate-200 disabled:opacity-50 disabled:hover:bg-transparent ';
      $coloring .= 'dark:hover:bg-slate-700 dark:hover:text-slate-300';
      break;
  }
}
@endphp

@if ($type == 'delete')
{{-- modified from https://rappasoft.com/blog/snippet-5-creating-a-simple-but-cool-delete-button-with-alpinejs-and-tailwindcss --}}
<div x-data="{ initial: true, deleting: false }"
  class="flex flex-none "
 >
  <button
    x-on:click.prevent="deleting = true; initial = false"
    x-show="initial"
    x-on:deleting.window="$el.disabled=true"
    {{ $attributes->merge(['class' => $button  . ' ' . $coloring ]) }}
  >
        {{$value }}
</button>
<div
    x-show="deleting"
    x-transition:enter="transition ease-out duration-150"
    x-transition:enter-start="opacity-0 transform scale-90"
    x-transition:enter-end="opacity-100 transform scale-100"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-90"
    class="flex flex-1 justify-center items-center space-x-8"
    >
    <p class="dark:text-white">Are you sure?</p>
    <form x-on:submit="$dispatch('deleting')" method="POST"
      class="flex space-x-3"
    >
      @csrf
      @method('DELETE')

      <x-e::button type="danger" value="Yes"
        x-on:click.prevent="$el.form.submit"
        x-on:deleting.window="$el.disabled = true"
      />
      <x-e::button type="dark" value="No"
        x-on:click.prevent="deleting = false; setTimeout(() => { initial = true }, 150)"
        x-on:deleting.window="$el.disabled = true"
      />

  </form>
</div>
</div> {{-- end of delete button --}}
@else
  @if ($route)
  <a {{ $attributes->merge(['class' => $button . ' ' . $coloring ]) }} href="{{ $route }}" title="{{ $title }}">
  @else
  <button {{ $attributes->merge(['class' => $button . ' '  . $coloring]) }} title="{{ $title }}">
  @endif
    @if ($lefticon)
      <div class="">
        @svg($lefticon, 'w-6 h-6 mr-2 inline')
      </div>
    @endif
      {{ $value }}
    @if($righticon)
        <div class="w-fit flex grow justify-end">
            @svg($righticon, 'w-6 h-6 ml-2 inline')
        </div>
    @endif
  @if ($route)
  </a>
  @else
  </button>
  @endif
@endif

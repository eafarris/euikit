@props(['type' => 'info', 'route' => '', 'value' => 'Submit', 'title' => '',
    'lefticon' => '', 'righticon' => '',
])

@php
$button   = 'flex w-fit place-items-center font-normal text-base whitespace-no-wrap rounded-sm py-1 px-3 no-underline h-12 transition duration-150 hover:scale-105 disabled:hover:scale-100';
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
      $coloring = 'bg-green-400 text-green-800 hover:bg-green-600 hover:text-white disabled:opacity-50 disabled:hover:bg-green-400 disabled:hover:text-green-800 ';
      $coloring .= 'dark:bg-green-800 dark:text-green-100 dark:hover:text-green-200 dark:hover:bg-green-900';
      break;
    case 'warning':
      $coloring = 'bg-yellow-300 text-yellow-800 hover:bg-yellow-500 hover:text-slate-100 disabled:opacity-50 disabled:hover:bg-yellow-300 disabled:hover:text-yellow-800 ';
      $coloring .= 'dark:bg-yellow-800 dark:text-yellow-100 dark:hover:text-yellow-200 dark:hover:bg-yellow-900';
      break;
    case 'danger':
    case 'delete':
    case 'error':
      $coloring = 'bg-red-300 text-red-800 hover:bg-red-500 hover:text-slate-100 disabled:opacity-50 disabled:hover:bg-red-300 disabled:hover:text-red-800 ';
      $coloring .= 'dark:bg-red-800 dark:text-red-100 dark:hover:bg-red-900 dark:hover:text-red-200';
      break;
    case 'primary':
      $coloring = 'bg-blue-300 text-blue-800 hover:bg-blue-400 hover:text-gray-200 disabled:opacity-50 disabled:hover:bg-blue-300 disabled:hover:text-blue-800 ';
      $coloring .= 'dark:bg-blue-800 dark:text-blue-100 dark:hover:bg-blue-900 dark:hover:text-blue-200';
      break;
    case 'ghost':
      $coloring = 'bg-transparent text-slate-400 hover:bg-slate-200 disabled:opacity-50 disabled:hover:bg-transparent ';
      $coloring .= 'dark:hover:bg-slate-700 dark:hover:text-slate-300';
      break;

// TAILWIND PALETTE

    case 'red':
      $coloring = 'bg-red-300 text-red-800 hover:bg-red-500 hover:text-slate-100 disabled:opacity-50 disabled:hover:bg-red-300 disabled:hover:text-red-800 ';
      $coloring .= 'dark:bg-red-800 dark:text-red-100 dark:hover:bg-red-900 dark:hover:text-red-200';
      break;
    case 'orange':
      $coloring = 'bg-orange-300 text-orange-400 hover:bg-orange-200 disabled:opacity-50 disabled:hover:bg-orange-100 ';
      $coloring .= 'dark:hover:bg-orange-700 dark:hover:text-orange-300';
      break;
    case 'amber':
      $coloring = 'bg-amber-300 text-amber-400 hover:bg-amber-200 disabled:opacity-50 disabled:hover:bg-amber-100 ';
      $coloring .= 'dark:hover:bg-amber-700 dark:hover:text-amber-300';
      break;
    case 'yellow':
      $coloring = 'bg-yellow-300 text-yellow-400 hover:bg-yellow-200 disabled:opacity-50 disabled:hover:bg-yellow-100 ';
      $coloring .= 'dark:hover:bg-yellow-700 dark:hover:text-yellow-300';
      break;
    case 'lime':
      $coloring = 'bg-lime-300 text-lime-400 hover:bg-lime-200 disabled:opacity-50 disabled:hover:bg-lime-100 ';
      $coloring .= 'dark:hover:bg-lime-700 dark:hover:text-lime-300';
      break;
    case 'green':
      $coloring = 'bg-green-300 text-green-400 hover:bg-green-200 disabled:opacity-50 disabled:hover:bg-green-100 ';
      $coloring .= 'dark:hover:bg-green-700 dark:hover:text-green-300';
      break;
    case 'emerald':
      $coloring = 'bg-emerald-300 text-emerald-400 hover:bg-emerald-200 disabled:opacity-50 disabled:hover:bg-emerald-100 ';
      $coloring .= 'dark:hover:bg-emerald-700 dark:hover:text-emerald-300';
      break;
    case 'teal':
      $coloring = 'bg-teal-300 text-teal-400 hover:bg-teal-200 disabled:opacity-50 disabled:hover:bg-teal-100 ';
      $coloring .= 'dark:hover:bg-teal-700 dark:hover:text-teal-300';
      break;
    case 'cyan':
      $coloring = 'bg-cyan-300 text-cyan-400 hover:bg-cyan-200 disabled:opacity-50 disabled:hover:bg-cyan-100 ';
      $coloring .= 'dark:hover:bg-cyan-700 dark:hover:text-cyan-300';
      break;
    case 'sky':
      $coloring = 'bg-sky-300 text-sky-400 hover:bg-sky-200 disabled:opacity-50 disabled:hover:bg-sky-100 ';
      $coloring .= 'dark:hover:bg-sky-700 dark:hover:text-sky-300';
      break;
    case 'blue':
      $coloring = 'bg-blue-300 text-blue-400 hover:bg-blue-200 disabled:opacity-50 disabled:hover:bg-blue-100 ';
      $coloring .= 'dark:hover:bg-blue-700 dark:hover:text-blue-300';
      break;
    case 'indigo':
      $coloring = 'bg-indigo-300 text-indigo-400 hover:bg-indigo-200 disabled:opacity-50 disabled:hover:bg-indigo-100 ';
      $coloring .= 'dark:hover:bg-indigo-700 dark:hover:text-indigo-300';
      break;
    case 'violet':
      $coloring = 'bg-violet-300 text-violet-400 hover:bg-violet-200 disabled:opacity-50 disabled:hover:bg-violet-100 ';
      $coloring .= 'dark:hover:bg-violet-700 dark:hover:text-violet-300';
      break;
    case 'purple':
      $coloring = 'bg-purple-300 text-purple-400 hover:bg-purple-200 disabled:opacity-50 disabled:hover:bg-purple-100 ';
      $coloring .= 'dark:hover:bg-purple-700 dark:hover:text-purple-300';
      break;
    case 'fuchsia':
      $coloring = 'bg-fuchsia-300 text-fuchsia-400 hover:bg-fuchsia-200 disabled:opacity-50 disabled:hover:bg-fuchsia-100 ';
      $coloring .= 'dark:hover:bg-fuchsia-700 dark:hover:text-fuchsia-300';
      break;
    case 'pink':
      $coloring = 'bg-pink-300 text-pink-400 hover:bg-pink-200 disabled:opacity-50 disabled:hover:bg-pink-100 ';
      $coloring .= 'dark:hover:bg-pink-700 dark:hover:text-pink-300';
      break;
    case 'rose':
      $coloring = 'bg-rose-300 text-rose-400 hover:bg-rose-200 disabled:opacity-50 disabled:hover:bg-rose-100 ';
      $coloring .= 'dark:hover:bg-rose-700 dark:hover:text-rose-300';
      break;
    case 'slate':
      $coloring = 'bg-slate-300 text-slate-400 hover:bg-slate-200 disabled:opacity-50 disabled:hover:bg-slate-100 ';
      $coloring .= 'dark:hover:bg-slate-700 dark:hover:text-slate-300';
      break;
    case 'gray':
      $coloring = 'bg-gray-300 text-gray-400 hover:bg-gray-200 disabled:opacity-50 disabled:hover:bg-gray-100 ';
      $coloring .= 'dark:hover:bg-gray-700 dark:hover:text-gray-300';
      break;
    case 'zinc':
      $coloring = 'bg-zinc-300 text-zinc-400 hover:bg-zinc-200 disabled:opacity-50 disabled:hover:bg-zinc-100 ';
      $coloring .= 'dark:hover:bg-zinc-700 dark:hover:text-zinc-300';
      break;
    case 'neutral':
      $coloring = 'bg-neutral-300 text-neutral-400 hover:bg-neutral-200 disabled:opacity-50 disabled:hover:bg-neutral-100 ';
      $coloring .= 'dark:hover:bg-neutral-700 dark:hover:text-neutral-300';
      break;
    case 'stone':
      $coloring = 'bg-stone-300 text-stone-400 hover:bg-stone-200 disabled:opacity-50 disabled:hover:bg-stone-100 ';
      $coloring .= 'dark:hover:bg-stone-700 dark:hover:text-stone-300';
      break;

// EXTENDED PALETTE

    case 'plum':
      $coloring = 'bg-plum-300 text-plum-700 hover:bg-plum-200 disabled:opacity-50 disabled:hover:bg-transparent ';
      $coloring .= 'dark:hover:bg-plum-700 dark:hover:text-plum-300';
      break;
    case 'mulberry':
      $coloring = 'bg-mulberry-200 text-mulberry-700 hover:bg-mulberry-100 disabled:opacity-50 disabled:hover:bg-transparent ';
      $coloring .= 'dark:hover:bg-mulberry-700 dark:hover:text-mulberry-300';
      break;
    case 'coral':
      $coloring = 'bg-coral-300 text-coral-700 hover:bg-coral-200 disabled:opacity-50 disabled:hover:bg-transparent ';
      $coloring .= 'dark:hover:bg-coral-700 dark:hover:text-coral-300';
      break;
    case 'tangerine':
      $coloring = 'bg-tangerine-200 text-tangerine-700 hover:bg-tangerine-100 disabled:opacity-50 disabled:hover:bg-transparent ';
      $coloring .= 'dark:hover:bg-tangerine-700 dark:hover:text-tangerine-300';
      break;
    case 'sunflower':
      $coloring = 'bg-sunflower-200 text-sunflower-700 hover:bg-sunflower-100 disabled:opacity-50 disabled:hover:bg-transparent ';
      $coloring .= 'dark:hover:bg-sunflower-700 dark:hover:text-sunflower-300';
      break;
    case 'grass':
      $coloring = 'bg-grass-300 text-grass-700 hover:bg-grass-200 disabled:opacity-50 disabled:hover:bg-transparent ';
      $coloring .= 'dark:hover:bg-grass-700 dark:hover:text-grass-300';
      break;
    case 'jade':
      $coloring = 'bg-jade-300 text-jade-800 hover:bg-jade-200 disabled:opacity-50 disabled:hover:bg-transparent ';
      $coloring .= 'dark:hover:bg-jade-700 dark:hover:text-jade-300';
      break;
    case 'turquoise':
      $coloring = 'bg-turquoise-300 text-turquoise-700 hover:bg-turquoise-200 disabled:opacity-50 disabled:hover:bg-transparent ';
      $coloring .= 'dark:hover:bg-turquoise-700 dark:hover:text-turquoise-300';
      break;
    case 'electric':
      $coloring = 'bg-electric-400 text-electric-700 hover:bg-electric-200 disabled:opacity-50 disabled:hover:bg-transparent ';
      $coloring .= 'dark:hover:bg-electric-700 dark:hover:text-electric-300';
      break;
    case 'cerulean':
      $coloring = 'bg-cerulean-300 text-cerulean-700 hover:bg-cerulean-200 disabled:opacity-50 disabled:hover:bg-transparent ';
      $coloring .= 'dark:hover:bg-cerulean-700 dark:hover:text-cerulean-300';
      break;
    case 'sapphire':
      $coloring = 'bg-sapphire-200 text-sapphire-600 hover:bg-sapphire-100 disabled:opacity-50 disabled:hover:bg-transparent ';
      $coloring .= 'dark:hover:bg-sapphire-700 dark:hover:text-sapphire-300';
      break;
    case 'amethyst':
      $coloring = 'bg-amethyst-200 text-amethyst-600 hover:bg-amethyst-100 disabled:opacity-50 disabled:hover:bg-transparent ';
      $coloring .= 'dark:hover:bg-amethyst-700 dark:hover:text-amethyst-300';
      break;

    default:
      $coloring = 'bg-slate-300 text-slate-800 hover:bg-slate-600 hover:text-white disabled:opacity-50 disabled:hover:bg-slate-300 disabled:hover:text-slate-800 ';
      $coloring .= 'dark:bg-slate-700 dark:text-slate-100 dark:hover:bg-slate-800 dark:hover:text-slate-200';
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

      <x-euikit::button type="danger" value="Yes"
        x-on:click.prevent="$el.form.submit"
        x-on:deleting.window="$el.disabled = true"
      />
      <x-euikit::button type="dark" value="No"
        x-on:click.prevent="deleting = false; setTimeout(() => { initial = true }, 150)"
        x-on:deleting.window="$el.disabled = true"
      />

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

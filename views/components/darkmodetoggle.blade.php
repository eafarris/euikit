<div class="">
<button
    class="flex w-fit place-items-center font-normal text-base whitespace-no-wrap rounded-xs py-1 px-3 no-underline h-12 transition duration-150 hover:scale-105 disabled:hover-scale-100"
    x-show="darkMode === 'light' || darkMode === 'system'"
    @click="darkMode = 'dark';"
>
    @svg('phosphor-moon-duotone', 'w-6 h-6 mr-2 inline')
</button>
<button
    class="flex w-fit place-items-center font-normal text-base whitespace-no-wrap rounded-xs py-1 px-3 no-underline h-12 transition duration-150 hover:scale-105 disabled:hover-scale-100"
    x-show="darkMode === 'dark'"
    @click="darkMode = 'light';"
>
    @svg('phosphor-sun-duotone', 'w-6 h-6 mr-2 inline')
</button>
</div>

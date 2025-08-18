<?php namespace eafarris\euikit;
use Livewire\Livewire;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class euikitServiceProvider extends ServiceProvider {

    public function boot() : void { //
        $this->loadViewsFrom(__DIR__ . '/../views', 'euikit');
        $this->loadViewsFrom(__DIR__ . '/../views', 'e');

        // Blade View Components
        Blade::component('euikit-form-lookup', \eafarris\euikit\Components\Form\Lookup::class);

        // Livewire components
        Livewire::component('euikit-lookup', \eafarris\euikit\Livewire\Lookup::class);
        Livewire::component('euikit-textlist', \eafarris\euikit\Livewire\Textlist::class);
        Livewire::component('euikit-modeltag', \eafarris\euikit\Livewire\ModelTag::class);
        Livewire::component('euikit-sheetimport', \eafarris\euikit\Livewire\SheetImport::class);

        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    } // endfunction boot

    public function provides() : array { //
        return ['euikit'];
    } // endfunction provides

    public function register() : void { //
        $this->mergeConfigFrom(__DIR__ . '/../config/euikit.php', 'euikit');
    } // endfunction register()

    public function bootForConsole() : void { //
        $this->publishes([ __DIR__ . '/../config/euikit.php' => config_path('euikit.php') ], 'euikit.config');
        $this->publishes([ __DIR__ . '/../views/components' => resource_path('views/vendor/euikit/components') ], 'x-euikit::.components');
    } // endfunction bootForConsole

}

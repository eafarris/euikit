<?php namespace eafarris\euikit;
use Livewire\Livewire;
use eafarris\euikit\Livewire\ModelTag;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class euikitServiceProvider extends ServiceProvider {

    public function boot() : void { // 
        $this->loadViewsFrom(__DIR__ . '/../views', 'euikit');
        $this->loadViewsFrom(__DIR__ . '/../views', 'e');

        // Blade View Components
        Blade::componentNamespace('eafarris\euikit\\Components', 'euikit');

        // Livewire components
        Livewire::component('euikit-modeltag', ModelTag::class);

        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    } // endfunction boot

public function provides() : array { // 
    return ['euikit'];
} // endfunction provides

    public function register() : void { // 
        $this->mergeConfigFrom(__DIR__ . '/../config/euikit.php', 'euikit');

        $this->app->singleton('euikit', function ($app) {
            return new euikit;
        });
    } // endfunction register()

    public function bootForConsole() : void { // 
        $this->publishes([
            __DIR__ . '/../config/euikit.php' => config_path('euikit.php'),
        ], 'euikit.config');
    } // endfunction bootForConsole

}

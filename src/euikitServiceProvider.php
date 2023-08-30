<?php namespace eafarris\euikit;
use Livewire\Livewire;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class euikitServiceProvider extends ServiceProvider {

    public function boot() { // 
        $this->loadViewsFrom(__DIR__ . '/../views', 'euikit');
        $this->loadViewsFrom(__DIR__ . '/../views', 'e');

        // Blade View Components
        Blade::componentNamespace('eafarris\euikit\\Components', 'euikit');

        // Livewire components

        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    } // endfunction boot

public function provides() { // 
    return ['euikit'];
} // endfunction provides

    public function register() { // 
        $this->mergeConfigFrom(__DIR__ . '/../config/euikit.php', 'euikit');

        $this->app->singleton('euikit', function ($app) {
            return new euikit;
        });
    } // endfunction register()

    public function bootForConsole() { // 
        $this->publishes([
            __DIR__ . '/../config/euikit.php' => config_path('euikit.php'),
        ], 'euikit.config');
    } // endfunction bootForConsole

}
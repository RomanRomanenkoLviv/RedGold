<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Route as BaseRoute;
use Route;
use Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // use implementation from https://github.com/laravel/framework/issues/24734
        Blade::directive('json', function ($expression) {
            return "<?php echo json_encode($expression, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE) ?>";
        });

        Blade::directive('static_include', function ($path) {
            return "<?php echo file_get_contents(public_path($path)); ?>";
        });

        BaseRoute::macro('menuGroupKey', function ($key) {
            $this->action['menuGroupKey'] = $key;

            return $this;
        });

        BaseRoute::macro('matchMenuGroupKey', function ($pattern) {
            return str_is($pattern, array_get($this->action, 'menuGroupKey'));
        });

        Blade::if('activemenu', function (...$patterns) {
            if ($current = Route::current()) {
                foreach ($patterns as $pattern) {
                    if ($current->matchMenuGroupKey($pattern)) {
                        return true;
                    }
                }
            }

            return false;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

<?php

namespace AwStudio\Cms;

use AwStudio\Cms\Commands\InstallCommand;
use Illuminate\Support\ServiceProvider;

class CmsServiceProvider extends ServiceProvider
{
    /**
     * Register application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerCommands();

        $this->publishes([
            __DIR__ . '/../publish/Http/Controllers/HomeController.php'           => app_path('Http/Controllers/Pages/HomeController.php'),
            __DIR__ . '/../publish/Http/Controllers/RootController.php'           => app_path('Http/Controllers/Pages/RootController.php'),
            __DIR__ . '/../publish/Http/Middleware/HandleInertiaRequests.php'     => app_path('Http/Middleware/HandleInertiaRequests.php'),
            __DIR__ . '/../publish/Http/Resources/LitNavigationResource.php'      => app_path('Http/Resources/LitNavigationResource.php'),
            __DIR__ . '/../publish/Http/Kernel.php'                               => app_path('Http/Kernel.php'),
            __DIR__ . '/../publish/lit/app/Config/Form'                           => base_path('lit/app/Config/Form'),
            __DIR__ . '/../publish/lit/app/Config/NavigationConfig.php'           => base_path('lit/app/Config/NavigationConfig.php'),
            __DIR__ . '/../publish/lit/app/Http/Controllers/Form'                 => base_path('lit/app/Http/Controllers/Form'),
            __DIR__ . '/../publish/lit/app/Macros'                                => base_path('lit/app/Macros'),
            __DIR__ . '/../publish/lit/app/Providers/LitstackServiceProvider.php' => base_path('lit/app/Providers/LitstackServiceProvider.php'),
            __DIR__ . '/../publish/resources/js'                                  => resource_path('js'),
            __DIR__ . '/../publish/routes/web.php'                                => base_path('routes/web.php'),
            // Pages
            __DIR__ . '/../publish/lit/app/Config/Pages'           => base_path('lit/app/Config/Pages'),
            __DIR__ . '/../publish/lit/app/Http/Controllers/Pages' => base_path('lit/app/Http/Controllers/Pages'),
        ], 'aw-cms');
    }

    /**
     * Register Deeplable command.
     *
     * @return void
     */
    public function registerCommands(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }
}

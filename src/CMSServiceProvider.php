<?php

namespace SteelAnts\LaravelCMS;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use SteelAnts\LaravelCMS\Livewire\Comment\DataTable;
use Steelants\LaravelCMS\Livewire\Comment\Form;
use SteelAnts\LaravelCMS\Routing\CMSRoutesMixin;
use Illuminate\Support\Facades\Route;

class CMSServiceProvider extends ServiceProvider
{
    public function register()
    {
        if (!$this->app->runningInConsole()) {
            return;
        }

        /*$this->commands([
            InstallCommand::class
        ]);*/
    }

    public function boot()
    {

        $this->loadMigrationsFrom(dirname(__DIR__) . '/database/migrations');

        $this->loadViewsFrom(dirname(__DIR__) . '/resources/views', 'cms');

        Livewire::component('comment.data-table', DataTable::class);
        Livewire::component('comment.form', Form::class);
        Livewire::component('node.data-table', \SteelAnts\LaravelCMS\Livewire\Node\DataTable::class);
        Livewire::component('node.form', \SteelAnts\LaravelCMS\Livewire\Node\Form::class);
        Route::mixin(new CMSRoutesMixin);

        if (!$this->app->runningInConsole()) {
            return;
        }

        $this->publishesMigrations([
            __DIR__ . '/../database/migrations' => database_path('migrations'),
        ], 'cms-migrations');

        $this->publishes([
            dirname(__DIR__) . '/config/cms.php' => config_path('cms.php'),
        ], 'cms-config');

        $this->publishes([
            dirname(__DIR__) . '/resources/views' => resource_path('views/vendor/cms'),
        ], 'cms-views');
    }
}

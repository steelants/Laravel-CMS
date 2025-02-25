<?php

namespace SteelAnts\LaravelCMS;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

class CMSServiceProvider extends ServiceProvider
{
    public function register()
    {
        if (!$this->app->runningInConsole())
            return;

        /*$this->commands([
            InstallCommand::class
        ]);*/
    }

    public function boot()
    {
        $this->loadMigrationsFrom(dirname(__DIR__) . '/database/migrations');

        if (config('cms.routes')) {
            $this->loadRoutesFrom(dirname(__DIR__) . '/routes.php');
        }

        $this->loadViewsFrom(dirname(__DIR__) . '/resources/views', 'cms');

        Livewire::component('comment.data-table', \SteelAnts\LaravelCMS\Livewire\Comment\DataTable::class);
        Livewire::component('comment.form', \Steelants\LaravelCMS\Livewire\Comment\Form::class);
        Livewire::component('node.data-table', \SteelAnts\LaravelCMS\Livewire\Node\DataTable::class);
        Livewire::component('node.form', \SteelAnts\LaravelCMS\Livewire\Node\Form::class);

        if (!$this->app->runningInConsole())
            return;

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

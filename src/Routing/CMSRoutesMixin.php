<?php

namespace SteelAnts\LaravelCMS\Routing;

class CMSRoutesMixin
{
    public function cmsPublic()
    {
        return function ($options = []) {
            $namespace = 'SteelAnts\LaravelCMS\Http\Controllers';
            $this->group(['namespace' => $namespace], function () use ($options) {
                $this->get('/page/{slug}', 'PageController@show')->middleware(['web', 'auth'])->name('cms.page.show');
                $this->get('/posts', 'PageController@index')->middleware(['web', 'auth'])->name('cms.page.index');
                $this->get('/post/{post_id}', 'PageController@show')->middleware(['web', 'auth'])->name('cms.page.show');
            });
        };
    }

    public function cmsAdmin()
    {
        return function ($options = []) {
            $namespace = 'SteelAnts\LaravelCMS\Http\Controllers';
            $this->group(['namespace' => $namespace], function () use ($options) {
                $this->get('/pages', 'AdminController@pages')->middleware(['web', 'auth'])->name('cms.admin.pages');
                $this->get('/posts', 'AdminController@posts')->middleware(['web', 'auth'])->name('cms.admin.posts');
            });
        };
    }
}

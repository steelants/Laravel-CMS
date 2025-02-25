# Laravel-CMS

## Currently WIP

### Created by: [SteelAnts s.r.o.](https://www.steelants.cz/)

[![Total Downloads](https://img.shields.io/packagist/dt/steelants/form.svg?style=flat-square)](https://packagist.org/packages/steelants/laravel-cms)


### Install

```
composer require steelants/laravel-cms
php artisan vendor:publish --tag=cms-migrations
php artisan migrate
```

### Development

1) Clone Repo to `[LARVEL-ROOT]/packages/`
2) Modify ;composer.json`
```json
    "autoload": {
        "psr-4": {
            ...
            "SteelAnts\\LaravelCMS\\": "packages/laravel-cms/src/"
            ...
        }
    },
```
3) Add (code below) to: `[LARVEL-ROOT]/bootstrap/providers.php`
```php
SteelAnts\LaravelCMS\CMSServiceProvider::class,
```

## Contributors
<a href="https://github.com/steelants/Laravel-CMS/graphs/contributors">
  <img src="https://contrib.rocks/image?repo=steelants/Laravel-CMS" />
</a>

## Other Packages
[steelants/datatable](https://github.com/steelants/Livewire-DataTable)

[steelants/form](https://github.com/steelants/Laravel-Form)

[steelants/modal](https://github.com/steelants/Livewire-Modal)


## Notes
* [Laravel MFA](https://dev.to/roxie/how-to-add-google-s-two-factor-authentication-to-a-laravel-8-application-4jjp)


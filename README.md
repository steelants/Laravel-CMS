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

###### Add to route file:
```php
Route::cmsPublic(); //Public routes as Pages and so on
Route::cmsAdmin(); //Admin crud Routes
```

## Development

1. Create subfolder `/packages` at root of your laravel project

2. clone repository to sub folder `/packages` (you need to be positioned at root of your laravel project in your terminal)
```bash
git clone https://github.com/steelants/Laravel-CMS.git ./packages/Laravel-CMS
```

3. edit composer.json file
```json
"autoload": {
	"psr-4": {
		"SteelAnts\\LaravelCMS\\": "packages/laravel-cms/src/"
	}
}
```

4. Add provider to `bootstrap/providers.php`
```php
return [
	...
	SteelAnts\LaravelCMS\CMSServiceProvider::class,
	...
];
```

5. use commands to aplicate changes
```bash
composer dump-autoload
```

## Contributors
<a href="https://github.com/steelants/Laravel-CMS/graphs/contributors">
  <img src="https://contrib.rocks/image?repo=steelants/Laravel-CMS" />
</a>

## Other Packages
[steelants/laravel-auth](https://github.com/steelants/laravel-auth)

[steelants/laravel-boilerplate](https://github.com/steelants/Laravel-Boilerplate)

[steelants/datatable](https://github.com/steelants/Livewire-DataTable)

[steelants/form](https://github.com/steelants/Laravel-Form)

[steelants/modal](https://github.com/steelants/Livewire-Modal)

[steelants/laravel-tenant](https://github.com/steelants/Laravel-Tenant)


## Notes
* [Laravel MFA](https://dev.to/roxie/how-to-add-google-s-two-factor-authentication-to-a-laravel-8-application-4jjp)


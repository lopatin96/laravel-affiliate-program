# Install

Before install composer, create a ```resources/markdown/affiliate-program-terms.md``` file in you project (see **Terms** section belowe).

### Terms
Create a ```resources/markdown/affiliate-program-terms.md``` file with Terms of Service.

### Migrations
Run a migration ```php artisan migrate```

### Middlewares
Add AffiliateProgram middleware to middleware array in ```app/Http/Kernel.php```:
```php
protected $middleware = [
    …
    \Atin\LaravelAffiliateProgram\Http\Middleware\AffiliateProgram::class,
];
```

### Listeners
Add ```SaveAffiliateId``` and ```SparkAffiliateSubscriptionUpdate``` to ```app/Providers/EventServiceProvider.php```:

```php
use Atin\LaravelAffiliateProgram\Listeners\SaveAffiliateId;
use Atin\LaravelAffiliateProgram\Listeners\SparkAffiliateSubscriptionUpdate;
…
protected $listen = [
    Registered::class => [
        SaveAffiliateId::class,
    ],
];

protected $subscribe = [
    SparkAffiliateSubscriptionUpdate::class,
];
```

### Trait and Casts
Add ```HasAffiliate``` trait to User model.

```php
use Atin\LaravelAffiliateProgram\Traits\HasAffiliate;

class User extends Authenticatable
{
    use HasAffiliate;
```

# Publishing
### Localization
```php
php artisan vendor:publish --tag="laravel-affiliate-program-lang"
```

### Views
```php
php artisan vendor:publish --tag="laravel-affiliate-program-views"
```

### Config
```php
php artisan vendor:publish --tag="laravel-affiliate-program-config"
```
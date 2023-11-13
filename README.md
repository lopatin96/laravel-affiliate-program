# Install

Before install composer, create a ```resources/markdown/affiliate-terms.md``` file in you project (see **Terms** section belowe).

### Terms
Create a ```resources/markdown/affiliate-terms.md``` file with Terms of Service.

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

### Kernel and Cookie
In ```app/Http/Kernel.php``` moved these two lines (```\Illuminate\Session\Middleware\StartSession::class``` and ```\Illuminate\View\Middleware\ShareErrorsFromSession::class```) from ```$middlewareGroups``` to ```$middleware```:
```php

protected $middleware = [
   …
    \App\Http\Middleware\TrimStrings::class,
    \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    …
    \Illuminate\Session\Middleware\StartSession::class,
    \Illuminate\View\Middleware\ShareErrorsFromSession::class,
    …
    \App\Http\Middleware\EncryptCookies::class,
    \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
    …
];
```

## Nova
### NovaServiceProvider
```php
MenuSection::make('Affiliate Program', [
    MenuItem::resource(AffiliateCommission::class)
        ->name('Commissions'),
    MenuItem::resource(AffiliateInvoice::class)
        ->name('Invoices'),
    MenuItem::resource(AffiliatePayout::class)
        ->name('Payouts'),
])
    ->icon('user-group'),
```

### Resources
#### AffiliateCommission
```php
<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Stack;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class AffiliateCommission extends Resource
{
    public static $model = \Atin\LaravelAffiliateProgram\Models\AffiliateCommission::class;

    public static $search = [
        'id',
    ];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable()->hideFromIndex(),

            Stack::make('User', [
                BelongsTo::make('User')
                    ->peekable()
                    ->nullable()
                    ->readonly()
                    ->displayUsing(fn ($user) => mb_strimwidth($user->name, 0, 32, '…')),

                Text::make('User', function () {
                    return $this->user?->email ? mb_strimwidth($this->user->email, 0, 32, '…') : 'No email';
                })
                    ->asHtml(),

                Text::make('User', function () {
                    return 'Stripe: '.($this->user?->stripe_id ?: '—');
                })
                    ->asHtml(),

                Text::make('Created At', function () {
                    return "User Created: {$this->user?->created_at->diffForHumans()}";
                })
                    ->asHtml(),
            ])
                ->sortable(),

            Currency::make('Payment')
                ->asMinorUnits()
                ->sortable()
                ->readonly(),

            Currency::make('Commission')
                ->asMinorUnits()
                ->sortable()
                ->readonly(),

            Number::make('Revenue Percent')
                ->sortable()
                ->readonly(),
        ];
    }

    public function cards(NovaRequest $request)
    {
        return [
        ];
    }

    public function filters(NovaRequest $request)
    {
        return [
        ];
    }

    public static function authorizedToCreate(Request $request)
    {
        return false;
    }

    public function authorizedToDelete(Request $request)
    {
        return false;
    }
}
```

#### AffiliateInvoice
```php
<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Stack;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class AffiliateInvoice extends Resource
{
    public static $model = \Atin\LaravelAffiliateProgram\Models\AffiliateInvoice::class;

    public static $search = [
        'id',
    ];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()
                ->sortable(),

            Stack::make('User', [
                BelongsTo::make('User')
                    ->peekable()
                    ->nullable()
                    ->readonly()
                    ->displayUsing(fn ($user) => mb_strimwidth($user->name, 0, 32, '…')),

                Text::make('User', function () {
                    return $this->user?->email ? mb_strimwidth($this->user->email, 0, 32, '…') : 'No email';
                })
                    ->asHtml(),

                Text::make('User', function () {
                    return 'Stripe: '.($this->user?->stripe_id ?: '—');
                })
                    ->asHtml(),

                Text::make('Created At', function () {
                    return "User Created: {$this->user?->created_at->diffForHumans()}";
                })
                    ->asHtml(),
            ])
                ->sortable(),
        ];
    }

    public function cards(NovaRequest $request)
    {
        return [
        ];
    }

    public function filters(NovaRequest $request)
    {
        return [
        ];
    }

    public static function authorizedToCreate(Request $request)
    {
        return false;
    }

    public function authorizedToDelete(Request $request)
    {
        return false;
    }
}
```

#### AffiliatePayout
```php
<?php

namespace App\Nova;

use Atin\LaravelAffiliateProgram\Models\AffiliateInvoice;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;

class AffiliatePayout extends Resource
{
    public static $model = \Atin\LaravelAffiliateProgram\Models\AffiliatePayout::class;

    public static $search = [
        'id',
    ];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable()->hideFromIndex(),

            BelongsTo::make('Affiliate Invoice')
                ->peekable(),

            Currency::make('Amount')
                ->asMinorUnits()
                ->sortable(),

        ];
    }

    public function cards(NovaRequest $request)
    {
        return [
        ];
    }

    public function filters(NovaRequest $request)
    {
        return [
        ];
    }

    public function authorizedToDelete(Request $request)
    {
        return false;
    }
}
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
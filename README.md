# Install

Before install composer, create a ```resources/markdown/affiliate-terms.md``` file in you project (see **Terms** section belowe).

### Terms
Create a ```resources/markdown/affiliate-terms.md``` file with Terms of Service.

### Migrations
Run a migration ```php artisan migrate```

### Middlewares
1. Add AffiliateProgram middleware to middleware array in ```app/Http/Kernel.php```
2. moved these two lines (```\Illuminate\Session\Middleware\StartSession::class``` and ```\Illuminate\View\Middleware\ShareErrorsFromSession::class```) from ```$middlewareGroups``` to ```$middleware```:
```php
protected $middleware = [
    …
    \App\Http\Middleware\EncryptCookies::class,
    \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
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

## Nova
Add ```NewAffiliateCommissions``` and ```NewAffiliateInvoices``` to ```app/Nova/Dashboards/Main.php```
```php
public function cards()
{
    return [
        …
        new NewAffiliateCommissions,
        new NewAffiliateInvoices,
        …
    ];
}
```

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

### Metrics
#### AffiliateCommissionsPerDay
```php
<?php

namespace App\Nova\Metrics;

use Atin\LaravelAffiliateProgram\Models\AffiliateCommission;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Trend;

class AffiliateCommissionsPerDay extends Trend
{
    public $width = '1/4';

    public function calculate(NovaRequest $request): \Laravel\Nova\Metrics\TrendResult
    {
        return $this->countByDays($request, AffiliateCommission::class);
    }

    public function ranges(): array
    {
        return [
            30 => __('30 Days'),
            60 => __('60 Days'),
            90 => __('90 Days'),
        ];
    }

    public function cacheFor(): \DateInterval|float|\DateTimeInterface|\Illuminate\Support\Carbon|int|null
    {
        return now()->addMinute();
    }
}
```

#### AffiliateInvoicesPerDay
```php
<?php

namespace App\Nova\Metrics;

use Atin\LaravelAffiliateProgram\Models\AffiliateInvoice;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Trend;

class AffiliateInvoicesPerDay extends Trend
{
    public $width = '1/4';

    public function calculate(NovaRequest $request): \Laravel\Nova\Metrics\TrendResult
    {
        return $this->countByDays($request, AffiliateInvoice::class);
    }

    public function ranges(): array
    {
        return [
            30 => __('30 Days'),
            60 => __('60 Days'),
            90 => __('90 Days'),
        ];
    }

    public function cacheFor(): \DateInterval|float|\DateTimeInterface|\Illuminate\Support\Carbon|int|null
    {
        return now()->addMinute();
    }
}
```

#### AffiliatePayoutsPerDay
```php
<?php

namespace App\Nova\Metrics;

use Atin\LaravelAffiliateProgram\Models\AffiliatePayout;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Trend;

class AffiliatePayoutsPerDay extends Trend
{
    public $width = '1/4';

    public function calculate(NovaRequest $request): \Laravel\Nova\Metrics\TrendResult
    {
        return $this->countByDays($request, AffiliatePayout::class);
    }

    public function ranges(): array
    {
        return [
            30 => __('30 Days'),
            60 => __('60 Days'),
            90 => __('90 Days'),
        ];
    }

    public function cacheFor(): \DateInterval|float|\DateTimeInterface|\Illuminate\Support\Carbon|int|null
    {
        return now()->addMinute();
    }
}
```

#### NewAffiliateCommissions
```php
<?php

namespace App\Nova\Metrics;

use Atin\LaravelAffiliateProgram\Models\AffiliateCommission;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Value;

class NewAffiliateCommissions extends Value
{
    public $width = '1/4';

    public function calculate(NovaRequest $request): \Laravel\Nova\Metrics\ValueResult
    {
        return $this->count($request, AffiliateCommission::class);
    }

    public function ranges(): array
    {
        return [
            'TODAY' => __('Today'),
            'YESTERDAY' => __('Yesterday'),
            7 => __('7 Days'),
            30 => __('30 Days'),
            60 => __('60 Days'),
            365 => __('365 Days'),
            'MTD' => __('Month To Date'),
            'QTD' => __('Quarter To Date'),
            'YTD' => __('Year To Date'),
        ];
    }

    public function cacheFor(): \DateInterval|float|\DateTimeInterface|\Illuminate\Support\Carbon|int|null
    {
        return now()->addMinute();
    }
}
```

#### NewAffiliateInvoices
```php
<?php

namespace App\Nova\Metrics;

use Atin\LaravelAffiliateProgram\Models\AffiliateInvoice;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Value;

class NewAffiliateInvoices extends Value
{
    public $width = '1/4';

    public function calculate(NovaRequest $request): \Laravel\Nova\Metrics\ValueResult
    {
        return $this->count($request, AffiliateInvoice::class);
    }

    public function ranges(): array
    {
        return [
            'TODAY' => __('Today'),
            'YESTERDAY' => __('Yesterday'),
            7 => __('7 Days'),
            30 => __('30 Days'),
            60 => __('60 Days'),
            365 => __('365 Days'),
            'MTD' => __('Month To Date'),
            'QTD' => __('Quarter To Date'),
            'YTD' => __('Year To Date'),
        ];
    }

    public function cacheFor(): \DateInterval|float|\DateTimeInterface|\Illuminate\Support\Carbon|int|null
    {
        return now()->addMinute();
    }
}
```

### Resources
#### AffiliateCommission
```php
<?php

namespace App\Nova;

use App\Nova\Metrics\AffiliateCommissionsPerDay;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Line;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Stack;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Marshmallow\Filters\DateRangeFilter;

class AffiliateCommission extends Resource
{
    public static $model = \Atin\LaravelAffiliateProgram\Models\AffiliateCommission::class;

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

            Stack::make('Created At', [
                DateTime::make('Created At'),

                Line::make(null, function () {
                    return "({$this->created_at->diffForHumans()})";
                })
                    ->asSmall(),
            ])
                ->sortable()
                ->readonly(),
        ];
    }

    public function cards(NovaRequest $request)
    {
        return [
            new AffiliateCommissionsPerDay,
        ];
    }

    public function filters(NovaRequest $request)
    {
        return [
            new DateRangeFilter('created_at', 'Created Date'),
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

use App\Nova\Metrics\AffiliateInvoicesPerDay;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Line;
use Laravel\Nova\Fields\Stack;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Marshmallow\Filters\DateRangeFilter;

class AffiliateInvoice extends Resource
{
    public static $model = \Atin\LaravelAffiliateProgram\Models\AffiliateInvoice::class;

    public static $search = [
        'id',
    ];

    public static $with = ['affiliatePayout'];

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->doesntHave('AffiliatePayout');
    }

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

            HasOne::make('AffiliatePayout'),

            Boolean::make('Paid', 'affiliatePayout')
                ->sortable(),

            Stack::make('Created At', [
                DateTime::make('Created At'),

                Line::make(null, function () {
                    return "({$this->created_at->diffForHumans()})";
                })
                    ->asSmall(),
            ])
                ->sortable()
                ->readonly(),
        ];
    }

    public function cards(NovaRequest $request)
    {
        return [
            new AffiliateInvoicesPerDay,
        ];
    }

    public function filters(NovaRequest $request)
    {
        return [
            new DateRangeFilter('created_at', 'Created Date'),
        ];
    }

    public static function authorizedToCreate(Request $request)
    {
        return false;
    }

    public function authorizedToDelete(Request $request)
    {
        return is_null($this->affiliatePayout);
    }
}
```

#### AffiliatePayout
```php
<?php

namespace App\Nova;

use App\Nova\Metrics\AffiliateCommissionsPerDay;
use App\Nova\Metrics\AffiliatePayoutsPerDay;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Line;
use Laravel\Nova\Fields\Stack;
use Laravel\Nova\Http\Requests\NovaRequest;
use Marshmallow\Filters\DateRangeFilter;

class AffiliatePayout extends Resource
{
    public static $model = \Atin\LaravelAffiliateProgram\Models\AffiliatePayout::class;

    public static $search = [
        'id',
    ];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()
                ->sortable(),

            BelongsTo::make('Affiliate Invoice')
                ->peekable(),

            Currency::make('Amount')
                ->asMinorUnits()
                ->sortable(),

            Stack::make('Created At', [
                DateTime::make('Created At'),

                Line::make(null, function () {
                    return "({$this->created_at->diffForHumans()})";
                })
                    ->asSmall(),
            ])
                ->sortable()
                ->readonly(),
        ];
    }

    public function cards(NovaRequest $request)
    {
        return [
            new AffiliatePayoutsPerDay,
        ];
    }

    public function filters(NovaRequest $request)
    {
        return [
            new DateRangeFilter('created_at', 'Created Date'),
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
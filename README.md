# Install
Create a ```resources/markdown/affiliate-program-terms.md``` file with Terms of Service.

# Publishing
### Localization
```php
php artisan vendor:publish --tag="laravel-subscription-lang"
```

### Views
```php
php artisan vendor:publish --tag="laravel-affiliate-program-views"
```

### Config
```php
php artisan vendor:publish --tag="laravel-subscription-config"
```
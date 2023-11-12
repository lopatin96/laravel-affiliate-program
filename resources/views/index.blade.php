<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

        <title>FlexLink</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css?family=Nunito:400,600,700" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        <style>
            html {
                -webkit-text-size-adjust: 100%;
                font-family: Nunito, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
                line-height: 1.5;
                -moz-tab-size: 4;
                -o-tab-size: 4;
                tab-size: 4
            }

            body {
                line-height: inherit;
                margin: 0
            }

            .font-sans {
                font-family: Nunito, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji
            }
        </style>
    </head>

    <body class="font-sans antialiased">
        <div class="font-sans antialiased min-h-screen bg-white lg:bg-gray-100">
            <div class="lg:min-h-screen bg flex flex-wrap lg:flex-nowrap">
                <div class="order-last lg:order-first lg:max-w-md py-10 lg:pt-24 px-6 bg-white lg:shadow-lg">
                    <x-laravel-affiliate-program::sidebar />
                </div>
                <div class="w-full lg:flex-1 bg-gray-100">
                    <x-laravel-affiliate-program::return-section-on-mobile />

                    <div class="sm:px-8 pb-10 pt-6 lg:pt-24 lg:pb-24 lg:max-w-4xl lg:mx-auto flex flex-col space-y-10">
                        <div class="flex flex-col space-y-10">
                            <x-laravel-affiliate-program::info />

                            <x-laravel-affiliate-program::commissions :commissions="$commissions" />

                            <x-laravel-affiliate-program::balance :balance="$balance" />

                            <x-laravel-affiliate-program::payouts :payouts="$payouts" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
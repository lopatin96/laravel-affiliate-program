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
        <div class="font-sans antialiased min-h-screen bg-white lg:bg-gray-100" id="app">
            <div class="lg:min-h-screen bg flex flex-wrap lg:flex-nowrap">
                <div id="sideBar" class="order-last lg:order-first lg:max-w-md py-10 lg:pt-24 px-6 bg-white lg:shadow-lg">
                    <h1 class="text-3xl font-bold text-gray-900">
                        {{ config('app.name') }}
                    </h1>
                    <h2 class="mt-1 text-lg font-semibold text-gray-700">
                        {{ __('laravel-affiliate-program::affiliate-program.Affiliate program') }}
                    </h2>
                    <div class="flex items-center mt-12 text-gray-600">
                        <div>
                            Signed in as
                        </div>
                        <img src="https://ui-avatars.com/api/?name=a&amp;color=7F9CF5&amp;background=EBF4FF" class="ml-2 h-6 w-6 rounded-full">
                        <div class="ml-2">
                            {{ auth()->user()->name }}.
                        </div>
                    </div>
                    <div class="mt-3 text-sm text-gray-600">
                        Managing billing for {{ auth()->user()->name }}.
                    </div>
                    <div class="mt-12 text-gray-600">
                        Earn effortlessly with FlexLink's affiliate program. Share your unique link, and start generating income.
                        The more you share, the more you earn.
                    </div>
                    <div id="sideBarTermsLink" class="mt-12">
                        <a href="/affiliate-program/terms-of-service" target="_blank" class="text-gray-600 underline">
                            Terms of Service
                        </a>
                    </div>
                    <div id="sideBarReturnLink" class="mt-12">
                        <a href="/dashboard" class="flex items-center">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="arrow-left w-5 h-5 text-gray-400">
                                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                            </svg>
                            <div class="ml-2 text-gray-600 underline">
                                Return to FlexLink
                            </div>
                        </a>
                    </div>
                </div>
                <div class="w-full lg:flex-1 bg-gray-100">
                    <a href="/dashboard" id="topNavReturnLink" class="lg:hidden flex items-center w-full px-4 py-4 bg-white shadow-lg">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="arrow-left w-4 h-4 text-gray-400">
                            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <div class="ml-2 text-gray-600 underline">
                            Return to FlexLink
                        </div>
                    </a>
                    <div class="sm:px-8 pb-10 pt-6 lg:pt-24 lg:pb-24 lg:max-w-4xl lg:mx-auto flex flex-col space-y-10">
                        <div class="flex flex-col space-y-10">
                            <div>
                                <h1 class="px-6 sm:px-0 text-2xl font-semibold text-gray-700">
                                    Earn money
                                </h1>

                                <div class="mt-6">
                                    <div>
                                        <div class="px-6 py-4 bg-gray-200 border border-gray-300 sm:rounded-lg shadow-sm">
                                            <div class="max-w-2xl text-sm text-gray-600">
                                                <p>Just a few steps separate you from making money:</p>

                                                <ol class="list-decimal list-inside mt-2">
                                                    <li><span class="font-bold">Share your link.</span> Recommend FlexLink to your audience.</li>
                                                    <li><span class="font-bold">Monitor your conversions.</span> A simple dashboard shows how much you earn.</li>
                                                    <li><span class="font-bold">Issue an invoice and receive money.</span> We send payouts via PayPal.</li>
                                                </ol>

                                                <p class="mt-5">Your affiliate link:</p>
                                                <a class="text-base text-black underline hover:no-underline cursor-pointer">{{ auth()->user()->affiliate_url }}</a>
                                                <p class="mt-1 text-xs">* Share it with your network to earn a {{ config('laravel-affiliate-program.revenue_percent') }}% commission from every payment from the user.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <x-laravel-affiliate-program::basic-section title="Commissions">
                                <table class="min-w-full text-center font-light mt-2">
                                    <thead class="border-b bg-neutral-50 font-medium dark:border-neutral-500 dark:text-neutral-800">
                                        <tr>
                                            <th class="px-4 py-3 uppercase">User</th>
                                            <th class="px-4 py-3 uppercase">Date</th>
                                            <th class="px-4 py-3 uppercase">Payment</th>
                                            <th class="px-4 py-3 uppercase">Commission</th>
                                            <th class="px-4 py-3 uppercase">To payout</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-sm">
                                        <tr class="border-b">
                                            <td class="px-4 py-3">Albert Einstein</td>
                                            <td class="px-4 py-3">{{ now()->subDays(4)->diffForHumans() }}</td>
                                            <td class="px-4 py-3">100$</td>
                                            <td class="px-4 py-3">80$</td>
                                            <td class="px-4 py-3">40$</td>
                                        </tr>

                                        <tr class="border-b">
                                            <td class="px-4 py-3">Elon Mask</td>
                                            <td class="px-4 py-3">{{ now()->subDays(6)->diffForHumans() }}</td>
                                            <td class="px-4 py-3">500$</td>
                                            <td class="px-4 py-3">480$</td>
                                            <td class="px-4 py-3">240$</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </x-laravel-affiliate-program::basic-section>

                            <div>
                                <h1 class="px-6 sm:px-0 text-2xl font-semibold text-gray-700">
                                    Your balance
                                </h1>
                                <div class="mt-3">
                                    <div class="bg-white sm:rounded-lg shadow-sm">
                                        <div class="p-6">
                                            <div class="mt-2 text-lg font-semibold text-gray-700">
                                                $120.00
                                            </div>
                                            <div class="max-w-2xl text-sm text-gray-600">
                                                You can only withdraw funds using PayPal and must issue an invoice.
                                            </div>
                                        </div>
                                        <div class="flex justify-between items-center px-6 py-4 bg-gray-100 bg-opacity-50 border-t border-gray-100">
                                            <div class="text-sm">
                                                <p class="uppercase text-gray-400">Invoice details</p>
                                                <p class="text-lg mt-1">FlexLink Sp. z o.o.</p>
                                                <p class="text-gray-600">63-800 Gostyn</p>
                                                <p class="text-gray-600">ul. Gorna 22/7</p>
                                                <p class="text-gray-600">VAT number: PL6961899269</p>
                                            </div>

                                            <div>
                                                <button class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none transition ease-in-out duration-150 bg-gray-800">
                                                    Attach an invoice
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <x-laravel-affiliate-program::basic-section title="Payouts">
                                <table class="min-w-full text-center font-light mt-2">
                                    <thead class="border-b bg-neutral-50 font-medium dark:border-neutral-500 dark:text-neutral-800">
                                        <tr>
                                            <th class="px-4 py-3 uppercase">Date</th>
                                            <th class="px-4 py-3 uppercase">Amount</th>
                                            <th class="px-4 py-3 uppercase">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-sm">
                                        <tr class="border-b">
                                            <td class="px-4 py-3">{{ now()->diffForHumans() }}</td>
                                            <td class="px-4 py-3">50$</td>
                                            <td class="px-4 py-3">In Progress</td>
                                        </tr>

                                        <tr class="border-b">
                                            <td class="px-4 py-3">{{ now()->subDay()->diffForHumans() }}</td>
                                            <td class="px-4 py-3">150$</td>
                                            <td class="px-4 py-3">Completed</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </x-laravel-affiliate-program::basic-section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<html class="sf-js-enabled">
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


<body class="font-sans antialiased" cz-shortcut-listen="true" style="">
<div class="font-sans antialiased min-h-screen bg-white lg:bg-gray-100" id="app">
    <div class="lg:min-h-screen bg flex flex-wrap lg:flex-nowrap">
        <div id="sideBar" class="order-last lg:order-first lg:max-w-md py-10 lg:pt-24 px-6 bg-white lg:shadow-lg">
            <h1 class="text-3xl font-bold text-gray-900">
                FlexLink
            </h1>
            <h2 class="mt-1 text-lg font-semibold text-gray-700">
                Affiliate program
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
                </a></div>
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
                                        <ol class="list-decimal">
                                            <li><span class="font-bold">Share your link.</span> Recommend FlexLink to your audience.</li>
                                            <li><span class="font-bold">Monitor your conversions.</span> A simple dashboard shows how much you earn.</li>
                                            <li><span class="font-bold">Issue an invoice and receive money.</span> We send payouts via PayPal.</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <x-laravel-affiliate-program::basic-section title="Commissions">
                            <div class="mt-2 text-md font-semibold text-gray-700">
                                123
                            </div>
                            <div class="mt-3 max-w-xl text-sm text-gray-600">
                                345
                            </div>
                        </x-laravel-affiliate-program::basic-section>

                        <x-laravel-affiliate-program::basic-section title="Payouts">
                            <table class="min-w-full text-center font-light">
                                <thead class="border-b bg-neutral-50 font-medium dark:border-neutral-500 dark:text-neutral-800">
                                    <tr>
                                        <th class="px-4 py-3">DATE</th>
                                        <th class="px-4 py-3">AMOUNT</th>
                                        <th class="px-4 py-3">STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b">
                                        <td class="px-4 py-3">The Sliding Mr. Bones (Next Stop, Pottersville)</td>
                                        <td class="px-4 py-3">Malcolm Lockyer</td>
                                        <td class="px-4 py-3">1961</td>
                                    </tr>

                                    <tr class="border-b">
                                        <td class="px-4 py-3">The Sliding Mr. Bones (Next Stop, Pottersville)</td>
                                        <td class="px-4 py-3">Malcolm Lockyer</td>
                                        <td class="px-4 py-3">1961</td>
                                    </tr>
                                </tbody>
                            </table>
                        </x-laravel-affiliate-program::basic-section>
                    </div>

                    <div>
                        <h1 class="px-6 sm:px-0 text-2xl font-semibold text-gray-700">
                            Receipt Email Addresses
                        </h1>
                        <div class="mt-3">
                            <div class="bg-white sm:rounded-lg shadow-sm">
                                <div class="p-6">
                                    <div class="max-w-2xl text-sm text-gray-600">
                                        We will send a receipt download link to the email addresses that you specify
                                        below. You may separate multiple email addresses using commas.
                                    </div>
                                    <div class="mt-6 md:flex">
                                        <label for="receipt_emails" class="md:w-1/3 mr-10 mt-2 text-gray-800 text-sm font-semibold">
                                            Email Addresses
                                        </label>
                                        <input type="text" id="receipt_emails" placeholder="Email Addresses" class="w-full mt-1 md:mt-0 bg-white border border-gray-200 px-3 py-2 rounded outline-none">
                                    </div>
                                </div>
                                <div class="px-6 py-4 bg-gray-100 bg-opacity-50 border-t border-gray-100 text-right">
                                    <button class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none transition ease-in-out duration-150 bg-gray-800" disabled="disabled">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
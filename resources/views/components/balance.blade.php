<div>
    <h1 class="px-6 sm:px-0 text-2xl font-semibold text-gray-700">
        {{ __('laravel-affiliate-program::affiliate-program.balance-title') }}
    </h1>

    <div class="mt-3">
        <div class="bg-white sm:rounded-lg shadow-sm">
            <div class="p-6">
                <div class="mt-2 text-xl font-semibold text-gray-700">
                    @money($balance)
                </div>
                <div class="max-w-2xl text-sm text-gray-600">
                    {{ __('laravel-affiliate-program::affiliate-program.balance-text') }}
                </div>
            </div>
            <div class="flex justify-between items-center px-6 py-4 bg-gray-100 bg-opacity-50 border-t border-gray-100">
                <div class="text-sm">
                    {!! __('laravel-affiliate-program::affiliate-program.balance-invoice-details', ['invoice_title' => config('laravel-affiliate-program.invoice_title'), 'invoice_address_1' => config('laravel-affiliate-program.invoice_address_1'), 'invoice_address_2' => config('laravel-affiliate-program.invoice_address_2')])  !!}
{{--                    <p class="text-gray-600">VAT number: PL6961899269</p>--}}
                </div>

                <div>
                    <button class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none transition ease-in-out duration-150 bg-gray-800">
                        {{ __('laravel-affiliate-program::affiliate-program.balance-button-attach-invoice') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
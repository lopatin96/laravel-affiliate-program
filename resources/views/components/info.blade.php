<div>
    <h1 class="px-6 sm:px-0 text-2xl font-semibold text-gray-700">
        {{ __('laravel-affiliate-program::affiliate-program.info-title') }}
    </h1>

    <div class="mt-6">
        <div>
            <div class="px-6 py-4 bg-gray-200 border border-gray-300 sm:rounded-lg shadow-sm">
                <div class="max-w-2xl text-sm text-gray-600">
                    {!! __('laravel-affiliate-program::affiliate-program.info-text', ['affiliate_url' => auth()->user()->affiliate_url, 'revenue_percent' => config('laravel-affiliate-program.revenue_percent')]) !!}
                </div>
            </div>
        </div>
    </div>
</div>
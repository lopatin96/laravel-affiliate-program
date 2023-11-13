<h1 class="text-3xl font-bold text-gray-900">
    {{ config('app.name') }}
</h1>
<h2 class="mt-1 text-lg font-semibold text-gray-700">
    {{ __('laravel-affiliate-program::affiliate-program.Affiliate program') }}
</h2>
<div class="flex items-center mt-12 text-gray-600">
    <div>
        {{ __('laravel-affiliate-program::affiliate-program.Signed in as') }}
    </div>
    <img src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }}" class="ml-2 h-6 w-6 rounded-full">
    <div class="ml-2">
        {{ auth()->user()->name }}.
    </div>
</div>
<div class="mt-3 text-sm text-gray-600">
    {{ __('laravel-affiliate-program::affiliate-program.Managing billing for') }} {{ auth()->user()->name }}.
</div>
<div class="mt-12 text-gray-600">
    {{ __('laravel-affiliate-program::affiliate-program.sidebar-text', ['app_name' => config('app.name')]) }}
</div>
<div class="mt-12">
    <a href="/affiliate-terms" target="_blank" class="text-gray-600 underline">
        {{ __('laravel-affiliate-program::affiliate-program.Terms of Use') }}
    </a>
</div>
<div class="mt-12">
    <a href="/dashboard" class="flex items-center">
        <svg viewBox="0 0 20 20" fill="currentColor" class="arrow-left w-5 h-5 text-gray-400">
            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
        </svg>
        <div class="ml-2 text-gray-600 underline">
            {{ __('laravel-affiliate-program::affiliate-program.Return to') }} {{ config('app.name') }}
        </div>
    </a>
</div>
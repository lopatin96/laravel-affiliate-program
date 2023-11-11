<x-laravel-seo::title title="terms-of-service_title" />

<x-guest-layout>
    <div class="pt-8 bg-gray-100">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            <div>
                <x-authentication-card-logo />
            </div>

            <div class="w-full sm:max-w-2xl my-12 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose">
                {!! $terms !!}
            </div>
        </div>
    </div>

    @include('layouts.footer')
</x-guest-layout>

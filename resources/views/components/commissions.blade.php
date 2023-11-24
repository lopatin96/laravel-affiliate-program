<x-laravel-affiliate-program::basic-section title="{{ __('laravel-affiliate-program::affiliate-program.commissions-title') }}">
    @if($commissions->isEmpty())
        <p class="text-center text-gray-500 mt-5">
            {{ __('laravel-affiliate-program::affiliate-program.commissions-no-commissions') }}
        </p>
    @else
        <table class="min-w-full text-center font-light mt-2">
            <thead class="border-b bg-neutral-50 font-medium dark:border-neutral-500 dark:text-neutral-800">
            <tr>
                <th class="px-4 py-3 uppercase">{{ __('laravel-affiliate-program::affiliate-program.User') }}</th>
                <th class="px-4 py-3 uppercase">{{ __('laravel-affiliate-program::affiliate-program.Date') }}</th>
                <th class="px-4 py-3 uppercase">{{ __('laravel-affiliate-program::affiliate-program.Payment') }}</th>
                <th class="px-4 py-3 uppercase">{{ __('laravel-affiliate-program::affiliate-program.Commission') }}</th>
                <th class="px-4 py-3 uppercase">{{ __('laravel-affiliate-program::affiliate-program.To payout') }}</th>
            </tr>
            </thead>
            <tbody class="text-sm">
            @foreach($commissions as $commission)
                <tr class="border-b">
                    <td class="px-4 py-3">{{ $commission->subscriptionUser->name }}</td>
                    <td class="px-4 py-3">{{ $commission->created_at->diffForHumans() }}</td>
                    <td class="px-4 py-3">{{ '$' . number_format($commission->payment / 100, 2) }}</td>
                    <td class="px-4 py-3">{{ '$' . number_format($commission->commission / 100, 2) }}</td>
                    <td class="px-4 py-3">{{ '$' . number_format($commission->payout / 100, 2) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        @if ($commissions->hasPages())
            <div class="mt-5">
                {{ $commissions->links() }}
            </div>
        @endif
    @endif
</x-laravel-affiliate-program::basic-section>
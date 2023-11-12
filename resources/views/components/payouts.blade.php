<x-laravel-affiliate-program::basic-section title="{{ __('laravel-affiliate-program::affiliate-program.payouts-title') }}">
    @if($payouts->isEmpty())
        <p class="text-center text-gray-500 mt-5">
            {{ __('laravel-affiliate-program::affiliate-program.payouts-no-payouts') }}
        </p>
    @else
        <table class="min-w-full text-center font-light mt-2">
            <thead class="border-b bg-neutral-50 font-medium dark:border-neutral-500 dark:text-neutral-800">
                <tr>
                    <th class="px-4 py-3 uppercase">{{ __('laravel-affiliate-program::affiliate-program.Date') }}</th>
                    <th class="px-4 py-3 uppercase">{{ __('laravel-affiliate-program::affiliate-program.Amount') }}</th>
                </tr>
            </thead>
            <tbody class="text-sm">
                @foreach($payouts as $payout)
                    <tr class="border-b">
                        <td class="px-4 py-3">{{ $payout->created_at->diffForHumans() }}</td>
                        <td class="px-4 py-3">@money($payout->amount)</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if ($payouts->hasPages())
            <div class="mt-5">
                {{ $payouts->links() }}
            </div>
        @endif
    @endif
</x-laravel-affiliate-program::basic-section>
<x-laravel-affiliate-program::basic-section title="{{ __('laravel-affiliate-program::affiliate-program.payouts-title') }}">
    @if(empty($commissions))
        <p class="text-center text-gray-500 mt-5">
            {{ __('laravel-affiliate-program::affiliate-program.payouts-no-payouts') }}
        </p>
    @else
        <table class="min-w-full text-center font-light mt-2">
            <thead class="border-b bg-neutral-50 font-medium dark:border-neutral-500 dark:text-neutral-800">
                <tr>
                    <th class="px-4 py-3 uppercase">Date</th>
                    <th class="px-4 py-3 uppercase">Amount</th>
                    <th class="px-4 py-3 uppercase">Status</th>
                </tr>
            </thead>
            <tbody class="text-sm">
                @foreach($payouts as $payout)
                    <tr class="border-b">
                        <td class="px-4 py-3">{{ now()->diffForHumans() }}</td>
                        <td class="px-4 py-3">50$</td>
                        <td class="px-4 py-3">In Progress</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</x-laravel-affiliate-program::basic-section>
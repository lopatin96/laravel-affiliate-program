<x-laravel-affiliate-program::basic-section title="{{ __('laravel-affiliate-program::affiliate-program.commissions-title') }}">
    @if(empty($commissions))
        <p class="text-center text-gray-500 mt-5">
            {{ __('laravel-affiliate-program::affiliate-program.commissions-no-commissions') }}
        </p>
    @else
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
            @foreach($commissions as $commission)
                <tr class="border-b">
                    <td class="px-4 py-3">Albert Einstein</td>
                    <td class="px-4 py-3">{{ now()->subDays(4)->diffForHumans() }}</td>
                    <td class="px-4 py-3">100$</td>
                    <td class="px-4 py-3">80$</td>
                    <td class="px-4 py-3">40$</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</x-laravel-affiliate-program::basic-section>
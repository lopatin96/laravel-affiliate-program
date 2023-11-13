<x-laravel-affiliate-program::basic-section title="{{ __('laravel-affiliate-program::affiliate-program.affiliate-link-title') }}">
    <input
        type="text"
        value="{{ auth()->user()->affiliate_url }}"
        id="affiliate-link-input"
        class="mt-2 w-96 rounded border-gray-300 text-gray-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
        disabled
    >

    <div class="tooltip">
        <button
            onclick="affiliateFunc()"
            onmouseout="outAffiliateFunc()"
            class="mt-2 inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none transition ease-in-out duration-150 bg-gray-800"
        >
            <span
                class="tooltiptext"
                id="affiliateTooltip"
            >
                {{ __('laravel-affiliate-program::affiliate-program.Copy to clipboard') }}
            </span>
            {{ __('laravel-affiliate-program::affiliate-program.Copy link') }}
        </button>
    </div>

    <p class="text-gray-500 text-sm mt-5">
        {!! __('laravel-affiliate-program::affiliate-program.affiliate-link-text', ['revenue_percent' => config('laravel-affiliate-program.revenue_percent')]) !!}
    </p>

    <style>
        .tooltip {
            position: relative;
            display: inline-block;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 250px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px;
            position: absolute;
            z-index: 1;
            bottom: 150%;
            left: 50%;
            margin-left: -75px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltip .tooltiptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }
    </style>

    <script>
        function affiliateFunc() {
            var copyText = document.getElementById("affiliate-link-input");
            copyText.select();
            copyText.setSelectionRange(0, 100);
            navigator.clipboard.writeText(copyText.value);

            var tooltip = document.getElementById("affiliateTooltip");
            tooltip.innerHTML = "{{ __('laravel-affiliate-program::affiliate-program.Copied') }}: " + copyText.value;
        }

        function outAffiliateFunc() {
            var tooltip = document.getElementById("affiliateTooltip");
            tooltip.innerHTML = "{{ __('laravel-affiliate-program::affiliate-program.Copy to clipboard') }}";
        }
    </script>
</x-laravel-affiliate-program::basic-section>
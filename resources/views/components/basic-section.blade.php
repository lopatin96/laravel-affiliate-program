<div class="space-y-6 mt-6">
    <div class="bg-white sm:rounded-lg shadow-sm overflow-hidden">
        <div>
            <div class="flex justify-between">
                <h2 class="pl-6 pt-6 text-xl font-semibold text-gray-700">
                    {{ $title }}
                </h2>
            </div>

            <div class="px-6 pb-6">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
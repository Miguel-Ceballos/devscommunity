<x-app-layout>
    <div class="md:py-2">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="md:p-6 text-gray-900">
                    <livewire:show-post :post="$post"/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

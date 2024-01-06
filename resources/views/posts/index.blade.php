<x-app-layout>
    <div class="md:py-4">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            @if(session()->has('message'))
                <p class="p-2 text-green-700 bg-green-50 rounded border-2 border-green-500 mb-2">{{ session('message') }}</p>
            @endif
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="md:p-6 text-gray-900">
                    <livewire:show-posts :posts="$posts" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session()->has('message'))
                <p class="p-2 text-green-700 bg-green-50 rounded border-2 border-green-500 mb-2">{{ session('message') }}</p>
            @endif
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <livewire:show-posts :posts="$posts" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

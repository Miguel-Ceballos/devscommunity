<div class="bg-white md:rounded-lg space-y-3">
    <div class="flex flex-col gap-8 p-4 md:p-8">
        <div class="flex items-center justify-between">
            <div class="flex gap-2">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                    </svg>
                </div>
                <div class="flex flex-col">
                    <p class="text-md text-gray-700 font-bold">{{ $post->user->name }}</p>
                    <p class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                </div>
            </div>
            <div class="">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div class="ms-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('posts.edit', $post)">
                            {{ __('Edit') }}
                        </x-dropdown-link>
                        <button wire:click="deletePost({{ $post->id }})"
                                wire:confirm="Are you sure you want to delete this post?"
                                class="block w-full px-4 py-2 text-start text-sm leading-5 hover:bg-indigo-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out"
                        >
                            <p class="text-gray-700 hover:text-indigo-600 hover:underline">Delete</p>
                        </button>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
        <p class="text-xl md:text-4xl font-extrabold">{{ $post->title }}</p>
        <p class="text-xl">{{ $post->content }}</p>
    </div>
    <div class="flex gap-2 md:p-8 mt-2 border-t border-gray-200">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
            </svg>
        </div>
        <x-text-area class="w-full" placeholder="Add a comment"/>
    </div>
</div>

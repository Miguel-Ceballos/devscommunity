<div class="bg-white md:rounded-lg">
    <div class="flex flex-col gap-4 p-4 md:p-8">
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
        <p class="text-md md:text-xl">{{ $post->content }}</p>
        <div>
            <img src="{{ asset('storage/posts/' . $post->image) }}" alt="Image post: {{ $post->title }}" class="rounded-md">
        </div>
        <div class="flex gap-10 text-md justify-center md:justify-start">
            <div class="flex gap-2 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                </svg>
                <p class="">46 reactions</p>
            </div>
            <div class="flex gap-2 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.068.157 2.148.279 3.238.364.466.037.893.281 1.153.671L12 21l2.652-3.978c.26-.39.687-.634 1.153-.67 1.09-.086 2.17-.208 3.238-.365 1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                </svg>
                <p class="">10 comments</p>
            </div>
        </div>
    </div>
    @auth
        <livewire:comment-post :post="$post"/>
    @else
        <div class="text-center text-md text-gray-600 my-2">
            <p class="">
                <a href="{{ route('register') }}" class="text-blue-500 font-bold hover:text-blue-700 hover:underline">
                    Register
                </a>
                or
                <a href="{{ route('login') }}" class="text-blue-500 font-bold hover:text-blue-700 hover:underline">
                    log in
                </a>
                to add a comment
            </p>
        </div>
    @endauth

    <div class="px-4 md:px-8 pb-8">
        <h2 class="text-2xl font-black mb-4">Comments</h2>
        @forelse($post->comments as $comment)
            <div class="mb-4">
                <div class="flex gap-1">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="currentColor" class="w-8 h-8 md:w-10 md:h-10">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                        </svg>
                    </div>
                    <div class="w-full border border-gray-300 rounded-lg px-3 py-2">
                        <div class="flex gap-2 items-center">
                            <p class="text-md text-gray-700 font-bold">{{ $post->user->name }}</p>
                            <p class="font-bold text-2xl text-gray-500">·</p>
                            <p class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                        </div>
                        <p class="mt-1">{{ $comment->comment }}</p>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-xs text-gray-700">No hay comentarios existentes</p>
        @endforelse
    </div>
</div>

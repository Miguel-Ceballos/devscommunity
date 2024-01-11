<div class="bg-white md:rounded-lg">
    <div class="flex flex-col gap-4 p-4 md:p-8">
        <div class="flex items-center justify-between">
            <div class="flex gap-2 items-center">
                <div>
                    @if($post->user->image)
                        <img src="{{asset('uploads/' . $post->user->image)}}" alt="" class="w-9 h-9 rounded-full">

                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-9 h-9">
                            <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                        </svg>
                    @endif
                </div>
                <div class="flex flex-col">
                    <p class="text-md text-gray-700 font-bold">{{ $post->user->name }}</p>
                    <p class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                </div>
            </div>
            @auth
                @if($post->user_id === auth()->user()->id)
                    <div>
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
                @endif
            @endauth
        </div>
        <p class="text-xl md:text-4xl font-extrabold">{{ $post->title }}</p>
        <p class="text-md md:text-xl">{{ $post->content }}</p>
        <div>
            <img src="{{ asset('storage/posts/' . $post->image) }}" alt="Image post: {{ $post->title }}" class="rounded-md">
        </div>
        <div class="flex gap-10 text-md justify-center md:justify-start">

            <livewire:like-post />

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
                <div class="flex gap-2">
                    <div class="text-gray-400">
                        @if($comment->user->image)
                            <img src="{{asset('uploads/' . $comment->user->image)}}" alt="" class="w-9 h-9 rounded-full">

                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-9 h-9">
                                <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                            </svg>
                        @endif
                    </div>
                    <div class="w-full border border-gray-300 rounded-lg px-3 py-2">
                        <div class="flex gap-2 items-center">
                            <p class="text-md text-gray-700 font-bold">{{ $comment->user->name}}</p>
                            <p class="font-bold text-2xl text-gray-500">·</p>
                            <p class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
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

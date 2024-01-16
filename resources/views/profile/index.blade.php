<x-app-layout>
    <div class="md:py-2">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="md:p-6 text-gray-900 space-y-3">
                    <div class="bg-white md:rounded-lg p-4">
                        <div class="flex flex-col items-center gap-4 text-gray-400">
                            @if($user->image)
                                <div>
                                    <img src="{{asset('uploads/' . $user->image)}}" alt=""
                                         class="w-32 h-32 rounded-full">
                                </div>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                     class="w-32 h-32">
                                    <path fill-rule="evenodd"
                                          d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
                                          clip-rule="evenodd"/>
                                </svg>
                            @endif
                            <div class="flex flex-col gap-1 items-center">
                                <h1 class="text-center text-2xl font-bold text-gray-700">{{$user->name}}</h1>
                                <p class="text-gray-500">{{ '@' . $user->username }}</p>
                            </div>
                            <div class="flex gap-6 items-center">
                                @auth
                                        <livewire:follow :user="$user"/>
                                @else
                                    <p class="text-gray-500">{{ $user->followers->count() }} Followers</p>
                                    <p class="text-gray-500">{{ $user->followings->count() }} Following</p>
                                @endauth
                            </div>
                        </div>
                    </div>


                    <div class="space-y-2">
                        @forelse($posts as $post)
                            <div class="bg-white md:rounded-lg">
                                <div class="flex flex-col gap-4 p-4 md:p-8">
                                    <div class="flex gap-2 items-center">
                                        <div>
                                            @if($post->user->image)
                                                <img src="{{asset('uploads/' . $post->user->image)}}" alt=""
                                                     class="w-9 h-9 rounded-full">

                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                     fill="currentColor" class="w-9 h-9">
                                                    <path fill-rule="evenodd"
                                                          d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
                                                          clip-rule="evenodd"/>
                                                </svg>
                                            @endif
                                        </div>
                                        <div class="flex flex-col">
                                            <p class="text-md text-gray-700 font-bold">{{ $post->user->name }}</p>
                                            <p class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                    <div class="space-y-4 md:pl-12">
                                        <div class="">
                                            <a href="{{ route('posts.show', $post->id) }}"
                                               class="text-xl md:text-3xl font-bold hover:text-indigo-700">{{ $post->title }}</a>
                                        </div>
                                        <div class="flex gap-10 text-md">
                                            <div class="flex gap-2 items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                     stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"/>
                                                </svg>
                                                <p class="">{{ $post->likes->count() }} <span class="hidden md:inline">reactions</span></p>
                                            </div>
                                            <div class="flex gap-2 items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                     stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.068.157 2.148.279 3.238.364.466.037.893.281 1.153.671L12 21l2.652-3.978c.26-.39.687-.634 1.153-.67 1.09-.086 2.17-.208 3.238-.365 1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z"/>
                                                </svg>
                                                <p class="">{{ $post->comments->count() }} <span class="hidden md:inline">comments</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="bg-white md:rounded-lg">
                                <div class="flex flex-col gap-4 p-4 md:p-8">
                                    <p class="text-sm text-gray-500 text-center">There are not exists posts</p>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

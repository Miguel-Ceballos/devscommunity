<x-app-layout>
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 md:py-2">
        <h1 class="my-2 text-gray-700 font-bold text-2xl text-center">Notifications</h1>
        <div class="md:p-6 text-gray-900 bg-white md:rounded-lg">
            <div class="divide-y">
                @if($notifications->count() > 0)
                    <div class="border-y border-blue-500">
                        <div class="my-4 divide-y">
                            <h1 class="my-2 text-gray-700 font-bold text-md text-center">New</h1>
                            @foreach($notifications as $notification )
                                <div class="p-4 flex-col lg:justify-between lg:items-center">
                                    <p>
                                        <a href="{{ route('profile.index', $notification->data['user_username']) }}"
                                           class="font-bold text-indigo-500 hover:text-indigo-700">{{ $notification->data['user_username'] }}</a>
                                        {{ $notification->data['message'] }}
                                    </p>
                                    @if($notification->data['post_id'])
                                        <a href="{{ route('posts.show', $notification->data['post_id']) }}"
                                           class="font-bold">{{ $notification->data['post_title'] }}
                                        </a>
                                    @endif
                                    <p class="text-xs text-gray-500">{{ $notification->created_at->diffForHumans() }}.</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                @forelse($old_notifications as $old_notification )
                    <div class="p-4 flex-col lg:justify-between lg:items-center">
                        <p>
                            <a href="{{ route('profile.index', $old_notification->data['user_username']) }}"
                               class="font-bold text-indigo-500 hover:text-indigo-700">{{ $old_notification->data['user_username'] }}</a>
                            {{ $old_notification->data['message'] }}
                        </p>
                        @if($old_notification->data['post_id'])
                            <a href="{{ route('posts.show', $old_notification->data['post_id']) }}"
                               class="font-bold">{{ $old_notification->data['post_title'] }}
                            </a>
                        @endif
                        <p class="text-xs text-gray-500">{{ $old_notification->created_at->diffForHumans() }}.</p>
                    </div>
                    @empty
                            <p class="text-center text-gray-600">Not exist notifications.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>

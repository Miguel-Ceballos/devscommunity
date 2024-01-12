<div class="flex gap-6">
    <p class="text-gray-500">{{ $followers }} Followers</p>
    <p class="text-gray-500">{{ $followings }} Following</p>
    @if($user->id !== auth()->user()->id)
    <button wire:click="follow"
            class="px-2 border-2 text-gray-500 font-bold border-gray-400 hover:border-gray-700 hover:text-gray-700 hover:bg-gray-50 rounded-lg"
    >
        {{ $isFollower ? 'Following' : 'Follow' }}
    </button>
    @endif
</div>

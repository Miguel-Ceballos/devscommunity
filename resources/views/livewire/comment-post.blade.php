<div class="px-4 py-6 border-t border-gray-200">
    <form wire:submit.prevent="createComment">
        <div class="flex gap-2 md:p-4">
            <div>
                @if(Auth::user()->image)
                    <div>
                        <img src="{{asset('uploads/' . Auth::user()->image)}}" alt="" class="w-9 h-9 rounded-full">
                    </div>
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-9 h-9">
                        <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                    </svg>
                @endif
            </div>
            <div class="w-full">
                <x-text-area wire:model="comment" id="comment" class="w-full" rows="4" placeholder="Add a comment"/>
                <x-input-error :messages="$errors->get('comment')"/>
            </div>
        </div>
        <div class="flex flex-row-reverse my-2 md:px-4">
            <x-primary-button>
                {{ __('Comment') }}
            </x-primary-button>
        </div>
    </form>
</div>

<div class="md:px-40 md:py-10">
    <form wire:submit.prevent="createPost" class="space-y-4">
        <!-- Name -->
        <div>
            <x-input-label for="title" :value="__('Title')"/>
            <x-text-input wire:model="title" id="title" class="block my-1 w-full" type="text" :value="old('title')"
                          autofocus
                          autocomplete="title" placeholder="New post title here..."/>
            <x-input-error :messages="$errors->get('title')"/>
        </div>


        <!-- Name -->
        <div>
            <x-input-label for="content" :value="__('Content')"/>
            <x-text-area wire:model="content" id="content" :value="old('content')" rows="10" class="w-full mt-1"
                         autofocus
                         autocomplete="content" placeholder="Write your post content here..."/>
            <x-input-error :messages="$errors->get('content')"/>
        </div>

        <div>
            <x-input-label for="image" :value="__('Image')"/>
            <input wire:model="image"
                   type="file"
                   accept="image/*"
                   class="relative my-1 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none"
            />
            <x-input-error :messages="$errors->get('image')"/>
        </div>

        <div>
            @if($image)
                Image:
                <img src="{{ $image->temporaryUrl() }}" alt="">
            @endif
        </div>

        <div class="flex flex-row-reverse">
            <x-primary-button class="">
                {{ __('POST') }}
            </x-primary-button>
        </div>
    </form>
</div>

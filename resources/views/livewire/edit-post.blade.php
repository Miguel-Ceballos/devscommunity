<div class="md:px-40 md:py-10">
    <div class="text-gray-700 text-center font-bold uppercase text-xl md:text-2xl mb-10">Edit: {{ $post->title }}</div>
    <form wire:submit.prevent="editPost" class="space-y-4">
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
            <x-input-label for="new_image" :value="__('Image')"/>
            <input wire:model="new_image"
                   type="file"
                   accept="image/*"
                   class="relative my-1 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none"
            />
            <x-input-error :messages="$errors->get('new_image')"/>
        </div>

{{--        <div>--}}
{{--            <x-input-label for="image" :value="__('Image')"/>--}}
{{--            <input wire:model="image"--}}
{{--                   type="file"--}}
{{--                   accept="image/*"--}}
{{--                   class="relative my-1 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none"--}}
{{--            />--}}
{{--            <x-input-error :messages="$errors->get('image')"/>--}}
{{--        </div>--}}

        <div class="my-5 w-72">
            @if($image)
                Current image:
                <img src="{{ asset('storage/posts/' . $post->image) }}" class="rounded-lg" alt="Image post: {{ $post->title }}">
            @endif
        </div>

        <x-input-error :messages="$errors->get('new_image')"/>

        <div class="my-5 w-72">
            @if($new_image)
                New image:
                <img src="{{ $new_image->temporaryUrl() }}" class="rounded-lg" alt="Image post: {{ $post->title }}">
            @endif
        </div>

        <div class="flex flex-row-reverse mt-2">
            <x-primary-button class="w-full">
                {{ __('Save') }}
            </x-primary-button>
        </div>
    </form>
</div>

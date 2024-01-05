<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePost extends Component
{

    public $title;
    public $content;
    public $image;

    use WithFileUploads;

    protected $rules = [
        'title' => ['required', 'string', 'max:255'],
        'content' => ['required', 'string'],
        'image' => ['image', 'nullable']
    ];

    public function render()
    {
        return view('livewire.create-post');
    }

    public function createPost()
    {
        $data = $this->validate();

        if ($data['image'] !== null){
            $image_path = $this->image->store('public/posts');
            $image = str_replace('public/posts/', '', $image_path);
        }

        Post::create([
            'user_id' => auth()->user()->id,
            'title' => $data['title'],
            'content' => $data['content'],
            'image' => $image ?? null
        ]);

        session()->flash('message', 'Post successfully created!');

        return redirect()->route('posts.index');

    }
}

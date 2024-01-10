<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditPost extends Component
{

    public $post;
    public $post_id;
    public $title;
    public $content;
    public $image;
    public $new_image;

    use WithFileUploads;


    public $rules = [
        'title' => ['required', 'string', 'max:255'],
        'content' => ['required'],
        'new_image' => ['nullable', 'image']
    ];

    public function mount(Post $post): void
    {
        $this->post_id = $post->id;
        $this->title = $post->title;
        $this->content = $post->content;
        $this->image = $post->image;
    }

    public function render()
    {
        return view('livewire.edit-post');
    }

    public function editPost()
    {
        $data = $this->validate();

        if ($this->new_image){
            $image = $this->new_image->store('public/posts');
            $data['image'] = str_replace('public/posts/', '', $image);
        }

        $post = Post::find($this->post_id);
        $post->title = $this->title;
        $post->content = $this->content;
        $post->image = $data['image'] ?? $post->image;
        $post->save();

        session()->flash('message', 'Post successfully updating');

        return redirect()->route('posts.show', $this->post_id);
    }
}

<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class ShowPost extends Component
{

    public $post;

    public function render()
    {
        return view('livewire.show-post');
    }

    public function deletePost(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }
}

<?php

namespace App\Livewire;

use App\Notifications\NewLikePost;
use Livewire\Component;

class LikePost extends Component
{

    public $post;
    public $likes;
    public $isLike;

    public function mount($post)
    {
        $this->isLike = $post->checkLike(auth()->user());
        $this->likes = $post->likes->count();
    }

    public function like()
    {
        if ($this->post->checkLike(auth()->user())){
            $this->post->likes()->where('post_id', $this->post->id)->delete();
            $this->isLike = false;
            $this->likes--;
        } else {
            $this->post->likes()->create(['user_id' => auth()->user()->id]);
            $this->isLike = true;
            $this->likes++;

            //Crea notificación
            $this->post->user->notify(new NewLikePost(
                $this->post->id,
                $this->post->title,
                auth()->user()->id,
                auth()->user()->username,
                "liked your post"
            ));

        }
    }

    public function render()
    {
        return view('livewire.like-post');
    }
}

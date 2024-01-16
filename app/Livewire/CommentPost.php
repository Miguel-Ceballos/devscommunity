<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Notifications\NewLikePost;
use Livewire\Component;

class CommentPost extends Component
{

    public $post;
    public $comment;
    public $comments;

    public $rules = [
        'comment' => ['required', 'string', 'max:300']
    ];

    public function render()
    {
        return view('livewire.comment-post');
    }

//    public function redForm()
//    {
//        $data = $this->validate();
//
//        $this->dispatch('commentForm', auth()->user()->id, $this->post->id, $data['comment']);
//    }

    public function createComment()
    {
        $data = $this->validate();

        Comment::create([
            'user_id' => auth()->user()->id,
            'post_id' => $this->post->id,
            'comment' => $data['comment']
        ]);

        $this->post->user->notify(new NewLikePost(
            $this->post->id,
            $this->post->title,
            auth()->user()->id,
            auth()->user()->username,
            "commented on your post"
        ));

//        $this->dispatch('commentForm', $this->post->comments);

        session()->flash('message', 'Comment successfully created!');
        return redirect()->route('posts.show', $this->post->id);
    }

}

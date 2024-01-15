<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class ShowPosts extends Component
{

    public $term;
//    public $posts;

    protected $listeners = [ 'searchTerm' => 'search' ];

    public function search($term)
    {
        $this->term = $term;
    }

    public function render()
    {
        if ( auth()->user() ) {
            if ( ! $this->term && auth()->user()->followings->count() !== 0 ) {
                $ids = auth()->user()->followings->pluck('id')->toArray();
                array_push($ids, auth()->user()->id);
                $posts = Post::whereIn('user_id', $ids)->latest()->get();
            } else if ( ! $this->term && auth()->user()->followings->count() === 0 ) {
                $posts = Post::all();
            }
            else {
                $posts = Post::when($this->term, function($query) {
                    $query->where('title', 'LIKE', "%" . $this->term . "%");
                })->latest()->get();
            }
        } else {
            $posts = Post::when($this->term, function($query) {
                $query->where('title', 'LIKE', "%" . $this->term . "%");
            })->latest()->get();
        }

        return view('livewire.show-posts', [
            'posts' => $posts
        ]);
    }
}

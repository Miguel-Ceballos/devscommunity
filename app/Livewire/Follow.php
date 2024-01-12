<?php

namespace App\Livewire;

use Livewire\Component;

class Follow extends Component
{

    public $user;
    public $followings;
    public $followers;
    public $isFollower;

    public function mount()
    {
        $this->isFollower = $this->user->following(auth()->user());
        $this->followings = $this->user->followings->count();
        $this->followers = $this->user->followers->count();
    }

    public function follow()
    {
        if ($this->isFollower){
            $this->user->followers()->detach(auth()->user()->id);
            $this->followers--;
            $this->isFollower = false;
        } else {
            $this->user->followers()->attach(auth()->user()->id);
            $this->followers++;
            $this->isFollower = true;
        }
    }

    public function render()
    {
        return view('livewire.follow');
    }
}

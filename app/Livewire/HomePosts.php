<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class HomePosts extends Component
{
    public $perPage = 5;
    public $activePost = null;
    public $showMoreStates = [];
    public $showCommentComponent = [];
   
    protected $listeners = ['load-more' => 'loadMore'];

    public function togglePostComments($postId)
    {
        $this->activePost = $this->activePost === $postId ? null : $postId;
    }

    public function loadMore()
    {
        $this->perPage += 5;
    }

    public function togglePost($postId)
    {
        $this->showMoreStates[$postId] = !($this->showMoreStates[$postId] ?? false);
    }

    public function render()
    {
        $posts = Post::orderBy('id', 'DESC')
        ->where('user_id', '!=', Auth::id())
                     ->take($this->perPage)
                     ->get();

        return view('livewire.home-posts', compact('posts'));
    }
}

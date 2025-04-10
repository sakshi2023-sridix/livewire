<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Like;
use App\Notifications\PostLikedNotification;
use Illuminate\Support\Facades\Auth;

class LikePost extends Component
{
    public $post;
    public $isLiked = false;
    public $likeCount = 0;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->likeCount = $post->likes()->count();
        $this->isLiked = $post->likes()->where('user_id', Auth::id())->exists();
    }

    public function toggleLike()
    {
        if (!Auth::check()) return;

        $like = $this->post->likes()->where('user_id', Auth::id())->first();
        if ($like) {
            $like->delete();
            $this->isLiked = false;
            $this->likeCount--;
        } else {
            $this->post->likes()->create(['user_id' => Auth::id()]);
            $this->isLiked = true;
            $this->likeCount++;
        }
    }

    public function render()
    {
        return view('livewire.like-post');
    }

    public function like()
{
    $this->post->likes()->create([
        'user_id' => auth()->id(),
    ]);

    // Notify post owner
    if ($this->post->user_id !== auth()->id()) {
        $this->post->user->notify(new PostLikedNotification(auth()->user(), $this->post));
    }

    session()->flash('message', 'You liked this post!');
}
}


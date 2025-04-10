<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MyPosts extends Component
{
    public $userId;

    public function mount($userId = null)
    {

        
        $this->userId = !empty($userId) ? $userId :  Auth::id();
    }

    public function render()
    {
        $posts = Post::where('user_id', $this->userId)->latest()->get();

        
        return view('livewire.my-posts', compact('posts'));
    }

    public function deletePost($postId)
    {
        $post = Post::find($postId);

        if ($post && $post->user_id == Auth::id()) {
            $post->delete();
            session()->flash('message', 'Post deleted successfully.');
        }
    }
}

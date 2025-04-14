<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class Recreate extends Component
{
    public $userId;
    public $postId;

    public function recreatePost()
{
    $originalPost = Post::where('id', $this->postId)
        ->where('user_id', $this->userId)
        ->first();

    if ($originalPost) {
        $newPost = $originalPost->replicate();
        $newPost->user_id = auth()->id();
        $newPost->created_at = now();
        $newPost->updated_at = now();
        $newPost->save();

        session()->flash('message', 'Post recreated successfully!');
    } else {
        session()->flash('message', 'Original post not found or not authorized.');
    }
}

    public function render()
    {
        return view('livewire.recreate');
    }
}

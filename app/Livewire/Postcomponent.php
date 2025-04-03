<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Comment;

class PostComponent extends Component
{
    public $content;

    public function createPost()
    {
        Post::create([
            'content' => $this->content,
            'user_id' => auth()->id(),
        ]);

        $this->content = ''; // Clear input
        $this->emit('postAdded'); // Refresh posts
    }

    public function render()
    {
        return view('livewire.post-component', [
            'posts' => Post::with('comments')->latest()->get()
        ]);
    }
}


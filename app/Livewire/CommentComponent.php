<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;

class CommentComponent extends Component
{
    public $post;
    public $content;
    public $parentId;

    public function addComment()
    {
        Comment::create([
            'content' => $this->content,
            'user_id' => auth()->id(),
            'post_id' => $this->post->id,
            'parent_id' => $this->parentId
        ]);

        $this->content = '';
        $this->emit('commentAdded'); // Refresh comments
    }

    public function render()
    {
        return view('livewire.comment-component', [
            'comments' => $this->post->comments()->whereNull('parent_id')->with('replies')->get()
        ]);
    }

public function like($commentId)
{
    $comment = Comment::find($commentId);
    $comment->increment('likes');
}

public function dislike($commentId)
{
    $comment = Comment::find($commentId);
    $comment->increment('dislikes');
}
}
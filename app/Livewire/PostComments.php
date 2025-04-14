<?php

namespace App\Livewire;
use App\Notifications\PostCommentedNotification;
use Livewire\Component;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class PostComments extends Component
{
    public $post;
    public $body = '';
    public $parent_id = null;
    public $showComments = false;
    public $showMoreComments = [];
    public $visibleComments = 2;
    protected $rules = [
        'body' => 'required|string|min:1',
    ];

    public function addComment()
    {
        $this->validate();

        Comment::create([
            'post_id' => $this->post->id,
            'user_id' => Auth::id(),
            'body' => $this->body,
            'parent_id' => $this->parent_id
        ]);

        $this->body = '';
        $this->parent_id = null;
        
    
        $this->reset(['body', 'parent_id']);
        session()->flash('message', 'Your comment was posted!');
    }

    public function setReply($commentId)
    {
        $this->parent_id = $commentId;
    }

    public function render()
    {
        return view('livewire.post-comments', [
            'comments' => $this->post->comments
        ]);
    }
    public function toggleComments()
{
    $this->showComments = !$this->showComments;
}
public function toggleComment($commentId)
{
    $this->showMoreComments[$commentId] = !($this->showMoreComments[$commentId] ?? false);
}
public function loadMore()
{
    $this->visibleComments += 2;
}
public function getListeners()
{
    return [
        "toggle-comments-{$this->post->id}" => 'toggleComments',
    ];
}





}

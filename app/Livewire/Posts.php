<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class Posts extends Component
{
    use WithFileUploads;

    public $title, $body, $media, $editingPostId;
    
    public function save()
    {
        $data = $this->validate([
            'title' => 'nullable|string|max:255',
            'body' => 'required|string',
            'media' => 'nullable|file|mimes:jpg,jpeg,png,mp4,mov,avi|max:10240',
        ]);

        $mediaPath = $this->media ? $this->media->store('posts', 'public') : null;

        Post::create([
            'user_id' => Auth::id(),
            'title' => $this->title,
            'body' => $this->body,
            'media_path' => $mediaPath,
        ]);

        $this->reset(['title', 'body', 'media']);
        session()->flash('message', 'Post created successfully!');
    }

    public function render()
    {
        $posts = Post::where('user_id', Auth::id())->latest()->get();
        return view('livewire.posts', compact('posts'));
    }
   
}

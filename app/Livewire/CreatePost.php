<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Post;
use Illuminate\Support\Str;
class CreatePost extends Component
{
    use WithFileUploads;

    public $title, $location, $description, $media;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'media' => 'nullable'
    ];
    public function savePost()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'description' => 'required|string',
        ]);
    
        $filename = null;
        try {
            if ($this->media) {
                $filename = time() . '_' . Str::random(10) . '.' . $this->media->getClientOriginalExtension();
                $this->media->storeAs('posts', $filename, 'public');
            }
        } catch (\Exception $e) {
            dd('Upload Error:', $e->getMessage());
        }
        Post::create([
            'user_id' => auth()->id(),
            'title' => $this->title,
            'location' => $this->location,
            'body' => $this->description,
            'media_path' => $filename ? $filename : null,
        ]);
    // dd($filename);
        session()->flash('message', 'Post created successfully!');
        return redirect()->route('user.posts');
    }
    

    public function render()
    {
        return view('livewire.create-post');
    }
}

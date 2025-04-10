<div class="container py-4">
    <h2 class="mb-4">Create Post</h2>

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="save" enctype="multipart/form-data">
        <div class="mb-3">
            <input type="text" wire:model="title" class="form-control" placeholder="Title (optional)">
        </div>
        <div class="mb-3">
            <textarea wire:model="body" class="form-control" placeholder="What's on your mind?" required></textarea>
        </div>
        <div class="mb-3">
            <input type="file" wire:model="media" class="form-control">
        </div>
        <button class="btn btn-primary">Post</button>
    </form>

    <hr>

    <h4>Your Posts</h4>
    @foreach($posts as $post)
        <div class="card mb-3">
            <div class="card-body">
                @if($post->title)
                    <h5>{{ $post->title }}</h5>
                @endif
                <p>{{ $post->body }}</p>
                @if($post->media_path)
                    @if(Str::endsWith($post->media_path, ['.mp4', '.mov', '.avi']))
                        <video controls width="100%">
                            <source src="{{ asset('storage/' . $post->media_path) }}" type="video/mp4">
                        </video>
                    @else
                        <img src="{{ asset('storage/' . $post->media_path) }}" class="img-fluid" />
                    @endif
                @endif
            </div>
        </div>
    @endforeach
</div>

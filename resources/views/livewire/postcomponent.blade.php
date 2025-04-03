<div>
    <input type="text" wire:model="content">
    <button wire:click="createPost">Post</button>

    <div wire:poll>
        @foreach($posts as $post)
            <div>
                <p>{{ $post->content }}</p>
                <livewire:comment-component :post="$post"/>
            </div>
        @endforeach
    </div>
</div>

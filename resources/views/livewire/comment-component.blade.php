<div>
    <input type="text" wire:model="content">
    <button wire:click="addComment">Comment</button>

    <div wire:poll>
        @foreach($comments as $comment)
            <p>{{ $comment->content }}</p>
            <button wire:click="$set('parentId', {{ $comment->id }})">Reply</button>
            
            @foreach($comment->replies as $reply)
                <p>-- {{ $reply->content }}</p>
            @endforeach
        @endforeach
    </div>

    <button wire:click="like({{ $comment->id }})">👍 {{ $comment->likes }}</button>
     <button wire:click="dislike({{ $comment->id }})">👎 {{ $comment->dislikes }}</button>

</div>

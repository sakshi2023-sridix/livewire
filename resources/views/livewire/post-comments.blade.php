<div>
   

    @if($showComments)
        <form wire:submit.prevent="addComment" class="mb-4">
            <div class="form-floating">
                <textarea wire:model.defer="body" class="form-control bg-white" placeholder="Add a comment..." style="height: 80px;"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-sm mt-2">
                <i class="bi bi-send me-1"></i> Post Comment
            </button>
        </form>

        <div class="comment-thread">
            @foreach($comments->where('parent_id', null)->take($visibleComments) as $comment)
                @include('livewire.partials.comment-thread', ['comment' => $comment, 'level' => 0])
            @endforeach

            @if($comments->where('parent_id', null)->count() > $visibleComments)
                <button wire:click="loadMore" class="btn btn-outline-secondary btn-sm mt-2">
                    <i class="bi bi-chevron-down me-1 mb-2"></i> View More Comments
                </button>
            @endif
        </div>
    @endif
</div>

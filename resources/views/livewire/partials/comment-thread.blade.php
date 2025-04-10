@php
    $indent = min($level * 3, 6);
@endphp

<div class="ms-{{ $indent }} mb-3">
    <div class="d-flex gap-2">
        <div class="bg-light border rounded-3 shadow-sm p-3 w-100 mb-2">
            <div class="d-flex align-items-start">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($comment->user->name) }}&background=0D8ABC&color=fff"
                     class="rounded-circle border me-2" width="36" height="36" alt="{{ $comment->user->name }}">

                <div class="flex-grow-1">
                    <div class="d-flex justify-content-between">
                        <strong class="text-dark">{{ $comment->user->name }}</strong>
                    </div>
                    <p class="mb-2 text-muted" style="font-size: 0.95rem;">{{ $comment->body }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <button wire:click="setReply({{ $comment->id }})" class="btn btn-sm btn-link text-primary p-0">
                            <i class="bi bi-reply me-1"></i> Reply
                        </button>
                        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                    </div>

                    @if($parent_id === $comment->id)
                        <form wire:submit.prevent="addComment" class="mt-2">
                            <div class="form-floating bg-white border rounded-3 shadow-sm">
                                <textarea wire:model.defer="body" class="form-control" placeholder="Write a reply..." style="height: 60px;"></textarea>
                            </div>
                            <button type="submit" class="btn btn-sm btn-outline-primary mt-2">
                                <i class="bi bi-send"></i> Reply
                            </button>
                        </form>
                    @endif
                </div>
            </div>

            {{-- Replies --}}
            <div class="mt-2">
                @foreach($comment->replies as $reply)
                    @include('livewire.partials.comment-thread', ['comment' => $reply, 'level' => $level + 1])
                @endforeach
            </div>
        </div>
    </div>
</div>

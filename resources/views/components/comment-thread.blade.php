@php
    $indent = $level * 4;
@endphp

<div class="ml-{{ $indent }} mt-4 border-l-2 pl-4">
    <div>
        <strong>{{ $comment->user->name }}</strong> 
        <p class="text-sm text-gray-700">{{ $comment->body }}</p>
        <button wire:click="setReply({{ $comment->id }})" class="text-xs text-blue-500 hover:underline">Reply</button>
    </div>

    {{-- Show reply box only for this comment --}}
    @if($parent_id === $comment->id)
        <form wire:submit.prevent="addComment" class="mt-2">
            <textarea wire:model.defer="body" class="w-full border rounded p-2" placeholder="Write a reply..."></textarea>
            <button type="submit" class="mt-1 bg-blue-500 text-white px-3 py-1 text-sm rounded">Reply</button>
        </form>
    @endif

    {{-- Render replies recursively --}}
    @foreach($comment->replies as $reply)
        @include('livewire.partials.comment-thread', ['comment' => $reply, 'level' => $level + 1])
    @endforeach
</div>

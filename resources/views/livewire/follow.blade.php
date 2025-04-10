<button wire:click="toggleFollow"
    class="btn d-inline-flex align-items-center gap-2 rounded-pill 
    {{ $isFollow ? 'btn-outline-primary text-primary' : 'btn-outline-secondary text-dark' }}">
    
    @if($isFollow)
        <i class="fas fa-user-check"></i> <span>Following</span>
    @else
        <i class="fas fa-user-plus"></i> <span>Follow</span>
    @endif

    <span class="badge bg-light text-dark">{{ $followCount }}</span>
</button>

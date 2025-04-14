
<div>
    

<button wire:click.prevent="toggleLike" class="px-3 py-1 d-flex align-items-center">
    <i class="fas fa-heart me-2 {{ $isLiked ? 'text-danger' : 'text-dark' }}"></i>
    <span>{{ $likeCount }}</span>
</button>


</div>
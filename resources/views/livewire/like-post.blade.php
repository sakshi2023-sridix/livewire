
<div>
    @push('styles')
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
@endpush

<button wire:click.prevent="toggleLike" class="btn btn-outline-primary rounded px-3 py-1 d-flex align-items-center">
    <i class="fas fa-heart me-2 {{ $isLiked ? 'text-danger' : 'text-primary' }}"></i>
    <span>{{ $likeCount }}</span>
</button>


</div>
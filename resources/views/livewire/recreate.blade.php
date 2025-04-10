<button wire:click="recreatePost" class="btn btn-outline-primary btn-sm">
    <i class="fas fa-clone me-1"></i> Recreate
</button>

@if (session()->has('message'))
    <div class="alert alert-success mt-2">
        {{ session('message') }}
    </div>
@endif

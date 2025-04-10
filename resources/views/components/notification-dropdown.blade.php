@php
    $notifications = auth()->user()?->unreadNotifications;
@endphp

<div class="relative">
    <button class="relative">
        🔔
        @if($notifications->count())
            <span class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full px-1">
                {{ $notifications->count() }}
            </span>
        @endif
    </button>

    <div class="absolute mt-2 w-64 bg-white border rounded shadow z-50">
        @forelse($notifications as $notification)
            <div class="p-2 border-b hover:bg-gray-100">
                {{ $notification->data['message'] }}
            </div>
        @empty
            
        @endforelse
    </div>
</div>

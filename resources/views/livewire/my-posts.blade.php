<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">📬 My Posts</h2>

    @foreach($posts as $post)
        <div class="bg-white shadow-md rounded-2xl p-6 mb-6 border border-gray-200 hover:shadow-lg transition duration-300">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center space-x-3">
                    <div class="bg-indigo-100 text-indigo-700 px-2 py-1 text-xs rounded-full">
                        Posted by @ {{ $post->user->name }}
                    </div>
                    <span class="text-sm text-gray-400">{{ $post->created_at->diffForHumans() }}</span>
                </div>
                <button wire:click="deletePost({{ $post->id }})" class="text-red-600 hover:text-red-800 transition duration-150">
                    🗑️
                </button>
            </div>

            <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $post->title }}</h3>
            <p class="text-gray-600 mb-4">{{ $post->body }}</p>

            @if($post->media_path)
                @php
                    $extension = pathinfo($post->media_path, PATHINFO_EXTENSION);
                    $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                    $videoExtensions = ['mp4', 'webm', 'ogg'];
                @endphp

                @if(in_array(strtolower($extension), $imageExtensions))
                    <img src="{{ asset('storage/posts/' . $post->media_path) }}"
                         class="w-full rounded-lg object-cover mb-4"
                         alt="Post Image">
                @elseif(in_array(strtolower($extension), $videoExtensions))
                    <video controls class="w-full rounded-lg mb-4">
                        <source src="{{ asset('storage/posts/' . $post->media_path) }}" type="video/{{ $extension }}">
                        Your browser does not support the video tag.
                    </video>
                @endif
            @endif

            <div class="flex items-center justify-between text-sm text-gray-500">
                <div class="flex items-center space-x-1">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M17.657 16.657L13.414 12l4.243-4.243m0 8.486L18 18m0-12l-1.757 1.757m0 8.486L12 13.414m0 0L7.757 18m0-8.486L6 6m12 0l1.757 1.757M6 18l1.757-1.757"/>
                    </svg>
                    <span>{{ $post->location }}</span>
                </div>
                <span class="italic text-gray-400">#PostID: {{ $post->id }}</span>
            </div>
        </div>
    @endforeach
</div>

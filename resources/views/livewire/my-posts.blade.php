


<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

    <h2 class="text-xl font-semibold mb-4">My Posts</h2>

    @foreach($posts as $post)
        <div class="bg-white p-4 shadow rounded-lg mb-4">
            <div class="flex justify-between items-center">
                <span class="text-sm text-gray-500">Posted by @ {{ $post->user->name }}</span>
                <button wire:click="deletePost({{ $post->id }})" class="text-red-500">
                    🗑️
                </button>
            </div>
            <h3 class="text-lg font-bold">{{ $post->title }}</h3>
            <p>{{ $post->description }}</p>
            
            @if($post->media_path)
                        @php
                            $extension = pathinfo($post->media_path, PATHINFO_EXTENSION);
                            $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                            $videoExtensions = ['mp4', 'webm', 'ogg'];
                        @endphp

                        @if(in_array(strtolower($extension), $imageExtensions))
                            <img src="{{ asset('storage/posts/' . $post->media_path) }}"
                                 class="img-fluid rounded mb-3"
                                 alt="Post Image">
                        @elseif(in_array(strtolower($extension), $videoExtensions))
                            <video controls class="w-100 rounded mb-3">
                                <source src="{{ asset('storage/posts/' . $post->media_path) }}" type="video/{{ $extension }}">
                                Your browser does not support the video tag.
                            </video>
                        @endif
                    @endif

            <div class="flex justify-between items-center mt-2 text-gray-500">
                <span>📍 {{ $post->location }}</span>
                <span>⏳ {{ $post->created_at->diffForHumans() }}</span>
            </div>

            <div class="flex items-center mt-2">
                <button class="flex items-center mr-4">
                    👍 <span class="ml-1">0</span>
                </button>
                <button class="bg-black text-white px-3 py-1 rounded-lg">
                    0 Comments
                </button>
            </div>
        </div>
    @endforeach
</div>

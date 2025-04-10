
  
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6">
            @include('layouts.menu')

            @foreach($posts as $post)
            <div class="card mb-4 shadow-sm rounded-4 border" style="
            background-color: #e6fff8;
        ">

                    <div class="card-header bg-light border-0 px-3 py-2">
                        <div class="d-flex align-items-center mb-2 gap-2">
                            <a href="{{ route('user.posts', ['userId' => $post->user->id]) }}">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($post->user->name) }}&background=gray&color=fff"
                                     class="rounded-circle" width="35" height="35" alt="User">
                            </a>
                            
                            <div>
                                <div class="d-flex flex-wrap align-items-center gap-2">
                                    <span class="fw-semibold me-1">{{ $post->user->name }}</span>
                                    <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        </div>


                        <div class="d-flex flex-wrap align-items-center gap-3">
                            @livewire('follow', ['userId' => $post->user->id])
                            @livewire('recreate', ['userId' => $post->user->id, 'postId' => $post->id], key('recreate-' . $post->id))

                        </div>   
                    </div>
                    <div class="card-body bg-light px-3 pt-2 pb-3">
                        <h6 class="fw-semibold mb-2">
                            {{ isset($showMoreStates[$post->id]) && $showMoreStates[$post->id] ? $post->title : \Illuminate\Support\Str::limit($post->title, 60) }}
                            @if(strlen($post->title) > 60)
                                <a href="#" wire:click.prevent="togglePost({{ $post->id }})" class="ms-1 text-primary text-decoration-none">
                                    {{ isset($showMoreStates[$post->id]) && $showMoreStates[$post->id] ? 'Show less' : 'Show more' }}
                                </a>
                            @endif
                        </h6>
                        <p class="text-muted mb-3">
                            {{ isset($showMoreStates['body-'.$post->id]) && $showMoreStates['body-'.$post->id] ? $post->body : \Illuminate\Support\Str::limit($post->body, 150) }}
                            @if(strlen($post->body) > 150)
                                <a href="#" wire:click.prevent="togglePost('body-{{ $post->id }}')" class="ms-1 text-primary text-decoration-none">
                                    {{ isset($showMoreStates['body-'.$post->id]) && $showMoreStates['body-'.$post->id] ? 'Show less' : 'Show more' }}
                                </a>
                            @endif
                        </p>
                        @if($post->media_path)
                            @php
                                $extension = pathinfo($post->media_path, PATHINFO_EXTENSION);
                                $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                                $videoExtensions = ['mp4', 'webm', 'ogg'];
                                $mediaSrc = asset('storage/posts/' . $post->media_path);
                            @endphp

                            <div class="mb-3 text-center">
                                <div class="ratio ratio-16x9 rounded overflow-hidden mt-2 mb-2">
                                    @if(in_array(strtolower($extension), $imageExtensions))
                                        <img src="{{ $mediaSrc }}" alt="Post Image" class="img-fluid object-fit-contain">
                                    @elseif(in_array(strtolower($extension), $videoExtensions))
                                        <video controls muted class="w-100 h-100 object-fit-cover">
                                            <source src="{{ $mediaSrc }}" type="video/{{ $extension }}">
                                            Your browser does not support the video tag.
                                        </video>
                                    @endif
                                </div>
                            </div>
                        @endif
                        <div class="d-flex align-items-center gap-3">
                            @livewire('like-post', ['post' => $post], key('like-' . $post->id))
                        </div>

                        <div class="mt-3">
                            @livewire('post-comments', ['post' => $post], key('comments-' . $post->id))
                        </div>
                    </div>
                </div>
            @endforeach
            <div
                x-data
                x-init="() => {
                    let observer = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if(entry.isIntersecting){
                                @this.call('loadMore')
                            }
                        })
                    }, { root: null, threshold: 0.8 });
                    observer.observe($el);
                }"
                class="my-4"
            ></div>
            <div wire:loading wire:target="loadMore" class="text-center my-4">
                Loading more posts...
            </div>
        </div>
    </div>
</div>

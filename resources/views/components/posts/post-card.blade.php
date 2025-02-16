@props(['post'])
<div class="main-card my-5 px-2">
    <div class="d-flex profile justify-content-start align-items-center">
        
        <img src="{{ asset('storage/' . $post->user->profile_photo_path) }}" alt="User Profile Photo">

        <div class="mx-2 d-flex justify-content-between align-items-center w-100">
            <div>
                <h5 style="white-space: nowrap">{{ $post->user->name }} </h5>
            </div>

            {{ $slot }}

        </div>
    </div>
    <div class="blog-post mt-3" id="post-{{ $post->id }}" style="overflow: hidden; word-wrap: break-word; overflow-wrap: break-word; white-space: normal;">
        <span class="short-text" style="display: inline;">
            {{ Str::limit($post->body, 200) }}
        </span>
        <span class="full-text" style="display: none;">
            {{ $post->body }}
        </span>
        @if (strlen($post->body) > 200)
        <span class="read-more-btn" style="color: #61b2ff; cursor: pointer" data-post-id="{{ $post->id }}">Continue reading</span>
        @endif
    </div>
    <div class="post-image">
        <img src="{{ asset('storage/' . $post->image) }}" class="image" alt="Post Image">
    </div>

    <div class="d-flex justify-content-between my-3">

        <!-- Other post content -->
        
            <livewire:like-button :post="$post" />
            {{-- <livewire:comment-button /> --}}
            <div class="mx-3" style="font-size: 20px">
                <a href="{{ route('posts.show', $post->slug) }}"><i class="bi bi-chat"></i> {{ $post->comments->count() }} </a>
            </div>
         
        
    </div>
</div>
   

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const buttons = document.querySelectorAll('.read-more-btn');

        buttons.forEach(span => {
            span.addEventListener('click', (e) => {
                // Log to the console
                console.log('Button clicked');

                const postId = e.target.dataset.postId;
                const postElement = document.querySelector(`#post-${postId}`);

                const shortText = postElement.querySelector('.short-text');
                const fullText = postElement.querySelector('.full-text');
                const button = postElement.querySelector('.read-more-btn');

                // Toggle visibility
                if (fullText.style.display === 'none') {
                    shortText.style.display = 'none';
                    fullText.style.display = 'inline';  // changed to block for better visibility
                    button.textContent = ''; // change button text
                } 
                
            });
        });
    });
    document.addEventListener('click', function (e) {
    if (e.target.matches('.like-btn') || e.target.matches('.unlike-btn')) {
        e.preventDefault();

        const form = e.target.closest('form');
        const url = form.action;

        fetch(url, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
        })
        .then(response => response.text())
        .then(() => {
            location.reload(); // Reload the page to update the like count
        })
        .catch(error => console.error('Error:', error));
    }
    });
    function showLoginPrompt() {
        if (confirm('You need to log in to like this post. Do you want to log in now?')) {
            window.location.href = '{{ route('login') }}?redirect_to=' + encodeURIComponent(window.location.href);
        }
    }
</script>

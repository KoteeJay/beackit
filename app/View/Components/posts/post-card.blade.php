@props(['post'])
<div class="main-card my-5">
    <div class="px-3 d-flex profile justify-content-start align-items-center">
        <img src="{{ asset('assets/img/profile-img.jpg') }}" alt="">
        <div class="mx-3 d-flex justify-content-between align-items-center w-100 mt-3">
            <div>
                <h5>Justice Kote</h5>
            </div>

            <i class="bi bi-three-dots-vertical"></i>

        </div>
    </div>
    <div class="px-3 blog-post" id="post-{{ $post->id }}">
        <span class="short-text">
            {{ Str::limit($post->body, 200) }}
        </span>
        <span class="full-text" style="display: none;">
            {{ $post->body }}
        </span>
        @if (strlen($post->body) > 200)
        <span class="read-more-btn" style="color: #61b2ff; cursor: pointer" data-post-id="{{ $post->id }}">Read More</span>
        @endif
        {{-- <p class="card-text">{{ $post->body }}</p> --}}
    </div>
    <img src="{{ $post->image }}" class="card-img-top mt-3" alt="...">
    <div class="d-flex align-items-center my-3 like px-5">
        <i class="bi bi-hand-thumbs-up mb-3"></i>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const buttons = document.querySelectorAll('.read-more-btn');

        buttons.forEach(span => {
            span.addEventListener('click', (e) => {
                const postId = e.target.dataset.postId;
                const postElement = document.querySelector(`#post-${postId}`);

                const shortText = postElement.querySelector('.short-text');
                const fullText = postElement.querySelector('.full-text');
                const button = postElement.querySelector('.read-more-btn');

                // Toggle visibility
                if (fullText.style.display === 'none') {
                    shortText.style.display = 'none';
                    fullText.style.display = 'inline';
                    button.textContent = '';
                } else {
                    shortText.style.display = 'inline';
                    fullText.style.display = 'none';
                    button.textContent = 'Read More';
                }
            });
        });
    });
</script>

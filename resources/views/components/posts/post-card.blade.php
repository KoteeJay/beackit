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
        {{ $slot }}
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
                // else {
                //     shortText.style.display = 'inline';  // show short text
                //     fullText.style.display = 'none';
                //     button.textContent = 'Read More';  // revert button text
                // }
            });
        });
    });
</script>

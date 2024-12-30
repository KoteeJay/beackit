@extends('layouts.app')
@section('content')
@livewire('search-box')
<x-sidebar />
<main id="main" class="main">

    <section class="section dashboard">
        <div class="row">
            <div class=" main-page col-lg-8">
                <div class="row">
                    <div class=" col-md-12">
                        <div class="main-card my-5">
                            <div class="px-3 d-flex profile justify-content-start align-items-center">
                                <img src="{{ asset('assets/img/profile-img.jpg') }}" alt="">
                                <div class="mx-3 d-flex justify-content-between align-items-center w-100 mt-3">
                                    <div>
                                        <h5>{{ $post->user->name }} </h5>
                                    </div>
                        
                                    <i class="bi bi-three-dots-vertical"></i>
                        
                                </div>
                            </div>
                            <div class="px-3 blog-post" id="post-{{ $post->id }}">
                                
                                <span class="full-text" style="display: none;">
                                    {{ $post->body }}
                                </span>
                               
                            </div>
                            <img src="{{ asset($post->image) }}" class="card-img-top mt-3" alt="...">
                        
                            <div class="d-flex justify-content-between my-3">
                        
                                <!-- Other post content -->
                                
                                    <livewire:like-button :post="$post" />
                                    {{-- <livewire:comment-button /> --}}
                                    
                                   <!-- Comment Section -->
                            
                                
                            </div>
                        </div>
                        <div class="comments mt-4">
                            <h4>Comments</h4>
                            @foreach ($post->comments as $comment)
                                <div class="comment mb-3">
                                    <p>{{ $comment->body }}</p>
                                    <small>By {{ $comment->user->name }} on {{ $comment->created_at->diffForHumans() }}</small>
                                </div>
                            @endforeach
                    
                            @auth
                                <form action="{{ route('comments.store') }}" method="POST" class="mt-4">
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    <div class="form-group">
                                        <textarea name="body" class="form-control" rows="3" placeholder="Add a comment..." required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">Add Comment</button>
                                </form>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Left side columns -->
            <!-- Right side columns -->
            <div class="col-lg-4">
                <!-- Available -->
                <x-available />
                <!-- End Available -->
            </div>
            <!-- End Right side columns -->
        </div>
    </section>
</main>
@endsection
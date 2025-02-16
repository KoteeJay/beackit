@extends('layouts.app')
@section('content')
{{-- @livewire('search-box') --}}
<x-sidebar />
<main id="main" class="main">

    <section class="section dashboard">
        <div class="row">
            <div class=" main-page col-lg-8">
                <div class="row">
                    <div class=" col-md-12">
                        <div class="px-3 d-flex profile justify-content-start align-items-center">
        <img src="{{ $post->user->profile_photo_path ? asset('storage/' . $post->user->profile_photo_path) : asset('default-profile.png') }}" alt=" Profile photo " style="border-radius: 50%; width: 50px;">
                            <div class="mx-3 d-flex justify-content-between align-items-center w-100 mt-3">
                                <div>
                                    <h5>{{ $post->user->name }} </h5>
                                </div>
                    
                                <i class="bi bi-three-dots-vertical"></i>
                    
                            </div>
                        </div>
                        <div class="px-3 blog-post" id="post-{{ $post->id }}" style="margin-top:20px">
                            <span class="short-text" style="display: inline;">
                                {{ ($post->body) }}
                            </span>
                           
                            
                        </div>
                        <div class="main-page main-card">
                            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top mt-3" alt="...">
                        </div>
                        
                        <div class="d-flex justify-content-between py-3" style="background: #fafdff">

                            <!-- Other post content -->
                            
                                <livewire:like-button :post="$post" />
                                {{-- <livewire:comment-button /> --}}
                                <div class="mx-3" style="font-size: 20px">
                                    <a href="{{ route('posts.show', $post->slug) }}"><i class="bi bi-chat"></i> {{ $post->comments->count() }} </a>
                                </div>
                             
                            
                        </div>
                       
                    </div>
            
           
            <!-- End Left side columns -->

           

        </div>
    </section>

</main>
@endsection
@extends('layouts.app')
@section('content')
<x-sidebar />
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <a href="{{ route('dashboard.create') }} " class="btn btn-primary float-end">Create new post</a>

        </nav>
    </div>
    <!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <div class=" main-page col-lg-8">
                <div class="row">
                    <h1>Your Posts</h1>
    @if($posts->isEmpty())
        <p>No posts yet. Start creating one!</p>
    @else
        @foreach($posts as $post)
            <div class="post">
                <h2>{{ $post->body }}</h2>
                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" style="max-width: 100%; height: auto;">
                @endif
                <p><small>Posted on {{ $post->created_at->format('M d, Y') }}</small></p>
                <a href="{{ route('posts.show', $post->slug) }}">Read More</a>
            </div>
            <hr>
        @endforeach
    @endif

                </div>
            </div>
        </div>

    </section>

</main>
<!-- End #main -->
@endsection
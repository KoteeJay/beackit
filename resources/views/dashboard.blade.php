@extends('layouts.app')
@section('content')
<x-sidebar>
    
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('dashboard')}}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('home.index')}}">
            <i class="bi bi-grid"></i>
            <span>Post</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('dashboard.profile')}}">
            <i class="bi bi-grid"></i>
            <span>Profile</span>
        </a>
    </li>
    <!-- End Blank Page Nav -->
   
</x-sidebar>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <a href="{{ route('dashboard.create') }} " class="btn btn-primary float-end">Create new post <i class="bi bi-pen-fill"></i></a>

        </nav>
    </div>
    <!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <div class=" main-page col-lg-8">
                <div class="row">
                    @if($posts->isEmpty())
                    <p>No posts yet. Start creating one!</p>
                    @endif
                    @foreach ($posts as $post)     
                        <x-posts.post-card :post="$post">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Edit <i class="bi bi-pen-fill"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('posts.edit', $post->id) }}">Edit post</a></li>
                                    <li> <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirmDelete()">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item">Delete Post</button>
                                    </form>
                                </li>
                                </ul>
                            </div>
                        </x-posts.post-card>
                    @endforeach

                </div>
            </div>
        </div>

    </section>

</main>
<!-- End #main -->

<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this post?');
    }
</script>
@endsection
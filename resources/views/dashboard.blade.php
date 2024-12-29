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
                    @if($posts->isEmpty())
                    <p>No posts yet. Start creating one!</p>
                    @endif
                    @foreach ($posts as $Post)     
                        <x-posts.post-card :post="$Post"/>
                    @endforeach

                </div>
            </div>
        </div>

    </section>

</main>
<!-- End #main -->
@endsection
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
                            <img src="{{ asset('assets/img/profile-img.jpg') }}" alt="">
                            <div class="mx-3 d-flex justify-content-between align-items-center w-100 mt-3">
                                <div>
                                    <h5>Justice Kote</h5>
                                </div>
                    
                                <i class="bi bi-three-dots-vertical"></i>
                    
                            </div>
                        </div>
                        <div class="px-3 blog-post" id="post-{{ $post->id }}">
                            <span class="short-text" style="display: inline;">
                                {{ ($post->body) }}
                            </span>
                           
                            
                        </div>
                        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top mt-3" alt="...">
                        <div class="d-flex align-items-center my-3 like px-5">
                            <i class="bi bi-hand-thumbs-up mb-3"></i>
                        </div>
                       
                    </div>
            
            
            <div class="mt-4">
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Go Back</a>
                    </div>
                       
                    </div>

                </div>
            </div>
            <!-- End Left side columns -->

           

        </div>
    </section>

</main>
@endsection
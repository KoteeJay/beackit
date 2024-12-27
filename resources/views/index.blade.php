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
                        @foreach ($Posts as $Post)     
                            <x-posts.post-card :post="$Post">
                                <span class="short-text" style="display: inline;">
                                    {{ Str::limit($Post->body, 200) }}
                                </span>
                                <span class="full-text" style="display: none;">
                                    {{ $Post->body }}
                                </span>
                                @if (strlen($Post->body) > 200)
                                <span class="read-more-btn" style="color: #61b2ff; cursor: pointer" data-post-id="{{ $Post->id }}">Read More</span>
                                @endif
                            </x-posts.post-card>


                        @endforeach
                       
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
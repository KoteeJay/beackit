@extends('layouts.app')
@section('content')
<x-sidebar />
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Add Post</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Post</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class=" main-page col-lg">
                <div class="row">
                    <div class="col-md-9">
                        @if (session('status'))
                        <div class="alert alert-success"> {{session('status')}} </div>
                            
                        @endif
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('dashboard.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <img id="imagePreview" style="display: none; max-width: 300px; margin-top: 10px; border-radius: 8px">

                                    <div class="col-12">
                                        <div class="form-floating mt-5">
                                            <textarea class="form-control" name="body" placeholder="content" id="floatingTextarea" style="height: 200px;"></textarea>
                                            <label for="floatingTextarea">Enter your content</label>
                                            @error('body')
                                                <span class="text-danger"> {{ $message}} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between mt-3">
                                        <label for="upload-file" class="upload-icon"> 
                                            <i class="bi bi-upload"></i> 
                                        </label>

                                        <input type="file" id="upload-file" name="image" class="upload-input mx-5" accept="image/*" onchange="previewImage(event)">
                                        @error('image')
                                                <span class="text-danger"> {{ $message}} </span>
                                            @enderror

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                                <script>
                                    function previewImage(event) {
                                        const imageInput = event.target;
                                        const preview = document.getElementById('imagePreview');
                            
                                        if (imageInput.files && imageInput.files[0]) {
                                            const reader = new FileReader();
                            
                                            reader.onload = function(e) {
                                                preview.src = e.target.result;
                                                preview.style.display = 'block';
                                            };
                            
                                            reader.readAsDataURL(imageInput.files[0]);
                                        }
                                    }
                                </script>
                            
                                <!-- End floating Labels Form -->
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <!-- End Left side columns -->

        </div>
    </section>

   
</main>
<!-- End #main -->
@endsection
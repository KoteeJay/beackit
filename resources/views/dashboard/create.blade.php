@section('title', 'New post')
@extends('layouts.app')
@section('content')
<x-sidebar />
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Add Post</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
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
                                <form action="{{ route('dashboard.store') }}" method="POST" id="upload-form" enctype="multipart/form-data">
                                    @csrf
                                
                                    <!-- Image Preview -->
                                    <img id="imagePreview" style="display: none; max-width: 300px; margin-top: 10px; border-radius: 8px">
                                
                                    <!-- Post Content Textarea -->
                                    <div class="col-12">
                                        <div class="form-floating mt-5">
                                            <textarea class="form-control" maxlength="800" name="body" placeholder="Write your post..." id="post-content" style="height: 200px;" oninput="updateCharCount()"></textarea>
                                            <p id="char-count">0 / 800 characters</p>
                                            <p id="text-error" style="color: red; display: none;"></p> <!-- Error message for missing text -->
                                            <label for="floatingTextarea">Enter your content</label>
                                            @error('body')
                                                <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                
                                    <!-- File Upload & Submit Button -->
                                    <div class="d-flex justify-content-between mt-3">
                                        <label for="upload-file" class="upload-icon"> 
                                            <i class="bi bi-upload"></i> 
                                        </label>
                                
                                        <!-- File Input -->
                                        <input type="file" id="upload-file" name="image" class="upload-input mx-5" accept="image/*" onchange="previewImage(event)">
                                        
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                
                                    <!-- Error Messages -->
                                    <p id="image-error" style="color: red; display: none;"></p> <!-- Error for missing image -->
                                    
                                    @error('image')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </form>
                                
                                <script>
                                document.getElementById('upload-form').addEventListener('submit', function (e) {
                                    const imageInput = document.getElementById('upload-file');
                                    const textArea = document.getElementById('post-content');
                                    const imageError = document.getElementById('image-error');
                                    const textError = document.getElementById('text-error');
                                
                                    const image = imageInput.files[0];
                                    const maxSize = 2048 * 1024; // 2MB in bytes
                                
                                    let hasError = false;
                                
                                    // Check if text (body) is entered
                                    if (!textArea.value.trim()) {
                                        textError.textContent = 'Please enter some text for your post.';
                                        textError.style.display = 'block';
                                        hasError = true;
                                    } else {
                                        textError.style.display = 'none';
                                    }
                                
                                    // Check if image is uploaded
                                    if (!image) {
                                        imageError.textContent = 'Please upload an image.';
                                        imageError.style.display = 'block';
                                        hasError = true;
                                    } else {
                                        imageError.style.display = 'none';
                                    }
                                
                                    // Check image size
                                    if (image && image.size > maxSize) {
                                        imageError.textContent = 'The image size must not exceed 2 MB.';
                                        imageError.style.display = 'block';
                                        hasError = true;
                                    }
                                
                                    if (hasError) {
                                        e.preventDefault(); // Stop form submission if errors exist
                                    }
                                });
                                
                                // Live character count update
                                function updateCharCount() {
                                    const textarea = document.getElementById('post-content');
                                    const charCount = document.getElementById('char-count');
                                
                                    const maxLength = 800;
                                    const currentLength = textarea.value.length;
                                
                                    charCount.textContent = currentLength + " / " + maxLength + " characters";
                                
                                    if (currentLength >= maxLength - 50) {
                                        charCount.style.color = "red"; 
                                    } else {
                                        charCount.style.color = "black"; 
                                    }
                                }
                                
                                // Image preview function
                                function previewImage(event) {
                                    const imageInput = event.target;
                                    const preview = document.getElementById('imagePreview');
                                
                                    if (imageInput.files && imageInput.files[0]) {
                                        const reader = new FileReader();
                                
                                        reader.onload = function (e) {
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
<script>
    function updateCharCount() {
        var textarea = document.getElementById("post-content");
        var charCount = document.getElementById("char-count");
        
        var maxLength = 800; // Max characters
        var currentLength = textarea.value.length;
        
        // Update the character count display
        charCount.textContent = currentLength + " / " + maxLength + " characters";
        
        // Change color when close to the limit
        if (currentLength >= maxLength - 50) {
            charCount.style.color = "red"; // Warning color
        } else {
            charCount.style.color = "black"; // Default color
        }
    }
    </script>
    
@extends('layouts.app')

@section('content')

    <header class="mb-4">
        <h1 class="fw-bolder mb-1">Edit Post</h1>
    </header> 

    <form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ $post->title }}">
        </div>
        <div class="mb-3">
            <label for="lead" class="form-label">Lead</label>
            <input type="text" name="lead" class="form-control" id="lead" value="{{ $post->lead }}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" class="form-control" id="content" rows="5">{{ $post->content }}</textarea>
        </div>
        <div class="mb-3">
            <img class="img-fluid rounded" src="{{ url($post->image) }}" alt="..." />
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" class="form-control" id="image">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        
    </form>

@endsection

@section('sidebar')

   <!-- Search widget-->
   <div class="card mb-4">
        <div class="card-header">Search</div>
        <div class="card-body">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                <button class="btn btn-primary" id="button-search" type="button">Go!</button>
            </div>
        </div>
    </div>
    <!-- Categories widget-->
    <div class="card mb-4">
        <div class="card-header">Categories</div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <ul class="list-unstyled mb-0">
                        <li><a href="#!">Web Design</a></li>
                        <li><a href="#!">HTML</a></li>
                        <li><a href="#!">Freebies</a></li>
                    </ul>
                </div>
                <div class="col-sm-6">
                    <ul class="list-unstyled mb-0">
                        <li><a href="#!">JavaScript</a></li>
                        <li><a href="#!">CSS</a></li>
                        <li><a href="#!">Tutorials</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Side widget-->
    <div class="card mb-4">
        <div class="card-header">Side Widget</div>
        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
    </div>

@endsection


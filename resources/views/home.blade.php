@extends('layouts.app')

@section('content')

    <!-- Featured blog post-->
    <x-posts.card :post="$posts[0]"/>

    <!-- Nested row for non-featured blog posts-->
    <div class="row">
        <div class="col-lg-6">
            <!-- Blog post-->
            @isset($posts[1])<x-posts.card :post="$posts[1]"/>@endisset
    
            <!-- Blog post-->
            @isset($posts[3])<x-posts.card :post="$posts[3]"/>@endisset
        </div>
        <div class="col-lg-6">
            <!-- Blog post-->
            @isset($posts[2])<x-posts.card :post="$posts[2]"/>@endisset

            <!-- Blog post-->
            @isset($posts[4])<x-posts.card :post="$posts[4]"/>@endisset
        </div>
    </div>

    {{ $posts->links() }}

    <!-- Pagination-->
    <!--
    <nav aria-label="Pagination">
        <hr class="my-0" />
        <ul class="pagination justify-content-center my-4">
            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
            <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
            <li class="page-item"><a class="page-link" href="#!">2</a></li>
            <li class="page-item"><a class="page-link" href="#!">3</a></li>
            <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
            <li class="page-item"><a class="page-link" href="#!">15</a></li>
            <li class="page-item"><a class="page-link" href="#!">Older</a></li>
        </ul>
    </nav>
    -->
    
@endsection

@section('sidebar')

    @can('edit_forum')
        <div class="card mb-4">
            <div class="card-header">Edit the Forum</div>
            <div class="card-body">
                <a class="btn btn-success" href="#" role="button">Edit Forum</a>
            </div>
        </div>
    @endcan

    @can('manage_forum')
        <div class="card mb-4">
            <div class="card-header">Manage the Forum</div>
            <div class="card-body">
                <a class="btn btn-success" href="#" role="button">Manage Forum</a>
            </div>
        </div>
    @endcan

    @can('edit articles') 
        <div class="card mb-4">
            <div class="card-header">Neuer Post</div>
            <div class="card-body">
                <a class="btn btn-success" href="{{ url('posts/create') }}" role="button">Neuen Post erstellen</a>
            </div>
        </div>
    @endcan
    
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


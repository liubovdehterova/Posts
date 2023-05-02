@extends('layout')

@section('title', 'List Categories')

@section('content')
    <h1>List Posts</h1>

    @if(isset($_SESSION['message']))
        <div class="alert alert-{{ $_SESSION['message']['status'] }}" role="alert">
            {{ $_SESSION['message']['text'] }}
        </div>
    @endif
    <div class="container text-center">
        <div class="row bg-dark">
            <div class="col text-light">#</div>
            <div class="col text-light">Title</div>
            <div class="col text-light">Category</div>
            <div class="col text-light">Tags</div>
            <div class="col text-light">Slug</div>
            <div class="col text-light">Body</div>
            <div class="col text-light">Update</div>
            <div class="col text-light">Delete</div>
        </div>
        @foreach($posts as $post)
            <div class="row border border-top-0 bg-dark bg-gradient">
                <div class="col text-light">
                    {{ $post->id }}
                </div>
                <div class="col text-light">
                    {{ $post->title }}
                </div>
                <div class="col text-light">
                    {{ $post->category->title }}
                </div>
                <div class="col text-light">
                    {{ $post->tags->pluck('title')->join(', ') }}
                </div>
                <div class="col text-light">
                    {{ $post->slug }}
                </div>
                <div class="col text-light">
                    {{ $post->body }}
                </div>
                <div class="col">
                    <a href="/post/{{ $post->id }}/edit">
                        Update post
                    </a>
                </div>
                <div class="col">
                    <a href="/post/{{ $post->id }}/destroy">
                        Delete post
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    @php
        unset($_SESSION['message']);
    @endphp
@endsection
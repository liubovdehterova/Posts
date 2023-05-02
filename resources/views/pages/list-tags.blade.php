@extends('layout')

@section('title', 'List Tags')

@section('content')
    <h1>List Tags</h1>
    @if(isset($_SESSION['message']))
        <div class="alert alert-{{ $_SESSION['message']['status'] }}" role="alert">
            {{ $_SESSION['message']['text'] }}
        </div>
    @endif
    <div class="container text-center">
        <div class="row bg-dark">
            <div class="col text-light">#</div>
            <div class="col text-light">Title</div>
            <div class="col text-light">Slug</div>
            <div class="col text-light">Update</div>
            <div class="col text-light">Delete</div>
        </div>
        @foreach($tags as $tag)
            <div class="row border border-top-0 bg-dark bg-gradient">
                <div class="col text-light">
                    {{ $tag->id }}
                </div>
                <div class="col text-light">
                    {{ $tag->title }}
                </div>
                <div class="col text-light">
                    {{ $tag->slug }}
                </div>
                <div class="col">
                    <a href="/tag/{{ $tag->id  }}/edit">
                        Update Tag
                    </a>
                </div>
                <div class="col">
                    <a href="/tag/{{ $tag->id }}/destroy">
                        Delete Tag
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    @php
        unset($_SESSION['message']);
    @endphp
@endsection
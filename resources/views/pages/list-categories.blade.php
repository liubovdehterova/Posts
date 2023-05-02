@extends('layout')

@section('title', 'List Categories')

@section('content')
    <h1>List Categories</h1>

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
        @foreach($categories as $category)
            <div class="row border border-top-0 bg-dark bg-gradient">
                <div class="col text-light">
                    {{ $category->id }}
                </div>
                <div class="col text-light">
                    {{ $category->title }}
                </div>
                <div class="col text-light">
                    {{ $category->slug }}
                </div>
                <div class="col">
                    <a href="/category/{{ $category->id }}/edit">
                        Update Category
                    </a>
                </div>
                <div class="col">
                    <a href="/category/{{ $category->id }}/destroy">
                        Delete Category
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    @php
        unset($_SESSION['message']);
    @endphp
@endsection
@extends('layout')

@section('title', 'Create Category')

@section('content')
    <h1>Create Category</h1>

    <form method="post">
        @if(isset($_SESSION['errors']['title']))
            @foreach($_SESSION['errors']['title'] as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Title Category</label>
            <input type="text"
                   name="title"
                   class="form-control"
                   id="formGroupExampleInput"
                   placeholder="Title Category"
                   value="{{ $_SESSION['data']['title'] ?? $category->title }}"
            >
        </div>
        @if(isset($_SESSION['errors']['slug']))
            @foreach($_SESSION['errors']['slug'] as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
            @endforeach
        @endif

        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Slug Category</label>
            <input type="text"
                   name="slug"
                   class="form-control"
                   id="formGroupExampleInput2"
                   placeholder="Slug Category"
                   value="{{ $_SESSION['data']['title'] ?? $category->slug}}"
            >
        </div>
        <div class="col-12">
            <input type="submit" class="btn btn-primary" value="save category">
        </div>
    </form>

    @php
        unset($_SESSION['errors']);
        unset($_SESSION['data']);
    @endphp
@endsection
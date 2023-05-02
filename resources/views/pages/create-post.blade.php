@extends('layout')

@section('title', 'Create Category')

@section('content')
    <h1>Create Post</h1>

    <form method="post">
        @if(isset($_SESSION['errors']['title']))
            @foreach($_SESSION['errors']['title'] as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Title Post</label>
            <input type="text"
                   name="title"
                   class="form-control"
                   id="formGroupExampleInput"
                   placeholder="Title Post"
                   value="{{ $_SESSION['data']['title'] ?? $posts->title }}"
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
            <label for="formGroupExampleInput2" class="form-label">Slug Post</label>
            <input type="text"
                   name="slug"
                   class="form-control"
                   id="formGroupExampleInput2"
                   placeholder="Slug Post"
                   value="{{ $_SESSION['data']['title'] ?? $posts->slug}}"
            >
        </div>

        @if(isset($_SESSION['errors']['body']))
            @foreach($_SESSION['errors']['body'] as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif
        <div class="mb-3">
            <label for="body" class="form-label">Body Post</label>
            <textarea name="body" class="form-control" id="body" rows="3">
                {{ $_SESSION['data']['body'] ?? $posts->body }}
            </textarea>
        </div>

        @if(isset($_SESSION['errors']['category']))
            @foreach($_SESSION['errors']['category'] as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select id="category" name="category" class="form-select" aria-label="Default select example">
                <option selected>Choose category</option>
                @foreach($categories as $category)
                    <option @if(isset($_SESSION['data']['category']) == $category->id) selected @endif value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        @if(isset($_SESSION['errors']['tags']))
            @foreach($_SESSION['errors']['tags'] as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif
        <div class="mb-3">
            <div class="form-check">
                @foreach($tags as $tag)
                    <input class="form-check-input" @if(isset($_SESSION['data']['tags'])) @if(in_array($tag->id, $_SESSION['data']['tags'])) checked @endif @endif type="checkbox" value="{{ $tag->id }}" id="tags" name="tags[]">
                    <label class="form-check-label" for="tags">
                        {{ $tag->title }}
                    </label>
                    <br/>
                @endforeach
            </div>
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
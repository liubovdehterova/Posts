@extends('layout')

@section('title', 'Tags')

@section('content')
    <h1>Create Tag</h1>

    <form method="post">
        @if(isset($_SESSION['errors']['title']))
            @foreach($_SESSION['errors']['title'] as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Title Tag</label>
            <input type="text"
                   name="title"
                   class="form-control"
                   id="formGroupExampleInput"
                   placeholder="Title Tag"
                   value="{{ $_SESSION['data']['title'] ?? $tags->title }}"
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
            <label for="formGroupExampleInput2" class="form-label">Slug Tag</label>
            <input type="text"
                   name="slug"
                   class="form-control"
                   id="formGroupExampleInput2"
                   placeholder="Slug Tag"
                   value="{{ $_SESSION['data']['title'] ?? $tags->slug }}"
            >
        </div>
        <div class="col-12">
            <input name="submit"
                   type="submit"
                   class="btn btn-primary"
                   value="Save Tag">
        </div>
    </form>
    @php
        unset($_SESSION['errors']);
        unset($_SESSION['data']);
    @endphp
@endsection
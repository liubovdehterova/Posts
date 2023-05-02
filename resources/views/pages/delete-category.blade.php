@extends('layout1')

@section('title', 'delete-category')

@section('content')

    <a href="/category/{{ $category->id }}/destroy">List Categories</a>
@endsection
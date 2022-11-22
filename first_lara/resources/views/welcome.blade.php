@extends('layout')

@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Congrats!</strong> {{ session()->get('message'); }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Warning!</strong> {{ session()->get('delete'); }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <a href="/posts/create" class="btn btn-primary">Create New Article</a>
    @foreach ($posts as $post)
    @php
        $img = 'images/' . $post->image_path;
    @endphp
        <x-card-post>
            <img src="{{ asset($img) }}" height="200px" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->discription }}</p>
                <a href="/posts/{{ $post->id }}" class="btn btn-secondary">View Article</a>
            </div>
        </x-card-post>
    @endforeach
@endsection
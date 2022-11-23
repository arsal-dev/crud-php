@extends('layout')


@section('content')
    <x-card-post>
        @php
            $img = 'images/' . $post->image_path;
        @endphp
        <img src="{{ asset($img) }}" height="200px" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->body }}</p>
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary m-2">Edit</a>
            <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
            </form>
        </div>
    </x-card-post>
@endsection
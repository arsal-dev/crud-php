@extends('layout')


@section('content')

    <h3>welcome page</h3>

    @foreach ($posts as $post)
        <a href="/posts/{{ $post->id }}"><h3>{{ $post->title }}</h3></a>
        <p>{{ $post->discription }}</p>
        <hr>
    @endforeach


    {{-- @foreach ($langs as $lang)
        <x-langs :language="$lang" />
    @endforeach --}}
@endsection
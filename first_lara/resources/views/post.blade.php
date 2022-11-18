@extends('layout')


@section('content')
    <h3>{{ $post->title }}</h3>
    <p>{{ $post->body }}</p>
@endsection
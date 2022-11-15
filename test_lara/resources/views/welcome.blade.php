@extends('layout')


@section('content')
    <h1>
        hello world!
    </h1>

    <x-test-component :blog="$data" />
@endsection
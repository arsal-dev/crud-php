@extends('layout')


@section('content')
<x-card-post class="p-2">
    <div class="card-body">
        <form enctype="multipart/form-data" action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" placeholder="Blog Title" class="form-control @error('title') is-invalid  @enderror" id="title" value="{{ old('title') }}">
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="descripition" class="form-label">Descripition</label>
                <input type="text" name="discription" placeholder="Blog Descripiton" value="{{ old('discription') }}" class="form-control @error('discription') is-invalid  @enderror" id="descripition">
                @error('discription')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Article</label>
                <textarea name="body" placeholder="Blog Body" class="form-control @error('body') is-invalid  @enderror" id="body" cols="30" rows="10">{{ old('body') }}</textarea>
                @error('body')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Blog Thumbnail</label>
                <input class="form-control" name="image" type="file" id="formFile">
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</x-card-post>
@endsection
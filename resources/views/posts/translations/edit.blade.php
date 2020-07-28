@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Edit post</div>
            <div class="card-body">
                <a href="{{ route('posts.translations.create', ['post' => $post]) }}" class="btn btn-primary mb-3">New translation</a>
                <form method="POST" action="{{ route('posts.translations.update', [
                    'post' => $post,
                    'locale' => $post->locale
                    ]) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input value="{{ old('title', $post->title) }}" type="text" class="form-control" name="title" id="title" placeholder="Enter a post title">
                    </div>
                    <div class="form-group">
                        <label for="language">Choose a language</label>
                        <select class="form-control" id="language" name="locale" disabled>
                            <option>{{ $post->locale }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="post-content">Post content</label>
                        <textarea class="form-control" id="content" name="content" rows="5">{{ old('content', $post->content) }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

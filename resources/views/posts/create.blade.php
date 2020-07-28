@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">New post</div>
            <div class="card-body">
                <form method="POST" action="{{ route('posts.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input  value="{{ old('title') }}" type="text" class="form-control" name="title" id="title" placeholder="Enter a post title">
                    </div>
                    <div class="form-group">
                        <label for="language">Choose a language</label>
                        <select class="form-control" id="language" name="locale">
                            @foreach(app('translatable.locales')->all() as $locale)
                                <option>{{ $locale }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="post-content">Post content</label>
                        <textarea class="form-control" id="content" name="content" rows="5">{{ old('content') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

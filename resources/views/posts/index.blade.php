@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{ __('Dashboard') }}</div>
            <div class="card-body">
                <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">New post</a>
                <div class="list-group">
                @foreach($posts as $post)
                      <a href="{{ route('posts.translations.edit', [
                        'post' => $post->post,
                        'locale' => $post->locale
                        ])}}"
                      class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                          <h5 class="mb-1">{{ $post->title }}</h5>
                          <small>{{ $post->post->created_at->diffForHumans() }}</small>
                        </div>
                        <p class="mb-1 text-truncate">{{ $post->content }}</p>
                        <small>language: {{ $post->locale }}</small>
                      </a>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

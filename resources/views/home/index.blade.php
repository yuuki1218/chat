@extends('layouts.front')

@section('content')
    <div class="container mt-4">
        <div class="mb-4">
            <a href="{{ action('PostsController@create') }}" class="btn btn-primary">
                投稿を新規作成する
            </a>
        </div>
        @foreach ($posts as $post)
            <div class="card mb-4">
                <div class="card-header">
                    {{ $post->title }}
                </div>
                <div class="card-body">
                    <p class="card-text">
                        {!! nl2br(e(str_limit($post->body, 200))) !!}
                    </p>
                </div>
                <div class="card-footer">
                    <span class="mr-2">
                        投稿日時 {{ $post->created_at->format('Y.m.d') }}
                    </span>

                    @if ($post->comments->count())
                        <span class="badge badge-primary">
                            コメント {{ $post->comments->count() }}件
                        </span>
                    @endif
                    <a class="card-link" href="{{ action('PostsController@show', ['id' => $post->id]) }}">
                        続きを読む
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
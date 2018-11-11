@extends('layouts.app', ['app_title' => $news->title])

@section('content')
    <div class="d-flex align-items-center">
        <h1>{{ $news->title }}</h1>
        <div class="ml-3">
            <a href="{{ route('app.categories.show', $news->category->getKey()) }}">
                {{ $news->category->title }}
            </a>
        </div>
    </div>

    @if ($news->description)
        <p class="lead">{{ $news->description }}</p>
    @endif

    {!! $news->body !!}

    @if ($news->tags->count())
        <p class="mt-5 mb-0">
            @foreach($news->tags as $tag)
                <a href="{{ route('app.news.index', ['tag' => $tag->getKey()]) }}" class="bg-dark text-white px-2 py-1 mr-2 rounded">
                    {{ $tag->title }}
                </a>
            @endforeach
        </p>
    @endif

    @if (auth()->check() && $news->user_id === auth()->user()->id)
        <form action="{{ route('app.news.destroy', $news) }}" class="mt-5" method="post">
            @csrf
            @method('delete')
            <button class="btn btn-danger">Удалить</button>
        </form>
    @endif

    <p class="mt-4">
        Автор:
        <img src="{{ $news->user->user_avatar }}" class="rounded-circle" width="30" alt="">
        <a href="{{ route('app.news.index', ['author' => $news->user]) }}">
            {{ $news->user->name }}
        </a>
    </p>

    <h2 class="mt-5">All comments (unapproved not displayed): {{ $news->comments->count() }}</h2>

    @forelse($news->comments as $comment)

        @if($comment->approved)
            <div class="row">
                <div class="col-auto">
                    <p>
                        <img src="{{ asset($comment->user->user_avatar) }}"
                             class="rounded-circle" alt="{{ $comment->user->name }}" width="100">
                    </p>
                    {{ $comment->user->name }}
                </div>
                <div class="col">
                    <p>{!! nl2br($comment->message) !!}</p>
                    <p class="text-muted text-right mb-0">
                        {{ $comment->created_at->diffForHumans() }}
                    </p>
                </div>
            </div>
        @endif

        <hr>
    @empty
        <p><em>Комментарии пока не добавлены...</em></p>
    @endforelse

    @auth
    <form action="{{ route('app.news.add-comment', $news) }}" method="post">
        @csrf
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

        <div class="form-group{{ $errors->has('message') ? ' is-invalid' : '' }}">
            <label for="message">Ваше сообщение</label>
            <textarea class="form-control" id="message" name="message" required>{{ old('message') }}</textarea>
            @if($errors->has('message'))
                <div class="mt-1 text-danger">
                    {{ $errors->first('message') }}
                </div>
            @endif
        </div>

        <div class="mt-3">
            <button class="btn btn-primary">
                Оставить комментарий
            </button>
        </div>
    </form>
    @endauth
@endsection

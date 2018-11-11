@extends('layouts.app')

@section('content')

    <p8> NEWS </p8>

    <div class="row">

        @forelse($newslist as $news)
            <div class="col-md-12">
                <div class="jumbotron">
                    <h2>
                        <a href="{{ route('app.news.show', $news->getKey()) }}">
                            {{ $news->title }}
                        </a>
                    </h2>

                    @if ($news->description)
                        <p>{{ $news->description }}</p>
                    @else
                        <p>{{ str_limit(strip_tags($news->body), 50) }}</p>
                    @endif

                    <p class="mb-0">News added: {{ $news->created_at->diffForHumans() }}</p>

                    @if ($news->user)
                        <p class="lead">{{ $news->user->name }}</p>
                    @endif

                    <p class="mb-0">All comments: {{ $news->comments->count() }}</p>
                </div>
            </div>
        @empty
            <div class="col">
                <p>Новости пока не добавлены.</p>
            </div>
        @endforelse
        <div class="col">

            @auth
                <a href="{{ route('app.news.create') }}"
                   class="btn btn-primary">
                    Добавить новость
                </a>

                <a href="{{ route('app.tags.create') }}"
                   class="ml-3 btn btn-secondary">
                    Добавить тег
                </a>
            @endauth

            <div class="col mt-3">
                {{ $newslist->appends(request()->except('page'))->links() }}
            </div>
        </div>
    </div>

@endsection

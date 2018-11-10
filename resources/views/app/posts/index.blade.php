@extends('layouts.app')

@section('content')

    <p8> POSTS </p8>

    <div class="row">

        @forelse($postslist as $post)
            <div class="col-md-12">
                <div class="jumbotron">
                    <h2>
                        <a href="{{ route('app.posts.show', $post->getKey()) }}">
                            {{ $post->title }}
                        </a>
                    </h2>

                    @if ($post->description)
                        <p>{{ $post->description }}</p>
                    @else
                        <p>{{ str_limit(strip_tags($post->body), 50) }}</p>
                    @endif

                    <p class="mb-0">News added: {{ $post->created_at->diffForHumans() }}</p>

                    @if ($post->user)
                        <p class="lead">{{ $post->user->name }}</p>
                    @endif

                    <p class="mb-0">Comments: {{ $post->comments->count() }}</p>
                </div>
            </div>
        @empty
            <div class="col">
                <p>Posts not yet added.</p>
            </div>
        @endforelse
        <div class="col">

            @auth
                <a href="{{ route('app.posts.create') }}"
                   class="btn btn-primary">
                    Add post
                </a>

                <a href="{{ route('app.tags.create') }}"
                   class="ml-3 btn btn-secondary">
                    Add tag
                </a>
            @endauth

            <div class="col mt-3">
                {{ $postslist->appends(request()->except('page'))->links() }}
            </div>
        </div>
    </div>

@endsection

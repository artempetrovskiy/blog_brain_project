@extends('layouts.app')

@section('content')

    <p8> REVIEWS </p8>

    <div class="row">

        @forelse($reviewslist as $review)
            <div class="col-md-12">
                <div class="jumbotron">
                    <h2>
                        <a href="{{ route('app.reviews.show', $review->getKey()) }}">
                            {{ $review->title }}
                        </a>
                    </h2>

                    @if ($review->description)
                        <p>{{ $review->description }}</p>
                    @else
                        <p>{{ str_limit(strip_tags($review->body), 50) }}</p>
                    @endif

                    <p class="mb-0">News added: {{ $review->created_at->diffForHumans() }}</p>

                    @if ($review->user)
                        <p class="lead">{{ $review->user->name }}</p>
                    @endif

                    <p class="mb-0">Comments: {{ $review->comments->count() }}</p>
                </div>
            </div>
        @empty
            <div class="col">
                <p>Reviews not yet added.</p>
            </div>
        @endforelse
        <div class="col">

            @auth
                <a href="{{ route('app.reviews.create') }}"
                   class="btn btn-primary">
                    Add review
                </a>

            @endauth

            <div class="col mt-3">
                {{ $reviewslist->appends(request()->except('page'))->links() }}
            </div>
        </div>
    </div>

@endsection

@extends('layouts.app')

@section('content')

    <h2>Update news</h2>

    @foreach($newslist as $news)

        <form action="{{ route('app.news.update', [$news->getKey()]) }}" method="post">
            @csrf
            @method('patch')

            <div class="form-group mt-5">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('body') ?? $news->title }}">
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ old('body') ?? $news->description }}">
            </div>

            <div class="form-group">
                <label for="body">News text:</label>
                <textarea class="form-control" rows="5" id="body" name="body">{{ old('body') ?? $news->body }} </textarea>
            </div>

            <div class="mt-4">
                <button class="btn btn-primary">Update this news</button>
            </div>
        </form>

    @endforeach

@endsection

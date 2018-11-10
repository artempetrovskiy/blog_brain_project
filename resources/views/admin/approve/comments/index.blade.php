@extends('layouts.app')

@section('content')

    <h2>Unapproved comments</h2>
    <h3>Unchecked comments will be deleted.</h3>

    <div>
        <div>Comment id</div>
        <div>Comment text</div>
        <div>Approve it?</div>
    </div>

    @foreach($unApprovedComments as $unApprovedComment)

        <form action="{{ route('app.comments.update', [$unApprovedComment->getKey()]) }}" method="post">

            @csrf
            @method('patch')

            <div class="container">
                <div>{{ $unApprovedComment->id }}</div>
                <div>{{ $unApprovedComment->message }}</div>
                <div class="form-group">
                    <label class="mr-3">
                        <input type="checkbox" name="unApprovedComments[]" value="{{ $unApprovedComment->getKey() }}">
                    </label>
                </div>
            </div>

            @endforeach
            <button type="submit" class="btn btn-danger">Approve it</button>
        </form>

@endsection

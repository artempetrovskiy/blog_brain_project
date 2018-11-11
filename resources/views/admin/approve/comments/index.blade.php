@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Unapproved comments</h2>
        <p>Unchecked comments will be deleted.</p>
        <table class="table">
            <thead>
            <tr>
                <th>Comment id</th>
                <th class="text-center">Comment text</th>
                <th class="text-right">Approve it?</th>
            </tr>
            </thead>
        </table>
    </div>

    @foreach($unApprovedComments as $unApprovedComment)

        <form action="{{ route('app.comments.update', [$unApprovedComment->getKey()]) }}" method="post">

            @csrf
            @method('patch')

            <div class="container">
                <div>{{ $unApprovedComment->id }}</div>
                <div class="text-center">{{ $unApprovedComment->message }}</div>
                <div class="form-group text-right">
                    <label class="mr-3">
                        <input type="checkbox" name="unApprovedComments[]" value="{{ $unApprovedComment->getKey() }}">
                    </label>
                </div>
            </div>
                @endforeach
            <button type="submit" class="btn btn-danger">Approve all checked comments</button>
        </form>

@endsection

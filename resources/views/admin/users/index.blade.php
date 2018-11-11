@extends('layouts.app')

@section('content')

    @foreach($users as $user)
        <div>
            <a href="{{ route('admin.users.show', $user->id) }}" class="nav-link">{{ $user->name }}</a>
        </div>
    @endforeach

@endsection

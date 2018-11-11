@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>User</h2>
        <p>This page only show users attributes</p>
        <table class="table">
            <thead>
                <tr>
                    <th>Attribute</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Id</td>
                    <td>
                        {{ $user->id }}
                    </td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>
                        {{ $user->name }}
                    </td>
                </tr>
                <tr>
                    <td>E-mail</td>
                    <td>
                        {{ $user->email }}
                    </td>
                </tr>
                <tr>
                    <td>Role Id</td>
                    <td>
                        {{ $user->role_id }}
                    </td>
                </tr>

                <tr>
                    <td>Media</td>
                    @foreach($user->medias as $media)
                        <td>
                            <img src="{{ asset($media->path) }}" class="rounded" width="250">
                        </td>
                    @endforeach
                </tr>

            </tbody>
        </table>
    </div>

@endsection

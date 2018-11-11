@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Admin panel</h2>
        <p>The admin panel is used to administer the blog</p>
        <table class="table">
            <thead>
                <tr>
                    <th>Admin section</th>
                    <th>Link</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Approve comments queue</td>
                    <td>
                        <a href="{{ route('admin.approve.comments') }}" class="nav-link">admin/approve/comments</a>
                    </td>
                </tr>
                <tr>
                    <td>News update panel</td>
                    <td>
                        <a href="{{ route('admin.update.news') }}" class="nav-link">admin/update/news</a>
                    </td>
                </tr>
                <tr>
                    <td>View users</td>
                    <td>
                        <a href="{{ route('admin.users') }}" class="nav-link">admin/users</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection

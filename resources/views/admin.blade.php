@extends('layouts.app')

@section('content')
<h1> Welcome to Admin dashboard</h1>
<hr />

<h3>Blogs</h3>
<div class="admin-blogs-table-wrapper">
    <table class="table">
        <thead>
            <th>Title</th>
            <th>By</th>
            <th>Created on</th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
            @forelse ($blogs as $blog)
            <tr>
                <td>{{$blog->title}}</td>
                <td>{{$blog->author->name}}</td>
                <td>{{date('d. M. Y.', strtotime($blog->created_at) )}}</td>
                <td>
                    @if($blog->approved)
                    <button class="btn btn-outline-primary" disabled>Approved</button>
                    @else
                    <a href="/blog/approve/{{$blog->id}}" class="btn btn-primary">Approve</a>
                    @endif
                </td>
                <td>
                    <form action="blog/{{$blog->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>

                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3">
                    There are no blogs here!
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<h3>Users</h3>
<div class="admin-users-table-wrapper">
    <table class="table">
        <thead>
            <th>Username</th>
            <th>Registered on</th>

        </thead>
        <tbody>
            @forelse ($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{date('d. M. Y.', strtotime($blog->created_at) )}}</td>

            </tr>
            @empty
            <tr>
                <td colspan="3">
                    There are no blogs here!
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@stop
@extends('layouts.app')

@section('content')
<div class="blog-index-wrapper">

    @forelse ($blogs as $blog)
    <div class="blog-single">
        <div class="blog-image">
            <img src="{{$blog->image_url}}" alt="{{$blog->title}}">
        </div>
        <div class="blog-info">
            <div class="blog-title">
                <h5>{{$blog->title}}</h5>
            </div>

            <div class="blog-buttons">
                <a href="/blog/{{$blog->id}}" class="btn btn-primary btn-sm">Read more</a><br>
                @auth
                @if(Auth::user()->id == $blog->author->id)
                <a href="/blog/{{$blog->id}}/edit" class="btn btn-outline-primary btn-sm">Edit</a>
                <form action="blog/{{$blog->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete" class="btn btn-outline-danger btn-sm">
                </form>
                @endif


                @endauth
            </div>
        </div>
    </div>
    @empty
    <p>There are no blogs here</p>
    @endforelse

</div>

@stop
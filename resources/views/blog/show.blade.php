@extends('layouts.app')

@section('content')
<h1>{{$blog->title}}</h1>
<div class="blog-info text-muted">
    {{$blog->author->name}}
</div>
<div class="blog-image">
    <img src="{{$blog->image_url}}" alt="{{$blog->title}}">
</div>
<div class="blog-text">
    {{$blog->text}}
</div>

@stop
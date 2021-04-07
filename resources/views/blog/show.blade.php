@extends('layouts.app')

@section('content')
<h1>{{$blog->title}}</h1>
<div class="blog-single-info text-muted">
    <strong>Author: </strong>{{$blog->author->name}} <br>
    <strong>Date: </strong> {{date('d. M. Y.', strtotime($blog->created_at) )}}
</div>
<div class="blog-single-image">
    <img src="{{$blog->image_url}}" alt="{{$blog->title}}">
</div>
<div class="blog-text">
    {{$blog->text}}
</div>

@stop
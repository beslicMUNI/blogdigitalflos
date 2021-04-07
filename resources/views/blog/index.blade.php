@extends('layouts.app')

@section('content')
@forelse ($blogs as $blog)
<p>{{$blog->title}}</p>
<a href="/blog/{{$blog->id}}">Read more</a>
<a href="/blog/{{$blog->id}}/edit">Edit</a>
<p></p>
@empty
<p>There are no blogs here</p>
@endforelse

@stop
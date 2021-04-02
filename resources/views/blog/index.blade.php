@extends('layouts.app')

@section('content')
@forelse ($blogs as $blog)
<p>{{$blog->title}}</p>
@empty
<p>There are no blogs here</p>
@endforelse

@stop
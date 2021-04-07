@extends('layouts.app')

@section('content')
<h1>Edit Blog Article</h1>

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

<form action="/blog/{{$blog->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')


    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{$blog->title}}">
        @error('title')
        <small class="text-danger">{{ $errors->first('title')}}</small>
        @enderror
    </div>



    <div class="form-group">
        <label> Current image </label><br>
        <img src="{{$blog->image_url}}" alt="{{$blog->title}}" id="blog-image-edit"><br>
        <label for="image">Upload new image</label>
        <input type="file" class="form-control" id="image" name="image" value="{{$blog->image_url}}">
        @error('image')
        <small class="text-danger">{{ $errors->first('image')}}</small>
        @enderror
    </div>


    <div class="form-group">
        <label for="text">Text</label> <br>
        <textarea name="text" id="text" cols="50" rows="15" class="form-control">{{$blog->text}}</textarea>
        @error('text')
        <small class="text-danger">{{ $errors->first('text')}}</small>
        @enderror
    </div>
    <div class="form-group">
        <input type="submit" value="Save Blog" class="btn btn-primary">
    </div>
</form>
@stop
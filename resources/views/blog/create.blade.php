@extends('layouts.app')

@section('content')
<h1>Add Blog Article</h1>

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

<form action="/blog" method="POST" enctype="multipart/form-data">
    @csrf


    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control">
        @error('title')
        <small class="text-danger">{{ $errors->first('title')}}</small>
        @enderror
    </div>

    <div class="form-group">
        <label for="image">Upload image</label>
        <input type="file" class="form-control" id="image" name="image">
        @error('image')
        <small class="text-danger">{{ $errors->first('image')}}</small>
        @enderror
    </div>


    <div class="form-group">
        <label for="text">Text</label> <br>
        <textarea name="text" id="text" cols="50" rows="15" class="form-control"></textarea>
        @error('text')
        <small class="text-danger">{{ $errors->first('text')}}</small>
        @enderror
    </div>

    <input type="submit" value="Add Blog" class="btn btn-primary">
</form>
@stop
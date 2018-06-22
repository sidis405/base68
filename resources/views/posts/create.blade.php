@extends('layouts.app')

@section('content')

<h4>Create a new Post</h4>

<form>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title">
    </div>

    <div class="form-group">
        <label for="category_id">Category</label>
        <select class="form-control" name="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="preview">Preview</label>
        <textarea class="form-control" name="preview"></textarea>
    </div>

    <div class="form-group">
        <label for="body">Post body</label>
        <textarea class="form-control" name="body" rows="5"></textarea>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success btn-block">Publish post</button>
    </div>
</form>

@stop

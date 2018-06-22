@extends('layouts.app')

@section('content')

<h4>Create a new Post</h4>

<form method="POST" action="{{ route('posts.store') }}">

    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
    {{-- {{ csrf_field() }} --}}
    @csrf

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
    </div>

    <div class="form-group">
        <label for="category_id">Category</label>
        <select class="form-control" name="category_id">
            <option></option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" @if($category->id == old('category_id')) selected="" @endif >{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="preview">Preview</label>
        <textarea class="form-control" name="preview">{{ old('preview') }}</textarea>
    </div>

    <div class="form-group">
        <label for="body">Post body</label>
        <textarea class="form-control" name="body" rows="5">{{ old('body') }}</textarea>
    </div>

    <div class="form-group">
        <label for="tags[]">Tags</label>
        <select class="form-control" name="tags[]" multiple="">
            @foreach($tags as $tag)
                <option value="{{ $tag->id }}" @if( in_array($tag->id, old('tags', []))) selected="" @endif>{{ $tag->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success btn-block">Publish post</button>
    </div>
</form>

@stop

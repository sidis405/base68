@extends('layouts.app')

@section('content')

<h4>Editing post: {{ $post->title }}</h4>

<form method="POST" action="{{ route('posts.update', $post) }}">

    @csrf
    @method('PATCH')
    {{-- <input type="hidden" name="_method" value="PATCH"> --}}
    {{-- @method_field('PATCH') --}}


    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" value="{{ old('title', $post->title) }}">
    </div>

    <div class="form-group">
        <label for="category_id">Category</label>
        <select class="form-control" name="category_id">
            <option></option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" @if($category->id == old('category_id', $post->category_id)) selected="" @endif >{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="preview">Preview</label>
        <textarea class="form-control" name="preview">{{ old('preview', $post->preview) }}</textarea>
    </div>

    <div class="form-group">
        <label for="body">Post body</label>
        <textarea class="form-control" name="body" rows="5">{{ old('body', $post->body) }}</textarea>
    </div>

    <div class="form-group">
        <label for="tags[]">Tags</label>
        <select class="form-control" name="tags[]" multiple="">
            @foreach($tags as $tag)
                <option value="{{ $tag->id }}" @if( in_array($tag->id, old('tags', $post->tags->pluck('id')->toArray()))) selected="" @endif>{{ $tag->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-warning btn-block">Update post</button>
    </div>
</form>

@stop

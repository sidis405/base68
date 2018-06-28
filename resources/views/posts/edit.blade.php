@extends('layouts.app')

@section('content')

<h4>Editing post: {{ $post->title }}</h4>

<form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">

    @csrf
    @method('PATCH')
    {{-- <input type="hidden" name="_method" value="PATCH"> --}}
    {{-- @method_field('PATCH') --}}


    @include('posts._form')


    <div class="form-group">
        <button type="submit" class="btn btn-warning btn-block">Update post</button>
    </div>
</form>

@can('delete', $post)

    <hr>

    <form action="{{ route('posts.destroy', $post) }}" method="POST">

        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger pull-right" onclick="return confirm('Are you sure?')">Delete Post</button>
    </form>

@endcan

@stop

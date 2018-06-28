@extends('layouts.app')

@section('content')

<h4>Create a new Post</h4>

<form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">

    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
    {{-- {{ csrf_field() }} --}}
    @csrf

    @include('posts._form')

    <div class="form-group">
        <button type="submit" class="btn btn-success btn-block">Publish post</button>
    </div>
</form>

@stop

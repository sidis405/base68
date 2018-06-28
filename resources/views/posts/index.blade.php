@extends('layouts.app')


@section('content')

    <h3>Latest posts</h3>

    {{-- {{ $posts->links() }} --}}

    @foreach($posts as $post)

        @include('posts._post', ['showFull' => false])

    @endforeach

    {{ $posts->links() }}

@stop

@extends('layouts.app')


@section('content')

    <h3>{{ __('messages.heading') }}</h3>
    {{-- <h3>@lang('messages.heading')</h3> --}}

    {{-- {{ $posts->links() }} --}}

    @foreach($posts as $post)

        @include('posts._post', ['showFull' => false])

    @endforeach

    {{ $posts->links() }}

@stop

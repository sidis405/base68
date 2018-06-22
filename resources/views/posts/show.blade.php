@extends('layouts.app')

@section('content')

    @include('posts._post', ['showFull' => true])

@stop

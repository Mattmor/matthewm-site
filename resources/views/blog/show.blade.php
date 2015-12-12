@extends('master')

@section('header')
    @include('blog.header._header')
@endsection

@section('content')
    @include('blog.content._post')
@endsection

@section('footer')
    @include('blog.footer._footer')
@endsection

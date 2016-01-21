@extends('master')
@section('header')
    @include('htmldoc.header._topbar')
@endsection

@section('content')
    @include('tools.content._youtube')
@endsection

@section('footer')

@endsection

@section('flash')
    @include('htmldoc.flash._basicflash')
@endsection

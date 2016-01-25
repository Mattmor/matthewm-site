@extends('master')
@section('headspace')
    <script src="/js/loadingBar.js" type="text/javascript" charset="utf-8"></script>
@endsection

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

@extends('master')

@section('content')
    @include('roles.content._displayroles')
@endsection

@section('flash')
    @include('htmldoc.flash._basicflash')
@endsection
